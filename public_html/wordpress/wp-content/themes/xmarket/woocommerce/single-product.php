<?php get_header('shop'); ?>
    <section id="main" class="column1">
        <div class="content">
        	<?php do_action('woocommerce_before_main_content'); ?>
            <a class="back-to" href="javascript: history.go(-1)"><?php _e('Return to Previous Page', ETHEME_DOMAIN); ?></a>
        
        		<?php while ( have_posts() ) : the_post(); ?>
        
        			<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>
        
        		<?php endwhile; // end of the loop. ?>
        
        	<?php do_action('woocommerce_after_main_content'); ?>
		</div><!-- #content -->
        <div class="clear"></div>
	</section><!-- #container -->	
<?php get_footer('shop'); ?>