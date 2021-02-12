<?php
/**
 * theme variables
 *
 * @package understrap
 */
// page
$page_title = get_field('page_title');
$page_background = get_field('page_background');
$page_background_toggle = $page_background['background'];
$page_background_color = $page_background['background_color'];
// header
    // hero
    $hero_image_group = get_sub_field('image_group');
    $hero_image = $hero_image_group['image'];
// wrapper
// $wrapper_class = get_sub_field('wrapper_class');
    // wrapper options
    // $wrapper_options = get_sub_field('wrapper_options');
    // $wrapper_class = get_sub_field('wrapper_class');
    // $wrapper_background = get_sub_field('wrapper_background');
    // $wrapper_background_color = $wrapper_background['background_color'];
    // $wrapper_background_image = $wrapper_background['background_image'];
    // $wrapper_background_gallery = $wrapper_background['background_gallery'];
    // hero
    // $hero_image = get_sub_field('image');
    // $hero_gallery_rand = array_rand($wrapper_background_gallery, 1);
// layout settings
$layout_settings = get_sub_field('layout_settings');
$layout_title = $layout_settings['layout_title'];
$anchor_link = $layout_settings['anchor_link'];
// wrapper
$wrapper = get_sub_field('wrapper');
$wrapper_options = $wrapper['wrapper_options'];
$wrapper_class = $wrapper['wrapper_class'];
$wrapper_background = $wrapper['wrapper_background'];
$wrapper_background_options = $wrapper_background['background_options'];
$wrapper_background_color = $wrapper_background['background_color'];
$wrapper_background_image = $wrapper_background['background_image'];
// container
$container = get_sub_field('container');
$container_fluid = $container['container_fluid'];
$container_options = $container['container_options'];
$container_class = $container['container_class'];
$container_background = $container['container_background'];
$container_background_options = $container_background['background_options'];
$container_background_color = $container_background['background_color'];
$container_background_image = $container_background['background_image'];
// row
$row = get_sub_field('row');
$row_options = $row['row_options'];
$row_class = $row['row_class'];
$row_background = $row['row_background'];
$row_background_options = $row_background['background_options'];
$row_background_color = $row_background['background_color'];
$row_background_image = $row_background['background_image'];
// columns
    //class
    $col_1_class = get_sub_field('col_1_class');
    $col_2_class = get_sub_field('col_2_class');
    $col_3_class = get_sub_field('col_3_class');
    $col_4_class = get_sub_field('col_4_class');
    // column background options
        // column 1 options
        $col_1_options = get_sub_field('col_1_options');
        $col_1_background = get_sub_field('col_1_background');
        $col_1_background_color = $col_1_background['background_color'];
        $col_1_background_image = $col_1_background['background_image'];
        $col_1_link_group = get_sub_field('col_1_link');
        $col_1_link = $col_1_link_group['button_link'];
        // column 2 options
        $col_2_options = get_sub_field('col_2_options');
        $col_2_background = get_sub_field('col_2_background');
        $col_2_background_color = $col_2_background['background_color'];
        $col_2_background_image = $col_2_background['background_image'];
        $col_2_link_group = get_sub_field('col_2_link');
        $col_2_link = $col_2_link_group['button_link'];
        // column 3 options
        $col_3_options = get_sub_field('col_3_options');
        $col_3_background = get_sub_field('col_3_background');
        $col_3_background_color = $col_3_background['background_color'];
        $col_3_background_image = $col_3_background['background_image'];
        $col_3_link_group = get_sub_field('col_3_link');
        $col_3_link = $col_3_link_group['button_link'];
        // column 4 options
        $col_4_options = get_sub_field('col_4_options');
        $col_4_background = get_sub_field('col_4_background');
        $col_4_background_color = $col_4_background['background_color'];
        $col_4_background_image = $col_4_background['background_image'];
        $col_4_link_group = get_sub_field('col_4_link');
        $col_4_link = $col_4_link_group['button_link'];
    // header
    $heading_group = get_sub_field('heading_group');
    $heading_tag = $heading_group['heading_tag'];
    $heading = $heading_group['heading'];
    // slider
    $image_slide = get_sub_field('image');
    // text area
    $text_area = get_sub_field('text_area');
    // column list
    $list_settings = get_sub_field('list_settings');
    $list_style = $list_settings['list_style'];
    $list_column_count = $list_settings['list_column_count'];
    $list_item_type = get_sub_field('list_item_type');
    $list_item_icon = get_sub_field('list_item_icon');
    $list_item_file = get_sub_field('list_item_file');
    $list_item_link = get_sub_field('list_item_link');
    $list_item = get_sub_field('list_item');
    // form
    $form = get_sub_field('select_gf_form_id');
    // shortcode
    $shortcode = get_sub_field('shortcode');
    // video player
    $video_url = get_sub_field('video_url');
    // image
    $image_group = get_sub_field('image_group');
    $image = $image_group['image'];
    $image_size = $image_group['image_size'];
    $image_alignment = $image_group['image_alignment'];
    $image_class = $image_group['image_class'];
    // button
    $button = get_sub_field('button_group');
    $button_text = $button['button_text'];
    $button_link = $button['button_link'];
        // event tracking
        $event_tracking = $button['event_tracking'];
        $event_tracking_variables = $button['event_tracking_variables'];
            // event tracking variables
            $event_tracking_category = $button['event_tracking_variables']['category'];
            $event_tracking_action = $button['event_tracking_variables']['action'];
            $event_tracking_label = $button['event_tracking_variables']['label'];
            $event_tracking_value = $button['event_tracking_variables']['value'];
            $event_tracking_noninteraction = $button['event_tracking_variables']['noninteraction'];
    // spcaer
    $spacer = get_sub_field('size');
