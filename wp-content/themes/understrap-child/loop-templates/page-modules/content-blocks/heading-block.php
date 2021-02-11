<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<?php if($heading_group): // heading part ?>
	<div class="col-heading w-100">
		<?php if($heading_tag): ?><<?php echo $heading_tag; ?>><?php echo $heading; ?></<?php echo $heading_tag; ?>><?php else: echo '<h2>' . $heading . '</h2>'; endif; ?>
	</div><!-- .col-heading -->
<?php endif; ?>