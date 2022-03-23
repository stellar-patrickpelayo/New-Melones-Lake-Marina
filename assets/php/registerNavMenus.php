<?php

function register_my_menus() {
    $menus = array();

    //The title of the menu that the user sees
    $HEADER_DEFAULT_MENU_NAME = 'Header Nav Menu at screen full width';
    $HEADER_FIRST_BREAK_POINT_MENU_NAME = 'Header Nav Menu for 1037px to 1132px';
    $HEADER_SECOND_BREAK_POINT_MENU_NAME = 'Header Nav Menu for 992px to 1036px';
    $HEADER_MOBILE_NAV_MENU_NAME = 'Header Slide Out Nav Menu';

    $FOOTER_QUICK_LINKS_MENU_NAME = 'Footer Quick Links Nav Menu';
    $FOOTER_RENTALS_MENU_NAME = 'Footer Rentals Nav Menu';

    $menus[$GLOBALS['HEADER_FULL_WIDTH_NAV_MENU_KEY']] = $HEADER_DEFAULT_MENU_NAME;
    $menus[$GLOBALS['HEADER_FIRST_BREAK_POINT_NAV_MENU_KEY']] = $HEADER_FIRST_BREAK_POINT_MENU_NAME;
    $menus[$GLOBALS['HEADER_SECOND_BREAK_POINT_NAV_MENU_KEY']] = $HEADER_SECOND_BREAK_POINT_MENU_NAME;
    
    $menus[$GLOBALS['HEADER_MOBILE_NAV_MENU_KEY']] = $HEADER_MOBILE_NAV_MENU_NAME;
    
    $menus[$GLOBALS['FOOTER_QUICK_LINKS_NAV_MENU_KEY']] = $FOOTER_QUICK_LINKS_MENU_NAME;
    $menus[$GLOBALS['FOOTER_RENTALS_NAV_MENU_KEY']] = $FOOTER_RENTALS_MENU_NAME;
   

    register_nav_menus($menus);
}
 add_action( 'init', 'register_my_menus' );