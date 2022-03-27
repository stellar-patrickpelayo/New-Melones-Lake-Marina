<?php

function enqueueStyleSheets(){
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style('style-min', get_template_directory_uri() . '/style-min.css');
    wp_enqueue_style('alata', 'https://fonts.googleapis.com/css2?family=Alata&display=swap');
    wp_enqueue_style('open_sans', 'https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    wp_enqueue_style('font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}

add_action( 'wp_enqueue_scripts', 'enqueueStyleSheets' );