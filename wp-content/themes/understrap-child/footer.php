<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
        <?php
        // check if the flexible content field has rows of data
        if(have_rows('pre_footer_content', 'option')):
        ?>
            <div id="wrapper-pre-footer" class="wrapper py-0">
                <?php get_template_part( 'loop-templates/content-pre', 'footer' );?>
            </div>
        <?php
        // end the loop
        endif;
        wp_reset_query();
        ?>
        <footer class="wrapper py-0<?php if($footer_wrapper_class): echo ' ' . $footer_wrapper_class; endif; ?>" <?php if($footer_wrapper_background_color || $footer_wrapper_background_image): ?> id="wrapper-footer" style="<?php if($footer_wrapper_background_color): echo 'background-color: ' . $footer_wrapper_background_color; endif; ?><?php if($footer_wrapper_background_color && $footer_wrapper_background_image): echo '; '; endif; ?><?php if($footer_wrapper_background_image): echo 'background-image: url(' . $footer_wrapper_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
            <div class="<?php if(($footer_container_fluid) == true): echo 'container-fluid'; else: echo 'container'; endif; ?><?php if($container_class): echo ' ' . $footer_container_class; endif; ?>" <?php if($footer_container_background_color || $footer_container_background_image): ?>style="<?php if($footer_container_background_color): echo 'background-color: ' . $footer_container_background_color; endif; ?><?php if($footer_container_background_color && $footer_container_background_image): echo '; '; endif; ?><?php if($footer_container_background_image): echo 'background-image: url(' . $footer_container_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
                <div class="row<?php if($footer_row_class): echo ' ' . $footer_row_class; endif; ?>" <?php if($footer_row_background_color || $footer_row_background_image): ?>style="<?php if($footer_row_background_color): echo 'background-color: ' . $footer_row_background_color; endif; ?><?php if($footer_row_background_color && $footer_row_background_image): echo '; '; endif; ?><?php if($footer_row_background_image): echo 'background-image: url(' . $footer_row_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
                    <?php
                    // the loop
                    // check if the flexible content field has rows of data
                    if(have_rows('footer_content', 'option')):
                    ?>
                        <div class="col-12 p-0">
                            <?php get_template_part( 'loop-templates/content', 'footer' );?>
                        </div><!-- .col -->
                    <?php
                    // end the loop
                    endif;
                    wp_reset_query();
                    ?>
                </div><!-- .row -->
            </div><!-- .container -->
        </footer>
        <?php wp_footer(); ?>
        <?php get_template_part( 'loop-templates/template-variables', 'footer' ); ?>
    </body>
</html>
