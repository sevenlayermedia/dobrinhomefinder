<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper<?php if($wrapper_class): echo ' ' . $wrapper_class; endif; ?> product-carousel" <?php if($wrapper_background_color || $wrapper_background_image): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?><?php if($wrapper_background_color && $wrapper_background_image): echo '; '; endif; ?><?php if($wrapper_background_image): echo 'background-image: url(' . $wrapper_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
	<div class="<?php if(($container_fluid) == true): echo 'container-fluid'; else: echo 'container'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>" <?php if($container_background_color || $container_background_image): ?>style="<?php if($container_background_color): echo 'background-color: ' . $container_background_color; endif; ?><?php if($container_background_color && $container_background_image): echo '; '; endif; ?><?php if($container_background_image): echo 'background-image: url(' . $container_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
		<div class="row<?php if($row_class): echo ' ' . $row_class; endif; ?>" <?php if($row_background_color || $row_background_image): ?>style="<?php if($row_background_color): echo 'background-color: ' . $row_background_color; endif; ?><?php if($row_background_color && $row_background_image): echo '; '; endif; ?><?php if($row_background_image): echo 'background-image: url(' . $row_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
			<div class="col-12 mb-5">
				<h2>Product Categories</h2>
			</div><!-- .col -->
			<?php
			$products = array(
				'post_type'  => 'products',
				'posts_per_page' => 4,
				'orderby' => 'title',
				'order' => 'ASC'
			);
			$products_query = new WP_Query($products);
			if ( $products_query->have_posts()):
				while ( $products_query->have_posts() ) : $products_query->the_post();
					// Load sub field value.
					include(locate_template('inc/acf-variables.php'));
			?>
				<div class="col-12 col-lg-3 text-center">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><h3><?php the_title(); ?></h3>
					<?php
					if($product_image);
						echo wp_get_attachment_image( $product_image, $product_image_size );
					?></a>
				</div><!-- .col -->
			<?php
				endwhile;
			endif;
				wp_reset_postdata();
			?>
			<?php
			// the loop
			// check if the flexible content field has rows of data
			if(have_rows('col_1_content')):
			?>
				<div class="col-12<?php if($col_1_class): echo ' ' . $col_1_class; endif; ?><?php if($col_1_background_image): echo ' bg-cover'; endif; ?>" <?php if($col_1_background_color || $col_1_background_image): ?>style="<?php if($col_1_background_color): echo 'background-color: ' . $col_1_background_color; endif; ?><?php if($col_1_background_color && $col_1_background_image): echo '; '; endif; ?><?php if($col_1_background_image): echo 'background-image: url(' . $col_1_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
				<?php
				// loop through the rows of data
				while(have_rows('col_1_content')):the_row();
					if( get_row_layout() == 'heading' ):
						get_template_part( 'loop-templates/page-modules/content-blocks/heading', 'block' );
					elseif( get_row_layout() == 'text_area' ):
						get_template_part( 'loop-templates/page-modules/content-blocks/text-area', 'block' );
					elseif( get_row_layout() == 'shortcode' ):
						get_template_part( 'loop-templates/page-modules/content-blocks/shortcode', 'block' );
					elseif( get_row_layout() == 'button' ):
						get_template_part( 'loop-templates/page-modules/content-blocks/button', 'block' );
					endif;
				endwhile;
				?>
				</div><!-- .col -->
			<?php
			else:
				// no layouts found
			// end the loop
			endif;
			wp_reset_query();
			?>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper -->