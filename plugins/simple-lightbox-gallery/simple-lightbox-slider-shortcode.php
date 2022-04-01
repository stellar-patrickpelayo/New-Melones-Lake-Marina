<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
add_shortcode( 'SLGF', 'slgf_ShortCode_load_function' );
function slgf_ShortCode_load_function( $Id ) {
	/*wp_enqueue_style('bootstrap-css', WEBLIZAR_SLGF_PLUGIN_URL . 'css/bootstrap.min.css');
	wp_enqueue_script('bootstrap-js', WEBLIZAR_SLGF_PLUGIN_URL . 'js/bootstrap.min.js', array('jquery'));*/
	// print_r( $Id );
	ob_start();
	if ( ! isset( $Id['id'] ) ) {
		$Id['id'] = "";
	}

	/**
	 * Load css and scripts
	 */
			wp_enqueue_script('jquery');
			wp_enqueue_script('wl-slgf-hover-pack-js', WEBLIZAR_SLGF_PLUGIN_URL . 'js/hover-pack.js', array('jquery'));
			wp_enqueue_script('wl-slgf-rpg-script', WEBLIZAR_SLGF_PLUGIN_URL . 'js/reponsive_photo_gallery_script.js', array('jquery'));


			//lightgallery js css
			wp_register_script('wl-slgf-lightgallery', WEBLIZAR_SLGF_PLUGIN_URL . 'lightbox/lightgallery/js/lightgallery.min.js', array('jquery'), '', true);
			wp_enqueue_script('wl-slgf-lightgallery');
			wp_register_style('wl-slgf-lightgallery', WEBLIZAR_SLGF_PLUGIN_URL . 'lightbox/lightgallery/css/lightgallery.min.css');
			wp_enqueue_style('wl-slgf-lightgallery');
			
			/**
			 * css scripts
			 */
			wp_register_style('wl-slgf-hover-pack-css', WEBLIZAR_SLGF_PLUGIN_URL . 'css/hover-pack.css');
			wp_enqueue_style('wl-slgf-hover-pack-css');
			
			wp_register_style('wl-slgf-img-gallery-css', WEBLIZAR_SLGF_PLUGIN_URL . 'css/img-gallery.css');
			wp_enqueue_style('wl-slgf-img-gallery-css');

			/**
			 * font awesome css
			 */
			wp_register_style('font-awesome-5', WEBLIZAR_SLGF_PLUGIN_URL . 'css/all.min.css');
			wp_enqueue_style('font-awesome-5');

			/*** envira & isotope js ***/
			wp_register_script('slgf_envira-js', WEBLIZAR_SLGF_PLUGIN_URL . 'js/masonry.pkgd.min.js', array('jquery'), '', true);
			wp_enqueue_script('slgf_envira-js');
			
			wp_register_script('slgf_imagesloaded', WEBLIZAR_SLGF_PLUGIN_URL . 'js/imagesloaded.pkgd.min.js', array('jquery'), '', true);
			wp_enqueue_script('slgf_imagesloaded');
	/**
	 * load code ends here
	 */

	/**
	 * Load Lightbox Slider Pro Settings
	 */
	if ( ! isset( $Id['id'] ) ) {
		$Id['id']                 = "";
		$SLGF_Show_Gallery_Title  = "yes";
		$SLGF_Show_Image_Label    = "yes";
		$SLGF_Hover_Animation     = "stripe";
		$lk_show_img_desc         = "Yes";
		$SLGF_Gallery_Layout      = "col-md-6";
		$SLGF_Thumbnail_Layout    = "same-size";
		$SLGF_Hover_Color         = "#0AC2D2";
		$SLGF_Text_BG_Color       = "#FFFFFF";
		$SLGF_Text_Color          = "#000000";
		$SLGF_Hover_Color_Opacity = "yes";
		$SLGF_Font_Style          = "font-name";
		$SLGF_Box_Shadow          = "yes";
		$SLGF_Custom_CSS          = "";
		$SLGF_open_link           = "_blank";
    	$SLGF_label_Color         = "#000000";
    	$SLGF_desc_font_Color     = "#000000";
    	$SLGF_btn_Color           = "#31a3dd";
    	$SLGF_btn_font_Color      = "#FFFFFF";
    	$SLGF_button_title        = "Zoom";
    	$SLGF_Light_Box           = "lightbox3";
	} else {
		$SLGF_Id       = $Id['id'];
		$SLGF_Settings = "SLGF_Gallery_Settings_" . $SLGF_Id;
		$SLGF_Settings = unserialize( get_post_meta( $SLGF_Id, $SLGF_Settings, true ) );


		if ( is_array( $SLGF_Settings ) && count( $SLGF_Settings ) ) {
			$SLGF_Show_Gallery_Title  = $SLGF_Settings['SLGF_Show_Gallery_Title'];
			$SLGF_Show_Image_Label    = $SLGF_Settings['SLGF_Show_Image_Label'];
			$SLGF_Hover_Animation     = $SLGF_Settings['SLGF_Hover_Animation'];
			$SLGF_Gallery_Layout      = $SLGF_Settings['SLGF_Gallery_Layout'];
			$SLGF_Thumbnail_Layout    = $SLGF_Settings['SLGF_Thumbnail_Layout'];
			$lk_show_img_desc         = $SLGF_Settings['lk_show_img_desc'];
			$SLGF_Hover_Color         = $SLGF_Settings['SLGF_Hover_Color'];
			$SLGF_Text_BG_Color       = $SLGF_Settings['SLGF_Text_BG_Color'];
			$SLGF_Text_Color          = $SLGF_Settings['SLGF_Text_Color'];
			$SLGF_Hover_Color_Opacity = $SLGF_Settings['SLGF_Hover_Color_Opacity'];
			$SLGF_Font_Style          = $SLGF_Settings['SLGF_Font_Style'];
			$SLGF_Box_Shadow          = $SLGF_Settings['SLGF_Box_Shadow'];
			$SLGF_Custom_CSS          = $SLGF_Settings['SLGF_Custom_CSS'];
			$SLGF_open_link           = $SLGF_Settings['SLGF_open_link'];
    		$SLGF_label_Color         = $SLGF_Settings['SLGF_label_Color'];
    		$SLGF_desc_font_Color     = $SLGF_Settings['SLGF_desc_font_Color'];
    		$SLGF_btn_Color           = $SLGF_Settings['SLGF_btn_Color'];
    		$SLGF_btn_font_Color      = $SLGF_Settings['SLGF_btn_font_Color'];
    		$SLGF_button_title        = $SLGF_Settings['SLGF_button_title'];
    		$SLGF_Light_Box           = $SLGF_Settings['SLGF_Light_Box'];
    		$SLGF_title_Color		  = (array_key_exists("SLGF_title_Color",$SLGF_Settings)) ? $SLGF_Settings['SLGF_title_Color'] : '#2271b1';
		}
	}

	$RGB           = SLGF_RPGhex2rgb( $SLGF_Hover_Color );
	$HoverColorRGB = implode( ", ", $RGB );
	
	wp_register_style( 'slg_slider_settings_short_style', false );
	wp_enqueue_style( 'slg_slider_settings_short_style' );
	$css = " ";
	ob_start(); ?>
        #slgf_<?php echo esc_attr($SLGF_Id); ?> .b-link-stroke .b-top-line {
            background: rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php if( $SLGF_Hover_Color_Opacity=="yes"){echo "0.5";} else{echo "1.0";} ?>);
        }

        #slgf_<?php echo esc_attr($SLGF_Id); ?> .b-link-stroke .b-bottom-line {
            background: rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php if( $SLGF_Hover_Color_Opacity=="yes"){echo "0.5";} else{echo "1.0";} ?>);
        }

        #slgf_<?php echo esc_attr($SLGF_Id); ?> .b-wrapper {
            font-family: <?php echo str_ireplace("+", " ", $SLGF_Font_Style); ?>;
        / / real name pass here
        }

        @media (min-width: 992px) {
            #slgf_<?php echo esc_attr($SLGF_Id); ?> .col-md-6 {
                width: 48% !important;
                padding-right: 5px;
                padding-left: 5px;
                float: left;
            }

            #slgf_<?php echo esc_attr($SLGF_Id); ?> .col-md-4 {
                width: 33.30% !important;
            }

            #slgf_<?php echo esc_attr($SLGF_Id); ?> .col-md-3 {
                width: 24.90% !important;
            }

            #slgf_<?php echo esc_attr($SLGF_Id); ?> .col-md-2 {
                width: 16.60% !important;
            }
        }

        #slgf_<?php echo esc_attr($SLGF_Id); ?> .slgf_home_portfolio_caption {
            background: <?php echo esc_attr($SLGF_Text_BG_Color); ?>;
        }

        #slgf_<?php echo esc_attr($SLGF_Id); ?> .slgf_home_portfolio_caption h3 {
            color: <?php echo esc_attr($SLGF_Text_Color); ?>;
        }

        <?php if($SLGF_Box_Shadow =="yes"){ ?>
        #slgf_<?php echo esc_attr($SLGF_Id); ?> .img-box-shadow {
            box-shadow: 0 0 6px rgba(0, 0, 0, .7);
        }

        <?php } else { ?>
        #slgf_<?php echo esc_attr($SLGF_Id); ?> .slgf_home_portfolio_caption {
            border-bottom: none !important;
        }

        <?php } ?>
        .fnf {
            background-color: #a92929;
            border-radius: 5px;
            color: #fff;
            font-family: initial;
            text-align: center;
            padding: 12px;
        }

        .slg_title_class{
        	font-weight: bolder; 
        	padding-bottom:20px; 
        	border-bottom:2px solid #cccccc;
        	margin-bottom: 20px;
        	font-family: <?php echo esc_attr($SLGF_Font_Style); ?>;
        	color: <?php echo esc_attr($SLGF_title_Color); ?>;
        }

        <?php echo esc_attr($SLGF_Custom_CSS); ?>
    <?php
	$css .= ob_get_clean();
	wp_add_inline_style( 'slg_slider_settings_short_style', $css ); ?>
	<?php
	/**
	 * Load All Lightbox Slider Pro Custom Post Type
	 */
	$SLGF_CPT_Name = "slgf_slider";
	$AllGalleries  = array( 'p' => $Id['id'], 'post_type' => $SLGF_CPT_Name, 'orderby' => 'ASC' );
	$loop          = new WP_Query( $AllGalleries );
	?>

    <div class="gal-container" id="slgf_<?php echo esc_attr($SLGF_Id); ?>">
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <!--get the post id-->
			<?php $post_id = get_the_ID(); ?>

            <!--Gallery Title-->
			<?php if ( $SLGF_Show_Gallery_Title == "yes" ) { ?>
                <div class="slg_title_class">
					<?php echo get_the_title( $post_id ); ?>
                </div>
			<?php } ?>

            <div class="gallery1 lightgallery_<?php echo esc_attr($SLGF_Id); ?>">
				<?php
				/**
				 * Get All Photos from Lightbox Slider Pro Post Meta
				 */
				$SLGF_AlPhotosDetails = unserialize( get_post_meta( get_the_ID(), 'slgf_all_photos_details', true ) );
				$TotalImages          = get_post_meta( get_the_ID(), 'slgf_total_images_count', true );
				$i                    = 1;


				if ( $TotalImages ) {
					foreach ( $SLGF_AlPhotosDetails as $SLGF_SinglePhotosDetail ) {
						$name 		= $SLGF_SinglePhotosDetail['slgf_image_label'];
						$img_id  	= isset($SLGF_SinglePhotosDetail['slgf_image_id']) ? $SLGF_SinglePhotosDetail['slgf_image_id'] : null ;
						$url  		= $SLGF_SinglePhotosDetail['slgf_image_url'];
						$url1 		= $SLGF_SinglePhotosDetail['slgf_12_thumb'];
						$url2 		= $SLGF_SinglePhotosDetail['slgf_346_thumb'];
						$url3 		= $SLGF_SinglePhotosDetail['slgf_12_same_size_thumb'];
						$url4 		= $SLGF_SinglePhotosDetail['slgf_346_same_size_thumb'];
						$img_desc 	= $SLGF_SinglePhotosDetail['img_desc'];
						$i ++;

						if ( $name == "" ) {
							// if slide title blank then
							global $wpdb;
							$post_table_prefix = $wpdb->prefix . "posts";
							if ( count( $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT `post_title` FROM `$post_table_prefix` WHERE `guid` LIKE '%s'", $url ) ) ) ) {
								// attachment title as alt
								$slide_alt = $attachment[0];
								if ( empty( $attachment[0] ) ) {
									// post title as alt
									$slide_alt = get_the_title( $post_id );
								}
							}
						} else {
							// slide title as alt
							$slide_alt = $name;
						}
						if ( $SLGF_Gallery_Layout == "col-md-6" ) { // two column
							if ( $SLGF_Thumbnail_Layout == "same-size" ) {
								$Thummb_Url = $url3;
							}
							if ( $SLGF_Thumbnail_Layout == "masonry" ) {
								$Thummb_Url = $url1;
							}
							if ( $SLGF_Thumbnail_Layout == "original" ) {
								$Thummb_Url = $url;
							}
						}
						if ( $SLGF_Gallery_Layout == "col-md-4" ) { // Three column
							if ( $SLGF_Thumbnail_Layout == "same-size" ) {
								$Thummb_Url = $url4;
							}
							if ( $SLGF_Thumbnail_Layout == "masonry" ) {
								$Thummb_Url = $url2;
							}
							if ( $SLGF_Thumbnail_Layout == "original" ) {
								$Thummb_Url = $url;
							}
						}
						?>
						<div class="<?php echo esc_attr($SLGF_Gallery_Layout); ?> col-sm-6 wl-gallery" data-src="<?php echo esc_url($Thummb_Url); ?>" >

                            <div class="img-box-shadow">

								<?php //  Swipe box	?>
                                <a title="<?php echo esc_attr($name); ?>" class="swipebox_<?php echo esc_attr($SLGF_Id); ?>"
                                   href="<?php echo esc_url($url); ?>">
                                    <div class="b-link-<?php echo esc_attr($SLGF_Hover_Animation); ?> b-animate-go">
                                        <img src="<?php echo esc_url($Thummb_Url); ?>" class="gall-img-responsive"
                                             alt="<?php if(isset($slide_alt)){echo esc_attr( $slide_alt ); } ?>">
                                    </div>
                                </a>

                                <!--Gallery Label-->
								<?php if ( $SLGF_Show_Image_Label == "yes" && $name ) { ?>
                                    <div class="slgf_home_portfolio_caption">
                                        <h3 class="b-wrapper" style="color: <?php echo esc_attr($SLGF_label_Color); ?>"><?php echo esc_html($name); ?></h3>

										  <p class="lksg_desc_para" style="color: <?php echo esc_attr($SLGF_desc_font_Color); ?>">
												<?php if ( $lk_show_img_desc == 'Yes' ) {
													if ( strlen( $img_desc ) >= 400 ) {
														esc_html_e( $img_desc );
														?><?php
													} else {
														echo html_entity_decode( $img_desc, ENT_QUOTES, 'UTF-8' );
													}
												} ?>
                                            </p>
                                            <a style="padding:5px; font-size:12px;background-color:<?php echo esc_attr($SLGF_btn_Color); ?>;color : <?php echo esc_attr($SLGF_btn_font_Color); ?>" id="same_page" href="<?php echo esc_url( $url ); ?>" class="read_more_btn" title="<?php echo esc_attr( $name ); ?>" target="<?php echo esc_attr( $SLGF_open_link ); ?>"><?php echo esc_html( $SLGF_button_title ) ?></a>
                                    </div>
								<?php } ?>
                            </div>
                        </div>
						<?php
					}// end of foreach
				} else {
					?>
                    <div class="fnf"><?php esc_html_e( "No Photo Found In Photo Gallery", WEBLIZAR_SLGF_TEXT_DOMAIN ); ?>
                    .</div<?php
				}// end of if else total images
				?>
            </div>
		<?php endwhile; ?>
    </div>

    <!-- Swipe Box-->
    <?php
	wp_register_script( 'slg_slider_shortcode_script', false );
	wp_enqueue_script( 'slg_slider_shortcode_script' );
	$js = " ";
	ob_start(); ?>

        jQuery(document).ready(function () {
            ;(function (jQuery) {
				jQuery('.lightgallery_<?php echo esc_attr($SLGF_Id);?>').lightGallery(); /*
                /* jQuery('.swipebox_<?php echo esc_attr($SLGF_Id);?>').swipebox({
                    hideBarsDelay: 0,
                    hideBarsOnMobile: false,
                    hideCloseButtonOnMobile: false, // true will hide the close button on mobile devices
                    loopAtEnd: true, // true will return to the first image after the last image is reached

                });*/
            })(jQuery);


            jQuery('.gallery1').imagesLoaded(function () {
                jQuery('.gallery1').masonry({
                    itemSelector: '.wl-gallery',
                    isAnimated: true,
                    isFitWidth: true
                });
            });
        });
    <?php
	$js .= ob_get_clean();
	wp_add_inline_script( 'slg_slider_shortcode_script', $js );  
	wp_reset_query(); 
	return ob_get_clean();
}
?>