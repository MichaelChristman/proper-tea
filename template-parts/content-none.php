<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proper_Tea
 */

?>

<section class="<?php if ( is_404() ) {echo 'error-404'; } else {echo 'no-results';} ?> not-found">
	<header class="page-header">
                    <?php 
                    if ( is_404() ){ 
                        ?>
                        <div class="four-o-four-archive-title">
                                <h1 class="page-title screen-reader-text">404 Page Not Found</h1>
                                
                                <div>404</div>
                                <div>Page Not Found</div>
                                
                        </div>  
                        <?php
                    } else if ( is_search() ){
                        ?>
                        <div class="not-found-archive-title">
                                <h1 class="page-title screen-reader-text">Nothing Found</h1>
                                
                                <div>Nothing</div>
                                <div>Found</div>
                                
                        </div>    
                        <?php
                    } else {
                        esc_html_e( 'Nothing Found', 'proper-tea' );
                    }
                    ?>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'proper-tea' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords or check out our newest listings.', 'proper-tea' ); ?></p>
			
                  
                <?php elseif ( is_404() ) : ?>
                        
                        <p><?php esc_html_e( 'You seem to be lost. To find what you are looking for check out the most recent listings below or try a search.', 'proper-tea' )?></p>
                        <div id="listing-search" class = "main-search">
                            <button class="search-toggle" aria-controls="rpmcpt_search_form" aria-expanded="false"><?php esc_html_e( 'Search', 'proper-tea' ); ?></button>

                            <div class="listing-search-primary-container">
                                <?php 
                                echo do_shortcode('[rpmcpt_search_form]');
                                ?>
                            </div><!-- .listing-search-primary-container -->
                        
                        </div> <!-- .listing-search -->
                        
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'proper-tea' ); ?></p>
			<div id="listing-search" class = "main-search">
                            <button class="search-toggle" aria-controls="rpmcpt_search_form" aria-expanded="false"><?php esc_html_e( 'Search', 'proper-tea' ); ?></button>

                            <div class="listing-search-primary-container">
                                <?php 
                                echo do_shortcode('[rpmcpt_search_form]');
                                ?>
                            </div><!-- .listing-search-primary-container -->
                        
                        </div> <!-- .listing-search -->
                        <?php
		endif; ?>
	</div><!-- .page-content -->
        
        <?php
        if ( is_404() || is_search() ){
        ?>  
            
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
            wp_reset_postdata();
            wp_reset_query();
        }
        ?>
        
</section><!-- .no-results -->
