<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="sr-only" href="#main-content"><?php esc_html_e( 'Skip to content', 'client-theme' ); ?></a>

<header class="site-header">
    <div class="container header-inner">
        <div class="site-logo">
            <?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            <?php endif; ?>
        </div>

        <button class="nav-toggle" aria-label="<?php esc_attr_e( 'Toggle navigation', 'client-theme' ); ?>" aria-expanded="false">
            ☰
        </button>

        <nav class="main-nav" aria-label="<?php esc_attr_e( 'Primary', 'client-theme' ); ?>">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'       => false,
                'fallback_cb'     => false,
            ) );
            ?>
        </nav>
    </div>
</header>

<main id="main-content">
