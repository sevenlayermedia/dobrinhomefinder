<?php
// adds options page to admin area.
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
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

// layout title
function custom_layout_title($title, $field, $layout, $i) {
	$layout_settings = get_sub_field('layout_settings');
	$layout_title = $layout_settings['layout_title'];
	if($layout_title = $layout_settings['layout_title']) {
		return $layout_title;
	} else {
		foreach($layout['sub_fields'] as $sub) {
			if($sub['name'] == 'layout_title') {
				$key = $sub['key'];
				if(array_key_exists($i, $field['value']) && $value = $field['value'][$i][$key])
					return $layout_title;
			}
		}
	}
	return $title;
}
add_filter('acf/fields/flexible_content/layout_title', 'custom_layout_title', 10, 4);
