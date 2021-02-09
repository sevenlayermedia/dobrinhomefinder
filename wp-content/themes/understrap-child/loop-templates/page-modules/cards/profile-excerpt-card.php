<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
include(locate_template('inc/wp-variables.php'));
?>
<a class="card h-100<?php if($profile_photo && $team_profile_photos): echo ''; else: echo ' py-5 blue-bg'; endif; ?>" href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <div class="row no-gutters">
        <?php if($team_profile_photos):?>
            <div class="col-12 pb-md-0">
                <?php if($profile_photo): ?>
                    <img class="card-img<?php if($js && in_array('Lazy Load', $js)): echo ' lazyload'; else: endif; ?>" src="<?php echo $profile_photo['sizes']['post_square_large']; ?>" alt="<?php if($profile_photo['alt']): echo $profile_photo['alt']; else: echo get_the_title( $post_id ); endif; ?>">
                <?php endif; ?>
            </div><!-- .col-auto -->
        <?php endif; ?>
        <div class="col">
            <div class="card-body<?php if($profile_photo && $team_profile_photos): echo ''; else: echo ' text-white'; endif; ?>">
                <h4 class="card-title<?php if($profile_photo && $team_profile_photos): echo ''; else: echo ' text-white'; endif; ?>"><?php echo $profile_first_name . ' '; if($profile_middle_name): echo $profile_middle_name . ' '; endif; echo $profile_last_name; if($profile_degrees_certifications): echo ', ' .$profile_degrees_certifications; endif; ?></h4>
                <?php if($profile_job_title): echo $profile_job_title; endif; ?>
            </div><!-- .card-body -->
        </div><!-- .col -->
    </div><!-- .row -->
</a><!-- .card -->