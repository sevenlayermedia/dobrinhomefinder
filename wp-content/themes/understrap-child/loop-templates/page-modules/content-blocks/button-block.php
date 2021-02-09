<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="col-button">
	<?php
	if($button_modal): ?>
		<button type="button" class="btn" data-toggle="modal" data-target="#<?php echo $button_modal_target; ?>"><?php echo esc_html($button_link['title']); ?></button>
	<?php 
	else: ?>
		<a class="btn" href="<?php echo esc_url($button_link['url']); ?>" target="<?php echo esc_attr($button_link['target']); ?>" role="button"><?php echo esc_html($button_link['title']); ?></a>
	<?php 
	endif; ?>
</div><!-- .col-button -->