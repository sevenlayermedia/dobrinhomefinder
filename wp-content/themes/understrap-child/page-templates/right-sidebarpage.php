<?php
/**
 * Template Name: Right Sidebar Page
 *
 * This template can be used to override the default template and sidebar setup
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
	get_template_part( 'global-templates/page-title', 'check' );
endif;
?>
<main class="site-main<?php if($page_background_color): echo ' ' . $page_background_color; endif; ?>" id="main" role="main">
	<div class="wrapper wrapper-page right-sidebar">
		<div class="container" id="content">
			<div class="row">
				<div class="px-0 content-area" id="primary">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'loop-templates/content', 'page' ); ?>
					<?php endwhile; // end of the loop. ?>
				</div><!-- .content-area -->
				<!-- Do the right sidebar check -->
				<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .wrapper -->
</main><!-- #main -->
<?php get_footer(); ?>