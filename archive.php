<?php
/**
 * archive.php — category/tag/date/author archive listing.
 */
get_header();
?>

<div class="container section">
    <header class="mb-6 text-center">
        <h1><?php the_archive_title(); ?></h1>
        <?php the_archive_description( '<div class="text-muted">', '</div>' ); ?>
    </header>

    <?php if ( have_posts() ) : ?>
        <div class="grid-3">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/card' ); ?>
            <?php endwhile; ?>
        </div>

        <?php the_posts_navigation(); ?>

    <?php else : ?>
        <p><?php esc_html_e( 'Nothing found.', 'client-theme' ); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
