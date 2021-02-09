<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package understrap
 */
if (!is_active_sidebar('right-sidebar')) {
    return;
}
?>
<div id="secondary" class="widget-area" role="complementary">
    <div class="sidebar sticky sticky-sidebar-top">
        <?php get_template_part('/sidebar-templates/sidebar', 'right'); ?>
    </div><!-- .sidebar -->
</div><!-- #secondary -->