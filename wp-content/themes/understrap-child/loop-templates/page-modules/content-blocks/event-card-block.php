<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
include(locate_template('inc/wp-variables.php'));
?>
<div class="col-12 col-sm-6 col-lg-3 my-3">
	<div class="card h-100 m-0">
		<div class="zig-zag-bottom">
		<a href="<?php echo get_permalink( $post->ID ); ?>" class="btn-card btn-fix text-left">
			<img class="card-img-top<?php if($js && in_array('Lazy Load', $js)): echo ' lazyload'; else: endif; ?>" src="<?php echo $event_image['sizes']['post_landscape_medium']; ?>" alt="<?php echo $event_image['alt']; ?>">
			<div class="card-body">
				<?php
					foreach ( $category as $category ) {
						echo '<div class="card-category">' . $category_name . '</div>';
					} 
				?>
				<h5 class="card-title"><?php echo get_the_title( $post_id ); ?></h5>
				<ul>
					<?php
					// check if the repeater field has rows of data
					if(have_rows('event_dates')):
						// loop through the rows of data
						while (have_rows('event_dates')):the_row();
						include(locate_template('inc/acf-variables.php'));
					?>
					<?php if($event_start_date): ?><li class="event-date"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $event_start_date_abb; ?></li><?php endif; ?>
					<?php
						endwhile;
					else :
						// no rows found
					endif;
					?>
					<?php if($event_cost): ?><li class="event-cost"><i class="fa fa-usd" aria-hidden="true"></i><?php echo $event_cost; ?></li><?php endif; ?>
				</ul>
			</div><!-- .card-body -->
		</a>
		</div>
	</div><!-- .card -->
</div><!-- .col -->