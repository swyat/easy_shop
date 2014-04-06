<?php
/**
 * Single Product Price, including microdata for SEO
 */

global $post, $product;
?>
<div class="main-info">               
    <div class="price-block">   
        <?php echo $product->get_price_html(); ?>
    </div>	   
    <div class="product-stock">
    	<?php if ( $product->is_type( array( 'simple', 'variable' ) ) && get_option('woocommerce_enable_sku') == 'yes' && $product->get_sku() ) : ?>
    		<span class="product-code"><?php _e('SKU:', 'woocommerce'); ?> <span><?php echo $product->get_sku(); ?></span></span>
    	<?php endif; ?>
        <br />
        
        <?php
        	// Availability
        	$availability = $product->get_availability();
        	
        	if ($availability['availability']) :
        		echo apply_filters( 'woocommerce_stock_html', '<span class="stock in-stock">'.__('Availability:', 'woocommerce').' <span>'.$availability['availability'].'</span></span>', $availability['availability'] );
            endif;
        ?>        

    </div>
    <div class="clear"></div>
</div>
<hr />