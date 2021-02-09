<?php
/**
 * Right sidebar check.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<?php $sidebar_pos = get_theme_mod( 'understrap_sidebar_position' ); ?>
<?php if ( 'right' === $sidebar_pos ) : ?>
	<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>
<?php endif; ?>