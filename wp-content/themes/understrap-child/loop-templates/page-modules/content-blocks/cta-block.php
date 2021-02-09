<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper<?php if($wrapper_class): echo ' ' . $wrapper_class; endif; ?>" id="wrapper-cta" <?php if($wrapper_background_color): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?>"<?php endif; ?>>
	<div class="<?php if($container_options && in_array('Full-Width', $container_options)): echo 'container-fluid'; else: echo 'container'; endif; ?><?php if($container_options && in_array('Push-Pull Columns', $container_options)): echo ' container-push-pull'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>" <?php if($container_background): ?>style="<?php if($container_background_color): echo 'background-color:' . $container_background_color; endif; ?>"<?php endif; ?>>
		<div class="row<?php if($row_class): echo ' ' . $row_class; endif; ?>">
			<div class="col-md-9 col-12 align-self-center text-md-left text-center">
				<?php echo $text_area ?>
			</div><!-- .col -->
			<div class="col-md-3 col-12 align-self-center text-md-right text-center">
				<?php get_template_part( 'loop-templates/page-modules/content-blocks/button', 'block' ); ?>
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper -->