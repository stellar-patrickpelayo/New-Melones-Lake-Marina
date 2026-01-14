<?php
/**
 * Test case for MCP_JWT_Authenticator class
 *
 * @package mcp-adapter-initializer
 */

namespace GD\MCP\Tests;

use Brain\Monkey\Functions;
use Mockery;

/**
 * Test MCP_JWT_Authenticator functionality
 */
class McpJwtAuthenticatorTest extends TestCase {

	/**
	 * The authenticator instance
	 *
	 * @var \MCP_JWT_Authenticator
	 */
	private $authenticator;

	/**
	 * Set up the test case before any tests run
	 */
	public static function setUpBeforeClass(): void {
		parent::setUpBeforeClass();

		// Define constants for customer and site validation if not already defined
		if ( ! defined( 'configData' ) ) {
			define(
				'configData',
				json_encode(
					array(
						'GD_CUSTOMER_ID' => '123456',
						'GD_ACCOUNT_UID' => 'valid_site_id',
					)
				)
			);
		}
	}

	/**
	 * Set up the test case
	 */
	protected function setUp(): void {
		parent::setUp();

		// Mock wp_upload_dir
		Functions\when( 'wp_upload_dir' )->justReturn(
			array(
				'basedir' => sys_get_temp_dir(),
			)
		);

		$this->authenticator = new \MCP_JWT_Authenticator();
	}

	/**
	 * Test authenticate_request returns false with empty JWT
	 */
	public function test_authenticate_request_empty_jwt() {
		$result = $this->authenticator->authenticate_request( '', 'site_id_123' );
		$this->assertFalse( $result );
	}

	/**
	 * Test authenticate_request returns false with empty site_id
	 */
	public function test_authenticate_request_empty_site_id() {
		$result = $this->authenticator->authenticate_request( 'valid.jwt.token', '' );
		$this->assertFalse( $result );
	}

	/**
	 * Test authenticate_request returns false with both parameters empty
	 */
	public function test_authenticate_request_both_empty() {
		$result = $this->authenticator->authenticate_request( '', '' );
		$this->assertFalse( $result );
	}

	/**
	 * Test authenticate_request returns false with invalid JWT format
	 */
	public function test_authenticate_request_invalid_jwt_format() {
		// JWT must have exactly 3 parts separated by dots
		$result = $this->authenticator->authenticate_request( 'invalid.jwt', 'site_id_123' );
		$this->assertFalse( $result );

		$result = $this->authenticator->authenticate_request( 'too.many.parts.in.jwt', 'site_id_123' );
		$this->assertFalse( $result );

		$result = $this->authenticator->authenticate_request( 'onlyonepart', 'site_id_123' );
		$this->assertFalse( $result );
	}

	/**
	 * Test authenticate_request returns false with invalid JWT signature
	 */
	public function test_authenticate_request_invalid_signature() {
		// Create a JWT with invalid signature (too short)
		$header  = base64_encode( json_encode( array( 'alg' => 'RS256' ) ) );
		$payload = base64_encode( json_encode( array( 'cid' => '123' ) ) );
		$jwt     = "$header.$payload.short";

		$result = $this->authenticator->authenticate_request( $jwt, 'site_id_123' );
		$this->assertFalse( $result );
	}

	/**
	 * Test authenticate_request returns false with disallowed algorithm
	 */
	public function test_authenticate_request_disallowed_algorithm() {
		// Create a JWT with HS256 (not allowed)
		$header  = $this->base64url_encode( json_encode( array( 'alg' => 'HS256' ) ) );
		$payload = $this->base64url_encode( json_encode( array( 'cid' => '123' ) ) );
		$sig     = $this->base64url_encode( str_repeat( 'a', 40 ) );
		$jwt     = "$header.$payload.$sig";

		$result = $this->authenticator->authenticate_request( $jwt, 'site_id_123' );
		$this->assertFalse( $result );
	}

	/**
	 * Test authenticate_request with valid offline JWT in dev environment
	 */
	public function test_authenticate_request_valid_offline_jwt() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Note: configData constant is already defined in McpAdapterInitializerSimpleTest
		// with GD_CUSTOMER_ID='123456' and GD_ACCOUNT_UID='valid_site_id'
		// We need to use those values in our test

