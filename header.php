<!doctype html>  

<html <?php language_attributes(); ?>>
  	<head>
	    <meta charset="utf-8">

		<title><?php wp_title(''); ?></title>

	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	    <?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>