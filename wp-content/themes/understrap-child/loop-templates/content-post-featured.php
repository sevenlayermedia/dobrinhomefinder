<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
include(locate_template('inc/acf-variables.php'));
include(locate_template('inc/wp-variables.php'));
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header class="post-featured-header">
		<?php if ( has_post_thumbnail()) : ?>
			<div class="post-featured d-flex align-items-center h-md-400px bg-cover text-white text-center d-flex justify-content-center" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
				<div class="post-featured-content p-5">
					<?php the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink())),'</a></h2>' ); ?>
					<a class="btn" href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More</a>	
				</div><!-- .post-featured-content -->
			</div><!-- .post-featured -->
		<?php endif; ?>
	</header><!-- .post-featured-header -->
</article><!-- #post-## -->
