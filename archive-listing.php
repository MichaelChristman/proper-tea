<?php
/**
 * The template for displaying the listing archive page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proper_Tea
 */

get_header(); ?>
    <div class="rpm-listing-archive-wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
                
		<?php
                
		if ( have_posts() ) : ?>

			<header class="page-header">
                            <div class="listing-archive-title">
                                <h1 class="page-title screen-reader-text">All Listings</h1>
                                
                                
                                <div>All</div>
                                <div>Listings</div>
                                
                            </div>
                            
                            <div class="listing-filter-primary-container">
                            <?php 
                            echo do_shortcode('[rpmcpt_listing_filter]');
                            ?>
                            </div><!-- .listing-filter-primary-container -->
                            
			</header><!-- .page-header -->
                        
                        <section id="listing-results">
                            
                       <?php
//                            $args = [
//                                    'post_type' => 'listing',
//                                    'orderby' => 'meta_value_num',
//                                    'order'   => 'ASC',
//                                    'meta_query' => [
//                                                         ['key' => '_rpmcpt_listing_price',
//                                                          'type' => 'NUMERIC'
//                                                         ]
//                                                     ]
//                            ];
//                             $rpmcpt_listing_querey = new WP_Query($args);
//                           $rpmcpt_listing_querey = new WP_Query( array('post_type' => 'listing', 
//                                                                        'posts_per_page' => '-1',
//                                                                        'orderby' => 'meta_value_num',
//                                                                        'order'   => 'ASC',
//                                                                        'meta_query' => array( 
//
//                                                                                             array('key' => '_rpmcpt_listing_price'
//                                                                                                 )
//                                                                                         ) 
//                                                                     ) 
//                                                                );
                       ?>
                        
			<?php                       
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				/*get_template_part( 'template-parts/content', get_post_format() );*/
                                get_template_part( 'template-parts/content', 'listing-archive' );

			endwhile;
			the_posts_navigation();
                        ?>
                        </section>
                        <?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div><!--.rpm-listing-archive-wrap-->
<?php
//get_sidebar();
get_footer();

