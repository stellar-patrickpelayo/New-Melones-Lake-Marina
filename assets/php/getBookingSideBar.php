<?php

function getBookingSideBar(){
    $gallery = do_shortcode("[slide-anything id='623']");
    // echo "<div>
    //     . $gallery . 
    //     <div>
    //         <a href='#'>BOOK NOW</a>
    //     </div>
    // </div>";
    echo $gallery;
}