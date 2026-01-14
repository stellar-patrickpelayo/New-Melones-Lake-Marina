<?php 


function outputFooterQuickLinksNavMenu(){
     if(has_nav_menu($GLOBALS['FOOTER_QUICK_LINKS_NAV_MENU_KEY'])){
          wp_nav_menu(
               array( 
                    'theme_location' => $GLOBALS['FOOTER_QUICK_LINKS_NAV_MENU_KEY'],
                    'container' => false,
               ) 
          );
     }
}

function outputFooterRentalsNavMenu(){
     if(has_nav_menu($GLOBALS['FOOTER_RENTALS_NAV_MENU_KEY'])){
          wp_nav_menu(
               array( 
                    'theme_location' => $GLOBALS['FOOTER_RENTALS_NAV_MENU_KEY'],
                    'container' => false,
               ) 
          );
     }
}