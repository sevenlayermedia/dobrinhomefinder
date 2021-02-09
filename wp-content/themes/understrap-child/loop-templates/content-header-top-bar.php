<?php
/**
 * Partial template for content in footer.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<?php
// the loop
// check if the flexible content field has rows of data
if(have_rows('header_top_bar_settings_header_top_bar_content_flexible', 'option')):
	// loop through the rows of data
	while(have_rows('header_top_bar_settings_header_top_bar_content_flexible', 'option')):the_row();
		// check if the layout has rows of data
		if(get_row_layout() == 'full_width_row'):
			get_template_part( 'loop-templates/header-modules/full-width', 'row' );
		// check if the layout has rows of data
		elseif(get_row_layout() == '2_column_row'):
			get_template_part( 'loop-templates/header-modules/2-column', 'row' );
		endif;
	endwhile;
else:
	// no layouts found
// end the loop
endif;
wp_reset_query();
?>