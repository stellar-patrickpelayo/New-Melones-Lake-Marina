<?php


function outputHeaderMobileSlideOut(){
    wp_nav_menu(
        array( 
             'theme_location' => $GLOBALS['HEADER_MOBILE_NAV_MENU_KEY'],
             'container' => false,
        ) 
   );
}