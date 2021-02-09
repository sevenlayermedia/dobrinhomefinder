<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<?php if($video_url): // video part ?>
	<div class="col-video">
		<?php echo $video_url; ?>
	</div><!-- .col-video -->
<?php endif; ?>