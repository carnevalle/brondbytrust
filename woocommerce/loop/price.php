<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product;
?>

<?php if ($price_html = $product->get_price_html()) : ?>
	<a href="<?php the_permalink(); ?>">
	<div class="price pricetag"><div class="inner"><?php echo $price_html; ?></div></div>
	</a>
<?php endif; ?>