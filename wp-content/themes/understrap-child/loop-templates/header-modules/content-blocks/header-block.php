<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="col-header">
	<?php if($heading_group): // heading part ?>
		<?php if($heading_tag): ?><<?php echo $heading_tag; ?>><?php echo $heading; ?></<?php echo $heading_tag; ?>><?php else: echo '<h6>' . $heading . '</h6>'; endif; ?>
	<?php endif; ?>
</div><!-- .col-header -->