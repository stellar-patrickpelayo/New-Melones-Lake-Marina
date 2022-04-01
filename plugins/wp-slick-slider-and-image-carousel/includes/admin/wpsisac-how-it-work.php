<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package WP Slick Slider and Image Carousel
 * @since 1.0.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<div class="wrap wpsisacm-wrap">
	<style type="text/css">
		.wpos-box{box-shadow: 0 5px 30px 0 rgba(214,215,216,.57);background: #fff; padding-bottom:10px; position:relative;}
		.wpos-box ul{padding: 15px;}
		.wpos-box h5{background:#555; color:#fff; padding:15px; text-align:center;}
		.wpos-box h4{ padding:0 15px; margin:5px 0; font-size:18px;}
		.wpos-box .button{margin:0px 15px 15px 15px; text-align:center; padding:7px 15px; font-size:15px;display:inline-block;}
		.wpos-box .wpos-list{list-style:square; margin:10px 0 0 20px;}
		.wpos-clearfix:before, .wpos-clearfix:after{content: "";display: table;}
		.wpos-clearfix::after{clear: both;}
		.wpos-clearfix{clear: both;}
		.wpos-col{width: 47%; float: left; margin-right:10px; margin-bottom:10px;}
		.wpos-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpos-pro-box.postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.postbox-container .wpos-list li:before{font-family: dashicons; content: "\f139"; font-size:20px; color: #0073aa; vertical-align: middle;}
		.wpsisacm-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.wpsisacm-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
		.upgrade-to-pro{font-size:18px; text-align:center; margin-bottom:15px;}
		.wpos-copy-clipboard{-webkit-touch-callout: all; -webkit-user-select: all; -khtml-user-select: all; -moz-user-select: all; -ms-user-select: all; user-select: all;}
		.button-orange{background: #ff5d52 !important;border-color: #ff5d52 !important; font-weight: 600;}
		.button-blue{background: #0055fb !important;border-color: #0055fb !important; font-weight: 600;}
	</style>
	<h2><?php _e( 'How It Works - Display and Shortcode', 'wp-slick-slider-and-image-carousel' ); ?></h2>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">

			<div id="post-body-content">
				
				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'How It Works - Display and Shortcode', 'wp-slick-slider-and-image-carousel' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label><?php _e('Getting Started with Slick Slider', 'wp-slick-slider-and-image-carousel'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1. Go to "Slick Slider --> Add Slide tab".', 'wp-slick-slider-and-image-carousel'); ?></li>
												<li><?php _e('Step-2. Add image title, description and images as a featured image', 'wp-slick-slider-and-image-carousel'); ?></li>
												<li><?php _e('Step-3. Repeat this process for number of slides you want.', 'wp-slick-slider-and-image-carousel'); ?></li>
												<li><?php _e('Step-4. To display multiple slider, you can use category shortcode under "Slick Slider--> Slider Category"', 'wp-slick-slider-and-image-carousel'); ?></li>
											</ul>
										</td>
									</tr>

									<tr>
										<th>
											<label><?php _e('How Shortcode Works', 'wp-slick-slider-and-image-carousel'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1. Create a page like Slider OR add the shortcode in any page.', 'wp-slick-slider-and-image-carousel'); ?></li>
												<li><?php _e('Step-2. Put below shortcode as per your need.', 'wp-slick-slider-and-image-carousel'); ?></li>
											</ul>
										</td>
									</tr>

									<tr>
										<th>
											<label><?php _e('All Shortcodes', 'wp-slick-slider-and-image-carousel'); ?>:</label>
										</th>
										<td>
											<span class="wpsisacm-shortcode-preview wpos-copy-clipboard">[slick-slider]</span> – <?php _e('Slick slider Shortcode (design-1 to design-5)', 'wp-slick-slider-and-image-carousel'); ?> <br />
											<span class="wpsisacm-shortcode-preview wpos-copy-clipboard">[slick-carousel-slider]</span> – <?php _e('Slick slider carousel Shortcode (design-6)', 'wp-slick-slider-and-image-carousel'); ?> <br />
											<span class="wpsisacm-shortcode-preview wpos-copy-clipboard">[slick-carousel-slider centermode="true"]</span> – <?php _e('Slick slider carousel with center mode Shortcode (design-6)', 'wp-slick-slider-and-image-carousel'); ?> <br />
											<span class="wpsisacm-shortcode-preview wpos-copy-clipboard">[slick-carousel-slider variablewidth="true" centermode="true"]</span> – <?php _e('Slick slider carousel with variable width Shortcode (design-6)', 'wp-slick-slider-and-image-carousel'); ?>
										</td>
									</tr>
									<tr>
										<th>
											<label><?php _e('Documentation', 'wp-slick-slider-and-image-carousel'); ?>:</label>
										</th>
										<td>
											<a class="button button-primary" href="https://docs.essentialplugin.com/wp-slick-slider-and-image-carousel/" target="_blank"><?php _e('Check Documentation', 'wp-slick-slider-and-image-carousel'); ?></a>
										</td>
									</tr>
									<tr>
										<th>
											<label><?php _e('Demo', 'wp-slick-slider-and-image-carousel'); ?>:</label>
										</th>
										<td>
											<a class="button button-primary" href="https://demo.essentialplugin.com/slick-slider-demo/" target="_blank"><?php _e('Check Free Demo', 'wp-slick-slider-and-image-carousel'); ?></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Gutenberg Support', 'wp-slick-slider-and-image-carousel' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label><?php _e('How it Work', 'wp-slick-slider-and-image-carousel'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1. Go to the Gutenberg editor of your page.', 'wp-slick-slider-and-image-carousel'); ?></li>
												<li><?php _e('Step-2. Search "Slick Slider" keyword in the Gutenberg block list.', 'wp-slick-slider-and-image-carousel'); ?></li>
												<li><?php _e('Step-3. Add any block of slick slider and you will find its relative options on the right end side.', 'wp-slick-slider-and-image-carousel'); ?></li>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->

				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Need Support & Solutions?', 'wp-slick-slider-and-image-carousel' ); ?></span>
							</h2>
						</div>
						<div class="inside wpos-clearfix">
							<div class="wpos-col">
								<div class="wpos-box">
									<h5 style="font-size: 18px;line-height: 30px;margin: 10px 0px; background:#0055fb;">WP Slick Slider Premium Features</h5>
									<h4>Single Plugin</h4>
									<ul class="wpos-list">
										<li><b>90+ predefined template</b> for Slick Slider.</li>
										<li><b>3 shortcodes</b> [slick-slider], [slick-carousel-slider] and [slick-variable-slider]</li>
										<li>Drag &amp; Drop order change.</li>
										<li>Gutenberg Block, Elementor, Bevear, SiteOrigin, Divi and Fusion Page Builder Supports.</li>
										<li>Slider Center Mode Effect.</li>
										<li><a href="<?php echo WPSISAC_PLUGIN_LINK_UPGRADE; ?>" target="_blank">View More All Features</a></li>
									</ul>
									<div style="text-align:center;">
										<a class="button button-primary button-blue" href="<?php echo WPSISAC_PLUGIN_LINK_UPGRADE; ?>" target="_blank"><?php _e('Grab Now', 'wp-slick-slider-and-image-carousel'); ?></a>
									</div>
								</div>
							</div>
							<div class="wpos-col">
								<div class="wpos-box">
									<h5 style="font-size: 18px;line-height: 30px;margin: 10px 0px; background:#ff5d52;">Essential Bundle With WP Slick Slider</h5>
									<h4>Bundle Deal</h4>
									<ul style="margin: 0;list-style: none;font-size: 16px;">
										<li style="margin-bottom:8px;">
											<span style="display:inline-block;vertical-align: middle;"><img src="<?php echo WPSISAC_URL; ?>/assets/images/utility-50.png" width="24"></span> <span style="display:inline-block;vertical-align: middle;">39 Utility Plugins</span>
										</li>
										<li style="margin-bottom:8px;">
											<span style="display:inline-block;vertical-align: middle;"><img src="<?php echo WPSISAC_URL; ?>/assets/images/SlidersPack-50.png" width="24"></span> <span style="display:inline-block;vertical-align: middle;"> 10 SlidersPack</span>
										</li>
										<li style="margin-bottom:8px;">
											<span style="display:inline-block;vertical-align: middle;"><img src="<?php echo WPSISAC_URL; ?>/assets/images/popup-anything-icon.png" width="24"></span> <span style="display:inline-block;vertical-align: middle;"> Popup Anything A Marketing Popup</span>
										</li>
										<li>
											<span style="display:inline-block;vertical-align: middle;"><img src="<?php echo WPSISAC_URL; ?>/assets/images/security-icon.png" width="24"></span> <span style="display:inline-block;vertical-align: middle;"> Essential Security</span>
										</li>
									</ul>
									<div style="text-align:center;">
										<a class="button button-primary button-orange" href="<?php echo WPSISAC_PLUGIN_BUNDLE_LINK; ?>" target="_blank"><?php _e('Grab Now', 'wp-slick-slider-and-image-carousel'); ?></a>
									</div>
								</div>
							</div>
							<div class="wpos-clearfix">
								<img src="<?php echo WPSISAC_URL; ?>/assets/images/page-builder-support.jpg" style="max-width:100% " />
							</div>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->

				<!-- Help to improve this plugin! -->
				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Help to improve this plugin!', 'wp-slick-slider-and-image-carousel' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<p><?php _e( 'Enjoyed this plugin? You can help by rate this plugin', 'wp-slick-slider-and-image-carousel'); ?> <a href="https://wordpress.org/support/plugin/wp-slick-slider-and-image-carousel/reviews/" target="_blank"><?php _e( '5 stars!', 'wp-slick-slider-and-image-carousel'); ?></a></p>
						</div>
					</div>
				</div><!-- .meta-box-sortables -->
			</div><!-- .post-body-content -->

			<div id="postbox-container-1" class="postbox-container">
				<div class="meta-box-sortables">
					<div class="postbox wpos-pro-box">
						<h3 class="hndle">
							<span><?php _e( 'Upgrate to Pro', 'wp-slick-slider-and-image-carousel' ); ?></span>
						</h3>
						<div class="inside">
							<ul class="wpos-list">
								<li><?php _e( '90+ Predefined stunning designs', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( '30 Image Slider Designs', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( '30 Image Carousel and Center Slider Designs', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( '33 Slider Variable width Designs', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( 'Drag & Drop order change', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( 'Gutenberg Block Supports', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( 'WPBakery Page Builder Supports', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( 'Elementor, Bevear and SiteOrigin Page Builder Support. <span class="wpos-new-feature">New</span>', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( 'Divi Page Builder Native Support.<span class="wpos-new-feature">New</span>', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( 'Fusion Page Builder (Avada) native support.<span class="wpos-new-feature">New</span>', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( 'WP Templating Features', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( 'Custom CSS', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( 'Slider Center Mode Effect', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( 'Slider RTL support', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( 'Fully responsive', 'wp-slick-slider-and-image-carousel'); ?></li>
								<li><?php _e( '100% Multi language', 'wp-slick-slider-and-image-carousel'); ?></li>
							</ul>
							<div class="upgrade-to-pro"><?php _e( 'Gain access to', 'wp-slick-slider-and-image-carousel'); ?> <strong><?php _e( 'WP Slick Slider and Image Carousel', 'wp-slick-slider-and-image-carousel'); ?></strong> <?php _e( 'included in', 'wp-slick-slider-and-image-carousel'); ?> <br /><strong><?php _e( 'Essential Plugin Bundle', 'wp-slick-slider-and-image-carousel'); ?></div>
							<a class="button button-primary wpos-button-full button-orange" href="<?php echo WPSISAC_PLUGIN_LINK_UPGRADE; ?>" target="_blank"><?php _e('Grab Slick Slider Now', 'wp-slick-slider-and-image-carousel'); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- end .wpsisacm-wrap -->