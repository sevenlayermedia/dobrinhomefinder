<?php
// unregister primary menu
function remove_parent_theme_locations() {
    unregister_nav_menu( 'primary' );
}
add_action( 'after_setup_theme', 'remove_parent_theme_locations', 20 );

// register menus
function register_my_menus() {
    register_nav_menus(
      array(
        'main-navbar' => __( 'Header' ),
        'footer-navbar' => __( 'Footer' ),
      )
    );
}
add_action( 'init', 'register_my_menus' );

// menu shortcode
function menu_shortcode($atts, $content = null) {
  extract(shortcode_atts(array( 'name' => null, 'class' => null ), $atts));
  return wp_nav_menu( array( 'menu' => $name, 'menu_class' => 'menu', 'echo' => false ) );
}
add_shortcode('menu', 'menu_shortcode');