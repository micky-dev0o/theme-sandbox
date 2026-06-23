<?php
/**
 * Core theme setup — menus, thumbnails, widget areas, title tag support.
 * Every client project needs this baseline regardless of design.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function client_theme_setup() {
    // Let WP manage the <title> tag (required for SEO, don't hardcode titles)
    add_theme_support( 'title-tag' );

    // Featured images
    add_theme_support( 'post-thumbnails' );

    // HTML5 markup for search forms, comments, galleries etc.
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style',
    ) );

    // Responsive embeds (YouTube etc. auto-scale)
    add_theme_support( 'responsive-embeds' );

    // Custom logo support (set in Appearance > Customize)
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'client-theme' ),
        'footer'  => __( 'Footer Menu', 'client-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'client_theme_setup' );

// Register widget/footer areas
function client_theme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'client-theme' ),
        'id'            => 'footer-widgets',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'client_theme_widgets_init' );

// Performance: remove WP bloat most client sites don't need
function client_theme_cleanup() {
    remove_action( 'wp_head', 'wp_generator' );          // hides WP version (security)
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
}
add_action( 'init', 'client_theme_cleanup' );
