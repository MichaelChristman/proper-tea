<?php
/**
 * The template for displaying single listing posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Proper_Tea
 */

get_header(); ?>
    <div class="rpm-listing-wrap">
	<div id="primary" class="content-area">
                
		<main id="main" class="site-main" role="main">
                    
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
                        
                        $listing_post_type = get_post_meta( get_the_ID(), '_rpmcpt_listing_type', true);
                        $listing_post_availability = get_post_meta( get_the_ID(), '_rpmcpt_listing_availability', true);
                        $listing_post_location = get_post_meta( get_the_ID(), '_rpmcpt_listing_location', true);
                        $listing_post_bedrooms = get_post_meta( get_the_ID(), '_rpmcpt_listing_bedrooms', true);
                        $listing_post_bathrooms = get_post_meta( get_the_ID(), '_rpmcpt_listing_bathrooms', true);
                        
                        $exclude_post   = $post->ID;
                        
                        $args = array(
                            'post_type'  => 'listing',
                            'posts_per_page' => 3,
                            'post__not_in' => array($exclude_post),
                            'orderby' => 'rand', 
                            'meta_query' => array(
                                array(
                                    'key'   => '_rpmcpt_listing_type',
                                    'value' => $listing_post_type
                                )
                            )
                        );
                        
                        $related_query = new WP_Query($args);
                        
                        ?>
                        <div class="related-listings-wrap">  
                        <?php
                            if($related_query->have_posts() ){
                                ?>
                                <div class="related-listing-title-color">
                                    <div class="related-listing-title">
                                        <h3 class="sub-page-title screen-reader-text">Similar Listings</h3>

                                        <div>Similar</div>
                                        <div>Listings</div>

                                    </div>
                                </div>
                                <?php
                                
                                while($related_query->have_posts()) : $related_query->the_post();
                                  
                                    get_template_part( 'template-parts/content', 'listing-archive' );
                             
                                endwhile;
                            }
                            wp_reset_query();
                            //the_post_navigation();
                        ?>
                        </div><!-- .related-listings-wrap -->
                        <?php
                endwhile; // End of the loop.
                ?>
                           
		</main><!-- #main -->
                <?php
                get_sidebar();
                ?>
	</div><!-- #primary -->
    </div><!--.rpm-listing-wrap-->
<?php
//get_sidebar();
get_footer();

