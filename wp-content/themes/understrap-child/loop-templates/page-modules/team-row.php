<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper wrapper-team<?php if($wrapper_class): echo ' ' . $wrapper_class; endif; ?>" id="wrapper" <?php if($wrapper_background_color): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?>"<?php endif; ?>>
	<div class="<?php if($container_options && in_array('Fluid-Width', $container_options)): echo 'container-fluid'; else: echo 'container'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>">
		<div class="row">
			<div class="col-12 px-0">
				<div class="card-deck">
					<?php
					if($team_orderby && in_array('profile_last_name', $team_orderby)) {
						$team = get_posts(array(
							'post_type' => 'team',
							'numberposts' => -1,
							'meta_query' => array(
								array(
									'key' => 'profile_team',
									'value' => $team,
									'compare' => 'LIKE'
								)
							),
							'meta_key' => 'profile_fullname_profile_last_name',
							'orderby' => 'meta_value',
							'order' => 'ASC'
						));
					} 
					elseif($team_orderby && in_array('menu_order', $team_orderby)) {
						$team = get_posts(array(
							'post_type' => 'team',
							'numberposts' => -1,
							'meta_query' => array(
								array(
									'key' => 'profile_team',
									'value' => $team,
									'compare' => 'LIKE'
								)
							),
							'orderby' => 'menu_order',
							'order' => 'ASC'
						));
					}
					if($team):
						$i = 0;
						$count = 0;
						if($team_layout == 'Profile') {
							echo '<div class="accordion">';
							echo '<div class="tabs">';
						}
						foreach($team as $post):
							include(locate_template('inc/acf-variables.php'));
							$i++;
							setup_postdata($post);
					?>
					<?php if($team_layout == 'Profile'): ?>
						<div class="tab">
							<div class="col-12 grid-item my-4" id="radio<?php echo $count; ?>">
								<div class="card h-100">
									<div class="row no-gutters">
										<div class="col-12 col-lg-4 p-5 blue-bg text-white">
											<h4 class="card-title"><?php echo $profile_first_name . ' '; if($profile_middle_name): echo $profile_middle_name . ' '; endif; echo $profile_last_name; if($profile_degrees_certifications): echo ', ' .$profile_degrees_certifications; endif; ?></h4>
											<?php if($profile_job_title) { echo $profile_job_title; } ?>
										</div><!-- .col-auto -->
										<div class="col">
										<input type="checkbox" id="checkbox<?php echo $count; ?>" name="checkbox">
											<label class="tab-label" for="checkbox<?php echo $count; ?>"></label>
											<div class="card-body tab-content-excerpt p-5">
												<?php if($profile_bio) {
													$profile_bio_excerpt = wp_trim_words($profile_bio, $num_words = 30, $more = ' ... ');
													echo '<p>' . $profile_bio_excerpt . '</p>';
												}
												?>
											</div><!-- .card-body -->
											<div class="card-body tab-content p-5">
												<?php if($profile_bio) {
													echo $profile_bio;
												}
												?>
											</div><!-- .card-body -->
										</div><!-- .col -->
									</div><!-- .row -->
								</div><!-- .card -->
							</div><!-- .col -->
						</div><!-- .tab -->
					<?php elseif($team_layout == 'Profile Excerpt'): ?>
						<div class="col-12 col-sm-6 col-lg-4 grid-item my-4">
							<?php get_template_part( 'loop-templates/page-modules/cards/profile-excerpt', 'card' ); ?>
						</div><!-- .col -->
					<?php endif ?>
					<?php
							$count++;
						endforeach;
						if($team_layout == 'Profile') {
							echo '</div><!-- .tabs -->';
							echo '</div><!-- .accordion -->';
						}
					endif;
					wp_reset_postdata();
					?>
				</div><!-- .card -->
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .wrapper -->