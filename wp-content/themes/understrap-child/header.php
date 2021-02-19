<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */
$container = get_theme_mod( 'understrap_container_type' );
include(locate_template('inc/acf-variables.php'));
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php if($applications && in_array('Google Tag Manager', $applications)): // check for google tag manager option ?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','<?php echo $application_google_tag_manager; ?>');</script>
		<!-- End Google Tag Manager -->
	<?php endif; ?>
	<?php if($applications && in_array('Google Analytics', $applications)): // check for google tag manager option ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $application_google_analytics_id; ?>"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', '<?php echo $application_google_analytics_id; ?>');
		</script>
	<?php endif; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<!-- <meta name="msapplication-TileColor" content="#006a99">
	<meta name="msapplication-config" content="<?php echo get_stylesheet_directory_uri(); ?>/images/browserconfig.xml">
	<meta name="theme-color" content="#006a99">
	<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/manifest.json"> -->
	<?php if($favicon_180x180): ?><link rel="apple-touch-icon" sizes="180x180" href="<?php echo $favicon_180x180; ?>"><?php endif; ?>
	<?php if($favicon_32x32): ?><link rel="icon" type="image/png" sizes="32x32" href="<?php echo $favicon_32x32; ?>"><?php endif; ?>
	<?php if($favicon_16x16): ?><link rel="icon" sizes="16x16" href="<?php echo $favicon_16x16; ?>"><?php endif; ?>
	<!-- <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/safari-pinned-tab.svg" color="#2b4a6f">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"> -->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Staatliches&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<?php get_template_part( 'loop-templates/template-variables', 'header' ); ?>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body <?php body_class(); ?>>
	<?php if($applications && in_array('Google Tag Manager', $applications)): // check for google tag manager option ?>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $application_google_tag_manager; ?>"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
	<?php endif; ?>
	<div class="hfeed site" id="page">
	<?php
	// alert bar
	if(have_rows('header_content', 'option')):
		// loop through the rows of data
		while(have_rows('header_content', 'option')):the_row();
			// check if the layout has rows of data
			if( get_row_layout() == 'alert_bar' ):
				get_template_part( 'loop-templates/page-modules/alert', 'row' );
			endif;
		endwhile;
	endif;
	wp_reset_query();
	?>
	<?php
	// navbar loop
	// check if the flexible content field has rows of data
	if(have_rows('header_content', 'option')):
		// loop through the rows of data
		while(have_rows('header_content', 'option')):the_row();
			// check if the layout has rows of data
			if( get_row_layout() == 'top_navbar' ):
				get_template_part( 'loop-templates/page-modules/navbar-top', 'row' );
			elseif( get_row_layout() == 'main_navbar' ):
				get_template_part( 'loop-templates/page-modules/navbar-main', 'row' );
			endif;
		endwhile;
	endif;
	wp_reset_query();
	// jumbotron loop
	if(have_rows('page_header_content')):
		// loop through the rows of data
		while(have_rows('page_header_content')):the_row();
			// check if the layout has rows of data
			if( get_row_layout() == 'hero_static' ):
				get_template_part( 'loop-templates/page-modules/hero-static', 'row' );
			elseif( get_row_layout() == 'hero_slider' ):
				get_template_part( 'loop-templates/page-modules/hero_slider', 'row' );
			endif;
		endwhile;
	elseif(have_rows('header_content', 'option')):
		// loop through the rows of data
		while(have_rows('header_content', 'option')):the_row();
			if( get_row_layout() == 'hero_static' ):
				get_template_part( 'loop-templates/page-modules/hero-static', 'row' );
			elseif( get_row_layout() == 'hero_slider' ):
				get_template_part( 'loop-templates/page-modules/hero-slider', 'row' );
			endif;
		endwhile;
	endif;
	wp_reset_query();
	// call to action loop
	if(have_rows('page_header_content')):
		// loop through the rows of data
		while(have_rows('page_header_content')):the_row();
			// check if the layout has rows of data
			if( get_row_layout() == 'cta' ):
				get_template_part( 'loop-templates/page-modules/cta', 'row' );
			endif;
		endwhile;
	elseif(have_rows('header_content', 'option')):
		// loop through the rows of data
		while(have_rows('header_content', 'option')):the_row();
			if( get_row_layout() == 'cta' ):
				get_template_part( 'loop-templates/page-modules/cta', 'row' );
			endif;
		endwhile;
	endif;
	wp_reset_query();
	?>
