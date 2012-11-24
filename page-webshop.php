<?php
/**
 * Template Name: Page Webshop
 */
?>
<?php get_header(); ?>

<div class="main">
	<div class="container">
		<div class="row">
			<div class="span8">
				<div class="round-text-box post">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h2><?php the_title(); ?></h2>

						<?php the_content(); ?>

						<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>

						<?php comments_template(); ?>

				    <?php endwhile; else : ?>
				
						<h2><?php _e("Oops, Post Not Found!", "brondbytrusttheme"); ?></h2>
				
				    <?php endif; ?>

				</div> 
			</div>
			<div class="span4">
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


	            <div class="product-table sidebar">

					<?php while ($query->have_posts()) : $query->the_post(); global $product; ?>
		              <div>
		                <div>
		                	<div class="productname"><?php the_title() ?></div>
		                	<a href="<?php the_permalink() ?>">	
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('shop_fanaktie');
								} else {
									echo '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="'.$woocommerce->get_image_size( 'shop_fanaktie' ).'" height="'.$woocommerce->get_image_size( 'shop_thumbnail' ).'" />';
								} ?>
			                  <div class="pricetag"><?php echo $product->get_price_html() ?></div>
		                  	</a>

							<?php

								switch ( $product->product_type ) {
									case "variable" :
										$link 	= apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
										$label 	= apply_filters( 'variable_add_to_cart_text', __('Select options', 'woocommerce') );
									break;
									case "grouped" :
										$link 	= apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
										$label 	= apply_filters( 'grouped_add_to_cart_text', __('View options', 'woocommerce') );
									break;
									case "external" :
										$link 	= apply_filters( 'external_add_to_cart_url', get_permalink( $product->id ) );
										$label 	= apply_filters( 'external_add_to_cart_text', __('Read More', 'woocommerce') );
									break;
									default :
										$link 	= apply_filters( 'add_to_cart_url', esc_url( $product->add_to_cart_url() ) );
										$label 	= apply_filters( 'add_to_cart_text', __('Add to cart', 'woocommerce') );
									break;
								}

								printf('<a href="%s" rel="nofollow" data-product_id="%s" class="btn btn-bstlightblue add_to_cart_button button product_type_%s">%s</a>', $link, $product->id, $product->product_type, $label);

							?>		                  	
		                </div>
		              </div>					

					<?php endwhile; ?>
					</div>

			<?php
		}

      	?>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>