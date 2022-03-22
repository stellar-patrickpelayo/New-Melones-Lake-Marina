<?php

function register_my_menus() {
    $menus = array();

    //The title of the menu that the user sees
    $HEADER_DEFAULT_MENU_NAME = 'Header Nav Menu at screen full width';
    $FOOTER_QUICK_LINKS_MENU_NAME = 'Footer Quick Links Nav Menu';
    $FOOTER_RENTALS_MENU_NAME = 'Footer Rentals Nav Menu';

    $menus[$GLOBALS['HEADER_FULL_WIDTH_NAV_MENU_KEY']] = $HEADER_DEFAULT_MENU_NAME;
    $menus[$GLOBALS['FOOTER_QUICK_LINKS_NAV_MENU_KEY']] = $FOOTER_QUICK_LINKS_MENU_NAME;
    $menus[$GLOBALS['FOOTER_RENTALS_NAV_MENU_KEY']] = $FOOTER_RENTALS_MENU_NAME;

    register_nav_menus($menus);
}
 add_action( 'init', 'register_my_menus' );