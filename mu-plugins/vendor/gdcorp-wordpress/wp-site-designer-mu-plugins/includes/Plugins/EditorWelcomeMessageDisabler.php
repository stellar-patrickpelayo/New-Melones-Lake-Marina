<?php
/**
 * Editor Welcome Message Disabler Plugin
 *
 * @package wp-site-designer-mu-plugins
 */

namespace GoDaddy\WordPress\Plugins\SiteDesigner\Plugins;

use function add_action;
use function get_user_meta;
use function update_user_meta;
use function wp_get_current_user;

/**
 * Disables the "Welcome to the Block Editor" message in the Gutenberg Editor
 */
class EditorWelcomeMessageDisabler {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'disableWelcomeGuide' ) );
	}

	/**
	 * Disable the welcome guide by setting user preferences
	 */
	public function disableWelcomeGuide() {
		$user_id = wp_get_current_user()->ID;
		
		if ( ! $user_id ) {
			return;
		}

		// Get current preferences
		$preferences = get_user_meta( $user_id, 'wp_persisted_preferences', true );
		
		if ( ! is_array( $preferences ) ) {
			$preferences = array();
		}

		// Ensure core/edit-post preferences exist
		if ( ! isset( $preferences['core/edit-post'] ) ) {
			$preferences['core/edit-post'] = array();
		}

		// Ensure core/edit-site preferences exist
		if ( ! isset( $preferences['core/edit-site'] ) ) {
			$preferences['core/edit-site'] = array();
		}

		// Set welcome guide preferences to false
		$updated = false;
		
		if ( ! isset( $preferences['core/edit-post']['welcomeGuide'] ) || $preferences['core/edit-post']['welcomeGuide'] !== false ) {
			$preferences['core/edit-post']['welcomeGuide'] = false;
			$updated = true;
		}

		if ( ! isset( $preferences['core/edit-site']['welcomeGuide'] ) || $preferences['core/edit-site']['welcomeGuide'] !== false ) {
			$preferences['core/edit-site']['welcomeGuide'] = false;
			$updated = true;
		}

		// Update user meta only if something changed
		if ( $updated ) {
			update_user_meta( $user_id, 'wp_persisted_preferences', $preferences );
		}
	}
}

