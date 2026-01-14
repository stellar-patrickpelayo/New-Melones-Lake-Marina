<?php
/**
 * Safari Storage Access Plugin
 *
 * Handles Safari popup login and storage access for iframe embedding in Airo Site Designer.
 * Safari's ITP (Intelligent Tracking Prevention) blocks third-party cookies by default,
 * requiring explicit storage access requests for cross-origin iframe authentication.
 *
 * @package wp-site-designer-mu-plugins
 */

namespace GoDaddy\WordPress\Plugins\SiteDesigner\Plugins;

use GoDaddy\WordPress\Plugins\SiteDesigner\Constants;

/**
 * Handles Safari storage access handshake for cross-origin iframe authentication
 */
class SafariStorageAccess {

	/**
	 * Cookie name for popup auth pending state
	 *
	 * @var string
	 */
	private static $popup_cookie = 'safari_popup_auth_pending';

	/**
	 * Cookie name for storage granted state
	 *
	 * @var string
	 */
	private static $storage_granted_cookie = 'safari_storage_granted';

	/**
	 * Initialize the Safari storage access handler
	 */
	public static function init() {
		// Set cookie when popup auth starts (on login page).
		add_action( 'login_init', array( self::class, 'maybeSetPopupCookie' ) );

		// After successful login, redirect to completion page.
		add_action( 'wp_login', array( self::class, 'onLoginSuccess' ), 10, 2 );

		// Handle iframe storage access request.
		add_action( 'init', array( self::class, 'maybeRequestStorageAccess' ), 1 );

		// Inject popup completion script on any page after login.
		add_action( 'wp_head', array( self::class, 'maybeInjectPopupCompleteScript' ), 1 );
		add_action( 'admin_head', array( self::class, 'maybeInjectPopupCompleteScript' ), 1 );
		add_action( 'login_head', array( self::class, 'maybeInjectPopupCompleteScript' ), 1 );

		// Send headers for cross-origin iframe support.
		add_action( 'send_headers', array( self::class, 'sendHeaders' ), 9999 );
	}

	/**
	 * Send headers for cross-origin iframe support
	 */
	public static function sendHeaders() {
		header( 'Referrer-Policy: no-referrer-when-downgrade', true );
	}

	/**
	 * Set cookie when popup auth is initiated on login page
	 */
	public static function maybeSetPopupCookie() {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( isset( $_GET['safari_popup_auth'] ) && '1' === $_GET['safari_popup_auth'] ) {
			setcookie( self::$popup_cookie, '1', time() + 300, '/', '', true, true );
			$_COOKIE[ self::$popup_cookie ] = '1';
		}
	}

	/**
	 * After login, redirect to a page that will close the popup
	 *
	 * @param string  $user_login Username.
	 * @param WP_User $user       WP_User object of the logged-in user.
	 */
	public static function onLoginSuccess( $user_login, $user ) {
		if ( isset( $_COOKIE[ self::$popup_cookie ] ) ) {
			wp_safe_redirect( home_url( '/?safari_popup_complete=1' ) );
			exit;
		}
	}

	/**
	 * Check if the current browser is Safari (not Chrome/Edge which also have Safari in UA)
	 *
	 * @return bool
	 */
	private static function isSafari() {
		if ( ! isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
			return false;
		}
		$ua = $_SERVER['HTTP_USER_AGENT'];
		// Safari has "Safari" in UA but Chrome/Edge also do - check for those.
		return strpos( $ua, 'Safari' ) !== false
			&& strpos( $ua, 'Chrome' ) === false
			&& strpos( $ua, 'Chromium' ) === false
			&& strpos( $ua, 'Edg' ) === false;
	}

	/**
	 * For iframe requests: Show storage access prompt if needed
	 */
	public static function maybeRequestStorageAccess() {
		// Only run for Safari browser (ITP storage partitioning).
		if ( ! self::isSafari() ) {
			return;
		}

		// Only run for iframe context (Site Designer embedding).
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( ! isset( $_GET['wp_site_designer'] ) ) {
			return;
		}

		// Skip popup auth flow - that's handled separately.
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( isset( $_GET['safari_popup_auth'] ) || isset( $_GET['safari_popup_complete'] ) ) {
			return;
		}

		// Skip if already processing grant (must check before cookie to avoid loop).
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( isset( $_GET['_storage_access_granted'] ) ) {
			setcookie( self::$storage_granted_cookie, '1', 0, '/', '', true, true );
			return;
		}

		// If storage was granted before, show loader to verify access is still valid.
		if ( isset( $_COOKIE[ self::$storage_granted_cookie ] ) ) {
			self::outputStorageLoaderPage();
			exit;
		}

		// Show the storage access prompt page.
		self::outputStorageAccessPage();
		exit;
	}

	/**
	 * Output loader page that verifies storage access on subsequent loads
	 */
	private static function outputStorageLoaderPage() {
		$current_url = self::getCurrentUrl();
		$final_url   = add_query_arg( '_storage_access_granted', '1', $current_url );

		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loading...</title>
	<style>
		* { box-sizing: border-box; margin: 0; padding: 0; }
		body {
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
			background: #f0f0f1;
		}
		.loader {
			width: 48px;
			height: 48px;
			border: 4px solid #e5e7eb;
			border-top-color: #5865F2;
			border-radius: 50%;
			animation: spin 1s linear infinite;
		}
		@keyframes spin { to { transform: rotate(360deg); } }
	</style>
</head>
<body>
	<div class="loader"></div>
	<script>
	(async function() {
		var finalUrl = <?php echo wp_json_encode( $final_url, JSON_UNESCAPED_SLASHES ); ?>;
		try {
			// Check if we still have storage access.
			if (document.hasStorageAccess && !await document.hasStorageAccess()) {
				// Lost access, request it again.
				if (document.requestStorageAccess) {
					await document.requestStorageAccess();
				}
			}
		} catch (e) {
			// Access request failed, continue anyway.
		}
		window.location.href = finalUrl;
	})();
	</script>
</body>
</html>
		<?php
	}

