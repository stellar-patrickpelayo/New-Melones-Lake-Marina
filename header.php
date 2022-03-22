<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo is_home() ? bloginfo('name') :  get_the_title();?></title>        
    <?php do_action('wp_head'); ?>
</head>

<body>
    <header class='main-header'>

        <div class="gift-card"> 
            <span>Looking for the perfect holiday gift? Click here to get a gift card!</span>
        </div>
        
            <nav class="nav-bar">
                <div class="inner-nav-bar-wrapper">
                    <a class='logo-anchor' target='_blank' href=<?php get_home_url();?>>
                        <img class='logo' src=<?php echo get_stylesheet_directory_uri() . '/assets/images/new-melones-logo-light-o3g4hm5wpvlki28ltzysw3vnosfmomt2s69ebvcmkm.png'; ?> />
                    </a>
                    <div class='nav-list-wrapper'>
                        <ul class='nav-list'>
                            <li class='current-page'>DISCOVER <div class="v-icon"></div></li>
                            
                            <li>HOUSEBOATING <span class="v-icon"></span></li>
                            <li>RENTALS <span class="v-icon"></span></li>
                            <li>MOORAGE <span class="v-icon"></span></li>
                            <li>THINGS TO DO <span class="v-icon"></span></li>
                            <li>CONTACT</li>
                            <li>More <span class="v-icon"></span></li>
                        </ul>
                    </div>
                </div>
            </nav>
    </header>