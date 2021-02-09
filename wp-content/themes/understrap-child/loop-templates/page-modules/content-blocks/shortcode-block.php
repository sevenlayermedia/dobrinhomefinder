<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="col-shortcode">
	<?php if($shortcode): // shortcode part ?>
		<?php echo do_shortcode($shortcode); ?>
	<?php endif; ?>
</div><!-- .col-shortcode -->