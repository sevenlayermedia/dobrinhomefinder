<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper wrapper-posts<?php if($wrapper_class): echo ' ' . $wrapper_class; endif; ?>" <?php if($wrapper_background_color || $wrapper_background_image): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?><?php if($wrapper_background_color && $wrapper_background_image): echo '; '; endif; ?><?php if($wrapper_background_image): echo 'background-image: url(' . $wrapper_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
	<div class="<?php if(($container_fluid) == true): echo 'container-fluid'; else: echo 'container'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>" <?php if($container_background_color || $container_background_image): ?>style="<?php if($container_background_color): echo 'background-color: ' . $container_background_color; endif; ?><?php if($container_background_color && $container_background_image): echo '; '; endif; ?><?php if($container_background_image): echo 'background-image: url(' . $container_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
		<div class="row<?php if($row_class): echo ' ' . $row_class; endif; ?>" <?php if($row_background_color || $row_background_image): ?>style="<?php if($row_background_color): echo 'background-color: ' . $row_background_color; endif; ?><?php if($row_background_color && $row_background_image): echo '; '; endif; ?><?php if($row_background_image): echo 'background-image: url(' . $row_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
			<?php 
			$posts = get_posts(array(
				'post__not_in'  => $do_not_duplicate,
				'posts_per_page' => $posts_per_page,
				'category__and' => $posts_categories,
				'tag__in' => $posts_tags,
				'orderby' => 'date',
				'order' => 'DESC'
			));
			if( $posts ):
				echo '<div class="col-12 col-posts">';
				foreach( $posts as $post ):
					setup_postdata( $post );
					$do_not_duplicate[] = $post->ID;
			?>
			<div class="py-3 post-excerpt"><p class="mb-0"><?php the_title(); ?> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More</a></p></div>
			<?php
				endforeach;
				echo '</div><!-- .col-video -->';
			endif;
			wp_reset_postdata();
			?>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper-posts -->