<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div <?php if($anchor_link): echo 'id="' . $anchor_link . '" '; endif; ?>class="wrapper wrapper-content<?php if($wrapper_class): echo ' ' . $wrapper_class; endif; ?>" <?php if($wrapper_background_color || $wrapper_background_image): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?><?php if($wrapper_background_color && $wrapper_background_image): echo '; '; endif; ?><?php if($wrapper_background_image): echo 'background-image: url(' . $wrapper_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
	<div class="<?php if(($container_fluid) == true): echo 'container-fluid'; else: echo 'container'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>" <?php if($container_background_color || $container_background_image): ?>style="<?php if($container_background_color): echo 'background-color: ' . $container_background_color; endif; ?><?php if($container_background_color && $container_background_image): echo '; '; endif; ?><?php if($container_background_image): echo 'background-image: url(' . $container_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
		<div class="row<?php if($row_class): echo ' ' . $row_class; endif; ?>" <?php if($row_background_color || $row_background_image): ?>style="<?php if($row_background_color): echo 'background-color: ' . $row_background_color; endif; ?><?php if($row_background_color && $row_background_image): echo '; '; endif; ?><?php if($row_background_image): echo 'background-image: url(' . $row_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
			<div class="col-12 col-md-6 py-2<?php if($col_1_class): echo ' ' . $col_1_class; endif; ?><?php if($col_1_background_image): echo ' bg-cover'; endif; ?>" <?php if($col_1_background_color || $col_1_background_image): ?>style="<?php if($col_1_background_color): echo 'background-color: ' . $col_1_background_color; endif; ?><?php if($col_1_background_color && $col_1_background_image): echo '; '; endif; ?><?php if($col_1_background_image): echo 'background-image: url(' . $col_1_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
				<?php if($col_1_link): ?><a href="<?php echo $col_1_link['url'] ?>" class="col-btn <?php if (strpos($col_1_class, 'justify-content-center') !== false): echo 'w-100 h-100 d-table'; endif; ?>" role="button"><?php endif; ?>
					<?php if(empty($col_1_link) && ($col_1_background_color || $col_1_background_image)): ?><div class="w-100 h-100 d-table"><?php endif; ?>
						<div class="position-relative<?php if(strpos($col_1_class, 'justify-content-center') !== false): echo ' d-table-cell align-middle'; else: echo ' '; endif; ?>">
							<?php
							// the loop
							// check if the flexible content field has rows of data
							if(have_rows('col_1_content')):
								// loop through the rows of data
								while(have_rows('col_1_content')):the_row();
									if( get_row_layout() == 'heading' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/heading', 'block' );
									elseif( get_row_layout() == 'text_area' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/text-area', 'block' );
									elseif( get_row_layout() == 'list' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/list', 'block' );
									elseif( get_row_layout() == 'form' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/form', 'block' );
									elseif( get_row_layout() == 'shortcode' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/shortcode', 'block' );
									elseif( get_row_layout() == 'image' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/image', 'block' );
									elseif( get_row_layout() == 'posts' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/posts', 'block' );
									elseif( get_row_layout() == 'video' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/video', 'block' );
									elseif( get_row_layout() == 'button' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/button', 'block' );
									elseif( get_row_layout() == 'spacing' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/spacer', 'block' );
									elseif( get_row_layout() == 'office_location' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/office-location', 'block' );
									elseif( get_row_layout() == 'social_media' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/social-media', 'block' );
									elseif( get_row_layout() == 'copyright' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/copyright', 'block' );
									elseif( get_row_layout() == 'modal_window' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/modal', 'block' );
									endif;
								endwhile;
							else:
								// no layouts found
							// end the loop
							endif;
							wp_reset_query();
							?>
						</div><!-- content -->
					<?php if(empty($col_1_link) && ($col_1_background_color || $col_1_background_image)): echo '</div><!-- .d-table -->'; endif; ?>
				<?php if($col_1_link): echo '</a>'; endif; ?>
			</div><!-- .col -->
			<div class="col-12 col-md-6 py-2<?php if($col_2_class): echo ' ' . $col_2_class; endif; ?><?php if($col_2_background_image): echo ' bg-cover'; endif; ?>" <?php if($col_2_background_color||$col_2_background_image): ?>style="<?php if($col_2_background_color): echo 'background-color: ' . $col_2_background_color; endif; ?><?php if($col_2_background_color && $col_2_background_image): echo '; '; endif; ?><?php if($col_2_background_image): echo 'background-image: url(' . $col_2_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
				<?php if($col_2_link): ?><a href="<?php echo $col_2_link['url'] ?>" class="col-btn <?php if (strpos($col_2_class, 'justify-content-center') !== false): echo 'w-100 h-100 d-table'; endif; ?>" role="button"><?php endif; ?>
					<?php if(empty($col_2_link) && ($col_2_background_color || $col_2_background_image)): ?><div class="w-100 h-100 d-table"><?php endif; ?>
						<div class="position-relative<?php if(strpos($col_2_class, 'justify-content-center') !== false): echo ' d-table-cell align-middle'; else: echo ' '; endif; ?>">
							<?php
							// the loop
							// check if the flexible content field has rows of data
							if(have_rows('col_2_content')):
								// loop through the rows of data
								while(have_rows('col_2_content')):the_row();
									if( get_row_layout() == 'heading' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/heading', 'block' );
									elseif( get_row_layout() == 'text_area' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/text-area', 'block' );
									elseif( get_row_layout() == 'list' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/list', 'block' );
									elseif( get_row_layout() == 'form' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/form', 'block' );
									elseif( get_row_layout() == 'shortcode' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/shortcode', 'block' );
									elseif( get_row_layout() == 'image' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/image', 'block' );
									elseif( get_row_layout() == 'posts' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/posts', 'block' );
									elseif( get_row_layout() == 'video' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/video', 'block' );
									elseif( get_row_layout() == 'button' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/button', 'block' );
									elseif( get_row_layout() == 'spacing' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/spacer', 'block' );
									elseif( get_row_layout() == 'office_location' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/office-location', 'block' );
									elseif( get_row_layout() == 'social_media' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/social-media', 'block' );
									elseif( get_row_layout() == 'copyright' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/copyright', 'block' );
									elseif( get_row_layout() == 'modal_window' ):
										get_template_part( 'loop-templates/page-modules/content-blocks/modal', 'block' );
									endif;
								endwhile;
							else:
								// no layouts found
							// end the loop
							endif;
							wp_reset_query();
							?>
						</div><!-- .content -->
					<?php if(empty($col_2_link) && ($col_2_background_color || $col_2_background_image)): echo '</div><!-- .d-table -->'; endif; ?>
				<?php if($col_2_link): echo '</a>'; endif; ?>
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper -->