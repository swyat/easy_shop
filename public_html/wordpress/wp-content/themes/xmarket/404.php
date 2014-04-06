<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */

get_header(); ?>

        <section id="main" class="columns2-left">
            <aside id="sidebar">
                <?php get_sidebar(); ?>
            </aside>
            <div class="content">
                    <h1 class="notFound"><?php _e('whoo<strong>404</strong>ps!', ETHEME_DOMAIN); ?></h1>
    				
    				<h3>Page not found</h3>
    				
    				<p><?php _e('The page you are looking for could not be found.', ETHEME_DOMAIN); ?> <br />
                    <?php _e('Please try again using our navigation menu or follow the links in the list below.', ETHEME_DOMAIN); ?></p>
    
    				<ul class="circle dotted">
    					<li><?php _e('Praesent id metus massa, ut blandit odio', ETHEME_DOMAIN); ?></li>
    					<li><?php _e('Etiam at risus et justo dignissim congue', ETHEME_DOMAIN); ?></li>
    					<li><?php _e('A porttitor lectus condimentum laoreet', ETHEME_DOMAIN); ?></li>
    					<li><?php _e('Quisque eget odio ac lectus vestibulum', ETHEME_DOMAIN); ?></li>
    				</ul>
			</div><!-- #content -->
            <div class="clear"></div>
		</section><!-- #container -->

<?php get_footer(); ?>