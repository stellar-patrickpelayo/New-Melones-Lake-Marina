<?php /* Template Name: Front Page Template */ ?>
<?php get_header();?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<main class='page front-page'>

<div>
    <div class='video-wrapper'>
        <iframe class="video-embed" id="video-row-embed" frameborder="0" allowfullscreen="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" title="YouTube video player" width="100%" height="100%" src="https://www.youtube.com/embed/KJNvpOS43_c?autoplay=1&amp;controls=0&amp;enablejsapi=1&amp;fs=0&amp;iv_load_policy=3&amp;loop=1&amp;modestbranding=1&amp;origin=https%3A%2F%2Fwww.newmeloneslakemarina.com&amp;playsinline=1&amp;rel=0&amp;start=12&amp;end=100&amp;widgetid=1&mute=1"></iframe>
        

        <div class='activites-wrapper'>
            <div class='inner-wrapper'>
                <h1>New Melones Lake Marina</h1>
                <h3>
                Watersport & Boat Rentals<br>
                on New Melones Lake
                </h3>
                <a href="https://fareharbor.com/embeds/book/newmeloneslakemarina/?full-items=yes" class="fh-button-true-flat-color fh-icon--anchor">VIEW ALL ACTIVITIES</a>
            </div>
        </div>
    </div>

    <div class='content-section front-page-content-section'>
        <?php the_content();?>

        <!-- <div class='grid-gallery'>
            <div class='image-box'>
                <img href='wp-content/uploads/2022/03/Waterski.jpg' class='img-item'>
            </div>
            <div class='image-box'>
                <img href='wp-content/uploads/2022/03/24-Bennington-‘Gold-Class-Sport-Pontoon-Boat-Daily-Rental-image-1.jpg'class='img-item'>
            </div>
            <div class='image-box'>
                <img href='wp-content/uploads/2022/03/23-Axis-T-23-Wake-Surf-Boat-Daily-Rental-image-1.jpg' class='img-item'>
            </div>
            <div class='image-box'>
                <img href='wp-content/uploads/2022/03/Tube-Rental-image-1.jpg' class='img-item'>
            </div>
            <div class='image-box'>
                <img href='wp-content/uploads/2022/03/Kayaks-Daily-Rental-image-1.jpg' class='img-item'>
            </div>
            <div class='image-box'>
                <img href='wp-content/uploads/2022/03/SUP-Boards-Daily-Rental-image-1.jpg' class='img-item'>
            </div>


            <div class='our-rentals-wrapper center-and-max-width'>
            <div class='rental-item'>
                <a href='/houseboat-rentals'>
                    <img src='wp-content/uploads/2022/03/Odyssey-II-Houseboat-with-Hot-Tub-image-1.png'>
                    <div>
                        <h4>Houseboat Rentals</h4>
                    </div>
                </a>
            </div>
            <div class='rental-item'>
                <a href='/party-boat-rentals'>
                    <img src='wp-content/uploads/2022/03/party-boat-front-page-img-scaled.jpg'>
                    <div>
                        <h4>Partyboat Rentals</h4>
                    </div>
                </a>
            </div>
            <div class='rental-item'>
                <a href='/sportboat-rentals'>
                    <img src='wp-content/uploads/2022/03/23-Axis-T-23-Wake-Surf-Boat-Daily-Rental-image-1.jpg'>
                    <div>
                        <h4>Sportboat Rentals</h4>
                    </div>
                </a>
            </div>
            <div class='rental-item'>
                <a href='/slip-leasing'>
                    <img src='wp-content/uploads/2022/03/slip-leasing-header.jpg'>
                    <div>
                        <h4>Slip Leasing</h4>
                    </div>
                </a>
            </div>
            <div class='rental-item'>
                <a href='/watersport-rentals'>
                    <img src='wp-content/uploads/2022/03/Sea-Doo-Sparks-Daily-Rental-image-1.jpg'>
                    <div>
                        <h4>Watersport Rentals</h4>
                    </div>
                </a>
            </div>
            <div class='rental-item'>
                <a href='/patio-boat-pontoon-boat-rentals'>
                    <img src='wp-content/uploads/2022/03/bennington-21sl-pontoon-boats-2016-1024x558-o3g4hl866lxdunoo7lmbod3s2kqoi55l6pg6l9jg68.jpg'>
                    <div>
                        <h4>Patio & Pontoon Boats</h4>
                    </div>
                </a>
            </div>
        </div>

        <div class='see-yourself-section'>
            
            <div class='center-and-max-width'>
                <div class='first-block'>
                    <span>New Melones Lake Marina</span>
                    is located at the Glory Hole Recreation Area in Angels Camp, CA. As the only full-service marina on the fourth largest reservoir in California, we offer slip rentals, boat rentals, great fishing, gas, and a convenience store. We carry everything you need for a glorious day out on the lake — bait, groceries, cold drinks, ice, boating accessories, and much more!
                    <br>
                    <a class='button-2'>
                        <span class='fa fa-play'></span>
                        <span class='fa fa-play'></span>
                        <span>COME SEE FOR YOURSELF!</span>
                    </a>
                </div>
                <div class='second-block'>

                </div>
            </div>
        </div> -->

        <!-- <div>
            <h2>#1 Watersports & Boat Rentals in California</h2>
        </div> -->

        </div>

        
    </div>

</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>