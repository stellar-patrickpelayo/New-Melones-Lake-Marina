<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo get_post_meta(get_the_ID(), $GLOBALS['PAGE_META_HEADER'], TRUE) ? get_post_meta(get_the_ID(), $GLOBALS['PAGE_META_HEADER'], TRUE) :  get_the_title();?></title>
	<meta name="description" content="<?php echo get_post_meta(get_the_ID(), $GLOBALS['PAGE_META_DESCRIPTION'], TRUE);?>">
    <?php do_action('wp_head'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
</head>

<body>
    <header class='main-header'>       
            <nav class="nav-bar">
                <div class='inner-nav-bar-wrapper buttonNavBarWrapper'>
                    <a class='logo-anchor' href=<?php echo get_home_url();?>>
                        <img class='logo' src=<?php echo get_stylesheet_directory_uri() . '/assets/images/new-melones-logo-light-o3g4hm5wpvlki28ltzysw3vnosfmomt2s69ebvcmkm.png'; ?> />
                    </a>
                    
                        <?php if(false){
                             outputHeaderFullWidthNavMenu();
                             outPutHeaderFirstBreakPointNavMenu(); 
                             outPutHeaderSecondBreakPointNavMenu(); 
                             hamburgerOutput();
                        }else{
                            outPutHeaderWithButton(); 
                            echo '<div class="button-outer-wrapper" style="top:25px !important; text-align:center !important">';
                            echo "<a class='fh-button-true-flat-color fh-size--small fh-icon--anchor' href='https://fareharbor.com/embeds/book/newmeloneslakemarina/?full-items=yes'>BOOK NOW</a>";
                            hamburgerOutput(); 
							
							
					/*		echo "<div class='calendar-icon-dropdown-wrapper'>";
							echo 	"<div class='calendar-icon-wrapper'>";
							echo		"<button class='calendar-button' type='button'>";
							echo			"<i class='fa fa-calendar'></i>";
							echo		"</button>";
							echo	"</div>";
							echo	"<div class='calendar-wrapper'>";
							echo do_shortcode('[Total_Soft_Cal id="5"]');
							echo 	"</div>";
							echo "</div>";
											
	
                            echo '</div>' */
							;
                            
                        }
                        ?>
                        
                </div>
                <?php 
                /*   echo "<a class='header-button-wrapper mobile-button button-actual-wrapper' href='http://rentals.newmeloneslakemarina.com/'><i class='fa fa-check-circle-o fa-lg header-button-icon'></i><span class='book-now-button-header' >BOOK ONLINE</span></a>"; */
				?> 

        </nav>

            <nav class='mobile-nav-bar'>
                <?php outputHeaderMobileSlideOut();?>

            </nav>
    </header>