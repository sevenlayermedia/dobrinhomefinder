<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<?php 
$posts = get_posts(array(
	'post__not_in'  => $do_not_duplicate,
	'posts_per_page' => $posts_per_page,
	'category__and' => $posts_categories,
	'tag__in' => $posts_tags,
	'orderby' => 'date',
	'order' => 'DESC'
));
if( $posts ):
	echo '<div class="col-posts">';
	foreach( $posts as $post ):
		setup_postdata( $post );
		$do_not_duplicate[] = $post->ID;
?>
<div class="py-2 post-excerpt"><p class="mb-0"><?php the_title(); ?> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More</a></p></div>
<?php
	endforeach;
	echo '</div><!-- .col-video -->';
endif;
wp_reset_postdata();
?>