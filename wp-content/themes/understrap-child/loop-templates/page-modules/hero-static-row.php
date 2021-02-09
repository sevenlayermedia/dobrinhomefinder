<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="jumbotron<?php if($wrapper_background_image): echo ' bg-cover bg-position-top'; endif; if($wrapper_class): echo ' ' . $wrapper_class; endif; ?>" <?php if($wrapper_background_color || $wrapper_background_image): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?><?php if($wrapper_background_color && $wrapper_background_image): echo '; '; endif; ?><?php if($wrapper_background_image): echo 'background-image: url(' . $wrapper_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
	<div class="<?php if(($container_fluid) == true): echo 'container-fluid'; else: echo 'container'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>" <?php if($container_background_color || $container_background_image): ?>style="<?php if($container_background_color): echo 'background-color: ' . $container_background_color; endif; ?><?php if($container_background_color && $container_background_image): echo '; '; endif; ?><?php if($container_background_image): echo 'background-image: url(' . $container_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
		<div class="row px-lg-7<?php if($row_class): echo ' ' . $row_class; endif; ?>" <?php if($row_background_color || $row_background_image): ?>style="<?php if($row_background_color): echo 'background-color: ' . $row_background_color; endif; ?><?php if($row_background_color && $row_background_image): echo '; '; endif; ?><?php if($row_background_image): echo 'background-image: url(' . $row_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
			<?php
			if(have_rows('hero_content')):
				// loop through the rows of data
				while(have_rows('hero_content')):the_row();
					if( get_row_layout() == 'heading' ):
						get_template_part( 'loop-templates/page-modules/content-blocks/heading', 'block' );
					elseif( get_row_layout() == 'text_area' ):
						get_template_part( 'loop-templates/page-modules/content-blocks/text-area', 'block' );
					elseif( get_row_layout() == 'button' ):
						get_template_part( 'loop-templates/page-modules/content-blocks/button', 'block' );
					endif;
				endwhile;
			endif; 
			?>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper -->