<?php

function cardTtemplate($post){
    $thumbnailURL = get_the_post_thumbnail_url($post);
    $title = get_the_title($post);
    $excerpt = get_the_excerpt($post);
    $url = get_the_permalink($post);

    $card = "<div class='category-rental-card'>
            <a target='_blank' href=$url>
                <img class='category-rental-image-card' src=$thumbnailURL>
            </a>
            <div class='below-img-section'>
                <a target='_blank' href=$url>
                    <h4>$title</h4>    
                </a>            
                <span>$excerpt</span>
                <div class='category-rental-button-wrapper'>
                    <a>Book Now</a>
                    <a target='_blank' href=$url>Learn More</a>
                </div>
            </div>
        </div>";
    echo $card;
}