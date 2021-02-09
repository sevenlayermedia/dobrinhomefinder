<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="col-button">
	<?php if($event_tracking): // event tracking ?>
		<a class="btn" href="<?php echo $button_link['url'] ?>" onclick="ga('send', 'event', '<?php echo $event_tracking_variables['category']; ?>', '<?php echo $event_tracking_variables['action']; ?>', '<?php echo $event_tracking_variables['label']; ?>', <?php if($event_tracking_variables['value']){ echo "'" . $event_tracking_variables['value'] . "'"; } else { echo ","; }?>{nonInteraction: <?php echo $event_tracking_variables['noninteraction']; ?>});" role="button">
			<?php echo $button_text ?>
		</a>
	<?php else: ?>
		<a class="btn" href="<?php echo $button_link['url'] ?>" role="button">
			<?php echo $button_text ?>
		</a>
	<?php endif; ?>
</div><!-- .col-button -->