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
                <img class='logo' src=<?php echo get_stylesheet_directory_uri() . '\assets\images\new-melones-logo-light-o3g4hm5wpvlki28ltzysw3vnosfmomt2s69ebvcmkm.png'; ?> />
                
                <div class='nav-list-wrapper'>
                    <ul class='nav-list'>
                        <li>DISCOVER</li>
                        <li>HOUSEBOATING</li>
                        <li>RENTALS</li>
                        <li>MOORAGE</li>
                        <li>THINGS TO DO</li>
                        <li>CONTACT</li>
                        <li>More</li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>