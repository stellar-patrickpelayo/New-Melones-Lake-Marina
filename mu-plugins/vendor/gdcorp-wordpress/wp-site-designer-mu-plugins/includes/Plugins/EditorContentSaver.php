<?php
/**
 * Editor Content Saver Plugin
 *
 * Handles saving the WordPress editor content on demand from Site Designer.
 *
 * @package wp-site-designer-mu-plugins
 */

namespace GoDaddy\WordPress\Plugins\SiteDesigner\Plugins;

use GoDaddy\WordPress\Plugins\SiteDesigner\Constants;

use function add_action;

/**
 * Handles save operations between WordPress and Site Designer iframe
 */
class EditorContentSaver {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'admin_footer', array( $this, 'outputScript' ), 999 );
	}

	/**
	 * Output JavaScript to handle editor saving
	 */
	public function outputScript() {
		$allowed_origins = Constants::getActiveOrigins();

		if ( empty( $allowed_origins ) ) {
			return;
		}

		?>
		<script type="text/javascript">
		(function() {
			const ALLOWED_ORIGINS = <?php echo wp_json_encode( $allowed_origins ); ?>;

			/**
			 * Save current post content
			 */
			async function saveContent() {
				if (typeof wp === 'undefined' || !wp.data || !wp.data.select('core/editor')) {
					return;
				}

				try {
					const { dispatch, select } = wp.data;
					
					if (select('core/editor').isEditedPostDirty()) {
						await dispatch('core/editor').savePost();
					}
				} catch (e) {
					// Silent fail
				}
			}

			/**
			 * Handle incoming messages from parent
			 */
			window.addEventListener('message', function(event) {
				if (!ALLOWED_ORIGINS.includes(event.origin)) {
					return;
				}

				if (event.data?.type === 'site-designer-save') {
					saveContent();
				}
			});
		})();
		</script>
		<?php
	}
}
