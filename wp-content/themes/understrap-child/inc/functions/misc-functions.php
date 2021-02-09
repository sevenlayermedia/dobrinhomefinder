<?php
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

// Google Map API settings.
function my_acf_init() {
    $application_google_maps_api_key = get_field('application_google_maps_api_key', 'option');
    acf_update_setting('google_api_key', $application_google_maps_api_key);
}
add_action('acf/init', 'my_acf_init');