// post/page element variables
    // image
    $postImage = array(
        'hero_image' => get_field('page_hero_image'),
        'col_1_image' => get_field('col_1_image_group'),
        'col_2_image' => get_field('col_2_image_group'),
        'col_3_image' => get_field('col_3_image_group'),
        'block_image' => get_sub_field('image_group'),
        'block_gallery' => get_sub_field('gallery'),
    );
    // image sizes
    $postImageSize = array(
        'post_unlimited_height' => 'post_unlimited_height',
        'post_landscape_thumb' => 'post_landscape_thumb',
        'post_landscape_medium' => 'post_landscape_medium',
        'post_landscape_large' => 'post_landscape_large',
        'post_square_thumb' => 'post_square_thumb',
        'post_square_medium' => 'post_square_medium',
        'post_square_large' => 'post_square_large'
    );
    $post_image_unlimited_height = 'post_unlimited_height';
    $post_image_landscape_thumb = 'post_landscape_thumb';
    $post_image_landscape_medium = 'post_landscape_medium';
    $post_image_landscape_large = 'post_landscape_large';
    $post_image_square_thumb = 'post_square_thumb';
    $post_image_square_medium = 'post_square_medium';
    $post_image_square_large = 'post_square_large';
    // content
        // image 
        $image_group = get_sub_field('image_group');
        $image = $image_group['image'];
        // $image_size = $image_group['image_size'];
        // posts settings
        $posts_settings = get_sub_field('posts_settings');
        $posts_categories = $posts_settings['posts_categories'];
        $posts_tags = $posts_settings['posts_tags'];
        $posts_per_page = $posts_settings['posts_per_page'];
        // gallery
        $gallery_group = get_sub_field('gallery_group');
        $gallery_random_images = $gallery_group['gallery_random_images'];
        $gallery_layout = $gallery_group['gallery_layout'];
        $gallery_id = $gallery_group['gallery_id'];
        $gallery_options = $gallery_options['gallery_options'];
        $gallery = $gallery_group['gallery'];
        // product
        // $product_image = get_field('product_image');
        // $product_image_size = 'full'; // (thumbnail, medium, large, full or custom size)
        // $product_description = get_field('product_description');
        // $product_specifications = get_field('product_specifications');
        // $product_specifications_key = get_sub_field('key');
        // $product_specifications_value = get_sub_field('value');
        // distributor
        // $distributor_location = get_field('office_address');
        // $distributor_address = explode(',',$distributor_location['address']);
        // office
        // $office_location = get_field('office_address');
        // $office_address = explode(',',$office_location['address']);
        // $office_phone = get_field('office_phone');
        // $office_email = get_field('office_email');
        // $office_settings = get_field('office_settings');
        // $offices_team_orderby = $office_settings['team_orderby'];
        // $office_team_profile_photos = $office_settings['team_profile_photos'];
        // $offices_settings = get_sub_field('offices_settings');
        // $offices_map = $offices_settings['offices_map'];
        // $offices_list = $offices_settings['offices_list'];
        // $offices_orderby = $offices_settings['offices_orderby'];
        // team
        // $profile_photo = get_field('profile_photo');
        // $profile_name = get_field('profile_name');
        // $profile_fullname = get_field('profile_fullname');
        // $profile_first_name = $profile_fullname['profile_first_name'];
        // $profile_middle_name = $profile_fullname['profile_middle_initial'];
        // $profile_last_name = $profile_fullname['profile_last_name'];
        // $profile_degrees_certifications = $profile_fullname['profile_degree_certifications'];
        // $profile_team = get_field('profile_team');
        // $profile_team_page = get_field('profile_team_page');
        // $profile_job_title = get_field('profile_job_title');
        // $profile_office = get_field('profile_office');
        // $profile_bio = get_field('profile_bio');
        // $profile_phone = get_field('profile_phone');
        // $profile_mobile = get_field('profile_mobile');
        // $profile_email = get_field('profile_email');
        // $profile_linkedin = get_field('profile_linkedin');
        // $profile_vcard = get_field('profile_vcard');
        // $team_settings = get_sub_field('team_settings');
        // $team_role = $team_settings['team_role'];
        // $team = $team_settings['team'];
        // $team_layout = $team_settings['team_layout'];
        // $team_orderby = $team_settings['team_orderby'];
        // $team_profile_photos = $team_settings['team_profile_photos'];
    // listing settings
    $listing_settings = get_sub_field('listing_settings');
    $listing_paged = $listing_settings['listing_paged'];
    $listing_count = $listing_settings['listing_count'];
    $listing_sort = $listing_settings['listing_sort'];
    // // event
    // $event_image = get_field('event_image');
    // $event_description = get_field('event_description');
    // $event_cost = get_field('event_cost');
    // $event_phone = get_field('event_phone');
    // $event_website = get_field('event_website');
    // $event_email = get_field('event_email');
    // $event_website = str_replace(array('http://', 'https://'), '', $event_website);
    // // event dates
    // $event_dates = get_field('event_dates');
    // $event_start_date = get_sub_field('start_date');
    // $event_start_date_abb = date("M j, Y", strtotime($event_start_date));
    // $event_start_time = get_sub_field('start_time');
    // $event_end_date = get_sub_field('end_date');
    // $event_end_date_abb = date("M j, Y", strtotime($event_end_date));
    // $event_end_time = get_sub_field('end_time');
    // // events
    // $date = date('Ymd');
    // $events_upcoming = array(
    //     'posts_per_page' => $listing_count,
    //     'post_type' => 'event',
    //     'meta_query' => array(
    //         array(
    //             'key'       => 'event_dates_%_start_date', // ACF start date field
    //             'compare'   => '>=', // Compare today's date with event start date
    //             'value'     => $date, //Use the current date
    //         ),
    //     ),
    //     'orderby' => 'event_dates_%_start_date',
    //     'order' => 'ASC'
    // );
    // $events_upcoming_all = array(
    //     'posts_per_page' => -1,
    //     'post_type' => 'event',
    //     'meta_query' => array(
    //         array(
    //             'key'       => 'event_dates_%_start_date', // ACF start date field
    //             'compare'   => '>=', // Compare today's date with event start date
    //             'value'     => $date, //Use the current date
    //         ),
    //     ),
    //     'orderby' => 'event_dates_%_start_date',
    //     'order' => 'ASC'
    // );
