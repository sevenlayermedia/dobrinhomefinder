<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper py-0" id="full-width-page-wrapper">
	<div class="<?php if($layout == 'Full-Width'): echo 'container-fluid'; else: echo 'container'; endif; ?>" id="content">
		<div class="row">
			<div class="col-12 px-0 content-area" id="primary">
				<main class="site-main" id="main" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'loop-templates/content', 'page' ); ?>
					<?php endwhile; // end of the loop. ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper -->
<?php get_footer(); ?>
