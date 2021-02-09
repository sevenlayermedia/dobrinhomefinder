<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
?>
<?php
// the loop
// check if the flexible content field has rows of data
if(have_rows('page_layout_content')):
	// loop through the rows of data
	while(have_rows('page_layout_content')):the_row();
		// check if the layout has rows of data
		if(get_row_layout() == 'full_width_row'):
			get_template_part( 'loop-templates/page-modules/full-width', 'row' );
		// check if the layout has rows of data
		elseif(get_row_layout() == '2_column_row'):
			get_template_part( 'loop-templates/page-modules/2-column', 'row' );
		// check if the layout has rows of data
		elseif(get_row_layout() == '3_column_row'):
			get_template_part( 'loop-templates/page-modules/3-column', 'row' );
		// check if the layout has rows of data
		elseif(get_row_layout() == '4_column_row'):
			get_template_part( 'loop-templates/page-modules/4-column', 'row' );
		// check if the layout has rows of data
		elseif(get_row_layout() == 'posts'):
			get_template_part( 'loop-templates/page-modules/posts', 'row' );
		// check if the layout has rows of data
		elseif(get_row_layout() == 'events'):
			get_template_part( 'loop-templates/page-modules/events', 'row' );
		// check if the layout has rows of data
		elseif(get_row_layout() == 'gallery'):
			get_template_part( 'loop-templates/page-modules/gallery', 'row' );
		// check if the layout has rows of data
		elseif(get_row_layout() == 'cta'):
			get_template_part( 'loop-templates/page-modules/cta', 'row' );
		// check if the layout has rows of data
		elseif(get_row_layout() == 'distributors'):
			get_template_part( 'loop-templates/page-modules/distributors', 'row' );
		// check if the layout has rows of data
		elseif(get_row_layout() == 'products'):
			get_template_part( 'loop-templates/page-modules/products', 'row' );
		endif;
	endwhile;
else:
	// no layouts found
// end the loop
endif;
wp_reset_query();
?>