<?php
/**
 * Status Bar Hider Plugin
 *
 * @package wp-site-designer-mu-plugins
 */

namespace GoDaddy\WordPress\Plugins\SiteDesigner\Plugins;

use function add_action;

/**
 * Hides the WordPress bottom status bar when Site Designer requests are detected
 */
class StatusBarHider {

	/**
	 * Constructor
	 */
	public function __construct() {
        add_action( 'admin_footer', array( $this, 'hideStatusBar' ), 999 );
        add_action( 'wp_footer', array( $this, 'hideStatusBar' ), 999 );
	}

	/**
	 * Hide the WordPress bottom status bar and Site Editor footer by injecting CSS
	 */
	public function hideStatusBar() {
		?>
		<style type="text/css">
			/* Hide Site Editor breadcrumb footer */
			.interface-interface-skeleton__footer,
			.block-editor-block-breadcrumb {
				display: none !important;
			}
			
			/* Remove bottom padding/margin from editor skeleton */
			.interface-interface-skeleton__body,
			.interface-navigable-region.interface-interface-skeleton__content {
				padding-bottom: 0 !important;
				margin-bottom: 0 !important;
			}
		</style>
		<?php
	}
}

