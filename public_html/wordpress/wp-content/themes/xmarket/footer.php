<?php
/**
 * The template for displaying the footer.
 *
 
 */
?>

    </div>
    </div>
    <div id="prefooter-container">
        <?php if ( !is_active_sidebar( 'before-prefooter-widget-area' ) ) : ?>
            <div class="before-prefooter">
                <ul class="links fl-l">
                    <li><a href="#">Site Map</a></li>
                    <li><a href="#">Search Terms</a></li>
                    <li><a href="#">Advanced Search</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
                <ul class="links fl-r">
                    <li><a href="#">Site Map</a></li>
                    <li><a href="#">Search Terms</a></li>
                    <li><a href="#">Advanced Search</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
                <div class="clear"></div>
            </div>
        <?php else: ?>
            <div class="before-prefooter">
                <?php dynamic_sidebar( 'before-prefooter-widget-area' ); ?>
                <div class="clear"></div>
            </div>
        <?php endif; ?>  
        <div id="prefooter">
            <?php if ( etheme_get_option('prefooter') ) : ?>
                <div class="socials">
                        <?php
                            $facebook_url = etheme_get_option('facebook_url');
                            $twitter_url = etheme_get_option('twitter_url');
                            $rss_url = etheme_get_option('rss_url');
                            if($facebook_url || $twitter_url || $rss_url):
                        ?>
                        <div class="follow-us">
                            <?php if($facebook_url): ?><div><a href="<?php echo $facebook_url; ?>"><img alt="" src="<?php echo get_template_directory_uri() ?>/images/assets/fb.png" /></a></div><?php endif; ?>
                            <?php if($twitter_url): ?><div><a href="<?php echo $twitter_url; ?>"><img alt="" src="<?php echo get_template_directory_uri() ?>/images/assets/twitter.png" /></a></div><?php endif; ?>
                            <?php if($rss_url): ?><div><a href="<?php echo $rss_url; ?>"><img alt="" src="<?php echo get_template_directory_uri() ?>/images/assets/vimeo.png" /></a></div><?php endif; ?>
                        </div>
                        <?php endif; ?>
                    
                    <?php if(etheme_get_option('shipp_text') != ''): ?>
                        <div class="fl-r shippings">
                            <?php etheme_option('shipp_text') ?>
                        </div>
                    <?php endif; ?>
                    <div class="clear"></div>
                </div>
            <?php else: ?>
                    <?php dynamic_sidebar( 'prefooter-area' ); ?>
            <?php endif; ?>

            <div class="clear"></div>

                <div class="footer-information">
                    <div class="two-third">
                        <div class="col4-set">
                            <div class="col-1">
                                <?php if ( !is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
                                    <h5>Our Offers</h5>
                                    <ul>
                                        <li><a href="#">New products</a></li>
                                        <li><a href="#">Top sellers</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Manufacturers</a></li>
                                        <li><a href="#">Suppliers</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Customer Service</a></li>
                                    </ul>
                                <?php else: ?>
                                    <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                                <?php endif; ?> 
                            </div>
                            <div class="col-2">
                                <?php if ( !is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
                                    <h5>Shipping Info</h5>
                                    <ul>
                                        <li><a href="#">New products</a></li>
                                        <li><a href="#">Top sellers</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Manufacturers</a></li>
                                        <li><a href="#">Suppliers</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Customer Service</a></li>
                                    </ul>
                                <?php else: ?>
                                    <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                                <?php endif; ?> 
                            </div>
                            <div class="col-3">
                                <?php if ( !is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
                                    <h5>Our Account</h5>
                                    <ul>
                                        <li><a href="#">New products</a></li>
                                        <li><a href="#">Top sellers</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Manufacturers</a></li>
                                        <li><a href="#">Suppliers</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Customer Service</a></li>
                                    </ul>
                                <?php else: ?>
                                    <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
                                <?php endif; ?> 
                            </div>
                            <div class="col-4">
                                <?php if ( !is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
                                    <h5>Our Support</h5>
                                    <ul>
                                        <li><a href="#">New products</a></li>
                                        <li><a href="#">Top sellers</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Manufacturers</a></li>
                                        <li><a href="#">Suppliers</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Customer Service</a></li>
                                    </ul>
                                <?php else: ?>
                                    <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
                                <?php endif; ?>   
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="one-third fl-r last" style="width: 270px;">          
                        <?php if ( is_active_sidebar( 'footer-time-area' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-time-area' ); ?>
                        <?php else : ?>
                    		<h5 class="widget-title"><?php _e( 'Twitter', ETHEME_DOMAIN ); ?></h5>
                			<?php 
                            echo etheme_print_tweets();
                			?>
                        <?php endif; ?>
                    </div>
                    <div class="clear"></div>
                </div><!-- footer-information -->
        </div><!-- prefooter -->   
    </div>
    <div id="footer-container">
            <footer id="footer">
                <div class="copyright">
                    <div class="fl-l links">
                        <?php if ( !is_active_sidebar( 'copyrights-area' ) ) : ?>
                            <ul class="links">
                                <li><a href="#">Site Map</a></li>
                                <li><a href="#">Search Terms</a></li>
                                <li><a href="#">Advanced Search</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        <?php else: ?>
                            <?php dynamic_sidebar( 'copyrights-area' ); ?>
                        <?php endif; ?>  
                        <p><?php etheme_option('copyright') ?></p> 
                    </div>
                    <div class="fl-r">
                        <?php if ( !is_active_sidebar( 'payments-area' ) ) : ?>
                            <img alt="" src="<?php echo get_template_directory_uri() ?>/images/assets/payments.png" />
                        <?php else: ?>
                            <?php dynamic_sidebar( 'payments-area' ); ?>
                        <?php endif; ?>    
                    </div>
                    <div class="clear"></div>
                </div><!-- copyright -->
                <?php if(etheme_get_option('to_top')): ?>
                    <div id="back-to-top"><a href="#top" id="top-link"><?php _e('Back to top', ETHEME_DOMAIN); ?></a></div>
                <?php endif ;?>    
            </footer>
    </div>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>