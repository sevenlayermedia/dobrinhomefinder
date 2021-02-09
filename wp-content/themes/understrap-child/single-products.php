<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
include(locate_template('inc/acf-variables.php'));
?>
<?php
if(have_rows('page_header_content')):
	// loop through the rows of data
	while(have_rows('page_header_content')):the_row();
		// check if the layout has rows of data
		if( get_row_layout() == 'hero_static' ):
			if(have_rows('hero_content')):
				// loop through the rows of data
				while(have_rows('hero_content')):the_row();
					if( get_row_layout() == 'heading' ):
						// do nothing
					endif;
				endwhile;
			endif;
		endif;
	endwhile;
else:
	get_template_part( 'global-templates/page-title', 'check' );
endif;
?>
<main class="site-main" id="main" role="main">
	<div class="wrapper wrapper-products right-sidebar">
		<div class="container" id="content" tabindex="-1">
			<div class="row px-xl-7">
				<div class="px-3 content-area" id="primary">
					<?php echo $product_description; ?>
				</div><!-- .col -->
				<div id="sidebar-right" class="sidebar-right widget-area text-right" role="complementary">
					<div class="sticky-sidebar-top">
					<?php
					if($product_image);
						echo wp_get_attachment_image( $product_image, $product_image_size );
					?>
					<?php
					// Check rows exists.
					if( have_rows('product_specifications') ):
						echo '<div class="py-4">';
						// Loop through rows.
						while( have_rows('product_specifications') ) : the_row();
							// Load sub field value.
							include(locate_template('inc/acf-variables.php'));
							echo '<h2 class="text-highlight">' . $product_specifications_key . ':</h2>';
							echo '<p class="pr-3">' . $product_specifications_value . '</p>';
						// End loop.
						endwhile;
						echo '</div>';
					// No value.
					else :
						// Do something...
					endif;
					?>
					</div><!-- .sticky-sidebar-top -->
				</div><!-- #right-sidebar -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .wrapper -->
</main><!-- #main -->
<?php get_footer(); ?>