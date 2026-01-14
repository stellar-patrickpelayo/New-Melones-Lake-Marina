<?php
add_theme_support( 'post-thumbnails' );
function change_mce_path_options( $init ) {
    $init['relative_urls'] = true;
    $init['document_base_url'] = get_bloginfo('url');
    $init['document_base_url'] = 'http://localhost/wordpress2/wp-content';
    //use for images base '/wp-content/uploads/2022/03/'
    return $init;
   }
add_filter('tiny_mce_before_init', 'change_mce_path_options');


include_once(get_template_directory() . '/assets/php/constants.php');
include_once(get_template_directory() . '/assets/php/customWalkers.php');
include_once(get_template_directory() . '/assets/php/registerNavMenus.php');
include_once(get_template_directory() . '/assets/php/navMenusOutput/headerNavOutputs.php');
include_once(get_template_directory() . '/assets/php/navMenusOutput/footerNavOutputs.php');
include_once(get_template_directory() . '/assets/php/navMenusOutput/headerMobileSlidingNavBarOutputs.php');
include_once(get_template_directory() . '/assets/php/hamburgerOutput.php');
include_once(get_template_directory() . '/assets/php/outputRentalsByCategory/cardTemplate.php');
include_once(get_template_directory() . '/assets/php/outputRentalsByCategory/displayRentalsByCategory.php');
include_once(get_template_directory() . '/assets/php/getBookingSideBar.php');
include_once(get_template_directory() . '/assets/php/enqueueStyleSheets.php');
include_once(get_template_directory() . '/assets/php/enqueueScripts.php');