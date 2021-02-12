<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div id="wrapper-gallery" class="wrapper<?php if($wrapper_class): echo ' ' . $wrapper_class; endif; ?>" <?php if($wrapper_background_color): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?>"<?php endif; ?>>
	<div class="<?php if(($container_fluid) == true): echo 'container-fluid'; else: echo 'container'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>" <?php if($container_background_color || $container_background_image): ?>style="<?php if($container_background_color): echo 'background-color: ' . $container_background_color; endif; ?><?php if($container_background_color && $container_background_image): echo '; '; endif; ?><?php if($container_background_image): echo 'background-image: url(' . $container_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
		<?php if(($gallery_layout) == 'Grid'): ?>
			<div class="grid">
				<ul class="list-group row<?php if($row_class): echo ' ' . $row_class; endif; ?>">
					<?php
					foreach($gallery as $image): // image gallery 
						$alt = get_post_meta($image, '_wp_attachment_image_alt', true);
					?>
						<li class="list-group-item col-lg-4 col-md-6 col-12 text-center">
							<div class="container px-0">
								<?php echo wp_get_attachment_image($image, 'post_square_large'); ?>
								<?php
								// if(!empty($alt)) {
								// 	echo '<div class="overlay d-flex justify-content-center align-items-center text-center">';
								// 	echo '<h2>' . $alt . '</h2>';
								// 	echo '</div>';
								// } else {
								// 	echo '';
								// }
								?>
							</div><!-- .container -->
						</li>
					<?php endforeach; ?>
				</ul>
			</div><!-- .grid -->
		<?php elseif(($gallery_layout) == 'Masonry'): ?>
			<div class="masonry">
				<?php
				foreach($gallery as $image): // image gallery 
					$alt = get_post_meta($image, '_wp_attachment_image_alt', true);
				?>
					<div class="container px-0">
						<?php echo wp_get_attachment_image($image, 'full'); ?>
						<?php
						// if(!empty($alt)) {
						// 	echo '<div class="overlay d-flex justify-content-center align-items-center text-center">';
						// 	echo '<h2>' . $alt . '</h2>';
						// 	echo '</div>';
						// } else {
						// 	echo '';
						// }
						?>
					</div><!-- .container -->
				<?php endforeach; ?>
			</div><!-- .masonry -->
		<?php elseif(($gallery_layout) == 'Carousel'): ?>
			<script src="<?php echo get_stylesheet_directory_uri() . '/js/jquery.min.js'; ?>"></script>
			<script src="<?php echo get_stylesheet_directory_uri() . '/js/owl.carousel.js'; ?>"></script>
			<div class="carousel owl-carousel<?php if($gallery_id): echo ' owl-carousel-' . $gallery_id; endif; ?> owl-theme">
				<?php
				foreach($gallery as $image): // image gallery 
					$alt = get_post_meta($image, '_wp_attachment_image_alt', true);
				?>
					<?php echo wp_get_attachment_image($image, 'full'); ?>
					<?php
					// if(!empty($alt)) {
					// 	echo '<div class="overlay d-flex justify-content-center align-items-center text-center">';
					// 	echo '<h2>' . $alt . '</h2>';
					// 	echo '</div>';
					// } else {
					// 	echo '';
					// }
					?>
				<?php endforeach; ?>
			</div><!-- .slider -->
			<script>
			$(document).ready(function() {
				$('.owl-carousel<?php if($gallery_id): echo '-' . $gallery_id; endif; ?>').owlCarousel({
					loop: true,
					margin: 10,
					responsiveClass: true,
					lazyLoad: true,
					responsive: {
						0: {
							items: 1,
							nav: true,
							dots: true,
							loop: true,
							autoplay: true
						},
						// 768: {
						// 	items: 1,
						// 	nav: true,
						// 	loop: true,
						// 	margin: 10
						// },
						// 992: {
						// 	items: 1,
						// 	nav: true,
						// 	loop: true,
						// 	margin: 10
						// },
						// 1200: {
						// 	items: 1,
						// 	nav: true,
						// 	loop: true,
						// 	margin: 10
						// }
					}
				})
			})
			</script>
		<?php endif; ?>
	</div><!-- .container -->
</div><!-- .wrapper -->