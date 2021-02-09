<?php
/**
 * page title
 *
 * @package understrap
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
include(locate_template('inc/acf-variables.php'));
?>
<?php if(!is_front_page()): ?>
    <div class="container">
        <div class="row">
            <div class="col-heading w-100 pt-5 pb-0 text-center">
                <?php
                // blog
                if (is_home()) {
                    echo '<h1>News & Reviews<h1>';
                }
                // singular
                if (is_singular()) {
                    if ($page_title) {
                        echo '<h1>' . $page_title . '</h1>';
                    } else {
                        echo '<h1>' . get_the_title() . '</h1>';
                    }
                }
                // archive
                if (is_category()) {
                    echo the_archive_title('<h1>', '</h1>');
                }
                ?>
            </div><!-- .col-heading -->
        </div><!-- .row -->
    </div><!-- .container -->
<?php endif; ?>