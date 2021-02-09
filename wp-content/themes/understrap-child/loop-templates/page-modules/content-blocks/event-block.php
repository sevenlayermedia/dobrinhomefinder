<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
include(locate_template('inc/wp-variables.php'));
?>
<div class="wrapper p-md-0">
	<div class="container container-xs-fluid">
		<div class="row align-items-start">
<div class="<?php if($event_image): ?>col-lg-6 <?php endif; ?>col-12 mx-xs-auto pr-md-5">
				<?php
					echo '<div class="card-category">' . $category_name . '</div>';
				?>
				<h2><?php echo get_the_title( $post_id ); ?></h2>
				<ul class="details">
					<?php
					// check if the repeater field has rows of data
					if(have_rows('event_dates')):
						// loop through the rows of data
						while (have_rows('event_dates')):the_row();
						include(locate_template('inc/acf-variables.php'));
					?>
						<?php if($event_start_date): ?><li class="event-date"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $event_start_date_abb; ?><?php if($event_start_time): echo ' | ' . $event_start_time; endif; ?> <?php if($event_start_time && $event_end_time): echo '-' . $event_end_time; endif; ?></li><?php endif; ?>
					<?php
						endwhile;
					else :
						// no rows found
					endif;
					?>
					<?php if($event_phone): ?><li class="event-phone"><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo $event_phone; ?>" class="phone"><?php echo $event_phone; ?></a></li><?php endif; ?>
					<?php if($event_email): ?><li class="event-email"><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo $event_email; ?>" class="email"><?php echo $event_email; ?></a></li><?php endif; ?>
					<?php if($event_website): ?><li class="event-website"><i class="fa fa-globe" aria-hidden="true"></i><a href="http://<?php echo $event_website; ?>" class="url" target="_blank"><?php echo $event_website; ?></a></li><?php endif; ?>
					<?php if($event_cost): ?><li class="event-cost"><i class="fa fa-usd" aria-hidden="true"></i><?php echo $event_cost; ?></li><?php endif; ?>
				</ul>
				<?php if($event_description): echo $event_description; endif; ?>
			</div><!-- .col -->
			<?php if($event_image): ?>
			<div class="col-lg-6 pr-md-0 bg-cover">
				<div class="w-100 h-100 d-table">
					<img <?php if($js && in_array('Lazy Load', $js)): echo 'class="lazyload"'; else: endif; ?> src="<?php echo $event_image['sizes']['post_landscape_large']; ?>" alt="<?php echo $event_image['alt']; ?>">
				</div><!-- .d-table -->
			</div><!-- .col -->
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper -->