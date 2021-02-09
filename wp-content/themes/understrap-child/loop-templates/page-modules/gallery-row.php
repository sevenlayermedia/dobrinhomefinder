<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper wrapper-gallery<?php if($wrapper_class): echo ' ' . $wrapper_class; endif; ?>" <?php if($wrapper_background_color || $wrapper_background_image): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?><?php if($wrapper_background_color && $wrapper_background_image): echo '; '; endif; ?><?php if($wrapper_background_image): echo 'background-image: url(' . $wrapper_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
	<div class="<?php if(($container_fluid) == true): echo 'container-fluid'; else: echo 'container'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>" <?php if($container_background_color || $container_background_image): ?>style="<?php if($container_background_color): echo 'background-color: ' . $container_background_color; endif; ?><?php if($container_background_color && $container_background_image): echo '; '; endif; ?><?php if($container_background_image): echo 'background-image: url(' . $container_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
		<div class="row<?php if($row_class): echo ' ' . $row_class; endif; ?>" <?php if($row_background_color || $row_background_image): ?>style="<?php if($row_background_color): echo 'background-color: ' . $row_background_color; endif; ?><?php if($row_background_color && $row_background_image): echo '; '; endif; ?><?php if($row_background_image): echo 'background-image: url(' . $row_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
			<div class="col-12 <?php if(($container_fluid) == true): echo 'px-0'; else: echo ''; endif; ?>">
				<?php if($gallery_random_images): ?>
					<?php
					// create a new wp_query to get all the posts from the 'gallery' custom post type
					$gallery_posts = array(
						'post_type' => 'gallery',
						'posts_per_page' => -1
					);
					$posts_query = new WP_Query($gallery_posts);
					// setup the variable to hold the array for all ID's of all galleries
					$galleries = array();
					// using wp_query to loop through galleries, and add each ID to the $galleries array
					while ($posts_query->have_posts()) {
						$posts_query->the_post();
						$galleries[] = strval( get_the_ID() );
					}
					// reset
					wp_reset_postdata();
					$other_page = $galleries[array_rand($galleries)];
					// show 10 images
					$photocount = 0;
					// ACF loop
					if(have_rows('page_layout_content', $other_page)):
						while(have_rows('page_layout_content', $other_page)): the_row();
							// get ACF variables
							include(locate_template('inc/acf-variables.php'));
							if(get_row_layout() == 'gallery'): 
					?>
					<div class="masonry">
						<?php
						// $gallery = array_unique($gallery);
						foreach($gallery as $image): // image gallery	
							//bump up our counter on each image
							$photocount++;
							//Make sure we're still at or under 10 images before continuing
							if($photocount <= 10): 
						?>
						<a href="<?php echo get_permalink($other_page); ?>"><img <?php if($js && in_array('Lazy Load', $js)): echo 'class="lazyload"'; else: endif; ?> src="<?php echo $image['sizes']['post_square_medium']; ?>" alt="<?php if($image['alt']): echo $image['alt']; else: echo get_the_title() . ' Image'; endif; ?>"></a>
						<?php 
							endif; 
						endforeach;
						?>
					</div><!-- .masonry -->
					<?php 
							endif; 
						endwhile; 
					endif;
					?>
				<?php else: ?>
					<?php if(($gallery_options) == 'Grid'): ?>
						<div class="grid">
							<ul class="list-group row<?php if($row_class): echo ' ' . $row_class; endif; ?>">
								<?php foreach($gallery as $image): // image gallery ?>
									<li class="list-group-item col-lg-4 col-md-6 -col-12 text-center">
										<img <?php if($js && in_array('Lazy Load', $js)): echo 'class="lazyload"'; else: endif; ?> src="<?php echo $image['sizes']['post_square_large']; ?>" alt="<?php if($image['alt']): echo $image['alt']; else: echo get_the_title() . ' Image'; endif; ?>">
									</li>
								<?php endforeach; ?>
							</ul>
						</div><!-- .grid -->
					<?php elseif(($gallery_options) == 'Masonry'): ?>
						<div class="masonry">
							<?php foreach($gallery as $image): // image gallery ?>
								<img <?php if($js && in_array('Lazy Load', $js)): echo 'class="lazyload"'; else: endif; ?> src="<?php echo $image['sizes']['post_unlimited_height']; ?>" alt="<?php if($image['alt']): echo $image['alt']; else: echo get_the_title() . ' Image'; endif; ?>">
							<?php endforeach; ?>
						</div><!-- .masonry -->
					<?php endif; ?>
				<?php endif; ?>
			</div ><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper -->