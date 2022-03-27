<?php

function enqueueScripts(){
    wp_enqueue_script( 'slideOutNavHandler', get_template_directory_uri() . '/assets/js/slideOutNavHandler.js', array('jquery'), false, true );

    wp_enqueue_script( 'bootstrap-js','https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'attachPostBackgroundStyle', get_template_directory_uri() . '/assets/js/attachPostBackground.js', array('jquery'), false, true );
    wp_enqueue_script( 'fix_imgUrl', get_template_directory_uri() . '/assets/js/fix_imgUrl.js', array('jquery'), false, true );
   
}

add_action( 'wp_enqueue_scripts', 'enqueueScripts' );