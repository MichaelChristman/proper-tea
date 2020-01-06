<?php
/**
 * Template Name:My Account Page
 *
 * @package WordPress
 * @subpackage proper-tea
 * @since proper-tea 0.1
 */

get_header(); ?>
        <!--<h3>My Account Template is a go</h3>-->
        <div class="rpm-my-account-wrap <?php if( !is_user_logged_in() ):?>log-in-page-wrap<?php endif;?>"   <?php if( !is_user_logged_in() ):?>style="background-image: url(<?php echo get_template_directory_uri().'/bg-images/mesa-lookout.jpg' ?>)"<?php endif;?>>
            <div id="primary" class="content-area">
                    <main id="main" class="site-main my-account-page" role="main">
                            <?php 
                            if( !is_user_logged_in() ):
                                if ( is_active_sidebar( 'residents_login_1' ) ) : ?>
                                        <div id="primary-sidebar" class="resident-login-sidebar widget-area" role="complementary">
                                                <?php dynamic_sidebar( 'residents_login_1' ); ?>
                                        </div><!-- #residents_login_area -->
                                <?php 
                                endif;
                            elseif( is_user_logged_in() ):
                                while ( have_posts() ) : the_post();

                                        get_template_part( 'template-parts/content', 'my-account' );

                                        // If comments are open or we have at least one comment, load up the comment template.
                                        if ( comments_open() || get_comments_number() ) :
                                                comments_template();
                                        endif;

                                endwhile; // End of the loop.
                            endif; 


                            ?>

                    </main><!-- #main -->
            </div><!-- #primary -->
        </div><!--.rpm-my-account-wrap-->

<?php
get_footer();
