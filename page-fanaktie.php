<?php
/**
 * Template Name: Fanaktier
 */
?>
<?php get_header(); ?>

<script>

	
	var fanshares = {};

	fanshares['mikkel-thygesen'] = {
      method: 'feed',
      link: 'http://www.brondbytrust.dk/shop/mikkel-thygesen/',
      picture: 'http://www.brondbytrust.dk/assets/fanaktie-thygesen.jpg',
      name: 'Jeg er stolt ejer af en Mikkel Thygesen Fan-aktie',
      caption: '',
      description: 'Mit køb af denne fan-aktie symboliserer mit bidrag til kampen for at bringe Brøndby IF tilbage til toppen af dansk fodbold.'
    };

	fanshares['kim-vilfort'] = {
      method: 'feed',
      link: 'http://www.brondbytrust.dk/shop/kim-vilfort/',
      picture: 'http://www.brondbytrust.dk/assets/fanaktie-vilfort.jpg',
      name: 'Jeg er stolt ejer af en Kim Vilfort Fan-aktie',
      caption: '',
      description: 'Mit køb af denne fan-aktie symboliserer mit bidrag til kampen for at bringe Brøndby IF tilbage til toppen af dansk fodbold.'
    };

	fanshares['per-nielsen'] = {
      method: 'feed',
      link: 'http://www.brondbytrust.dk/shop/per-nielsen/',
      picture: 'http://www.brondbytrust.dk/assets/fanaktie-nielsen.jpg',
      name: 'Jeg er stolt ejer af en Per Nielsen Fan-aktie',
      caption: '',
      description: 'Mit køb af denne fan-aktie symboliserer mit bidrag til kampen for at bringe Brøndby IF tilbage til toppen af dansk fodbold.'
    };    

	fanshares['dan-eggen'] = {
      method: 'feed',
      link: 'http://www.brondbytrust.dk/shop/dan-eggen/',
      picture: 'http://www.brondbytrust.dk/assets/fanaktie-dan-eggen.jpg',
      name: 'Jeg er stolt ejer af en Dan Eggen Fan-aktie',
      caption: '',
      description: 'Mit køb af denne fan-aktie symboliserer mit bidrag til kampen for at bringe Brøndby IF tilbage til toppen af dansk fodbold.'
    };

	fanshares['ebbe-sand'] = {
      method: 'feed',
      link: 'http://www.brondbytrust.dk/shop/ebbe-sand/',
      picture: 'http://www.brondbytrust.dk/assets/fanaktie-sand.jpg',
      name: 'Jeg er stolt ejer af en Ebbe Sand Fan-aktie',
      caption: '',
      description: 'Mit køb af denne fan-aktie symboliserer mit bidrag til kampen for at bringe Brøndby IF tilbage til toppen af dansk fodbold.'
    };    

	jQuery(function() {
		jQuery(".sharetofacebook").click(function(e){

			var obj = fanshares[e.currentTarget.id];

			if(typeof obj != undefined ){
				console.log(obj);
				FB.ui(obj, function(response){
				    if (response && response.post_id) {
				      jQuery("#event-container").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Fan-aktien er delt på din Facebook-væg </div>');
				    }
				});
			}

			e.preventDefault();
		});
	});
</script>

<div class="main">
      <div class="container">

      	<div id="event-container">

      	</div>

      	<?php

		global $woocommerce;

		// Setup product query
		$query_args = array(
			'post_type'      => 'product',
			'post_status'    => 'publish',
			'product_cat' => 'fan-aktier',
			'posts_per_page' => 10,
			'no_found_rows'  => 1,
			'meta_key' 	=> '_price',
			'orderby' 	=> 'meta_value_num',
			'order'		=> 'asc'			
		);

		$query_args['meta_query'] = array();

		if ( ! $instance['show_variations'] ) {
			$query_args['meta_query'][] = $woocommerce->query->visibility_meta_query();
			$query_args['post_parent'] = 0;
		}

	    $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();

		$query = new WP_Query( $query_args );

		if ( $query->have_posts() ) {

			if ( '' !== $title ) {
				$title;
			} ?>

	        <div class="row">
	          <div class="span12">
	              <h1 style="text-align: center;">Del dine Fan-aktier på Facebook!</h1>
	            <div class="product-table">

					<?php while ($query->have_posts()) : $query->the_post(); global $product; ?>
		              <div>
		                <div>
		                	<div class="productname transparent"><?php the_title() ?></div>
		                	<a href="#" id="<?php echo( basename(get_permalink()) ); ?>" class="sharetofacebook">	
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('shop_fanaktie');
								} else {
									echo '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="'.$woocommerce->get_image_size( 'shop_thumbnail_image_width' ).'" height="'.$woocommerce->get_image_size( 'shop_thumbnail_image_height' ).'" />';
								} ?>
								<div>Del på Facebook</div>
		                  	</a>
		                </div>
		              </div>					

					<?php endwhile; ?>
					</div>
				</div>
			</div>

			<?php
		}

      	?>
	</div>
</div>
<?php get_footer(); ?>