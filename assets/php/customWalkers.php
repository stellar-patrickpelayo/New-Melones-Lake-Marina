<?php

//extending the walker so that a wrapper can be added to the header sub-nav-menu
class WPSE_78121_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='sub-menu-wrap'><ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }

    // function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
    //     echo $depth;
        
    //     $output .= '<li class="test">BLAH';
    //     //$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        
    //     // if ($item->url && $item->url != '#') {
    //     //     $output .= '<a href="' . $item->url . '">';
    //     // } else {
    //     //     $output .= '<span>';
    //     // }
    //     // $output .= $item->title;
    //     // if ($item->url && $item->url != '#') {
    //     //     $output .= '</a>';
    //     // } else {
    //     //     $output .= '</span>';
    //     // }
    // }
}