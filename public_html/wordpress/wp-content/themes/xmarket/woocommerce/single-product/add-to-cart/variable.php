<?php
/**
 * Variable Product Add to Cart
 */
 
global $woocommerce, $product, $post;
?>
<script type="text/javascript">
    var product_variations = <?php echo json_encode($available_variations) ?>;
</script>

<?php do_action('woocommerce_before_add_to_cart_form'); ?>
<div class="addto-container">
<form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="variations_form cart" method="post" enctype='multipart/form-data'>
	<table class="variations" cellspacing="0">
		<tbody>
			<?php $loop = 0; foreach ( $attributes as $name => $options ) : $loop++; ?>
				<tr>
					<td class="label">
                        <label for="<?php echo sanitize_title($name); ?>"><?php echo $woocommerce->attribute_label($name); ?></label>
                        <select id="<?php echo esc_attr( sanitize_title($name) ); ?>" name="attribute_<?php echo sanitize_title($name); ?>">
						<option value=""><?php echo __('Choose an option', 'woocommerce') ?>&hellip;</option>
						<?php 
							if ( is_array( $options ) ) {
							
								if ( empty( $_POST ) )
									$selected_value = ( isset( $selected_attributes[ sanitize_title( $name ) ] ) ) ? $selected_attributes[ sanitize_title( $name ) ] : '';
								else
									$selected_value = isset( $_POST[ 'attribute_' . sanitize_title( $name ) ] ) ? $_POST[ 'attribute_' . sanitize_title( $name ) ] : '';

								// Get terms if this is a taxonomy - ordered
								if ( taxonomy_exists( sanitize_title( $name ) ) ) {

									$terms = get_terms( sanitize_title($name), array('menu_order' => 'ASC') );
	
									foreach ( $terms as $term ) {
										if ( ! in_array( $term->slug, $options ) ) continue;
										echo '<option value="' . $term->slug . '" ' . selected( $selected_value, $term->slug ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name ) . '</option>';
									}
								} else {
									foreach ( $options as $option )
										echo '<option value="' . $option . '" ' . selected( $selected_value, $option ) . '>' . apply_filters( 'woocommerce_variation_option_name', $option ) . '</option>';
								}
							}
						?>
					</select> <?php
						if ( sizeof($attributes) == $loop )
							echo '<a class="reset_variations" href="#reset">'.__('Clear selection', 'woocommerce').'</a>';
					?></td>
				</tr>
	        <?php endforeach;?>
		</tbody>
	</table>

	<?php do_action('woocommerce_before_add_to_cart_button'); ?>

	<div class="single_variation_wrap" style="display:none;">
		<div class="single_variation"></div>
		<div class="variations_button">
			<input type="hidden" name="variation_id" value="" />
			<?php woocommerce_quantity_input(); ?>
			<button type="submit" class="button big active"><span><?php echo apply_filters('single_add_to_cart_text', __('Add to cart', 'woocommerce'), $product->product_type); ?></span></button>
		</div>
	</div>
	<div><input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" /></div>

	<?php do_action('woocommerce_after_add_to_cart_button'); ?>

</form>
</div>
<div class="clear"></div>
<hr/>
<?php do_action('woocommerce_after_add_to_cart_form'); ?>
