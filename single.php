<?php get_header();?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<main class='post'>
    <div class='title-header header-background' data-url=<?php echo get_the_post_thumbnail_url(); ?>>
        <div class='title-wrapper'>
            <div class='inner-wrapper'>
                <h1><?php echo get_the_title();?></h1>
            </div>
        </div>
    </div>

    <div class='content-section'>
        
        
        <div class='main-content-wrapper'>
            <?php the_content(); ?>
            <!-- Text below to be copied to the editor after finished -->
            <!-- <div class='quick-details-box'>
                <h4 class='quick-details-header'>QUICK DETAILS</h4>
                <p><i>(P)</i> <strong>Passenger Capacity:</strong> Up to 17 passengers</p>
                <p><i>(P)</i> <strong>Schedule:</strong> 3 p.m.</p>
                <p><strong>Note:</strong> Refundable security deposit is taken on the day of rental – $1,000</p>
                <p><strong>Fuel:</strong> Cost of fuel is NOT included in the price of the rental – Fuel will be charged separately</p>
            </div>

            <h2>Luxurious lake getaway with hot tub and fireplace!</h2>
            <p>
                The 60′ luxurious Escapade II sleeps 15 and is equipped with a fireplace, eight-person hot tub, and an upper-deck entertaining area.
            </p>

            <h3>Overview</h3>
            <ul>
                <li>Accommodates up to 17 persons –– Sleeps 15</li>
                <li>2 Staterooms, each with Double Beds</li>
                <li>Convertible Dinette with Double Bed</li>
                <li>Convertible Sofa with Double Bed</li>
                <li>Penthouse Loft with 2 full size sleeping areas</li>
                <li>2 Bathrooms – 1 Shower</li>
                <li>Flatscreen Smart TV</li>
                <li>Bluetooth Radio</li>
                <li>Upper Deck Driving Helm</li>
                <li>Upper Deck Bar with Seating</li>
                <li>Hot Tub</li>
            </ul>

            <h3>Schedule</h3>
            <ul>
                <li>3-night stays: Friday – Monday</li>
                <li>4-night stays: Monday – Friday</li>
                <li>7-night stays: Any day of the week (ie. Monday – Monday)</li>
            </ul>

            <h3>Rental Rates</h3> -->
        </div>
    </div>
</main>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>
