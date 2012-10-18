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

	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<div class="container">
	          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </a>
	          <a class="brand" href="<?php echo home_url(); ?>" rel="nofollow">
	            <img src="<?php echo get_stylesheet_directory_uri()?>/img/bstlogo.png" class="logo hidden-phone"/> 
	            <?php bloginfo('name'); ?>
	          </a>	
	          <div class="nav-collapse collapse">	
	          		
				<?php
					
					$args = array(
						'theme_location' => 'top-bar',
						'depth'		 => 1,
						'container'	 => false,
						'menu_class'	 => 'nav'
					);

					wp_nav_menu($args);
					
				?>

				</div>
			</div>
		</div>
	</div>