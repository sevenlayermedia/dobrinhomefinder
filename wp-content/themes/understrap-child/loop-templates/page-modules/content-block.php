<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="<?php if($row_background_image||$col_1_background_image||$col_2_background_image||$col_3_background_image): echo ' col-bg-image'; endif; ?> <?php if($wrapper_class): echo $wrapper_class; else: echo 'wrapper'; endif; ?>" <?php if($row_background_color||$row_background_image): ?> style="<?php if($row_background_color): echo 'background-color: ' . $row_background_color; endif; ?><?php if($row_background_color and $row_background_image): echo '; '; endif; ?><?php if($row_background_image): echo 'background-image: url(' . $background_image_landscape_large_url . ')'; endif ?>"<?php endif; ?>>	
	<div class="page-content-block">
		<?php
		if($columns == '1'):
			get_template_part( 'loop-templates/page-modules/content-blocks/one', 'column' );
		elseif($columns == '2'):
			get_template_part( 'loop-templates/page-modules/content-blocks/two', 'columns' );
		elseif($columns == '3'):
			get_template_part( 'loop-templates/page-modules/content-blocks/three', 'columns' );
		endif;
		?>
	</div><!-- .page-content-block -->
</div><!-- .wrapper -->