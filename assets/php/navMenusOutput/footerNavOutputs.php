<?php 


function outputFooterQuickLinksNavMenu(){
     wp_nav_menu(
          array( 
               'theme_location' => $GLOBALS['FOOTER_QUICK_LINKS_NAV_MENU_KEY'],
               'container' => false,
          ) 
     );
}

function outputFooterRentalsNavMenu(){
    wp_nav_menu(
         array( 
              'theme_location' => $GLOBALS['FOOTER_RENTALS_NAV_MENU_KEY'],
              'container' => false,
         ) 
    );
}