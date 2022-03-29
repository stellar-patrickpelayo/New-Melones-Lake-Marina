<?php

function getBookingSideBar(){
    $gallery = do_shortcode("[slide-anything id='623']");
    $img = get_template_directory_uri() . '/assets/images/lake.jpg';

    echo "<div class='booking-side-bar'>
        <img src='".$img."'>
        <div>
        test
            <a href='#'>BOOK NOW</a>
        </div>
    </div>";
    echo $gallery;
}