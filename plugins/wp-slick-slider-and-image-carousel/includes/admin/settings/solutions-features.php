<?php
/**
 * Plugin Solutions & Features Page
 *
 * @package WP Logo Showcase Responsive Slider
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Taking some variables
$popup_add_link = add_query_arg( array( 'post_type' =>WPSISAC_POST_TYPE ), admin_url( 'post-new.php' ) );
?>

<div id="wrap">
	<div class="wpsisac-sf-wrap">
		<div class="wpsisac-sf-inr">
			<!-- Start - Welcome Box -->
			<div class="wpsisac-sf-welcome-wrap">
				<div class="wpsisac-sf-welcome-inr">
					<div class="wpsisac-sf-welcome-left">
						<div class="wpsisac-sf-subtitle">Getting Started</div>
						<h2 class="wpsisac-sf-title">Welcome to Slick Slider</h2>
						<p class="wpsisac-sf-content">Build and display multiple responsive slick image sliders & carousels to create animated image for increase website engagement.</p>
						<a href="<?php echo esc_url( $popup_add_link ); ?>" class="wpsisac-sf-btn">Launch Slick Slider</a></br> <b>OR</b> </br><a href="<?php echo WPSISAC_PLUGIN_LINK_UNLOCK; ?>"  target="_blank" class="wpsisac-sf-btn wpsisac-sf-btn-orange">Grab Now Pro Features</a>
						<div class="wpsisac-rc-wrap">
							<div class="wpsisac-rc-inr wpsisac-rc-bg-box">
								<div class="wpsisac-rc-icon">
									<img src="<?php echo esc_url( WPSISAC_URL ); ?>assets/images/popup-icon/14-days-money-back-guarantee.png" alt="14-days-money-back-guarantee" title="14-days-money-back-guarantee" />
								</div>
								<div class="wpsisac-rc-cont">
									<h3>14 Days Refund Policy. 0 risk to you.</h3>
									<p>14-day No Question Asked Refund Guarantee</p>
								</div>
							</div>
							<div class="wpsisac-rc-inr wpsisac-rc-bg-box">
								<div class="wpsisac-rc-icon">
									<img src="<?php echo esc_url( WPSISAC_URL ); ?>assets/images/popup-icon/popup-design.png" alt="popup-design" title="popup-design" />
								</div>
								<div class="wpsisac-rc-cont">
									<h3>Include Done-For-You Slick Slider Setup ($99 Value)</h3>
									<p>Our  experts team will design 1 free Slick Slider for you as per your need.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="wpsisac-sf-welcome-right">
						<div class="wpsisac-sf-fp-ttl">Free vs Pro</div>
						<div class="wpsisac-sf-fp-box-wrp">
							<div class="wpsisac-sf-fp-box">
								<i class="dashicons dashicons-slides"></i>
								<div class="wpsisac-sf-box-ttl">5 Designs for Slider</div>
								<div class="wpsisac-sf-tag">Free</div>
							</div>
							<div class="wpsisac-sf-fp-box">
								<i class="dashicons dashicons-slides"></i>
								<div class="wpsisac-sf-box-ttl">1 Designs for Carousel</div>
								<div class="wpsisac-sf-tag">Free</div>
							</div>
							<div class="wpsisac-sf-fp-box">
								<i class="dashicons dashicons-align-center"></i>
								<div class="wpsisac-sf-box-ttl">Center Mode</div>
								<div class="wpsisac-sf-tag">Free</div>
							</div>
							<div class="wpsisac-sf-fp-box">
								<i class="dashicons dashicons-slides"></i>
								<div class="wpsisac-sf-box-ttl">Variable Width</div>
								<div class="wpsisac-sf-tag">Free</div>
							</div>
							<div class="wpsisac-sf-fp-box">
								<i class="dashicons dashicons-block-default"></i>
								<div class="wpsisac-sf-box-ttl">Gutenbreg, Divi, and Avada Page Builder Support</div>
								<div class="wpsisac-sf-tag">Free</div>
							</div>
							<div class="wpsisac-sf-fp-box">
								<i class="dashicons dashicons-image"></i>
								<div class="wpsisac-sf-box-ttl">Image Lazyload</div>
								<div class="wpsisac-sf-tag">Free</div>
							</div>
							<!-- <div class="wpsisac-sf-fp-box">
								<i class="dashicons dashicons-layout"></i>
								<div class="wpsisac-sf-box-ttl">Avada Page Builder Native Support</div>
								<div class="wpsisac-sf-tag">Free</div>
							</div> -->
							<div class="wpsisac-sf-fp-box">
								<i class="dashicons dashicons-admin-links"></i>
								<div class="wpsisac-sf-box-ttl">Image Custom Link</div>
								<div class="wpsisac-sf-tag">Free</div>
							</div>
							<div class="wpsisac-sf-fp-box">
								<i class="dashicons dashicons-category"></i>
								<div class="wpsisac-sf-box-ttl">Display Slides for Particular Categories</div>
								<div class="wpsisac-sf-tag">Free</div>
							</div>
							<!-- <div class="wpsisac-sf-fp-box">
								<i class="dashicons dashicons-text"></i>
								<div class="wpsisac-sf-box-ttl">Meta Title Show/Hide</div>
								<div class="wpsisac-sf-tag">Free</div>
							</div> -->
							<!-- <div class="wpsisac-sf-fp-box">
								<i class="dashicons dashicons-text"></i>
								<div class="wpsisac-sf-box-ttl">Meta Caption Show/Hide</div>
								<div class="wpsisac-sf-tag">Free</div>
							</div> -->
							<!-- <div class="wpsisac-sf-fp-box wpsisac-sf-pro-box">
								<i class="dashicons dashicons-format-aside"></i>
								<div class="wpsisac-sf-box-ttl">Meta Description Show/Hide</div>
								<div class="wpsisac-sf-tag">Pro</div>
							</div> -->
							<div class="wpsisac-sf-fp-box wpsisac-sf-pro-box">
								<i class="dashicons dashicons-slides"></i>
								<div class="wpsisac-sf-box-ttl">5 Layouts (Slider, Carousel, Centermode,Partial Slide, and Variable width )</div>
								<div class="wpsisac-sf-tag">Pro</div>
							</div>
							<div class="wpsisac-sf-fp-box wpsisac-sf-pro-box">
								<i class="dashicons dashicons-art"></i>
								<div class="wpsisac-sf-box-ttl">90+ Designs</div>
								<div class="wpsisac-sf-tag">Pro</div>
							</div>
							<div class="wpsisac-sf-fp-box wpsisac-sf-pro-box">
								<i class="dashicons dashicons-html"></i>
								<div class="wpsisac-sf-box-ttl">WP Templating Features </div>
								<div class="wpsisac-sf-tag">Pro</div>
							</div>
							<div class="wpsisac-sf-fp-box wpsisac-sf-pro-box">
								<i class="dashicons dashicons-shortcode"></i>
								<div class="wpsisac-sf-box-ttl">Shortcode Generator</div>
								<div class="wpsisac-sf-tag">Pro</div>
							</div>
							<div class="wpsisac-sf-fp-box wpsisac-sf-pro-box">
								<i class="dashicons dashicons-move"></i>
								<div class="wpsisac-sf-box-ttl">Drag & Drop Slide Order Change</div>
								<div class="wpsisac-sf-tag">Pro</div>
							</div>
							<div class="wpsisac-sf-fp-box wpsisac-sf-pro-box">
								<i class="dashicons dashicons-format-image"></i>
								<div class="wpsisac-sf-box-ttl">Image Navigation Support</div>
								<div class="wpsisac-sf-tag">Pro</div>
							</div>
							<div class="wpsisac-sf-fp-box wpsisac-sf-pro-box">
								<i class="dashicons dashicons-layout"></i>
								<div class="wpsisac-sf-box-ttl">Elementor, Beaver, SiteOrigin, and VC Page Builder Support</div>
								<div class="wpsisac-sf-tag">Pro</div>
							</div>
							<!-- <div class="wpsisac-sf-fp-box wpsisac-sf-pro-box">
								<i class="dashicons dashicons-layout"></i>
								<div class="wpsisac-sf-box-ttl">Beaver Page Builder Support</div>
								<div class="wpsisac-sf-tag">Pro</div>
							</div>
							<div class="wpsisac-sf-fp-box wpsisac-sf-pro-box">
								<i class="dashicons dashicons-layout"></i>
								<div class="wpsisac-sf-box-ttl">SiteOrigin Page Builder Support</div>
								<div class="wpsisac-sf-tag">Pro</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
			<!-- End - Welcome Box -->

			<!-- Start - Logo Showcase - Features -->
			<div class="wpsisac-features-section">
				<div class="wpsisac-center wpsisac-features-ttl">
					<h2 class="wpsisac-sf-ttl">Powerful Pro Features, Simplified</h2>
				</div>
				<div class="wpsisac-features-section-inr">
					<div class="wpsisac-features-box-wrap">
						<ul class="wpsisac-features-box-grid">
							<li>
							<div class="wpsisac-popup-icon"><img src="<?php echo WPSISAC_URL; ?>/assets/images/popup-icon/slider.png" /></div>
							Slick Slider View</li>
							<li>
							<div class="wpsisac-popup-icon"><img src="<?php echo WPSISAC_URL; ?>/assets/images/popup-icon/slider-carousel.png" /></div>
							Slick Carousel View</li>
							<li>
							<div class="wpsisac-popup-icon"><img src="<?php echo WPSISAC_URL; ?>/assets/images/popup-icon/Centermode.png" /></div>
							Slick Carousel with Centermode</li>
							<li>
							<div class="wpsisac-popup-icon"><img src="<?php echo WPSISAC_URL; ?>/assets/images/popup-icon/Variablewidth.png" /></div>
							Slider with Partial Slide</li>
							<li>
							<div class="wpsisac-popup-icon"><img src="<?php echo WPSISAC_URL; ?>/assets/images/popup-icon/Variablewidth.png" /></div>
							Slick Variable Width</li>
						</ul>
					</div>
					<a href="<?php echo WPSISAC_PLUGIN_LINK_UNLOCK; ?>" target="_blank" class="wpsisac-sf-btn wpsisac-sf-btn-orange"><span class="dashicons dashicons-cart"></span> Grab Now Pro Features</a>
					<div class="wpsisac-rc-wrap">
						<div class="wpsisac-rc-inr wpsisac-rc-bg-box">
							<div class="wpsisac-rc-icon">
								<img src="<?php echo esc_url( WPSISAC_URL ); ?>assets/images/popup-icon/14-days-money-back-guarantee.png" alt="14-days-money-back-guarantee" title="14-days-money-back-guarantee" />
							</div>
							<div class="wpsisac-rc-cont">
								<h3>14 Days Refund Policy. 0 risk to you.</h3>
								<p>14-day No Question Asked Refund Guarantee</p>
							</div>
						</div>
						<div class="wpsisac-rc-inr wpsisac-rc-bg-box">
							<div class="wpsisac-rc-icon">
								<img src="<?php echo esc_url( WPSISAC_URL ); ?>assets/images/popup-icon/popup-design.png" alt="popup-design" title="popup-design" />
							</div>
							<div class="wpsisac-rc-cont">
								<h3>Include Done-For-You Slick Slider Setup ($99 Value)</h3>
								<p>Our  experts team will design 1 free Slick Slider for you as per your need.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End - Logo Showcase - Features -->

			<!-- Start - Testimonial Section -->
			<div class="wpsisac-sf-testimonial-wrap">
				<div class="wpsisac-center wpsisac-features-ttl">
					<h2 class="wpsisac-sf-ttl">Looking for a Reason to Use Slick Slider? Here are 40+...</h2>
				</div>
				<div class="wpsisac-testimonial-section-inr">
					<div class="wpsisac-testimonial-box-wrap">
						<div class="wpsisac-testimonial-box-grid">
							<h3 class="wpsisac-testimonial-title">Lightweight and versatile!</h3>
							<div class="wpsisac-testimonial-desc">Just what I needed. Is really lightweight, so your page speed is not affected, not like other slider plug-ins with tons of functionalities but lag the load speed. Plus if you know a little of css it is very customizable.</div>
							<div class="wpsisac-testimonial-clnt">@ondu</div>
							<div class="wpsisac-testimonial-rating"><img src="<?php echo WPSISAC_URL; ?>/assets/images/rating.png" /></div>
						</div>
						<div class="wpsisac-testimonial-box-grid">
							<h3 class="wpsisac-testimonial-title">Brilliant Service</h3>
							<div class="wpsisac-testimonial-desc">Brilliant support service, very speedy response and fantastic communication. 100% Recommend. Thank you.</div>
							<div class="wpsisac-testimonial-clnt">@designzeto</div>
							<div class="wpsisac-testimonial-rating"><img src="<?php echo WPSISAC_URL; ?>/assets/images/rating.png" /></div>
						</div>
						<div class="wpsisac-testimonial-box-grid">
							<h3 class="wpsisac-testimonial-title">Great Support Servive</h3>
							<div class="wpsisac-testimonial-desc">Slik slider is a very versatile and easy-to-use plugin, although the best is the great support service</div>
							<div class="wpsisac-testimonial-clnt">@enjoyjoan</div>
							<div class="wpsisac-testimonial-rating"><img src="<?php echo WPSISAC_URL; ?>/assets/images/rating.png" /></div>
						</div>
						<div class="wpsisac-testimonial-box-grid">
							<h3 class="wpsisac-testimonial-title">Fantastic support</h3>
							<div class="wpsisac-testimonial-desc">Not only were they able to help me achieve what I needed, they were fast and also worked over the weekend. Highly recommended!</div>
							<div class="wpsisac-testimonial-clnt">@sprocker</div>
							<div class="wpsisac-testimonial-rating"><img src="<?php echo WPSISAC_URL; ?>/assets/images/rating.png" /></div>
						</div>
						<div class="wpsisac-testimonial-box-grid">
							<h3 class="wpsisac-testimonial-title">Amazing Support</h3>
							<div class="wpsisac-testimonial-desc">Amazing support from the developer! This is one of the best slider plugin you can count on.</div>
							<div class="wpsisac-testimonial-clnt">@julians3</div>
							<div class="wpsisac-testimonial-rating"><img src="<?php echo WPSISAC_URL; ?>/assets/images/rating.png" /></div>
						</div>
						<div class="wpsisac-testimonial-box-grid">
							<h3 class="wpsisac-testimonial-title">Brilliant plugin.</h3>
							<div class="wpsisac-testimonial-desc">I have been looking for a slider plugin with a partial view for some time and bumped upon this. I had some teething troubles but prompt customer support from the author resolved all the issues.</div>
							<div class="wpsisac-testimonial-clnt">@advanirajesh</div>
							<div class="wpsisac-testimonial-rating"><img src="<?php echo WPSISAC_URL; ?>/assets/images/rating.png" /></div>
						</div>
					</div>
					<a href="https://wordpress.org/support/plugin/wp-slick-slider-and-image-carousel/reviews/?filter=5" target="_blank" class="wpsisac-sf-btn"><span class="dashicons dashicons-star-filled"></span> View All Reviews</a> OR <a href="<?php echo WPSISAC_PLUGIN_LINK_UNLOCK; ?>"  target="_blank" class="wpsisac-sf-btn wpsisac-sf-btn-orange">Grab Now Pro Features</a>
					<div class="wpsisac-rc-wrap">
						<div class="wpsisac-rc-inr wpsisac-rc-bg-box">
							<div class="wpsisac-rc-icon">
								<img src="<?php echo esc_url( WPSISAC_URL ); ?>assets/images/popup-icon/14-days-money-back-guarantee.png" alt="14-days-money-back-guarantee" title="14-days-money-back-guarantee" />
							</div>
							<div class="wpsisac-rc-cont">
								<h3>14 Days Refund Policy. 0 risk to you.</h3>
								<p>14-day No Question Asked Refund Guarantee</p>
							</div>
						</div>
						<div class="wpsisac-rc-inr wpsisac-rc-bg-box">
							<div class="wpsisac-rc-icon">
								<img src="<?php echo esc_url( WPSISAC_URL ); ?>assets/images/popup-icon/popup-design.png" alt="popup-design" title="popup-design" />
							</div>
							<div class="wpsisac-rc-cont">
								<h3>Include Done-For-You Slick Slider Setup ($99 Value)</h3>
								<p>Our  experts team will design 1 free Slick Slider for you as per your need.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End - Testimonial Section -->
		</div>
	</div><!-- end .wpsisac-sf-wrap -->
</div><!-- end .wrap -->