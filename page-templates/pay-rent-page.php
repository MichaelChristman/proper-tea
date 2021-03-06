<?php
/**
 * Template Name: Pay Rent Page
 *
 * @package WordPress
 * @subpackage proper-tea
 * @since proper-tea 0.1
 */
get_header(); ?>
    <div class="rpm-pay-rent-page-wrap <?php if( !is_user_logged_in() ):?>log-in-page-wrap<?php endif;?>"   <?php if( !is_user_logged_in() ):?>style="background-image: url(<?php echo get_template_directory_uri().'/bg-images/mesa-lookout.jpg' ?>)"<?php endif;?>>
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
                        endif; 
                        ?>

                        <?php
                        if( is_user_logged_in() ): 

                                get_template_part( 'template-parts/content', 'pay-rent' );

                        endif; 
                    ?>
		</main><!-- #main -->
	</div><!-- #primary -->
    </div><!--.rpm-pay-rent-page-wrap-->
    <script type="text/javascript">
        CayanCheckout.setWebApiKey("RLKQX5T6CA7VMYNT");
    </script>
<?php

get_footer();