		// Create a valid JWT with GoDaddy claims matching the constants
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'cid'        => '123456',
			'shopperId'  => '123456',
			'plid'       => 'platform_123',
			'plt'        => '1',
			'shard'      => '1234',
			'typ'        => 'idp',
			'exp'        => time() + 3600, // Valid for 1 hour
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertTrue( $result );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request returns false when customer ID doesn't match
	 */
	public function test_authenticate_request_customer_id_mismatch() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Note: configData is already defined in the first test with '123456'
		// We need to create a JWT with a different customer ID
		// Create JWT with different customer ID
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'cid'        => '999999', // Different from configData's 123456
			'shopperId'  => '999999',
			'plid'       => 'platform_123',
			'plt'        => '1',
			'shard'      => '1234',
			'typ'        => 'idp',
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'site_abc123' );
		$this->assertFalse( $result );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request returns false when site ID doesn't match
	 */
	public function test_authenticate_request_site_id_mismatch() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create JWT with valid customer ID but use wrong site_id
		// configData has GD_ACCOUNT_UID='valid_site_id'
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'cid'        => '123456',
			'shopperId'  => '123456',
			'plid'       => 'platform_123',
			'plt'        => '1',
			'shard'      => '1234',
			'typ'        => 'idp',
		);

		$jwt = $this->createValidJwt( $header, $payload );

		// Site ID in request doesn't match constant (valid_site_id)
		$result = $this->authenticator->authenticate_request( $jwt, 'wrong_site_id' );
		$this->assertFalse( $result );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request returns false with expired JWT
	 */
	public function test_authenticate_request_expired_jwt() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create JWT that expired more than 12 hours ago (dev grace period)
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'cid'        => '123456',
			'shopperId'  => '123456',
			'plid'       => 'platform_123',
			'plt'        => '1',
			'shard'      => '1234',
			'typ'        => 'idp',
			'exp'        => time() - ( 13 * 60 * 60 ), // Expired 13 hours ago
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertFalse( $result );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request with JWT missing required GoDaddy claims
	 */
	public function test_authenticate_request_missing_godaddy_claims() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create JWT with insufficient GoDaddy claims (need at least 2)
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'cid'        => '123456',
			'shopperId'  => '123456', // Only 1 GoDaddy claim
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertFalse( $result );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request with invalid platform type
	 */
	public function test_authenticate_request_invalid_platform_type() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create JWT with non-numeric platform type
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'cid'        => '123456',
			'shopperId'  => '123456',
			'plid'       => 'platform_123',
			'plt'        => 'invalid', // Should be numeric
			'shard'      => '1234',
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertFalse( $result );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request with invalid shard format
	 */
	public function test_authenticate_request_invalid_shard_format() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create JWT with invalid shard format (not 4 digits)
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'cid'        => '123456',
			'shopperId'  => '123456',
			'plid'       => 'platform_123',
			'plt'        => '1',
			'shard'      => '123', // Should be 4 digits
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertFalse( $result );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request with invalid JWT type
	 */
	public function test_authenticate_request_invalid_jwt_type() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create JWT with invalid type (should be 'idp')
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'cid'        => '123456',
			'shopperId'  => '123456',
			'plid'       => 'platform_123',
			'plt'        => '1',
			'shard'      => '1234',
			'typ'        => 'wrong', // Should be 'idp'
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertFalse( $result );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request with JWT missing CID claim
	 */
	public function test_authenticate_request_missing_cid() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create JWT without cid claim
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'shopperId' => '123456',
			'plid'      => 'platform_123',
			'plt'       => '1',
			'shard'     => '1234',
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertFalse( $result );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request with malformed JWT payload
	 */
	public function test_authenticate_request_malformed_payload() {
		// Create JWT with invalid base64 payload
		$header  = $this->base64url_encode( json_encode( array( 'alg' => 'RS256' ) ) );
		$payload = 'invalid!!!base64';
		$sig     = $this->base64url_encode( str_repeat( 'a', 40 ) );
		$jwt     = "$header.$payload.$sig";

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertFalse( $result );
	}

	/**
	 * Test authenticate_request handles exception gracefully
	 */
	public function test_authenticate_request_handles_exception() {
		// Set environment to prod to trigger SSO validation path
		putenv( 'SERVER_ENV=prod' );

		// Create a JWT that will cause an exception during SSO validation
		// (since we don't have real SSO credentials)
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'cid'        => '123456',
			'shopperId'  => '123456',
			'plid'       => 'platform_123',
			'plt'        => '1',
			'shard'      => '1234',
		);

		$jwt = $this->createValidJwt( $header, $payload );

		// Should return false on exception during SSO validation
		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertFalse( $result );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request accepts various allowed algorithms
	 */
	public function test_authenticate_request_allowed_algorithms() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		$allowed_algorithms = array( 'RS256', 'RS384', 'RS512', 'ES256', 'ES384', 'ES512' );

		foreach ( $allowed_algorithms as $alg ) {
			$header  = array( 'alg' => $alg );
			$payload = array(
				'cid'        => '123456',
				'shopperId'  => '123456',
				'plid'       => 'platform_123',
				'plt'        => '1',
				'shard'      => '1234',
				'typ'        => 'idp',
			);

			$jwt = $this->createValidJwt( $header, $payload );

			// Should accept the algorithm (will pass signature validation)
			$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
			
			// Should pass with valid algorithm
			$this->assertTrue( $result, "Algorithm $alg should be accepted" );
		}

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request with JWT without expiration in dev
	 */
	public function test_authenticate_request_no_expiration_dev() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create JWT without expiration claim (valid in dev)
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'cid'        => '123456',
			'shopperId'  => '123456',
			'plid'       => 'platform_123',
			'plt'        => '1',
			'shard'      => '1234',
			'typ'        => 'idp',
			// No 'exp' claim
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertTrue( $result );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request with recently expired JWT in dev (within grace period)
	 */
	public function test_authenticate_request_expired_within_grace_period() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create JWT that expired 1 hour ago (within 12-hour grace period)
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'cid'        => '123456',
			'shopperId'  => '123456',
			'plid'       => 'platform_123',
			'plt'        => '1',
			'shard'      => '1234',
			'typ'        => 'idp',
			'exp'        => time() - 3600, // Expired 1 hour ago
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertTrue( $result );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request with delegation token missing cid
	 */
	public function test_authenticate_request_delegation_token_missing_cid() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create an e2s token without cid in nested object
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'auth' => 'e2s',
			'del'  => array(
				'auth' => 'basic',
			),
			'e2s'  => array(
				// Missing cid
				'shopperId' => '123456',
				'plid'      => '1',
				'plt'       => 1,
				'shard'     => null,
			),
			'typ'  => 'idp',
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertFalse( $result, 'Delegation token without cid should fail' );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request with delegation token customer ID mismatch
	 */
	public function test_authenticate_request_delegation_token_customer_id_mismatch() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create an e2s token with wrong customer ID
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'auth' => 'e2s',
			'del'  => array(
				'auth' => 'basic',
			),
			'e2s'  => array(
				'cid'        => '999999', // Wrong customer ID
				'shopperId'  => '999999',
				'plid'       => '1',
				'plt'        => 1,
				'shard'      => null,
			),
			'typ'  => 'idp',
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertFalse( $result, 'Delegation token with wrong customer ID should fail' );

		// Clean up
		putenv( 'SERVER_ENV' );
	}


	/**
	 * Helper: Create a valid JWT for testing
	 *
	 * @param array $header JWT header.
	 * @param array $payload JWT payload.
	 * @return string JWT token.
	 */
	private function createValidJwt( $header, $payload ): string {
		$header_encoded  = $this->base64url_encode( json_encode( $header ) );
		$payload_encoded = $this->base64url_encode( json_encode( $payload ) );
		
		// Create a valid-looking signature (40+ chars)
		$signature = $this->base64url_encode( str_repeat( 'a', 64 ) );

		return "$header_encoded.$payload_encoded.$signature";
	}

	/**
	 * Helper: Base64 URL encode
	 *
	 * @param string $data Data to encode.
	 * @return string Base64 URL encoded string.
	 */
	private function base64url_encode( $data ): string {
		return rtrim( strtr( base64_encode( $data ), '+/', '-_' ), '=' );
	}

	/**
	 * Test authenticate_request with exact basic token structure
	 */
	public function test_authenticate_request_exact_basic_token() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create basic token with exact structure from requirements
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'auth'     => 'basic',
			'factors'  => array(
				'k_pw' => 1418662545,
			),
			'ftc'      => 1,
			'iat'      => 1418662545,
			'jti'      => 'jti00002',
			'plid'     => '1',
			'shopperId' => '67890',
			'cid'      => '123456', // Using test customer ID
			'typ'      => 'idp',
			'fpid'     => 'federatedPartnerId',
			'vat'      => 1418662545,
			'per'      => false,
			'plt'      => 1,
			'shard'    => '1234',
			'identity' => 'identityGuid',
			'hbi'      => 1418662545,
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertTrue( $result, 'Basic token with exact structure should authenticate' );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request with exact e2s token structure
	 */
	public function test_authenticate_request_exact_e2s_token() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create e2s token with exact structure from requirements
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'auth' => 'e2s',
			'iat'  => 1418686034,
			'jti'  => 'jti00004',
			'typ'  => 'idp',
			'ucid' => '31fba9ec-0412-4542-9be4-c349e385fba5',
			'e2s'  => array(
				'plid'      => '1',
				'shopperId' => '67890',
				'ftc'       => 0,
				'cid'       => '123456', // Using test customer ID
			),
			'del'  => array(
				'accountName' => 'fgoodwrk',
				'auth'        => 'basic',
				'factors'     => array(
					'k_pw' => 1418685664,
				),
				'ftc'         => 1,
				'groups'      => array(
					'C3',
					'Development',
				),
				'iat'         => 1418685664,
				'jti'         => 'jti00001',
				'typ'         => 'jomax',
			),
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertTrue( $result, 'E2S token with exact structure should authenticate' );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request with exact s2s token structure
	 */
	public function test_authenticate_request_exact_s2s_token() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create s2s token with exact structure from requirements
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'auth' => 's2s',
			'iat'  => 1418683816,
			'jti'  => 'jti00005',
			'typ'  => 'idp',
			's2s'  => array(
				'al'       => 2,
				'disp'     => 'My Top Client',
				'plid'     => '1',
				'shopperId' => '12345',
				'ftc'      => 0,
				'cid'      => '123456', // Using test customer ID
				'plt'      => 1,
				'shard'    => '1234',
				'identity' => 'identityGuid',
			),
			'del'  => array(
				'auth'     => 'basic',
				'factors'  => array(
					'k_pw' => 1418683805,
				),
				'ftc'      => 1,
				'iat'      => 1418683805,
				'jti'      => 'jti00006',
				'plid'     => '1',
				'shopperId' => '67890',
				'typ'      => 'idp',
				'cid'      => 'customerId',
				'plt'      => 1,
				'shard'    => '1234',
				'identity' => 'identityGuid',
			),
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertTrue( $result, 'S2S token with exact structure should authenticate' );

		// Clean up
		putenv( 'SERVER_ENV' );
	}

	/**
	 * Test authenticate_request with exact e2s2s token structure
	 */
	public function test_authenticate_request_exact_e2s2s_token() {
		// Set environment to dev
		putenv( 'SERVER_ENV=dev' );

		// Create e2s2s token with exact structure from requirements
		$header  = array( 'alg' => 'RS256' );
		$payload = array(
			'auth'  => 'e2s2s',
			'iat'   => 1418690952,
			'jti'   => 'jti00008',
			'typ'   => 'idp',
			'e2s2s' => array(
				'al'       => 2,
				'disp'     => 'My Top Client',
				'plid'     => '1',
				'shopperId' => '12345',
				'ftc'      => 0,
				'plt'      => 1,
				'cid'      => '123456', // Using test customer ID
				'shard'    => '1234',
				'identity' => 'identityGuid',
			),
			'del'   => array(
				'auth' => 'e2s',
				'iat'  => 1418686034,
				'jti'  => 'jti00004',
				'typ'  => 'idp',
				'e2s'  => array(
					'plid'      => '1',
					'shopperId' => '67890',
					'ftc'       => 0,
					'plt'       => 1,
					'cid'       => 'customerId',
					'shard'     => '1234',
					'identity'  => 'identityGuid',
				),
				'del'  => array(
					'accountName' => 'fgoodwrk',
					'auth'        => 'basic',
					'factors'     => array(
						'k_pw' => 1418685664,
					),
					'ftc'         => 1,
					'groups'      => array(
						'C3',
						'Development',
					),
					'iat'         => 1418685664,
					'jti'         => 'jti00001',
					'typ'         => 'jomax',
				),
			),
		);

		$jwt = $this->createValidJwt( $header, $payload );

		$result = $this->authenticator->authenticate_request( $jwt, 'valid_site_id' );
		$this->assertTrue( $result, 'E2S2S token with exact structure should authenticate' );

		// Clean up
		putenv( 'SERVER_ENV' );
	}
}

