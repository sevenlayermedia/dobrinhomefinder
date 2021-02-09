<?php
/**
 * Single post partial template.
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
	<div class="post-content pt-5">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .post-content -->
	<footer class="post-footer">
		<?php understrap_entry_footer(); ?>
	</footer><!-- .post-footer -->
</article><!-- #post-## -->