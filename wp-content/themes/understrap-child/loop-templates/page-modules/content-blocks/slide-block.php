<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
?>

<ol class="carousel-indicators">
	<?php 
	if(have_rows('hero_content')):
		$i = 0;
		$count = 0;
		// loop through the rows of data
		while(have_rows('hero_content')):the_row(); $i++;
		include(locate_template('inc/acf-variables.php'));
	?>
	<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $count; ?>" class="<?php if( $i == 1 ){ echo 'active'; } ?>"></li>
	<?php
		$count++;	
		endwhile;
	endif;
	?>
</ol>
<div class="carousel-inner h-100" role="listbox">
	<?php 
	if(have_rows('hero_content')):
		$i = 0;
		// loop through the rows of data
		while(have_rows('hero_content')):the_row(); $i++;
		include(locate_template('inc/acf-variables.php'));
	?>
	<div class="carousel-item h-100<?php if( $i ==1 ){ echo ' active'; } ?>">
		<img class="d-block img-fluid bg-cover<?php if($js && in_array('Lazy Load', $js)): echo ' lazyload'; else: endif; ?>" src="<?php echo $image_slide['sizes']['post_landscape_large']; ?>" alt="<?php echo $image_slide['alt']; ?>">
		<?php if($heading_group): ?>
			<div class="container carousel-caption d-table">
				<?php
					get_template_part( 'loop-templates/page-modules/content-blocks/text-area', 'block' );
				?>
				<?php
					get_template_part( 'loop-templates/page-modules/content-blocks/heading', 'block' );
				?>
			</div><!-- .carousel-caption -->
		<?php endif; ?>
	</div>
	<?php		
		endwhile;
	endif;
	?>
</div><!-- .carousel-inner -->
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	<span class="carousel-control-next-icon" aria-hidden="true"></span>
	<span class="sr-only">Next</span>
</a>