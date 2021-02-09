<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="col-list container">
	<?php
	// check if the repeater field has rows of data
	if( have_rows('list_repeater') ):
		if($list_style && in_array('Circle', $list_style)) {
			echo '<ul class="list-circle row">';
		} elseif($list_style && in_array('Decimal', $list_style)) {
			echo '<ol class="list-decimal row">';
		} elseif($list_style && in_array('Icon', $list_style)) {
			echo '<ul class="list-icon row">';
		} elseif($list_style && in_array('None', $list_style)) {
			echo '<ul class="list-none row">';
		} elseif($list_style && in_array('Square', $list_style)) {
			echo '<ul class="list-square row">';
		} else {
			echo '<ul class="list-square row">';
		}
		// loop through the rows of data
		if($list_column_count == '1'):
			while ( have_rows('list_repeater') ) : the_row();
				include(locate_template('inc/acf-variables.php'));
				// display a sub field value
				echo '<li class="list-item col-12">';
				if($list_item_file) { 
					if($list_item_icon['url']) {
						echo '<img class="resource-icon" src="' . $list_item_icon['url'] . '" alt="' . $list_item_icon['alt'] . '">';
					}
					echo '<a href="' . $list_item_file['url'] . '" target="_blank" rel="noopener">' . $list_item_file['title'] . '</a>';
				} elseif($list_item_link) {
					if($list_item_icon['url']) {
						echo '<img class="resource-icon" src="' . $list_item_icon['url'] . '" alt="' . $list_item_icon['alt'] . '">';
					}
					echo '<a href="' . $list_item_link['url'] . '" target="_blank" rel="noopener">' . $list_item_link['title'] . '</a>';
				} else {
					echo $list_item;
				}
				echo '</li>';
			endwhile;
		elseif($list_column_count == '2'):
			while ( have_rows('list_repeater') ) : the_row();
				include(locate_template('inc/acf-variables.php'));
				// display a sub field value
				echo '<li class="list-item col-12 col-md-6">';
				if($list_item_file) { 
					if($list_item_icon['url']) {
						echo '<img class="resource-icon" src="' . $list_item_icon['url'] . '" alt="' . $list_item_icon['alt'] . '">';
					}
					echo '<a href="' . $list_item_file['url'] . '" target="_blank" rel="noopener">' . $list_item_file['title'] . '</a>';
				} elseif($list_item_link) {
					if($list_item_icon['url']) {
						echo '<img class="resource-icon" src="' . $list_item_icon['url'] . '" alt="' . $list_item_icon['alt'] . '">';
					}
					echo '<a href="' . $list_item_link['url'] . '" target="_blank" rel="noopener">' . $list_item_link['title'] . '</a>';
				} else {
					echo $list_item;
				}
				echo '</li>';
			endwhile;
		elseif($list_column_count == '3'):
			while ( have_rows('list_repeater') ) : the_row();
				include(locate_template('inc/acf-variables.php'));
				// display a sub field value
				echo '<li class="list-item col-12 col-md-6 col-lg-4">';
				if($list_item_file) { 
					if($list_item_icon['url']) {
						echo '<img class="resource-icon" src="' . $list_item_icon['url'] . '" alt="' . $list_item_icon['alt'] . '">';
					}
					echo '<a href="' . $list_item_file['url'] . '" target="_blank" rel="noopener">' . $list_item_file['title'] . '</a>';
				} elseif($list_item_link) {
					if($list_item_icon['url']) {
						echo '<img class="resource-icon" src="' . $list_item_icon['url'] . '" alt="' . $list_item_icon['alt'] . '">';
					}
					echo '<a href="' . $list_item_link['url'] . '" target="_blank" rel="noopener">' . $list_item_link['title'] . '</a>';
				} else {
					echo $list_item;
				}
				echo '</li>';
			endwhile;
		endif;
		echo '</ul>';
	else :
		// no rows found
	endif;
	?>
</div><!-- .col-button -->