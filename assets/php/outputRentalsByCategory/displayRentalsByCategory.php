<?php
include_once(get_template_directory() . '/assets/php/outputRentalsByCategory/cardTemplate.php');

function displayRentalsByCategory(){
    $excludeID = get_the_ID();
    $categories = get_the_category();
    

    if(count($categories) > 1){
        $category_id = $GLOBALS['RENTALS'] !== $categories[0]->cat_ID ? $categories[0]->cat_ID : $categories[1]->cat_ID;
    }else{
        $category_id = $GLOBALS['RENTALS'];
    }
    

    $myposts = get_posts(array(
        'showposts' => -1, //add -1 if you want to show all posts
        'post_type' => 'post',
        'category' => $category_id,)
    );
    $args = array(
        'showposts' => -1, //add -1 if you want to show all posts
        'post_type' => 'post',
        'category' => $category_id,);
    $query = new WP_Query( $args );
    //echo $query[0]->ID;
    echo '<div class="display-category-wrappers">';
    foreach ($myposts as &$post){
        if($post->ID !== $excludeID){
            cardTtemplate($post);
        }
    }
    echo '</div>';
}