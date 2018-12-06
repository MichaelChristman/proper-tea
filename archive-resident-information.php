 <?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proper_Tea
 */

get_header(); ?>
    <div class="rpm-resident-info-archive-wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="resident-info-archive-title">
                                    <h1 class="page-title screen-reader-text">Current Residents</h1>

                                    <div>Current</div>
                                    <div>Residents</div>
                                
                                </div>
			</header><!-- .page-header -->
                        
                        <div class="resident-info-archive-forward">
                            <p>
                                Your lease is the most reliable source for answers to questions regarding the property you are leasing. 
                                It includes both Lessor and Lessee responsibilities for maintenance, repairs and utilities. 
                            </p>
                            <p>  
                                The FAQ’s below contain general answers.
                                If your lease does not contain the information you require and you do not find the answer to your question below, please call (435) 215-7172  during business hours or contact us through the form on our contact page or front page.
                            </p>
                           
                        </div>
                        
                        
                        
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'resident-info-archive' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div><!--.rpm-resident-info-archive-wrap-->
<?php

get_footer();

