<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper wrapper-cta<?php if($wrapper_class): echo ' ' . $wrapper_class; endif; ?>" <?php if($wrapper_background_color || $wrapper_background_image): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?><?php if($wrapper_background_color && $wrapper_background_image): echo '; '; endif; ?><?php if($wrapper_background_image): echo 'background-image: url(' . $wrapper_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
	<div class="<?php if(($container_fluid) == true): echo 'container-fluid'; else: echo 'container'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>" <?php if($container_background_color || $container_background_image): ?>style="<?php if($container_background_color): echo 'background-color: ' . $container_background_color; endif; ?><?php if($container_background_color && $container_background_image): echo '; '; endif; ?><?php if($container_background_image): echo 'background-image: url(' . $container_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
		<div class="row<?php if($row_class): echo ' ' . $row_class; endif; ?>" <?php if($row_background_color || $row_background_image): ?>style="<?php if($row_background_color): echo 'background-color: ' . $row_background_color; endif; ?><?php if($row_background_color && $row_background_image): echo '; '; endif; ?><?php if($row_background_image): echo 'background-image: url(' . $row_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
			<div class="col-lg-8 col-md-7 col-12 align-self-center text-md-left text-center">
				<?php echo $text_area ?>
			</div><!-- .col -->
			<div class="col-lg-4 col-md-5 col-12 align-self-center text-md-right text-center">
				<?php get_template_part( 'loop-templates/page-modules/content-blocks/button', 'block' ); ?>
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper -->