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
        <div class="col-12 col-lg-4 p-4 blue-bg text-white sticky-top">
            <h4 class="card-title"><?php echo $profile_first_name . ' '; if($profile_middle_name): echo $profile_middle_name . ' '; endif; echo $profile_last_name; if($profile_degrees_certifications): echo ', ' .$profile_degrees_certifications; endif; ?></h4>
            <?php if($profile_job_title): echo $profile_job_title; endif; ?>
            <div class="profile-meta pt-4">
                <?php
                if( $profile_office ): 
                    foreach( $profile_office as $office ):
                        echo 'Office: <a class="text-white" href="' . get_permalink( $office->ID ) . '">';
                        echo get_the_title( $office->ID );
                        echo '</a><br>';
                    endforeach;
                endif;
                ?>
                <?php if($profile_phone_ext || $profile_email):
                    if($profile_phone) {
                        echo 'Phone: <a class="phone text-white" href="tel:' . $profile_phone . '">' . $profile_phone . '</a><br>';
                    }
                    if($profile_mobile) {
                        echo 'Mobile: <a class="phone text-white" href="tel:' . $profile_mobile . '">' . $profile_mobile . '</a><br>';
                    }
                    if($profile_email) {
                        echo 'Email: <a class="email text-white" href="mailto:' . $profile_email . '">' . $profile_email . '</a><br>';
                    }
                    if($profile_vcard) {
                        echo '<a class="vcard text-white" href="' . $profile_vcard['url'] . '">Download vCard</a><br>';
                    }
                    if($profile_linkedin) {
                        echo '<a class="ico-linked text-white" title="LinkedIn" target="_blank" href="' . $profile_linkedin . '"><i class="fa fa-linkedin-square"></i></a><br>';
                    }
                endif; 
                ?>
            </div><!-- .profile-meta -->
        </div><!-- .col-auto -->
        <div class="col">
            <div class="card-body p-4">
                <?php if($profile_bio) {
                    echo $profile_bio;
                }
                ?>
            </div><!-- .card-body -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .card -->