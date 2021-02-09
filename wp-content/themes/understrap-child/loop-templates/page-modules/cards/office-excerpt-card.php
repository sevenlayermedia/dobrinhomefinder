<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
include(locate_template('inc/wp-variables.php'));
?>
<a class="card h-100 py-5" href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <div class="row no-gutters">
        <div class="col">
            <div class="card-body">
                <h4 class="card-title"><?php echo get_the_title( $post_id ); ?></h4>
                <u>Meet The Team</u>
            </div><!-- .card-body -->
        </div><!-- .col -->
    </div><!-- .row -->
</a><!-- .card -->