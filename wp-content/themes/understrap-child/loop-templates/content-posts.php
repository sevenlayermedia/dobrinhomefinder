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
	<div class="row">
		<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
			<span class="d-lg-inline d-none"><?php echo get_the_post_thumbnail( $post->ID, 'post_square_large' ); ?></span>
			<span class="d-lg-none d-inline"><?php echo get_the_post_thumbnail( $post->ID, 'post_landscape_large' ); ?></span>
		</div><!-- .col -->
		<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
			<header class="post-header">
				<?php the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>' ); ?>
			</header><!-- .post-header -->
			<div class="post-content">
				<p>
					<?php echo wp_trim_words( $content , '25' ); ?>
				</p>
				<div class="col-button"><a class="btn" href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More</a></div>
				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .post-content -->
		</div><!-- .col -->
	</div><!-- .row -->
</article><!-- #post-## -->
