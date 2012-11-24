<?php
/**
 * Show error messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! $errors ) return;
?>
<div class="alert alert-error">
  	<?php foreach ( $errors as $error ) : ?>
		<?php echo $error; ?><br/>
	<?php endforeach; ?>
</div>