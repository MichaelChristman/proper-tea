<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Proper_Tea
 */

?>

<aside id="secondary" class="widget-area main-sidebar" role="complementary">
        <!-- if is single and listing -->
        <?php
        if (is_single() && get_post_type()==="listing"){
            ?>
        
            <div class = "more-info-wrap" >
                <div class="more-info-header-wrap">
                    <header>
                        <h2 class="screen-reader-text">More Information</h2>
                        <div>More</div>
                        <div>Information</div>
                    </header>
                </div>
                <?php
                echo do_shortcode('[contact-form-7 id="1885" title="Single Post Contact Form"]');
                ?>
                
            </div>
        
            <div class="listing-sub-section-header-wrap">
                <div class="listing-sub-section-header">
                    <h2 class="screen-reader-text"> New Listings</h2>
                    <p>New</p>
                    <p>Listings</p>
                </div><!--.listing-sub-section-header -->
            </div><!--.listing-sub-section-header-wrap -->
            <?php
            $listing_loop = 
                new WP_Query([
                    'post_type' => 'listing',
                    'posts_per_page' => 3,
                    'order'=>'DESC',
                    'orderby'=>'ID'
                    ]);
            
            //the loop
            if ( $listing_loop->have_posts() ){
                while( $listing_loop->have_posts() ) : $listing_loop->the_post();
                                
                    get_template_part( 'template-parts/content', 'listing-archive' );
                                 
                endwhile; 
            }//endif
            wp_reset_query();
            
        }
      ?>
       
</aside><!-- #secondary -->
