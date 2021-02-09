<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper py-5 py-md-6" id="wrapper-search">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-8">
				<main class="site-main" id="main">
					<?php if ( have_posts() ) : ?>
						<header class="page-header">
								<h1 class="page-title"><?php printf(
								/* translators:*/
								esc_html__( 'Search Results for: %s', 'understrap' ),
									'<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .page-header -->
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'loop-templates/content', 'search' );
							?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'loop-templates/content', 'none' ); ?>
					<?php endif; ?>
				</main><!-- #main -->
				<!-- The pagination component -->
				<?php understrap_pagination(); ?>
			</div><!-- .col -->
			<!-- Do the right sidebar check -->
			<?php get_template_part('sidebar'); ?>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper -->
<?php get_footer(); ?>
