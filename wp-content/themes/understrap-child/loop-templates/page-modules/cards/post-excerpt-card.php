<?php
/**
 * @package understrap
 */
include(locate_template('inc/wp-variables.php'));
include(locate_template('inc/acf-variables.php'));
?>

<div class="py-2 post-meta">
    <?php echo get_the_date( 'F j, Y' ); ?> | <a class="post-category-<?php echo $category_slug ?>" href="<?php echo $category_link ?>" title="<?php echo $category_name ?>"><?php echo $category_name ?></a>
</div><!-- .post-meta -->
<div class="card">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-5 col-xl-4">
            <a class="d-flex h-100 bg-cover" href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="">
                <img class="<?php if($js && in_array('Lazy Load', $js)): echo 'lazyload '; else: endif; ?>card-img-top" src="<?php if(has_post_thumbnail()): the_post_thumbnail_url('post_square_large'); else: echo $post_default_featured_image['url']; endif; ?>" alt="<?php if(has_post_thumbnail()): the_title_attribute(); else: echo $news_default_featured_image['alt']; endif; ?>" />
            </a>
        </div><!-- .col -->
        <div class="col py-4 px-3">
            <div class="card-body">
                <h2 class="card-title"><a href="<?php echo get_permalink(); ?>">
                <?php
                if ($post_headline) {
                    echo $post_headline;
                } else {
                    echo get_the_title($post->ID);
                }
                ?>
                </a></h3>
                <span class="d-inline d-md-none d-lg-inline"><?php the_excerpt(); ?></span>
            </div><!-- .card-body -->
            <div class="card-footer">
                <div class="row justify-content-start">
                    <div class="col d-flex align-items-center">
                        <a class="btn" href="<?php echo get_permalink(); ?>" rel="nofollow">Read More</a>
                        <ul class="share-list justify-content-start m-0 ml-4">
                            <li><a class="share-email" href="mailto:?subject=Cary Street Partners: <?php the_title(); ?>&body=Thought you might enjoy reading this: <?php the_permalink( $post->ID ); ?>"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .card-footer -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .card -->
<?php wp_reset_postdata(); ?>
