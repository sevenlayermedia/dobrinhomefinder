<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="col-social-media">
	<ul class="social list-inline text-right">
		<?php if ($social_facebook): // social link ?>
			<li class="list-inline-item"><a href="<?php echo $social_facebook; ?>" class="ico-facebook" title="Facebook" target="blank"><i class="fa fa-facebook-square"></i></a></li>
		<?php endif; ?>
		<?php if ($social_twitter): // social link ?>
			<li class="list-inline-item"><a href="<?php echo $social_twitter; ?>" class="ico-twitter" title="Twitter" target="blank"><i class="fa fa-twitter-square"></i></a></li>
		<?php endif; ?>
		<?php if ($social_linkedin): // social link ?>
			<li class="list-inline-item"><a href="<?php echo $social_linkedin; ?>" class="ico-linkedin" title="LinkedIn" target="blank"><i class="fa fa-linkedin-square"></i></a></li>
		<?php endif; ?>
		<?php if ($social_youtube): // social link ?>
			<li class="list-inline-item"><a href="<?php echo $social_youtube; ?>" class="ico-youtube" title="YouTube" target="blank"><i class="fa fa-youtube-square"></i></a></li>
		<?php endif; ?>
		<?php if ($social_instagram): // social link ?>
			<li class="list-inline-item"><a href="<?php echo $social_instagram;?>" class="ico-instagram" title="Instagram" target="blank"><i class="fa fa-instagram-square"></i></a></li>
		<?php endif; ?>
		<?php if ($social_pinterest): // social link ?>
			<li class="list-inline-item"><a href="<?php echo $social_pinterest; ?>" class="ico-pinterest" title="Pinterest" target="blank"><i class="fa fa-pinterest"></i></a></li>
		<?php endif; ?>
		<?php if ($social_yelp): // social link ?>
			<li class="list-inline-item"><a href="<?php echo $social_yelp; ?>" class="ico-yelp" title="Yelp" target="blank"><i class="fa fa-yelp-square"></i></a></li>
		<?php endif; ?>
		<?php if ($social_foursquare): // social link ?>
			<li class="list-inline-item"><a href="<?php echo $social_foursquare; ?>" class="ico-foursquare" title="Foursquare" target="blank"><i class="fa fa-foursquare"></i></a></li>
		<?php endif; ?>
	</ul>
</div><!-- .col -->