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
if(have_rows('pre_footer_content', 'option')):
	// loop through the rows of data
	while(have_rows('pre_footer_content', 'option')):the_row();
		// check if the layout has rows of data
		if(get_row_layout() == 'full_width_row'):
			get_template_part( 'loop-templates/page-modules/full-width', 'row' );
		// check if the layout has rows of data
		elseif(get_row_layout() == '2_column_row'):
			get_template_part( 'loop-templates/page-modules/2-column', 'row' );
		// check if the layout has rows of data
		// elseif(get_row_layout() == '3_column_row'):
		// 	get_template_part( 'loop-templates/page-modules/3-column', 'row' );
		// check if the layout has rows of data
		// elseif(get_row_layout() == '4_column_row'):
		// 	get_template_part( 'loop-templates/page-modules/4-column', 'row' );
		// check if the layout has rows of data
		elseif(get_row_layout() == 'products_row'):
			get_template_part( 'loop-templates/page-modules/products', 'row' );
		// elseif(get_row_layout() == 'gallery'):
		// 	get_template_part( 'loop-templates/page-modules/gallery', 'row' );
		endif;
	endwhile;
else:
	// no layouts found
// end the loop
endif;
wp_reset_query();
?>