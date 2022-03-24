

<?php /* Template Name: More Attractions Template */ ?>

<?php get_header();?>
<main class='more-attractions general-page'>
    <div class='title-header header-background'>
        <div class='title-wrapper upper-case-text'>
            <h1>Local Attractions</h1>
        </div>
    </div>
        
    <div class='lower-section'>
        <h2>While you're here...</h2>

        <div class='image-description-wrapper first-image-description-wrapper'>
            <div class='image-wrapper'>
                <a target='_blank' href='https://www.recreation.gov/camping/campgrounds/234073'>
                    <img src=<?php  echo get_template_directory_uri() .'/assets/images/attraction1.avif'?>>
                </a>
            </div>

            <div class='descriptions'>
                <h3>Camp at Glory Hole</h3>
                <p>
                    Camping at New Melones Lake is that rich family and friend fun you’ve been looking for. Wake up in the morning to fresh air and a beautiful view. Keep the whole family easily entertained on one of our party boats, or zip around the lake on one of our sport boats. Don’t forget, our full-service store also offers everything you could need for your trip, making your entire vacation both convenient and memorable.
                </p>

                <a class='button-1' href='https://www.recreation.gov/camping/campgrounds/234073'>
                    <i class='info-circle fa fa-info-circle'></i> <span class='text'>Learn More</span>
                </a>
            </div>
        </div>

        <div class='image-description-wrapper'>
            <div class='image-wrapper'>
                <a target='_blank' href='https://moaningcaverns.com/'>
                    <img src=<?php  echo get_template_directory_uri() .'/assets/images/attraction2.avif'?>>
                </a>
            </div>

            <div class='descriptions'>
                <h3>Visit Moaning Caverns Adventure Park</h3>
                <p>
                    While you’re here, visit Moaning Cavern, home to the largest single cave chamber in California. With its stunning beauty unlike anything you’ve ever seen before, you’ll sure be glad you went. Also, check out their outdoor activities, including a twin zip line, rock wall climbing, and panning for gold.
                </p>

                <a class='button-1' href='https://moaningcaverns.com/'>
                    <i class='info-circle fa fa-info-circle'></i> <span class='text'>Learn More</span>
                </a>
            </div>
        </div>

        <div class='image-description-wrapper'>
            <div class='image-wrapper'>
                <a target='_blank' href='https://www.gocalaveras.com/itinerary/things-to-do/calaveras-wine-tasting/'>
                    <img src=<?php  echo get_template_directory_uri() .'/assets/images/attraction3.avif'?>>
                </a>
            </div>

            <div class='descriptions'>
                <h3>Hiking and Biking Trails</h3>
                <p>
                    Enjoy all of the beautiful scenery that New Melones has to offer on one of the easy, moderate, or challenging hiking and biking trails.
                </p>

                <a class='button-1' href='https://www.gocalaveras.com/itinerary/things-to-do/calaveras-wine-tasting/'>
                    <i class='info-circle fa fa-info-circle'></i> 
                    <span class='text'>Learn More</span>
                </a>
            </div>
        </div>

    </div>
</main>
<?php get_footer();?>