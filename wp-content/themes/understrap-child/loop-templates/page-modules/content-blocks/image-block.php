<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<?php if($image_group): // image part ?>
	<div class="col-image<?php if($image_alignment): echo ' ' . esc_attr($image_alignment['value']); endif; ?>">
		<?php
		if($image_size == 'Full'):
			if($image_class) {
				echo wp_get_attachment_image($image, 'full', '', ['class' => $image_class]);
			} else {
				echo wp_get_attachment_image($image, 'full');
			}
		elseif($image_size == 'Landscape'):
			if($image_class) {
				echo wp_get_attachment_image($image, 'post_landscape_large', '', ['class' => $image_class]);
			} else {
				echo wp_get_attachment_image($image, 'post_landscape_large');
			}
		elseif($image_size == 'Square'):
			if($image_class) {
				echo wp_get_attachment_image($image, 'post_square_large', '', ['class' => $image_class]);
			} else {
				echo wp_get_attachment_image($image, 'post_square_large');
			}
		endif;
		?>
	</div><!-- .col-image -->
<?php endif; ?>