<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="col-shortcode">
	<?php if($form): // shortcode part ?>
		<?php echo do_shortcode('[gravityform id="' . $form . '" title="false" description="false" ajax="true"]'); ?>
	<?php endif; ?>
</div><!-- .col-shortcode -->