<?php

//extending the walker so that a wrapper can be added to the header sub-nav-menu
class WPSE_78121_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        
        if($depth === 0){
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<div class='sub-menu-wrap'><ul class='sub-menu'>\n";
        }
        if($depth === 1){
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<div class='sub-menu-wrap depth-1-sub-menu'><ul class='sub-menu'>\n";
        }
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        if($depth === 0){
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul></div>\n";
        }
        if($depth === 1){
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul></div>\n";
        }
    }

    function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
        
        //these are the top nav menu li
        if($depth === 0){
            $categoryClass = 'menu-item-object-category';
            
            if(array_search($categoryClass, $item->classes)){
                $output .= "<li class='" .  implode(" ", $item->classes) . "'>" ;

                $output .= '<span class="cursor-default">';
                $output .= '<span class="item-title">' . $item->title . '</span>' . '<span class="v-icon"></span>';
            }else{
                $output .= "<li class='less-padding-no-v" .  implode(" ", $item->classes) . "'>" ;
                $output .= '<a class="no-v-anchor" href="' . $item->url . '">';
                $output .= $item->title;
                $output .= '</a>';
            }
        }else{
            $output .= "<li class='" .  implode(" ", $item->classes) . "'>" ;
            $output .= '<a href="' . $item->url . '">';
            $output .= $item->title;
            $output .= '</a>';
        }
    }
}