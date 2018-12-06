 <?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proper_Tea
 */

get_header(); ?>
    <div class="rpm-team-member-archive-wrap">
	<div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php
                if ( have_posts() ) : ?>

                    <header class="page-header">
                        <div class="team-member-archive-title">
                            <h1 class="page-title screen-reader-text">Our Team</h1>

                            <div>Our</div>
                            <div>Team</div>

                        </div>

                    </header><!-- .page-header -->

                    <div class="team-content-wrap">
                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', 'team-member-archive' );

                        endwhile;

                                the_posts_navigation();

                    else :

                            get_template_part( 'template-parts/content', 'none' );

                    endif; ?>   
                </div><!--team-content-wrap-->
            </main><!-- #main -->
	</div><!-- #primary -->
    </div><!--.rpm-team-member-archive-wrap-->
<?php
get_footer();
