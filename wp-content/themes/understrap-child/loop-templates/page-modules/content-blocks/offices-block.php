<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
?>
<?php
// check if the repeater field has rows of data
if(have_rows('office_locations', 'option')):
    echo '<ul class="office-locations">';
    // loop through the rows of data
    while (have_rows('office_locations', 'option')):the_row();
    include(locate_template('inc/acf-variables.php'));
?>
<?php if($office_name): ?><h2><?php echo $office_name; ?></h2><?php endif; ?>
<?php if($office_address): ?><li class="address"><i class="fa fa-map-marker"></i><?php echo $office_address_line_1; ?></br><?php if($office_address_line_2): echo $office_address_line_2 . '</br>'; endif; ?><?php echo $office_address_city; ?>, <?php echo $office_address_state; ?> <?php echo $office_address_zip_code; ?></li><?php endif; ?>
<?php if($office_phone): ?><li class="phone"><i class="fa fa-phone"></i><a href="tel:<?php echo $office_phone; ?>"><?php echo $office_phone; ?></a></li><?php endif; ?>
<?php if($office_phone_toll_free): ?><li class="phone"><i class="fa fa-phone"></i><a href="tel:<?php echo $office_phone_toll_free; ?>"><?php echo $office_phone_toll_free; ?></a></li><?php endif; ?>
<?php
    endwhile;
    echo '</ul>';
else :
    // no rows found
endif;
?>