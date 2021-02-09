<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper" id="wrapper-404">
	<div class="container" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-12 content-area text-center" id="primary">
				<main class="site-main" id="main">
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.',
							'understrap' ); ?></h1>
							<div class="error-404">404</div>
						</header><!-- .page-header -->
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper -->
<?php get_footer(); ?>
