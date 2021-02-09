<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

function theme_enqueue_styles() {

	// Get the theme data
    $the_theme = wp_get_theme();
    $cache_buster = date("YmdHi", filemtime( get_stylesheet_directory() . '/css/child-theme.min.css'));
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $cache_buster, 'all' );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

// include external functions
include_once( get_stylesheet_directory() .'/inc/functions/wp-functions.php');
include_once( get_stylesheet_directory() .'/inc/functions/menu-functions.php');
include_once( get_stylesheet_directory() .'/inc/functions/image-functions.php');
include_once( get_stylesheet_directory() .'/inc/functions/misc-functions.php');
include_once( get_stylesheet_directory() .'/inc/functions/acf-functions.php');
include_once( get_stylesheet_directory() .'/inc/functions/gf-functions.php');
// include acf field groups
include_once( get_stylesheet_directory() .'/inc/acf-field-groups.php');