<?php

function enqueueScripts(){
    wp_enqueue_script( 'slideOutNavHandler', get_template_directory_uri() . '/assets/js/slideOutNavHandler.js', array('jquery'), false, true );

    wp_enqueue_script( 'videoOnLoadEventHandler', get_template_directory_uri() . '/assets/js/videoOnLoadEventHandler.js', array('jquery'), false, true );
}

add_action( 'wp_enqueue_scripts', 'enqueueScripts' );