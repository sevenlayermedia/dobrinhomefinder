<?php
// removes the parent themes stylesheet and scripts from inc/enqueue.php
function understrap_remove_scripts() {
	wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

// enqueue css & js
function theme_enqueue_styles() {

	// get the theme data
	$the_theme = wp_get_theme();
    $cache_buster = date("YmdHi", filemtime( get_stylesheet_directory() . '/css/child-theme.min.css'));
    
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $cache_buster, 'all' );
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// register menus
function register_my_menus() {
    register_nav_menus(
      array(
        'main-navbar' => __( 'Main Navbar' ),
        'top-navbar' => __( 'Top Navbar' ),
        'top-navbar-left' => __( 'Top Navbar Left' ),
        'top-navbar-right' => __( 'Top Navbar Right' ),
        'footer' => __( 'Footer' ),
      )
    );
  }
  add_action( 'init', 'register_my_menus' );

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

// extend wordpress search to include custom fields
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    
    return $join;
}
add_filter('posts_join', 'cf_search_join' );

// modify the search query with posts_where
function cf_search_where( $where ) {
    global $pagenow, $wpdb;
   
    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

// modify the events search query with posts_where
function events_where( $where ) {
    global $wpdb;
    $where = str_replace(
        "meta_key = 'event_dates_%", 
        "meta_key LIKE 'event_dates_%",
        $wpdb->remove_placeholder_escape($where)
  );
  return $where;
}
add_filter('posts_where', 'events_where');

// prevent duplicates
function cf_search_distinct( $where ) {
    global $wpdb;
    if ( is_search() ) {
        return "DISTINCT";
    }
    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

// google map api settings.
function my_acf_init() {
    $application_google_maps_api_key = get_field('application_google_maps_api_key', 'option');
    acf_update_setting('google_api_key', $application_google_maps_api_key);
}
add_action('acf/init', 'my_acf_init');

// menu shortcode
function menu_shortcode($atts, $content = null) { 
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) ); 
} 
add_shortcode('menu', 'menu_shortcode');

// remove 'Howdy'
function howdy_message($translated_text, $text, $domain) {
    $new_message = str_replace('Howdy', 'Welcome', $text);
    return $new_message;
}
add_filter('gettext', 'howdy_message', 10, 3);

// disable block editor
add_filter('use_block_editor_for_post', '__return_false');

// reduce the thumbnails jpeg quality
add_filter('jpeg_quality', function($quality){return 80;});

// remove parent theme page templates
function tfc_remove_page_templates( $templates ) {
    unset($templates['page-templates/blank.php']);
    unset($templates['page-templates/both-sidebarspage.php']);
    unset($templates['page-templates/empty.php']);
    unset($templates['page-templates/left-sidebarpage.php']);
    // unset($templates['page-templates/right-sidebarpage.php']);
    return $templates;
}
add_filter( 'theme_page_templates', 'tfc_remove_page_templates' );


// add columns to chapter post list
function add_acf_columns ( $columns ) {
    return array_merge ( $columns, array ( 
      'chapter_status' => __ ( 'Status' )
    ) );
  }
add_filter ( 'manage_chapter_posts_columns', 'add_acf_columns' );

function chapter_custom_column ( $column, $post_id ) {
    switch ( $column ) {
      case 'chapter_status':
        echo get_post_meta ( $post_id, 'chapter_status', true );
        break;
    }
  }
add_action ( 'manage_chapter_posts_custom_column', 'chapter_custom_column', 10, 2 );

// change 'post' name to 'news'
function dev_edit_admin_menus() {
  global $menu;
  global $submenu;

  $menu[5][0] = 'News'; // change posts to news
  $submenu['edit.php'][5][0] = 'News';
  $submenu['edit.php'][10][0] = 'Add News';
  $submenu['edit.php'][16][0] = 'News Tags';
}

function dev_change_post_object() {
  global $wp_post_types;

  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'News';
  $labels->singular_name = 'News';
  $labels->add_new = 'Add News';
  $labels->add_new_item = 'Add News';
  $labels->edit_item = 'Edit News';
  $labels->new_item = 'News';
  $labels->view_item = 'View News';
  $labels->search_items = 'Search News';
  $labels->not_found = 'No News found';
  $labels->not_found_in_trash = 'No News found in Trash';
  $labels->all_items = 'All News';
  $labels->menu_name = 'News';
  $labels->name_admin_bar = 'News';
}
add_action( 'admin_menu', 'dev_edit_admin_menus' );
add_action( 'init', 'dev_change_post_object' );

// query variables for specific archive pages
function chapter_query( $query ) {
	if( $query->is_main_query() && !$query->is_feed() && !is_admin() && $query->is_post_type_archive( 'chapter' ) ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
		$query->set( 'posts_per_page', '-1' );
	}
}
add_action( 'pre_get_posts', 'chapter_query' );

// order next and previous post links using conditional statements
function filter_next_post_sort($sort) {
  if (is_singular( array('chapter'))) {
    $sort = "ORDER BY p.post_title ASC LIMIT 1";
  } else {
    $sort = "ORDER BY p.post_date DESC LIMIT 1";
  }
  return $sort;
}
add_filter('get_next_post_sort', 'filter_next_post_sort');

function filter_next_post_where($where) {
  global $post, $wpdb;
  if (is_singular( array('chapter'))) {
    return $wpdb->prepare("WHERE p.post_title > '%s' AND p.post_type = '" . get_post_type($post) . "' AND p.post_status = 'publish'", $post->post_title);
  } else {
    return $wpdb->prepare("WHERE p.post_date < '%s' AND p.post_type = '" . get_post_type($post) . "' AND p.post_status = 'publish'", $post->post_date);
  }
}
add_filter('get_next_post_where', 'filter_next_post_where');

