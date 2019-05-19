<?php
/**
 * Template Name: Login Page
 *
 * @package WordPress
 * @subpackage proper-tea
 * @since proper-tea 0.1
 */

get_header(); ?>
    <div class = "log-in-page-wrap" style="background-image: url(<?php echo get_template_directory_uri().'/bg-images/mesa-lookout.jpg' ?>)">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php 
                        if( !is_user_logged_in() ):
                            if ( is_active_sidebar( 'residents_login_1' ) ) : ?>
                                    <div id="primary-sidebar" class="resident-login-sidebar widget-area" role="complementary">
                                            <?php dynamic_sidebar( 'residents_login_1' ); ?>
                                    </div><!-- #residents_login_area -->
                            <?php 
                            endif;
                        endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
    </div><!-- .information-page-wrap -->  
<?php
get_footer();


