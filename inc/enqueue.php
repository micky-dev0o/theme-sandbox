<?php
/**
 * Enqueue compiled CSS/JS — properly, with cache-busting via filemtime().
 * This avoids the classic WP bug where browsers cache old CSS after updates.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // no direct access

function client_theme_enqueue_assets() {
    $theme_version = wp_get_theme()->get( 'Version' );

    // Compiled SCSS -> CSS (built via `npm run build` from src/scss/main.scss)
    $style_path = get_template_directory() . '/dist/style.css';
    $style_uri  = get_template_directory_uri() . '/dist/style.css';

    wp_enqueue_style(
        'client-theme-style',
        $style_uri,
        array(),
        file_exists( $style_path ) ? filemtime( $style_path ) : $theme_version
    );

    // Main JS (mobile nav toggle, etc.)
    $script_path = get_template_directory() . '/src/js/main.js';
    $script_uri  = get_template_directory_uri() . '/src/js/main.js';

    wp_enqueue_script(
        'client-theme-main',
        $script_uri,
        array(),
        file_exists( $script_path ) ? filemtime( $script_path ) : $theme_version,
        true // load in footer
    );

    // Required WordPress comment-reply script (only loads where needed)
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'client_theme_enqueue_assets' );
