<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @package WooCommerce
 * @since WooCommerce 1.6
 */
 
global $product, $post, $woocommerce_loop,$woocommerce;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) 
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) 
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibilty
if ( ! $product->is_visible() ) 
	return; 

// Increase loop count
$woocommerce_loop['loop']++;
 
$columns = etheme_get_option('prodcuts_per_row');
$product_img_hover = etheme_get_option('product_img_hover');

$class = '';
if($woocommerce_loop['loop']%$columns == 0){
    $class = 'last';
}
?>

	<div class="product-grid <?php echo $class; ?>">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		
		<?php woocommerce_get_template( 'loop/sale-flash.php' ); ?>
        
		<?php 
			$placeholder_width = $woocommerce->get_image_size( 'shop_catalog_image_width' );
			$placeholder_height = $woocommerce->get_image_size( 'shop_catalog_image_height' );
            $url = wp_get_attachment_image_src( get_post_thumbnail_id($product->id), array(215,215) );
    		if ( has_post_thumbnail() ){
    			?>
                    <a id="<?php echo etheme_get_image( false, 400, 400, true ) ?>" href="<?php echo the_permalink(); ?>" class="product-image <?php if($product_img_hover == 'tooltip'): ?>imageTooltip<?php endif; ?>">
                        <?php if(etheme_get_custom_field('_etheme_hover') && $product_img_hover == 'swap'): ?><img class="product_image" src="<?php echo etheme_get_custom_field('_etheme_hover'); ?>"/><?php endif; ?>
                        <img class="product_image" <?php if(etheme_get_custom_field('_etheme_hover') && $product_img_hover == 'swap'): ?> onmouseover="hideImage(this)" onmouseout="showImage(this)" <?php endif; ?> src="<?php echo $url[0]; ?>"/>
                    </a>
                <?php
    		}
            else {
                echo '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="' . $placeholder_width . '" height="' . $placeholder_height . '" />';
            }
        
        ?>	
        <div class="product-information">
            <div class="product-name-price">
                <div class="product-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                
                <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
            <div class="clear"></div>
            </div>
            
            <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
            <div class="clear"></div>
        </div>
    <div class="clear"></div>
	</div>
<?php

if($woocommerce_loop['loop']%$columns == 0){
    echo '<div class="clear"></div><hr style="visibility:hidden;"/>';
}