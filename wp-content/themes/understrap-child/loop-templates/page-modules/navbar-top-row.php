<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
include(locate_template('inc/acf-variables.php'));
?>
<div class="wrapper wrapper-top-navbar<?php if($wrapper_class): echo ' ' . $wrapper_class; endif; ?>" id="wrapper-top-navbar" <?php if($wrapper_background_color || $wrapper_background_image): ?>style="<?php if($wrapper_background_color): echo 'background-color: ' . $wrapper_background_color; endif; ?><?php if($wrapper_background_color && $wrapper_background_image): echo '; '; endif; ?><?php if($wrapper_background_image): echo 'background-image: url(' . $wrapper_background_image['url'] . ')'; endif ?>"<?php endif; ?> itemscope itemtype="http://schema.org/WebSite">
	<nav class="navbar navbar-expand-md w-100 justify-content-between<?php if($header_navbar_class): echo ' ' . $header_navbar_class; endif; ?>">
		<div class="<?php if(($container_fluid) == true): echo 'container-fluid'; else: echo 'container'; endif; ?><?php if($container_class): echo ' ' . $container_class; endif; ?>" <?php if($container_background_color || $container_background_image): ?>style="<?php if($container_background_color): echo 'background-color: ' . $container_background_color; endif; ?><?php if($container_background_color && $container_background_image): echo '; '; endif; ?><?php if($container_background_image): echo 'background-image: url(' . $container_background_image['url'] . ')'; endif ?>"<?php endif; ?>>
			<!-- The WordPress Menu goes here -->
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'top-navbar',
					'container_class' => 'container-top-navbar',
					'container_id'    => 'top-navbarNavDropdown',
					'menu_class'      => 'top-navbar',
					'fallback_cb'     => '',
					'menu_id'         => 'top-navbar',
					'walker'          => new understrap_WP_Bootstrap_Navwalker(),
				)
			); ?>
		</div><!-- .container -->
	</nav><!-- .site-navigation -->
</div><!-- .wrapper -->