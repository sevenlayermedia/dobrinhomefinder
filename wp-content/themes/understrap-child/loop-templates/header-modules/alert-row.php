<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper<?php if($wrapper_class): echo ' ' . $wrapper_class; endif; ?>" <?php if($wrapper_background_color||$wrapper_background_image): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?><?php if($wrapper_background_color and $wrapper_background_image): echo '; '; endif; ?><?php if($wrapper_background_image): echo 'background-image: url(' . $wrapper_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
	<div class="container<?php if($container_fluid): echo ' container-xs-fluid'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>">
		<div class="row<?php if($row_class): echo ' ' . $row_class; endif; ?>">
			<div class="col-md-12<?php if($col_1_class): echo ' ' . $col_1_class; endif; ?>" <?php if($col_1_background_color||$col_1_background_image): ?>style="<?php if($col_1_background_color): echo 'background-color: ' . $col_1_background_color; endif; ?><?php if($col_1_background_color and $col_1_background_image): echo '; '; endif; ?><?php if($col_1_background_image): echo 'background-image: url(' . $col_1_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
				<?php
				// the loop
				// check if the flexible content field has rows of data
				if(have_rows('col_1_content')):
					// loop through the rows of data
					while(have_rows('col_1_content')):the_row();
						if( get_row_layout() == 'heading' ):
							get_template_part( 'loop-templates/header-modules/content-blocks/header', 'block' );
						elseif( get_row_layout() == 'text_area' ):
							get_template_part( 'loop-templates/header-modules/content-blocks/text-area', 'block' );
						elseif( get_row_layout() == 'button' ):
							get_template_part( 'loop-templates/header-modules/content-blocks/button', 'block' );
						endif;
					endwhile;
				else:
					// no layouts found
				// end the loop
				endif;
				wp_reset_query();
				?>
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper -->