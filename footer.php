</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
                <?php dynamic_sidebar( 'footer-widgets' ); ?>
            <?php endif; ?>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'client-theme' ); ?></p>
            <nav aria-label="<?php esc_attr_e( 'Footer', 'client-theme' ); ?>">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'container'       => false,
                    'fallback_cb'     => false,
                ) );
                ?>
            </nav>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
