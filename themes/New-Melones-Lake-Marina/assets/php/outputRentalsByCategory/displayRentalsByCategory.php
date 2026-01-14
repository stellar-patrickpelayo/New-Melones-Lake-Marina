<?php

function displayRentalsByCategory(){
    $excludeID = get_the_ID();
    $categories = get_the_category();
    $category_id = null;
    if(count($categories) > 1){
        $category_id = $GLOBALS['RENTALS'] !== $categories[0]->cat_ID ? $categories[0]->cat_ID : $categories[1]->cat_ID;
    }
    $myposts = get_posts(array(
        'showposts' => -1, //add -1 if you want to show all posts
        'post_type' => 'post',
        'category' => $category_id,)
    );

    echo '<div class="display-category-wrappers">';
    foreach ($myposts as &$post){
        if($post->ID !== $excludeID && $post->post_type !== 'page'){
            cardTtemplate($post);
        }
    }
    echo '</div>';
}