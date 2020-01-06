<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Proper_Tea
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		
                
                
            
                <div class="footer-site-menu-wrap footer-menu-wrap">
                    <h3>Site</h3>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer-site-menu', 'menu_id' => 'footer-site-menu', 'menu_class' => 'footer-nav-menu' ) ); ?>
                </div>
                <!---.footer-site-menu-wrap-->
                <div class="footer-account-menu-wrap footer-menu-wrap">
                    <h3>Account</h3>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer-account-menu', 'menu_id' => 'footer-account-menu', 'menu_class' => 'footer-nav-menu' ) ); ?>
                </div>
                <!--.footer-account-menu-wrap-->
                    
                
                <div class="top-jump-wrapper">
                    <a href="#top" class="top-jump"><button>&#94; Top</button></a>
                </div>
                
                <div id="custom-company-text-footer" class="custom-company-text-wrapper">
                    <div class="custom-company-text-inner-block">
                        <p>Real Estate</p>
                        <p>Business</p>
                        <p>Resolutions</p>
                        <p>Property Management</p>
                    </div>
                </div>
                
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
