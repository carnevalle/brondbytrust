<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $post, $woocommerce;

?>
<div class="images">
<ul class="thumbnails">
    <li class="span4">

	<?php if ( has_post_thumbnail() ) : ?>

		
		<a itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="zoom thumbnail" rel="thumbnails" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>"><?php echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) ) ?></a>
		</li>
	<?php else : ?>

		<img src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" class="thumbnail"/>

	<?php endif; ?>

	</li>
</ul>
	<?php do_action('woocommerce_product_thumbnails'); ?>

</div>