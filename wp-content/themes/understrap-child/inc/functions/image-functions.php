<?php
// disable wordpress default images sizes
function disable_default_image_sizes($sizes) {
  
    /* default wordpress */
    unset($sizes['thumbnail']);       // disable thumbnail (150 x 150 hard cropped)
    unset($sizes['medium']);          // disable medium resolution (300 x 300 max height 300px)
    unset($sizes['medium_large']);    // disable medium large (added in WP 4.4) resolution (768 x 0 infinite height)
    unset($sizes['large']);           // disable large resolution (1024 x 1024 max height 1024px)
    unset($sizes['1536x1536']);       // disable 2x medium-large size
    unset($sizes['2048x2048']);       // disable 2x large size
    
    /* with woocommerce */
    unset($sizes['shop_thumbnail']);  // disable shop thumbnail (180 x 180 hard cropped)
    unset($sizes['shop_catalog']);    // disable shop catalog (300 x 300 hard cropped)
    unset($sizes['shop_single']);     // shop single (600 x 600 hard cropped)
    
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'disable_default_image_sizes');

// add images sizes
if(function_exists('add_image_size')) add_theme_support( 'post-thumbnails');

if(function_exists('add_image_size')) {
    // enable only for posts
    add_image_size('post_landscape_small', 576, 324, array('center', 'top')); // hard crop mode
    add_image_size('post_landscape_medium', 768, 432, array('center', 'top')); // hard crop mode
    add_image_size('post_landscape_large', 992, 558, array('center', 'top')); // hard crop mode
    add_image_size('post_landscape_xlarge', 1200, 675, array('center', 'top')); // hard crop mode
    add_image_size('post_square_thumb', 150, 150, array('center', 'top')); // hard crop mode
    add_image_size('post_square_small', 576, 576, array('center', 'top')); // hard crop mode
    add_image_size('post_square_medium', 768, 768, array('center', 'top')); // hard crop mode
    add_image_size('post_square_large', 992, 992, array('center', 'top')); // hard crop mode
    add_image_size('post_square_xlarge', 1200, 1200, array('center', 'top')); // hard crop mode
}

function custom_image_sizes_choose($sizes) {
    $custom_sizes = array(
        'post_landscape_small' => 'Landscape Thumbnail',
        'post_landscape_medium' => 'Landscape Medium',
        'post_landscape_large' => 'Landscape Large',
        'post_landscape_xlarge' => 'Landscape Extra Large',
        'post_square_thumb' => 'Square Thumbnail',
        'post_square_small' => 'Square Small',
        'post_square_medium' => 'Square Medium',
        'post_square_large' => 'Square Large',
        'post_square_xlarge' => 'Square Extra Large',
    );
    return array_merge($sizes, $custom_sizes);
}
add_filter('image_size_names_choose', 'custom_image_sizes_choose');

// adds mime type image support to media uploader.
function allow_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_mime_types');