<?php
/**
 * Megla Plus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Megla Plus
 */

if ( ! defined( 'MEGLA_PLUS_VERSION' ) ) {
	$megla_plus_theme = wp_get_theme();
	define( 'MEGLA_PLUS_VERSION', $megla_plus_theme->get( 'Version' ) );
}

/**
 * Enqueue scripts and styles.
 */
function megla_plus_scripts() {
    wp_enqueue_style( 'megla-plus-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','megla-default-block','megla-style'), '', 'all');
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0', 'all');
    wp_enqueue_style( 'megla-plus-main-style',get_stylesheet_directory_uri() . '/assets/css/main-style.css',array(), MEGLA_PLUS_VERSION, 'all');
    wp_enqueue_script( 'masonry', get_stylesheet_directory_uri() . '/assets/js/masonry.pkgd.min.js',array('jquery'), MEGLA_PLUS_VERSION, true );
    wp_enqueue_script( 'megla-plus-main-js', get_stylesheet_directory_uri() . '/assets/js/megla-plus-main.js',array('jquery','megla-script'), MEGLA_PLUS_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'megla_plus_scripts' );

/**
 * Custom excerpt length.
 */
function megla_plus_excerpt_length( $length ) {
    if ( is_admin() ) return $length;
    return 29;
}
add_filter( 'excerpt_length', 'megla_plus_excerpt_length', 999 );

/**
 * Custom excerpt More.
 */
function megla_plus_excerpt_more( $more ) {
    if ( is_admin() ) return $more;
    return '.';
}
add_filter( 'excerpt_more', 'megla_plus_excerpt_more' );

/**
 * Load Doyel Tags files.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';