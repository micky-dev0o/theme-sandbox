<?php get_header(); ?>

<div class="container section">
    <?php if ( have_posts() ) : ?>
        <div class="grid-3">
            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class( 'card' ); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="card-image">
                            <?php the_post_thumbnail( 'medium_large' ); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h2 class="card-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <?php the_posts_navigation(); ?>

    <?php else : ?>
        <p><?php esc_html_e( 'No content found.', 'client-theme' ); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