function filter_previous_post_sort($sort) {
  if (is_singular( array('chapter'))) {
    $sort = "ORDER BY p.post_title DESC LIMIT 1";
  } else {
    $sort = "ORDER BY p.post_date ASC LIMIT 1";
  }
  return $sort;
}
add_filter('get_previous_post_sort', 'filter_previous_post_sort');

function filter_previous_post_where($where) {
  global $post, $wpdb;
  if (is_singular( array('chapter'))) {
    return $wpdb->prepare("WHERE p.post_title < '%s' AND p.post_type = '" . get_post_type($post) . "' AND p.post_status = 'publish'", $post->post_title);
  } else {
    return $wpdb->prepare("WHERE p.post_date > '%s' AND p.post_type = '" . get_post_type($post) . "' AND p.post_status = 'publish'", $post->post_date);
  }
}
add_filter('get_previous_post_where', 'filter_previous_post_where');

// populate ACF select field options with Gravity Forms
function acf_populate_gf_forms_ids( $field ) {
	if ( class_exists( 'GFFormsModel' ) ) {
		$choices = [];

		foreach ( \GFFormsModel::get_forms() as $form ) {
			$choices[ $form->id ] = $form->title;
		}

		$field['choices'] = $choices;
	}

	return $field;
}
add_filter( 'acf/load_field/name=select_gf_form_id', 'acf_populate_gf_forms_ids' );

// custom widgets
// function chapter_widgets_init() {
//   register_sidebar( array(
//       'name'          => 'Chapter Sidebar',
//       'id'            => 'chapter-sidebar-widget',
//       'before_widget' => '<div class="chw-widget">',
//       'after_widget'  => '</div>',
//       'before_title'  => '<h2 class="chw-title">',
//       'after_title'   => '</h2>',
//   ) );

// }
// add_action( 'widgets_init', 'chapter_widgets_init' );

// display a list of child pages for a parent page
function wpb_list_child_pages() { 
  global $post; 
  if ( is_page() && $post->post_parent )
      $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
  else
      $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
  if ( $childpages ) {
      $string = '<ul class="sidebar-menu">' . $childpages . '</ul>';
  }
  return $string;
}
add_shortcode('wpb_childpages', 'wpb_list_child_pages');

// populate gravity form select field chapter posts
function chapter_posts( $form ) {
    foreach ( $form['fields'] as &$field ) {
        if ( $field->type != 'select' || strpos( $field->cssClass, 'chapter_posts' ) === false ) {
            continue;
        }
        // you can add additional parameters here to alter the posts that are retrieved
        // more info: [http://codex.wordpress.org/Template_Tags/get_posts](http://codex.wordpress.org/Template_Tags/get_posts)
        $posts = get_posts( 'post_type=chapter&numberposts=-1&post_status=publish' );
        $choices = array();
        foreach ( $posts as $post ) {
            $choices[] = array( 'text' => $post->post_title, 'value' => $post->post_title );
        }
        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select a Chapter';
        $field->choices = $choices;
    }
    return $form;
}
add_filter( 'gform_pre_render_1', 'chapter_posts' );
add_filter( 'gform_pre_validation_1', 'chapter_posts' );
add_filter( 'gform_pre_submission_filter_1', 'chapter_posts' );
add_filter( 'gform_admin_pre_render_1', 'chapter_posts' );
add_filter( 'gform_pre_render_4', 'chapter_posts' );
add_filter( 'gform_pre_validation_4', 'chapter_posts' );
add_filter( 'gform_pre_submission_filter_4', 'chapter_posts' );
add_filter( 'gform_admin_pre_render_4', 'chapter_posts' );
add_filter( 'gform_pre_render_9', 'chapter_posts' );
add_filter( 'gform_pre_validation_9', 'chapter_posts' );
add_filter( 'gform_pre_submission_filter_9', 'chapter_posts' );
add_filter( 'gform_admin_pre_render_9', 'chapter_posts' );
add_filter( 'gform_pre_render_13', 'chapter_posts' );
add_filter( 'gform_pre_validation_13', 'chapter_posts' );
add_filter( 'gform_pre_submission_filter_13', 'chapter_posts' );
add_filter( 'gform_admin_pre_render_13', 'chapter_posts' );
add_filter( 'gform_pre_render_14', 'chapter_posts' );
add_filter( 'gform_pre_validation_14', 'chapter_posts' );
add_filter( 'gform_pre_submission_filter_14', 'chapter_posts' );
add_filter( 'gform_admin_pre_render_14', 'chapter_posts' );
add_filter( 'gform_pre_render_16', 'chapter_posts' );
add_filter( 'gform_pre_validation_16', 'chapter_posts' );
add_filter( 'gform_pre_submission_filter_16', 'chapter_posts' );
add_filter( 'gform_admin_pre_render_16', 'chapter_posts' );

function set_column( $input_info, $field, $column, $value, $form_id ) {
    return array( 'type' => 'select', 'choices' => 'Select Status,Depledged,Initiated,Neophyte' );
}
add_filter( 'gform_column_input_15_14_4', 'set_column', 10, 5 );

//display template file in the footer
// function meks_which_template_is_loaded() {
// 	if ( is_super_admin() ) {
// 		global $template;
// 		print_r( $template );
// 	}
// }
 
// add_action( 'wp_footer', 'meks_which_template_is_loaded' );