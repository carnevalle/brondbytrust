<?php
/**
 * Template Name: Fanaktier
 */
?>
<?php get_header(); ?>

<div class="main">
      <div class="container">

      	<?php

		global $woocommerce;

		// Setup product query
		$query_args = array(
			'post_type'      => 'product',
			'post_status'    => 'publish',
			'product_cat' => 'fanaktier',
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
	              <h1 style="text-align: center;">Køb din favorit eller køb dem alle!</h1>
	            <div class="product-table">

					<?php while ($query->have_posts()) : $query->the_post(); global $product; ?>
		              <div>
		                <div>
		                	<div class="productname"><?php the_title() ?></div>
		                	<a href="<?php the_permalink() ?>">	
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('shop_fanaktie');
								} else {
									echo '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="'.$woocommerce->get_image_size( 'shop_thumbnail_image_width' ).'" height="'.$woocommerce->get_image_size( 'shop_thumbnail_image_height' ).'" />';
								} ?>
			                  <div class="pricetag"><?php echo $product->get_price_html() ?></div>
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