<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="col-md-9 col-12 align-self-center text-md-left text-center">
	<?php // the loop
	// check if the flexible content field has rows of data
	if(have_rows('cta_content')):
		// loop through the rows of data
		while(have_rows('cta_content')):the_row();
			if( get_row_layout() == 'heading' ):
				get_template_part( 'loop-templates/page-modules/content-blocks/heading', 'block' );
			elseif( get_row_layout() == 'text_area' ):
				get_template_part( 'loop-templates/page-modules/content-blocks/text-area', 'block' );
			endif;
		endwhile;
	else:
		// no layouts found
	// end the loop
	endif;
	wp_reset_query();
	?>
</div><!-- .col -->
<div class="col-md-3 col-12 align-self-center text-md-right text-center">
	<?php // the loop
	// check if the flexible content field has rows of data
	if(have_rows('cta_content')):
		// loop through the rows of data
		while(have_rows('cta_content')):the_row();
			if( get_row_layout() == 'heading' ):
				get_template_part( 'loop-templates/page-modules/content-blocks/button', 'block' );
			endif;
		endwhile;
	else:
		// no layouts found
	// end the loop
	endif;
	wp_reset_query();
	?>
</div><!-- .col -->