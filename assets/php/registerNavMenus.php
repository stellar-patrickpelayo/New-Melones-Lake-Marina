<?php

function register_my_menus() {
    $menus = array();

    //The title of the menu that the user sees
    $HEADER_DEFAULT_MENU_NAME = 'Header Nav Menu at screen full width';


    $menus[$GLOBALS['HEADER_FULL_WIDTH_NAV_MENU_KEY']] = $HEADER_DEFAULT_MENU_NAME;
  
    register_nav_menus($menus);
}
 add_action( 'init', 'register_my_menus' );