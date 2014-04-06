<?php
/**
 * Single Product Image
 */

global $post, $woocommerce;

$product_layout = etheme_get_option('product_layout');
$mainHeight = 400;
$imgId = get_post_thumbnail_id();
$crop = (get_option('woocommerce_single_image_crop') == 1) ? true : false;
if($product_layout == 'horizontal') { 
    $mainWidth = 482;
}else if ($product_layout == 'vertical' || $product_layout == 'universal'){
    $mainWidth = 330;
}else{
    $mainWidth = 400;
}

wp_enqueue_style("cloud-zoom",get_template_directory_uri().'/css/cloud-zoom.css');
wp_enqueue_script('cloud-zoom', get_template_directory_uri().'/js/cloud-zoom.1.0.2.js');

?>
<div class="product-images images">
    <?php etheme_wc_product_labels(); ?>
	<?php if ( has_post_thumbnail() ) : ?>
        <div class="main-image" style="position:relative;">
            <a itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" id="zoom1" class="cloud-zoom zoom" cloud-zoom-data="adjustX: 10, adjustY:-4" rel="thumbnails" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>">
                <img class="attachment-shop_single wp-post-image" src="<?php echo etheme_get_image( $imgId, $mainWidth, $mainHeight, $crop ) ?>"  />
            </a>
        </div>
	<?php else : ?>
	
		<img width="<?php echo $mainWidth ?>" height="<?php echo $mainHeight ?>" src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" />
	
	<?php endif; ?>

	<?php do_action('woocommerce_product_thumbnails'); ?>
    <div class="clear"></div>
</div>