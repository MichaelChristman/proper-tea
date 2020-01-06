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
                                
                                <?php 
                                if (is_search() ) :?>
                                
                                
                                    <h1 class="page-title screen-reader-text">Search Results</h1>


                                    <div>Search</div>
                                    <div>Results</div>
                                
                                <?php
                                else : ?>
                                

                                    <h1 class="page-title screen-reader-text">All Listings</h1>


                                    <div>All</div>
                                    <div>Listings</div>

                                <?php 
                                endif; ?>
                                
                                
                            </div>
                            
                            <div class="listing-filter-primary-container">
                            <?php 
                            echo do_shortcode('[rpmcpt_listing_filter]');
                            ?>
                            </div><!-- .listing-filter-primary-container -->
                            
                        
<!--                            <nav class="listing-archive-navigation-top">
                                
                                <p>the page navigation</p>-->
                                <?php
                                
                                      //this code creates paginated links for listing post type 
                                      //it currently needs to be refactored to function with the existing ajax sort
                                      //but can be entirely replaced with lazy load scroll functionality
                                
//                                    $big = 999999999; // need an unlikely integer
//                                    $current_page = max(1, get_query_var('paged'));
//
//                                    echo paginate_links(array(
//                                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
//                                        'format' => '?paged=%#%',
//                                        'current' => $current_page,
//                                        'total' => $wp_query->max_num_pages,
//                                    ));
                                ?>
                            <!--</nav>.listing-archive-navigation-top-->
                            
			</header><!-- .page-header -->
                        
                        <?php $total_listings = $wp_query->found_posts;?>
                        
                        <?php $posts_displayed = get_query_var( 'posts_per_page', 1 );;
//                                var_dump($wp_query);
                        ?>
                       
                        
                        <div id="total-listings-count">Showing <?php echo $posts_displayed;?> of <?php echo $total_listings;?> Listings</div>
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
//			the_posts_navigation();
                        
                        ?>
                        <nav  id="listing-page-break-1" class="listing-page-break">
                            <a href="#listing-results"><?php echo __('Page 1','rpm-custom-post-types') ?></a>
                        </nav>
                        </section>
                        
                        <?php
                        echo do_shortcode('[rpmcpt_more_listings_button]');
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div><!--.rpm-listing-archive-wrap-->
<?php
//get_sidebar();
get_footer();

