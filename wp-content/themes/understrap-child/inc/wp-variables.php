<?php
/**
 * theme variables
 *
 * @package understrap
 */
// post/page element variables
    // category
    $category = get_the_category(); // gets category
    if($category) {
        $category_name  = $category[0]->cat_name; // category name
        $category_slug = $category[0]->slug; // category slug
        $category_link  = get_category_link($category[0]->cat_ID); // category link
    }
    $category_parent = get_cat_name($category[0]->category_parent); // gets parent category
    // categories
    $categories = array();
    foreach (get_the_category($post_id) as $c) {
        $cat = get_category($c);
        array_push($categories, $cat->slug);
    }
    if(sizeOf($categories)>0) {
        $post_categories = implode(' ', $categories);
    } else {
        $post_categories = 'not-assigned';
    }
    $category_directory = get_categories(array(
        'hide_empty' => 0, // show empty categories in the list
        'child_of' => 33 // Replace with the ID of the parent category
    )); // gets category
    // content
    $content = get_the_content();
    // author
    $author = get_the_author();
    // date
    $date = date('Ymd');
    $date_time = date('Y-m-d H:i:s');
?>