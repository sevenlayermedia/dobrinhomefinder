<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<?php if($text_area): // textarea part ?>
	<?php echo $text_area ?>
<?php endif; ?>