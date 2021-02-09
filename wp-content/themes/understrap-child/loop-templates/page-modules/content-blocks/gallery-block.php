<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper<?php if($wrapper_class): echo ' ' . $wrapper_class; endif; ?>" id="wrapper-gallery" <?php if($wrapper_background_color): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?>"<?php endif; ?>>
	<div class="<?php if($container_options && in_array('Fluid-Width', $container_options)): echo 'container-fluid'; else: echo 'container'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>">
		<ul class="list-group row<?php if($row_class): echo ' ' . $row_class; endif; ?>">
			<?php foreach( $gallery as $image ): // image gallery ?>
				<li class="list-group-item col-md-4 col-sm-6 col-12 text-center">
					<img <?php if($js && in_array('Lazy Load', $js)): echo 'class="lazyload"'; else: endif; ?> src="<?php echo $image['sizes']['post_square_large']; ?>" alt="<?php if($image['alt']): echo $image['alt']; else: echo get_the_title(); endif; ?>">
				</li>
			<?php endforeach; ?>
		</ul>
	</div><!-- .container -->
</div><!-- .wrapper -->