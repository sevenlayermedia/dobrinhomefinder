<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="col-text-area">
	<?php if($text_area): // textarea part ?>
		<?php echo $text_area; ?>
	<?php endif; ?>
</div><!-- .col-text-area -->