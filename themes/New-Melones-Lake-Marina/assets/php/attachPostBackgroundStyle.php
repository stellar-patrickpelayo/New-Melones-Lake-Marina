<?php


//styles to attach but with url
// background: linear-gradient(0deg,rgba(8,9,14,0.6) 0%,rgba(8,9,14,0.6) 100%), url('./assets/images/daily-slip-rental-header.avif');
//         padding-top:112px;
//         background-size:cover;
//         background-position:center center;
//         display:block;
//         min-height:0;

function attachPostBackgroundStyle(){
    $background ='linear-gradient(0deg,rgba(8,9,14,0.6) 0%,rgba(8,9,14,0.6) 100%), url('.get_the_post_thumbnail_url() .')';
    $style = $background;

    echo $style;
}