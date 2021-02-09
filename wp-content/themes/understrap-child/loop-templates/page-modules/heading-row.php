<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
include(locate_template('inc/wp-variables.php'));
?>
<div class="wrapper wrapper-heading<?php if($wrapper_class): echo ' ' . $wrapper_class; endif; ?>" <?php if($wrapper_background_color || $wrapper_background_image): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?><?php if($wrapper_background_color && $wrapper_background_image): echo '; '; endif; ?><?php if($wrapper_background_image): echo 'background-image: url(' . $wrapper_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
	<div class="<?php if(($container_fluid) == true): echo 'container-fluid'; else: echo 'container'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>" <?php if($container_background_color || $container_background_image): ?>style="<?php if($container_background_color): echo 'background-color: ' . $container_background_color; endif; ?><?php if($container_background_color && $container_background_image): echo '; '; endif; ?><?php if($container_background_image): echo 'background-image: url(' . $container_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
		<div class="row<?php if($row_class): echo ' ' . $row_class; endif; ?>" <?php if($row_background_color || $row_background_image): ?>style="<?php if($row_background_color): echo 'background-color: ' . $row_background_color; endif; ?><?php if($row_background_color && $row_background_image): echo '; '; endif; ?><?php if($row_background_image): echo 'background-image: url(' . $row_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
			<div class="col-12<?php if($col_1_class): echo ' ' . $col_1_class; endif; ?>" <?php if($col_1_background_color || $col_1_background_image): ?>style="<?php if($col_1_background_color): echo 'background-color: ' . $col_1_background_color; endif; ?><?php if($col_1_background_color && $col_1_background_image): echo '; '; endif; ?><?php if($col_1_background_image): echo 'background-image: url(' . $col_1_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
				<?php if(is_page('home')): ?>
					<div class="col-heading">	
						<h1>Spotlight</h1>
					</div><!-- .col-heading -->
				<?php elseif(is_page('blog')): ?>
					<div class="col-heading">	
						<h1>News From <?php bloginfo( 'name' ); ?></h1>
					</div><!-- .col-heading -->
				<?php elseif(is_singular('business')): ?>
					<div class="col-heading">	
						<h1>Directory</h1>
					</div><!-- .col-heading -->
				<?php elseif(is_singular('event')): ?>
					<div class="col-heading">	
						<h1>Event</h1>
					</div><!-- .col-heading -->
				<?php elseif(is_category()): ?>
					<div class="col-heading">
						<h1><?php echo $category_name; ?></h1>
					</div><!-- .col-heading -->
				<?php elseif(is_404()): ?>
					<div class="col-heading">	
						<h1>Lost?</h1>
					</div><!-- .col-heading -->
				<?php elseif(is_search()): ?>
					<div class="col-heading">
						<h1>Here's What We Found</h1>
					</div><!-- .col-heading -->
				<?php
				else:
					echo '<div class="col-heading"><h1>' . get_the_title() . '</h1></div><!-- .col-heading -->';
				endif;
				wp_reset_query();
				?>
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper -->