<?php 


function outputHeaderFullWidthNavMenu(){
     wp_nav_menu(
          array( 
               'theme_location' => $GLOBALS['HEADER_FULL_WIDTH_NAV_MENU_KEY'],
               'container_class' => 'nav-list-wrapper',
               'menu_class' => 'nav-list',
               'after' => '<span class="v-icon"></span>',
               'walker' => new WPSE_78121_Sublevel_Walker
          ) 
     );
}