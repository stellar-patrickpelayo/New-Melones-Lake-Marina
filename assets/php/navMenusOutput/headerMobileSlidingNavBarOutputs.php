<?php


function outputHeaderMobileSlideOut(){
     if(has_nav_menu($GLOBALS['HEADER_MOBILE_NAV_MENU_KEY'])){
          wp_nav_menu(
               array( 
                    'theme_location' => $GLOBALS['HEADER_MOBILE_NAV_MENU_KEY'],
                    'container' => false,
                    'walker' => new WPSE_78121_Sublevel_Walker
               ) 
          );
     }
}