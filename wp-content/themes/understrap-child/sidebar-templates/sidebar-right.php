<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

include(locate_template('inc/acf-variables.php'));
?>
<div id="sidebar-right" class="sidebar-right widget-area text-right" role="complementary">
	<div class="sticky-sidebar-top">
		<?php dynamic_sidebar( 'right-sidebar' ); ?>
	</div><!-- .sticky-sidebar-top -->
</div><!-- #right-sidebar -->