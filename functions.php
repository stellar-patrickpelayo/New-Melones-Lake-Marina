<?php

function enqueueStyleSheets(){
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style('style-min', get_template_directory_uri() . '/style-min.css');
}

add_action( 'wp_enqueue_scripts', 'enqueueStyleSheets' );