// theme element variables
    // wrapper
    // $wrapper = get_sub_field('wrapper', 'option');
    // $wrapper_options = $wrapper['wrapper_options'];
    // $wrapper_class = $wrapper['wrapper_class'];
    // $wrapper_background = $wrapper['wrapper_background'];
    // $wrapper_background_options = $wrapper_background['background_options'];
    // $wrapper_background_color = $wrapper_background['background_color'];
    // $wrapper_background_image = $wrapper_background['background_image'];
    // // container
    // $container = get_field('container', 'option');
    // $container = get_sub_field('container', 'option');
    // $container_fluid = $container['container_fluid'];
    // $container_options = $container['container_options'];
    // $container_class = $container['container_class'];
    // $container_background = $container['container_background'];
    // $container_background_options = $container_background['background_options'];
    // $container_background_color = $container_background['background_color'];
    // $container_background_image = $container_background['background_image'];
    // // row
    // $row = get_sub_field('row', 'option');
    // $row_options = $row['row_options'];
    // $row_class = $row['row_class'];
    // $row_background = $row['row_background'];
    // $row_background_options = $row_background['background_options'];
    // $row_background_color = $row_background['background_color'];
    // $row_background_image = $row_background['background_image'];
    // layout
    $layout = get_field('layout', 'option');
    // brand
        // logo
        $site_primary_logo = get_field('site_primary_logo', 'option');
        $site_primary_logo_svg = get_field('site_primary_logo_svg', 'option');
        $site_alternate_logo = get_field('site_alternate_logo', 'option');
        $site_alternate_logo_svg = get_field('site_alternate_logo_svg', 'option');
        // and the image size you want to return
        $site_primary_logo_size = 'logo';
        $site_alternate_logo_size = 'logo';
        // now, we'll exctract the image URL from $image_object
        // $site_primary_logo_url = $site_primary_logo['sizes'][$site_primary_logo_size];
        // $site_alternate_logo_url = $site_alternate_logo['sizes'][$site_alternate_logo_size];
    // social
    $social_facebook = get_field('social_facebook', 'option');
    $social_twitter = get_field('social_twitter', 'option');
    $social_linkedin = get_field('social_linkedin', 'option');
    $social_youtube = get_field('social_youtube', 'option');
    $social_instagram = get_field('social_instagram', 'option');
    $social_pinterest = get_field('social_pinterest', 'option');
    $social_yelp = get_field('social_yelp', 'option');
    $social_foursquare = get_field('social_foursquare', 'option');
    // posts
    $post_default_featured_image = get_field('post_default_featured_image', 'option');
    // header
        // top bar
        $header_top_bar = get_field('header_top_bar', 'option');
        $header_top_bar_settings = get_field('header_top_bar_settings', 'option');
        $header_top_bar_wrapper_class = $header_top_bar_settings['header_top_bar_wrapper_class'];
        $header_top_bar_wrapper_background = $header_top_bar_settings['header_top_bar_wrapper_background'];
        $header_top_bar_wrapper_background_color = $header_top_bar_wrapper_background['background_color'];
        $header_top_bar_wrapper_background_image = $header_top_bar_wrapper_background['background_image'];
        // wrapper
        $header_wrapper_class = get_field('header_wrapper_class', 'option');
        // container
        $header_container_class = get_field('header_container_class', 'option');
        // navbar
        $header_navbar_class = get_field('header_navbar_class', 'option');
        $header_menu_class = get_field('header_menu_class', 'option');
    // footer
        // footer wrapper
        $footer_wrapper = get_field('footer_wrapper', 'option');
        $footer_wrapper_options = $footer_wrapper['wrapper_options'];
        $footer_wrapper_class = $footer_wrapper['wrapper_class'];
        $footer_wrapper_background = $footer_wrapper['wrapper_background'];
        $footer_wrapper_background_options = $footer_wrapper_background['background_options'];
        $footer_wrapper_background_color = $footer_wrapper_background['background_color'];
        $footer_wrapper_background_image = $footer_wrapper_background['background_image'];
        // container
        $footer_container = get_field('footer_container', 'option');
        $footer_container_fluid = $footer_container['container_fluid'];
        $footer_container_options = $footer_container['container_options'];
        $footer_container_class = $footer_container['container_class'];
        $footer_container_background = $footer_container['container_background'];
        $footer_container_background_options = $footer_container_background['background_options'];
        $footer_container_background_color = $footer_container_background['background_color'];
        $footer_container_background_image = $footer_container_background['background_image'];
        // row
        $footer_row = get_field('footer_row', 'option');
        $footer_row_options = $footer_row['row_options'];
        $footer_row_class = $footer_row['row_class'];
        $footer_row_background = $footer_row['row_background'];
        $footer_row_background_options = $footer_row_background['background_options'];
        $footer_row_background_color = $footer_row_background['background_color'];
        $footer_row_background_image = $footer_row_background['background_image'];
    // posts
    $default_post_featured_image = get_field('post_default_featured_image', 'option');
    // team
    $default_team_member_photo = get_field('team_member_default_photo', 'option');
    $team_icon = get_field('team_icon', 'option');
    // css and js
        // enqueue css
        $css = get_field('enqueue_css', 'option');
        // enqueue js
        $js = get_field('enqueue_js', 'option');
        // cookies
        $cookie = get_field('cookies', 'option');
        $cookieUsage = get_sub_field('usage', 'option');
        $cookieSecure = get_sub_field('secure', 'option');
        $cookieName = get_sub_field('name', 'option');
        $cookieValue = get_sub_field('value', 'option');
        $cookieExpires = get_sub_field('expires', 'option');
        $cookiePath = get_sub_field('path', 'option');
        // modernizr detects
        $modernizr_detects = get_field('modernizr_detects', 'option');
    // intergrations
    $applications = get_field('enqueue_applications', 'option');
    $application_google_tag_manager = get_field('application_google_tag_manager', 'option');
    $application_google_analytics_id = get_field('application_google_analytics_id', 'option');
    $application_google_maps_api_key = get_field('application_google_maps_api_key', 'option');
?>