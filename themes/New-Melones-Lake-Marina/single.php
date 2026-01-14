<?php get_header();?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<main class='post'>
    <div class='title-header header-background' data-url=<?php echo get_the_post_thumbnail_url(); ?>>
        <div class='title-wrapper'>
            <div class='inner-wrapper'>
                <h1><?php echo get_the_title();?></h1>
                <h2 class='sub-header'><?php echo get_post_meta(get_the_ID(), $GLOBALS['SUB_HEADER'], TRUE);?></h2>
            </div>
			<div class='desktop-show-only'>
			<?php getBookingSideBar();?>
			</div>
        </div>
    </div>

    <div class='content-section'>
        <div class='main-content-wrapper'>
            <?php the_content(); ?>
            <hr>
        </div>
    </div>
    <?php if(!get_post_meta(get_the_ID(), $GLOBALS['SUB_HEADER'], TRUE)){
                    displayRentalsByCategory();
                }
            ?>
</main>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>
