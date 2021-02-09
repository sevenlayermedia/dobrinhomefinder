<?php
// remove "Private: " from titles
function remove_private_prefix($title) {
	$title = str_replace('Private: ', '', $title);
	return $title;
}
add_filter('the_title', 'remove_private_prefix');

// excerpt length
function wpdocs_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'wpdocs_excerpt_length', 999 );

// excerpt replace [...]
function trim_excerpt($text) {
	return str_replace(' [...]', '' . ' ... ', $text);
}
add_filter('get_the_excerpt', 'trim_excerpt');

// enable vcard upload
function enable_vcard_upload( $mime_types ){
	$mime_types['vcf'] = 'text/x-vcard';
	return $mime_types;
  }
add_filter('upload_mimes', 'enable_vcard_upload' );

// remove 'Howdy'
function howdy_message($translated_text, $text, $domain) {
    $new_message = str_replace('Howdy', 'Welcome', $text);
    return $new_message;
}
add_filter('gettext', 'howdy_message', 10, 3);

// disable block editor
add_filter('use_block_editor_for_post', '__return_false');

// function floating_publish() {
//     echo '<style>
//         #poststuff #post-body.columns-2 #side-sortables { margin-top: 330px; }
//         #submitdiv { position: fixed; margin-top: -330px; right: 20px; z-index: 9999; max-width: 278px; width: 100%; -webkit-box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.0); -moz-box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.0); box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.0););}
//     </style>';
// }
// add_action('admin_head', 'floating_publish');