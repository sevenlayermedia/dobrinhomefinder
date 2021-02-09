<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
include(locate_template('inc/wp-variables.php'));
?>
<div class="card h-100">
    <div class="row no-gutters">
        <div class="col-12 col-lg-4 p-5 blue-bg text-white sticky-top">
            <h4 class="card-title"><?php echo $profile_first_name . ' '; if($profile_middle_name): echo $profile_middle_name . ' '; endif; echo $profile_last_name; if($profile_degrees_certifications): echo ', ' .$profile_degrees_certifications; endif; ?></h4>
            <?php if($profile_job_title) { echo $profile_job_title; } ?>
        </div><!-- .col-auto -->
        <div class="col">
            <div class="card-body p-5">
                <?php if($profile_bio) {
                    echo $profile_bio;
                }
                ?>
            </div><!-- .card-body -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .card -->