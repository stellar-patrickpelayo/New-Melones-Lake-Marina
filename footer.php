        <footer class='main-footer'>
            <div class="upper-footer">
                <div class='footer-columns-wrapper'>
                    <div class='column'>
                        <img class='logo' src=<?php echo get_stylesheet_directory_uri() . '/assets/images/new-melones-logo-light-o3g4hm5wpvlki28ltzysw3vnosfmomt2s69ebvcmkm.png'; ?> />
                        <div class='social-wrapper'>
                            <a class='custom-facebook' href='https://www.facebook.com/pages/New-Melones-Lake-Marina/922449434434182?ref=tn_tnmn'>
                                <i class='fa fa-facebook-f facebook-icon'></i>
                            </a>
                            <a class='custom-instagram' href='https://www.instagram.com/newmeloneslakemarina/'><i class='fa fa-instagram instagram-icon'></i></a>
                            <a class='custom-twitter' href='https://twitter.com/NewMelonesLM'><i class='fa fa-twitter twitter-icon'></i></a>
                        </div>
                    </div>
                    <div class='column'>
                        <h3>New Melones Lake Marina</h3>
                        <ul>
                            <li><a class='list-grid phone-contact' target='_self' href="tel:2097853300"> <i class='fa fa-phone phone-icon'></i><span>(209) 785-3300</span></a></li>
                            <li><a class='list-grid email-contact' target='_self' href="mailto:pr@newmeloneslakemarina.com"> <i class='fa fa-envelope envelope-icon'></i><span>pr@newmeloneslakemarina.com</span></a></li>
                            <li> 
                                <a class='list-grid location-contact' target='_blank' href="https://www.google.com/maps/place/New+Melones+Lake+Marina/@38.0016302,-120.5465814,17z/data=!3m1!4b1!4m5!3m4!1s0x8090ea87a910915b:0x3d5487c47083ebf2!8m2!3d38.0016302!4d-120.5443927">
                                    <i class='fa fa-map-marker map-icon'></i>
                                    <span>6503 Glory Hole Road Angels Camp, CA 95222</span>
                                </a>
                            </li>
                            <li class='list-grid last-list-grid address-contact'><span><strong>Mailing Address:</strong> P.O. Box 1389 Angels Camp, CA 95222</span></li>
                        </ul>
                    </div>
                    <div class='column'>
                        <h3>Quick Links</h3>
                        <?php outputFooterQuickLinksNavMenu();?>
                    </div>
                    <div class='column'>
                        <h4>Rentals</h4>
                        <?php outputFooterRentalsNavMenu();?>

                        <img class='recreation-image' src=<?php echo get_stylesheet_directory_uri() . '/assets/images/RecreationDotGovLogo-light-o3g4hl7yvh8cg9f25bskgfl4wm7gjst111179hm9s0.png'; ?>>

                        <img class='recreation-image' src=<?php echo get_stylesheet_directory_uri() . '/assets/images/BOR-o3g4hl7yvh8cg9f25bskgfl4wm7gjst111179hm9s0.png'; ?>>
                    </div>
                </div>

                <div class='mobile-bottom-logo-and-social-media'>

                    <div class='social-wrapper'>
                            <a class='custom-facebook' href='#'>
                                <i class='fa fa-facebook-f facebook-icon'></i>
                            </a>
                            <a class='custom-instagram' href='#'><i class='fa fa-instagram instagram-icon'></i></a>
                            <a class='custom-twitter' href='#'><i class='fa fa-twitter twitter-icon'></i></a>
                    </div>

                    <img class='logo' src=<?php echo get_stylesheet_directory_uri() . '/assets/images/new-melones-logo.png'; ?> 
                    >
                    
                    <div class='recreation-wrapper'>
                        <img class='recreation-image' src=<?php echo get_stylesheet_directory_uri() . '/assets/images/RecreationDotGovLogo-light-o3g4hl7yvh8cg9f25bskgfl4wm7gjst111179hm9s0.png'; ?>>

                        <img class='recreation-image' src=<?php echo get_stylesheet_directory_uri() . '/assets/images/BOR-o3g4hl7yvh8cg9f25bskgfl4wm7gjst111179hm9s0.png'; ?>>
                    </div>
                </div>

            </div>
            <div class='lower-footer'>

            

            </div>
        </footer>
        <?php do_action('wp_footer');?>
    </body>
</html>