<?php
/**
 * Single Product Meta
 */

global $post, $product;
?>
<div class="product_meta">
	<?php echo $product->get_categories( ', ', ' <span class="posted_in">'.__('Category:', 'woocommerce').' ', '.</span>'); ?>
	
	<?php echo $product->get_tags( ', ', ' <span class="tagged_as">'.__('Tags:', 'woocommerce').' ', '.</span>'); ?>

</div>