<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper wrapper-main-navbar<?php if($wrapper_class): echo ' ' . $wrapper_class; endif; ?>" id="wrapper-main-navbar" <?php if($wrapper_background_color || $wrapper_background_image): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?><?php if($wrapper_background_color && $wrapper_background_image): echo '; '; endif; ?><?php if($wrapper_background_image): echo 'background-image: url(' . $wrapper_background_image['url'] . ')'; endif ?>"<?php endif; ?> itemscope itemtype="http://schema.org/WebSite">
	<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
	<nav class="navbar navbar-expand-lg navbar-brand-center-lg<?php if($header_navbar_class): echo ' ' . $header_navbar_class; endif; ?>">
		<div class="<?php if(($container_fluid) == true): echo 'container-fluid'; else: echo 'container px-sm-2'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>" <?php if($container_background_color || $container_background_image): ?>style="<?php if($container_background_color): echo 'background-color: ' . $container_background_color; endif; ?><?php if($container_background_color && $container_background_image): echo '; '; endif; ?><?php if($container_background_image): echo 'background-image: url(' . $container_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
			<!-- Your site title as branding -->
			<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php if($site_primary_logo_svg): ?>
					<img src="<?php echo $site_primary_logo_svg['url']; ?>" alt="<?php bloginfo( 'name' );?>" class="logo" width="auto" height="auto" data-no-retina>
				<?php elseif($site_primary_logo): ?>
					<img src="<?php echo $site_primary_logo['url']; ?>" alt="<?php bloginfo( 'name' );?>" class="logo" width="300" height="auto" data-no-retina>
				<?php else: ?>
					<?php bloginfo( 'name' );?>
				<?php endif; ?>
			</a>
			<button class="navbar-toggler navbar-toggler-right d-none" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
			</button>
			<!-- The WordPress Menu goes here -->
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'main-navbar',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'navbarNavDropdown',
					'menu_class'      => 'navbar-nav justify-content-center',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'walker'          => new understrap_WP_Bootstrap_Navwalker(),
				)
			); ?>
			<?php
			// the loop
			// check if the flexible content field has rows of data
			if(have_rows('main_navbar_content')):
				// loop through the rows of data
				while(have_rows('main_navbar_content')):the_row();
					if( get_row_layout() == 'button' ):
						get_template_part( 'loop-templates/page-modules/content-blocks/button', 'block' );
					elseif( get_row_layout() == 'search' ):
						get_template_part( 'loop-templates/page-modules/content-blocks/search', 'block' );
					endif;
				endwhile;
			else:
				// no layouts found
			// end the loop
			endif;
			wp_reset_query();
			?>
		</div><!-- .container -->
	</nav><!-- .site-navigation -->
</div><!-- .wrapper -->