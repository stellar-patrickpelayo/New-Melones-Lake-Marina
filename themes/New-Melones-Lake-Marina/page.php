<?php get_header();?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<main class='page <?php echo has_post_thumbnail() ? "" : "no-thumbnail"?>'>

    <?php if (has_post_thumbnail()): ?>
        <div class='title-header header-background' style=<?php echo 'background-image:url("'.get_the_post_thumbnail_url().'")'?>>
            <div class='title-wrapper'>
                <h1><?php the_title();?></h1>
            </div>
        </div>
    <?php endif; ?>
    <div class='content-section'>
        <?php the_content();?>
    </div>

</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>