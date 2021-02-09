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
	<div id="wrapper" class="wrapper wrapper-profile light-blue-bg">
		<div class="container" id="content" tabindex="-1">
			<div class="row">
				<div class="col-12 grid-item my-2">
					<?php get_template_part( 'loop-templates/page-modules/cards/profile-contact', 'card' ); ?>
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .wrapper -->
</main><!-- #main -->
<?php get_footer(); ?>