<?php
/**
 * 404.php — error page. Keep it helpful: search box + link home, not just "oops."
 */
get_header();
?>

<div class="container section text-center">
    <h1><?php esc_html_e( '404', 'client-theme' ); ?></h1>
    <p class="text-muted mb-6"><?php esc_html_e( "Sorry, that page doesn't exist.", 'client-theme' ); ?></p>

    <div class="mb-6" style="max-width:400px;margin-left:auto;margin-right:auto;">
        <?php get_search_form(); ?>
    </div>

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary">
        <?php esc_html_e( 'Back to Home', 'client-theme' ); ?>
    </a>
</div>

<?php get_footer(); ?>
