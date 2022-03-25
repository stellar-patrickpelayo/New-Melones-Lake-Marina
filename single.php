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
        </div>
    </div>
</main>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>
