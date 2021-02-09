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
<?php get_template_part( 'global-templates/page-title', 'check' ); ?>
<main class="site-main" id="main" role="main">
	<div id="wrapper-posts" class="wrapper pt-0 pb-5">
		<div class="container" id="content" tabindex="-1">
			<div class="row">
				<div class="content-area" id="primary">
					<div class="col">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'loop-templates/content', 'single' ); ?>
						<?php endwhile; // end of the loop. ?>
						<div class="clearfix"><?php understrap_post_nav(); ?></div>
					</div><!-- .col -->
				</div><!-- .content-area -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .wrapper -->
</main><!-- #main -->
<?php get_footer(); ?>