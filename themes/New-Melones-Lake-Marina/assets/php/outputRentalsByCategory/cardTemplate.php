<?php

function cardTtemplate($post){
    $thumbnailURL = get_the_post_thumbnail_url($post);
    $title = get_the_title($post);
    $excerpt = get_the_excerpt($post);
    $url = get_the_permalink($post);
	$bookNowUrl = 'http://rentals.newmeloneslakemarina.com/';
	
   echo <<<END
<div class="category-rental-card">
                <div class="top">
                    <a href="{$url}">
                        <img class="category-rental-image-card" src="{$thumbnailURL}">
                    </a>
                    <div class="below-img-section">
                        <a  href="{$url}">
                            <h4>{$title}</h4>
                        </a>
                        <div class="bottom-section">
                            <span>{$excerpt}</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="category-rental-button-wrapper">
                        <a href="{$bookNowUrl}">Book Now</a>
                        <a href="{$url}">Learn More</a>
                    </div>
                </div>
            </div>
END;
}