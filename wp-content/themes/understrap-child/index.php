<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper pb-0" id="wrapper-posts">
	<?php get_template_part( 'global-templates/page-title', 'check' ); ?>
</div><!-- .container -->
<main class="site-main" id="main" role="main">
	<div id="wrapper-news-archive" class="wrapper light-gray-bg">
		<div class="container" id="content" tabindex="-1">
			<div class="row">
				<div class="content-area" id="primary">
					<div class="col">
						<div class="row">
							<?php if (have_posts()): while (have_posts()): the_post(); ?>
								<div class="col-12 my-2 grid-item">
									<?php get_template_part( 'loop-templates/page-modules/cards/post-excerpt', 'card' ); ?>
								</div><!-- .col -->
							<?php endwhile; endif; ?>
							<?php wp_reset_postdata(); ?>
						</div><!-- .row -->
						<!-- The pagination component -->
						<div class="text-center">
							<?php understrap_pagination(); ?>
						</div>
					</div><!-- .col -->
				</div><!-- .content-area -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .wrapper -->
</main><!-- #main -->
<?php get_footer(); ?>
