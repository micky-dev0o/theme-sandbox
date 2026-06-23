<?php
/**
 * single.php — single blog post template.
 */
get_header();
?>

<div class="container-md section">
    <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <p class="text-muted mb-4">
                <?php echo esc_html( get_the_date() ); ?> &middot; <?php the_author(); ?>
            </p>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="mb-6"><?php the_post_thumbnail( 'large' ); ?></div>
            <?php endif; ?>

            <div class="page-content">
                <?php the_content(); ?>
            </div>

            <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'client-theme' ),
                'after'  => '</div>',
            ) );
            ?>
        </article>

        <?php if ( comments_open() || get_comments_number() ) : ?>
            <div class="mt-8">
                <?php comments_template(); ?>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
