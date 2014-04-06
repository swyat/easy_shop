<?php
/**
 * Empty Cart Page
 */
?>

<p><?php _e('Your cart is currently empty.', 'woocommerce') ?></p>

<?php do_action('woocommerce_cart_is_empty'); ?>

<p><a class="button" href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><span><?php _e('&larr; Return To Shop', 'woocommerce') ?></span></a></p>