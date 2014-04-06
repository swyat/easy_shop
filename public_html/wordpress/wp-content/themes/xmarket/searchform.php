<?php
/**
 * The template for displaying search forms in Blanco
 *
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search entire store here...', ETHEME_DOMAIN ); ?>" />
        <input type="submit" value="<?php esc_attr_e( 'Go', ETHEME_DOMAIN ); ?>" class="button" />
	</form>
