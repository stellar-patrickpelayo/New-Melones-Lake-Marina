<?php 


function outputHeaderFullWidthNavMenu(){
     if(has_nav_menu($GLOBALS['HEADER_FULL_WIDTH_NAV_MENU_KEY'])){
          wp_nav_menu(
               array( 
                    'theme_location' => $GLOBALS['HEADER_FULL_WIDTH_NAV_MENU_KEY'],
                    'container_class' => 'nav-list-wrapper ',
                    'container_id'=>'header-full-width-nav-menu',
                    'menu_class' => 'nav-list',
                    'after' => '<span class="v-icon"></span>',
                    'walker' => new WPSE_78121_Sublevel_Walker
               ) 
          );
     }
}

function outPutHeaderFirstBreakPointNavMenu(){
     if(has_nav_menu($GLOBALS['HEADER_FIRST_BREAK_POINT_NAV_MENU_KEY'])){
          wp_nav_menu(
               array( 
                    'theme_location' => $GLOBALS['HEADER_FIRST_BREAK_POINT_NAV_MENU_KEY'],
                    'container_class' => 'nav-list-wrapper',
                    'container_id'=>'header-first-break-point-nav-menu',
                    'menu_class' => 'nav-list',
                    'after' => '<span class="v-icon"></span>',
                    'walker' => new WPSE_78121_Sublevel_Walker
               ) 
          );
     }
}

function outPutHeaderSecondBreakPointNavMenu(){
     if(has_nav_menu($GLOBALS['HEADER_SECOND_BREAK_POINT_NAV_MENU_KEY'])){
          wp_nav_menu(
               array( 
                    'theme_location' => $GLOBALS['HEADER_SECOND_BREAK_POINT_NAV_MENU_KEY'],
                    'container_class' => 'nav-list-wrapper',
                    'container_id'=>'header-second-break-point-nav-menu',
                    'menu_class' => 'nav-list',
                    'after' => '<span class="v-icon"></span>',
                    'walker' => new WPSE_78121_Sublevel_Walker
               ) 
          );
     }
}

function outPutHeaderWithButton(){
     if(has_nav_menu($GLOBALS['HEADER_SECOND_BREAK_POINT_NAV_MENU_KEY'])){
          wp_nav_menu(
               array( 
                    'theme_location' => $GLOBALS['HEADER_SECOND_BREAK_POINT_NAV_MENU_KEY'],
                    'container_class' => 'nav-list-wrapper',
                    'container_id'=>'header_with_button',
                    'menu_class' => 'nav-list',
                    'after' => '<span class="v-icon"></span>',
                    'walker' => new WPSE_78121_Sublevel_Walker
               ) 
          );
     }
}