<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo is_home() ? bloginfo('name') :  get_the_title();?></title>        
    <?php do_action('wp_head'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
</head>

<body>
    <header class='main-header'>

        <div class="gift-card"> 
            <span>Looking for the perfect holiday gift? Click here to get a gift card!</span>
        </div>
        
            <nav class="nav-bar">
                <div class="inner-nav-bar-wrapper">
                    <a class='logo-anchor' target='_blank' href=<?php echo get_home_url();?>>
                        <img class='logo' src=<?php echo get_stylesheet_directory_uri() . '/assets/images/new-melones-logo-light-o3g4hm5wpvlki28ltzysw3vnosfmomt2s69ebvcmkm.png'; ?> />
                    </a>
                    
                        <?php outputHeaderFullWidthNavMenu();?>
                        <?php outPutHeaderFirstBreakPointNavMenu(); ?>
                        <?php outPutHeaderSecondBreakPointNavMenu(); ?>

                        <div class='hamburger-menu-wrapper'>
                            <span class='hamburger-label'>MENU</span>
                            <span class='hamburger-menu'></span>
                        </div> 
                </div>
            </nav>

            <nav class='mobile-nav-bar'>
                <?php outputHeaderMobileSlideOut();?>

            </nav>
    </header>