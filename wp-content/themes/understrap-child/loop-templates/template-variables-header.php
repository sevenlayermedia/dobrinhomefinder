<?php include(locate_template('inc/acf-variables.php')); ?>
<!-- enqueue css & js -->
<?php if( $css && in_array('Animate', $css) ): // animate.css ?>
    <link rel='stylesheet' type='text/css' href='<?php echo get_stylesheet_directory_uri() . '/css/animate.min.css'; ?>'></script>
<?php endif; ?>