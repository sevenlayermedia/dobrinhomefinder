<?php
/**
 * Template Name: Full Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

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
	// get_template_part( 'global-templates/page-title', 'check' );
endif;
?>
<main class="site-main <?php if($page_background_toggle): echo $page_background_color; endif; ?>" id="main" role="main">
	<div class="wrapper wrapper-page py-0">
		<div class="<?php if($layout == 'Full-Width'): echo 'container-fluid'; else: echo 'container'; endif; ?>" id="content">
			<div class="row">
				<div class="col-12 px-0 content-area" id="primary">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'loop-templates/content', 'page' ); ?>
					<?php endwhile; // end of the loop. ?>
				</div><!-- #primary -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .wrapper -->
</main><!-- #main -->
<?php get_footer(); ?>