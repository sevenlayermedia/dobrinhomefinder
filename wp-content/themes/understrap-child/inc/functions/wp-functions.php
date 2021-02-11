<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

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

// display a list of child pages for a parent page
// function wpb_list_child_pages() { 
//   global $post; 
//   if ( is_page() && $post->post_parent )
//       $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
//   else
//       $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
//   if ( $childpages ) {
//       $string = '<ul class="sidebar-menu">' . $childpages . '</ul>';
//   }
//   return $string;
// }
// add_shortcode('wpb_childpages', 'wpb_list_child_pages');

// order next and previous post links using conditional statements
// function filter_next_post_sort($sort) {
//   if (is_singular( array('post_tyoe'))) { // replace with post_type
//     $sort = "ORDER BY p.post_title ASC LIMIT 1";
//   } else {
//     $sort = "ORDER BY p.post_date DESC LIMIT 1";
//   }
//   return $sort;
// }
// add_filter('get_next_post_sort', 'filter_next_post_sort');

// function filter_next_post_where($where) {
//   global $post, $wpdb;
//   if (is_singular( array('post_tyoe'))) { // replace with post_type
//     return $wpdb->prepare("WHERE p.post_title > '%s' AND p.post_type = '" . get_post_type($post) . "' AND p.post_status = 'publish'", $post->post_title);
//   } else {
//     return $wpdb->prepare("WHERE p.post_date < '%s' AND p.post_type = '" . get_post_type($post) . "' AND p.post_status = 'publish'", $post->post_date);
//   }
// }
// add_filter('get_next_post_where', 'filter_next_post_where');

// function filter_previous_post_sort($sort) {
//   if (is_singular( array('post_tyoe'))) { // replace with post_type
//     $sort = "ORDER BY p.post_title DESC LIMIT 1";
//   } else {
//     $sort = "ORDER BY p.post_date ASC LIMIT 1";
//   }
//   return $sort;
// }
// add_filter('get_previous_post_sort', 'filter_previous_post_sort');

// query variables for specific archive pages
// function post_type_query( $query ) {  // replace with post_type
// 	if( $query->is_main_query() && !$query->is_feed() && !is_admin() && $query->is_post_type_archive( 'post_type' ) ) { // replace with post_type
// 		$query->set( 'orderby', 'title' );
// 		$query->set( 'order', 'ASC' );
// 		$query->set( 'posts_per_page', '-1' );
// 	}
// }
// add_action( 'pre_get_posts', 'chapter_query' );

// change 'post' name to 'news'
// function dev_edit_admin_menus() {
//     global $menu;
//     global $submenu;
  
//     $menu[5][0] = 'News'; // change posts to news
//     $submenu['edit.php'][5][0] = 'News';
//     $submenu['edit.php'][10][0] = 'Add News';
//     $submenu['edit.php'][16][0] = 'News Tags';
// }
// add_action( 'admin_menu', 'dev_edit_admin_menus' );

// function dev_change_post_object() {
//     global $wp_post_types;
  
//     $labels = &$wp_post_types['post']->labels;
//     $labels->name = 'News';
//     $labels->singular_name = 'News';
//     $labels->add_new = 'Add News';
//     $labels->add_new_item = 'Add News';
//     $labels->edit_item = 'Edit News';
//     $labels->new_item = 'News';
//     $labels->view_item = 'View News';
//     $labels->search_items = 'Search News';
//     $labels->not_found = 'No News found';
//     $labels->not_found_in_trash = 'No News found in Trash';
//     $labels->all_items = 'All News';
//     $labels->menu_name = 'News';
//     $labels->name_admin_bar = 'News';
// }
// add_action( 'init', 'dev_change_post_object' );

// modify the events search query with posts_where (i.e. Events)
// function events_where( $where ) {
//   global $wpdb;
//   $where = str_replace(
//       "meta_key = 'event_dates_%", 
//       "meta_key LIKE 'event_dates_%",
//       $wpdb->remove_placeholder_escape($where)
// );
// return $where;
// }
// add_filter('posts_where', 'events_where');

// prevent duplicates
// function cf_search_distinct( $where ) {
//   global $wpdb;
//   if ( is_search() ) {
//       return "DISTINCT";
//   }
//   return $where;
// }
// add_filter( 'posts_distinct', 'cf_search_distinct' );

// remove 'Howdy'
function howdy_message($translated_text, $text, $domain) {
    $new_message = str_replace('Howdy', 'Welcome', $text);
    return $new_message;
}
add_filter('gettext', 'howdy_message', 10, 3);

// disable block editor
add_filter('use_block_editor_for_post', '__return_false');

// remove "Private: " from titles
function remove_private_prefix($title) {
	$title = str_replace('Private: ', '', $title);
	return $title;
}
add_filter('the_title', 'remove_private_prefix');

// excerpt length
// function wpdocs_excerpt_length( $length ) {
// 	return 40;
// }
// add_filter( 'excerpt_length', 'wpdocs_excerpt_length', 999 );

// excerpt replace [...]
// function trim_excerpt($text) {
// 	return str_replace(' [...]', '' . ' ... ', $text);
// }
// add_filter('get_the_excerpt', 'trim_excerpt');

// enable vcard upload
// function enable_vcard_upload( $mime_types ){
// 	$mime_types['vcf'] = 'text/x-vcard';
// 	return $mime_types;
//   }
// add_filter('upload_mimes', 'enable_vcard_upload' );

// remove wordpress emoji scripts
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove tinymce emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
  // filter to remove dns prefetch
  add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'disable_wp_emojicons' );

// disable tinymce emojicons
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

// disable feeds
function itsme_disable_feed() {
    wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}
add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);

// customize login form
function wpb_login_logo() {
	// logo
	$site_primary_logo = get_field('site_primary_logo', 'option');
	if($site_primary_logo) {
	  ?>
	  <style type="text/css">
		  #login h1 a, .login h1 a {
			  background-image: url(<?php echo $site_primary_logo['url']; ?>);
			  width: 300px;
			  height: 80px;
			  background-size: 300px 80px;
			  background-repeat: no-repeat;
			  padding-bottom: 10px;
		  }
	  </style>
	  <?php 
	}
  }
  add_action( 'login_enqueue_scripts', 'wpb_login_logo' );
  
  // url
  function wpb_login_logo_url() {
	return home_url();
  }
  add_filter( 'login_headerurl', 'wpb_login_logo_url' );
  
  // title
  function wpb_login_logo_url_title() {
	return get_bloginfo( 'name' );
  }
  add_filter( 'login_headertext', 'wpb_login_logo_url_title' );