	/**
	 * Output the storage access prompt page
	 */
	private static function outputStorageAccessPage() {
		$current_url = self::getCurrentUrl();
		$final_url   = add_query_arg( '_storage_access_granted', '1', $current_url );

		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="referrer" content="origin">
	<title>Allow Safari to show your site</title>
	<style>
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}
		body {
			font-family: 'GD Sherpa', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
			background: rgba(0, 0, 0, 0.5);
		}
		.modal {
			display: flex;
			flex-direction: column;
			align-items: flex-end;
			padding: 40px;
			gap: 40px;
			width: 600px;
			max-width: calc(100% - 32px);
			background: #FFFFFF;
			box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.2), 0px 4px 18px rgba(0, 0, 0, 0.1), 0px 6px 8px rgba(0, 0, 0, 0.07);
			border-radius: 16px;
			transform: scale(1.25);
			transform-origin: center center;
		}
		.text-lockup {
			display: flex;
			flex-direction: column;
			align-items: flex-start;
			padding: 0;
			gap: 8px;
			width: 100%;
		}
		.title {
			font-weight: 700;
			font-size: 22px;
			line-height: 28px;
			color: #111111;
			width: 100%;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}
		.subtitle {
			font-weight: 400;
			font-size: 16px;
			line-height: 24px;
			color: #111111;
			width: 100%;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}
		.footer {
			display: flex;
			flex-direction: row;
			justify-content: space-between;
			align-items: center;
			padding: 0;
			gap: 16px;
			width: 100%;
		}
		.step-label {
			font-weight: 500;
			font-size: 16px;
			line-height: 22px;
			color: #111111;
		}
		.btn-primary {
			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
			padding: 16px 24px;
			gap: 8px;
			min-height: 37px;
			background: #111111;
			border: 1px solid #111111;
			border-radius: 6px;
			cursor: pointer;
			transition: background 0.15s ease, border-color 0.15s ease;
		}
		.btn-primary:hover {
			background: #333333;
			border-color: #333333;
		}
		.btn-primary:focus {
			outline: 2px solid #111111;
			outline-offset: 2px;
		}
		.btn-primary:disabled {
			background: #9ca3af;
			border-color: #9ca3af;
			cursor: not-allowed;
		}
		.btn-label {
			font-family: -apple-system, BlinkMacSystemFont, "SF Pro", "Segoe UI", Roboto, sans-serif;
			font-weight: 500;
			font-size: 13px;
			line-height: 20px;
			color: #FFFFFF;
			white-space: nowrap;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}
	</style>
</head>
<body>
	<div class="modal">
		<div class="text-lockup">
			<h1 class="title">Allow Safari to show your site</h1>
			<p class="subtitle">When you click on the button below, Safari will ask for permission. Tap "Allow" to view your WordPress site.</p>
		</div>
		<div class="footer">
			<span class="step-label">Step 2/2</span>
			<button id="continueBtn" class="btn-primary" type="button">
				<span class="btn-label">Allow in Safari</span>
			</button>
		</div>
	</div>
	<script>
	(function() {
		var btn = document.getElementById('continueBtn');
		var btnLabel = btn.querySelector('.btn-label');
		var finalUrl = <?php echo wp_json_encode( $final_url, JSON_UNESCAPED_SLASHES ); ?>;
		btn.addEventListener('click', async function() {
			btn.disabled = true;
			btnLabel.textContent = 'Allowing...';
			try {
				if (document.requestStorageAccess) {
					await document.requestStorageAccess();
				}
			} catch (e) {
				// Storage access request failed, continue anyway.
			}
			window.location.href = finalUrl;
		});
	})();
	</script>
</body>
</html>
		<?php
	}

	/**
	 * Inject script to signal popup completion
	 */
	public static function maybeInjectPopupCompleteScript() {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$should_complete = isset( $_GET['safari_popup_complete'] ) ||
			( isset( $_COOKIE[ self::$popup_cookie ] ) && is_user_logged_in() );

		if ( ! $should_complete ) {
			return;
		}

		$allowed_origins = Constants::getActiveOrigins();
		if ( empty( $allowed_origins ) ) {
			return;
		}

		// Clear the popup cookie (flags must match those used when setting).
		setcookie( self::$popup_cookie, '', time() - 3600, '/', '', true, true );

		?>
		<script>
		(function() {
			var ALLOWED_ORIGINS = <?php echo wp_json_encode( $allowed_origins ); ?>;
			if (window.opener) {
				try {
					ALLOWED_ORIGINS.forEach(function(origin) {
						window.opener.postMessage({
							type: 'safari_sso_complete',
							success: true
						}, origin);
					});
					document.body.innerHTML = '<div style="display:flex;align-items:center;justify-content:center;height:100vh;font-family:-apple-system,sans-serif;background:#f0f0f1;"><div style="text-align:center;"><div style="font-size:48px;margin-bottom:16px;">✓</div><h2 style="color:#1d2327;margin-bottom:8px;">Login Successful</h2><p style="color:#50575e;">This window will close automatically...</p></div></div>';
					setTimeout(function() { window.close(); }, 1000);
				} catch (e) {
					window.close();
				}
			}
		})();
		</script>
		<?php
	}

	/**
	 * Get the current URL
	 *
	 * @return string The current URL.
	 */
	private static function getCurrentUrl() {
		$protocol = is_ssl() ? 'https://' : 'http://';
		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$host = isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : '';
		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$uri = isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '/';
		return $protocol . $host . $uri;
	}
}
