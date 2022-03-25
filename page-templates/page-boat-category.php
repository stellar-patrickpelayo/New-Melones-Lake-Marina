<?php /* Template Name: Boat Category*/ ?>
<?php get_header();?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<main class='page <?php echo has_post_thumbnail() ? "" : "no-thumbnail"?>'>

    <?php if (has_post_thumbnail()): ?>
        <div class='title-header header-background'>
            <div class='title-wrapper upper-case-text'>
                <h1><?php the_title();?></h1>
            </div>
        </div>
    <?php endif; ?>
    <?php the_content();?>

</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>