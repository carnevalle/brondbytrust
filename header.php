<!doctype html>  

<html <?php language_attributes(); ?>>
  	<head>
	    <meta charset="utf-8">

		<title><?php
			/*
			 * Print the <title> tag based on what is being viewed.
			 */
			global $page, $paged;

			wp_title( '|', true, 'right' );

			// Add the blog name.
			bloginfo( 'name' );

			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";

			// Add a page number if necessary:
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

			?></title>
		<!-- <title><?php wp_title(''); ?> | <?php bloginfo('name'); ?></title> -->

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
	            <img src="<?php echo get_stylesheet_directory_uri()?>/img/bstlogo-50px.png" class="logo hidden-phone"/> 
	            <span class="sitename"><?php bloginfo('name'); ?></span>
	          </a>	
	          <div class="nav-collapse collapse">	
	          		
				<?php
					$args = array(
						'theme_location' => 'main-menu',
						'depth'		 => 2,
						'container'	 => false,
						'menu_class'	 => 'nav',
						'items_wrap' => '%3$s',
						'walker'	 => new Bootstrap_Walker_Nav_Menu()
					);
				?>
					

					<ul class="nav">
						<?php wp_nav_menu($args); ?>
					</ul>

					<?php if(!is_page( "cart" ) && !is_page( "checkout" )): ?>
					<?php global $woocommerce; ?>
					<div class="shopping-cart-desktop visible-desktop">
						<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
							<i class="icon-shopping-cart icon-white"></i>
							<?php
								if($woocommerce->cart->cart_contents_count > 0){
									echo sprintf(_n('%d stk', '%d stk', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); 
								}else{
									echo "Ingen varer i kurv";
								}
							?>
						</a>
					</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>

	<?php if(!is_page( "cart" ) && !is_page( "checkout" )): ?>
	<?php global $woocommerce; ?>

	<div class="shopping-cart-mobile hidden-desktop">
		<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
			<i class="icon-shopping-cart icon-white"></i>
			<?php
				if($woocommerce->cart->cart_contents_count > 0){
					echo sprintf(_n('%d stk', '%d stk', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); 
				}else{
					echo "Ingen varer i kurv";
				}
			?>
		</a>
	</div>
	<?php endif; ?>
