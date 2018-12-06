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
		
                
                <div id="custom-company-text-footer" class="custom-company-text-wrapper">
                    <div class="custom-company-text-inner-block">
                        <p>Real Estate</p>
                        <p>Business</p>
                        <p>Resolutions</p>
                        <p>Property Management</p>
                    </div>
                </div>
                
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_id' => 'footer-menu', 'menu_class' => 'nav-menu' ) ); ?>
                <div class="top-jump-wrapper">
                    <a href="#top" class="top-jump"><button>&#94; Top</button></a>
                </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
