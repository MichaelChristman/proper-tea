<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proper_Tea
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    
        <header class="entry-header"> 
            
		<?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" tabindex="0">';?>
                    <div class="listing-archive-thumb-wrap" >
                        <?php 
                        if ( is_front_page() ){
                            the_post_thumbnail('homepage-three-listing-thumb');
                        }else{
                            the_post_thumbnail();
                        }
                        ?>
                        <span class="listing-archive-filter">
                           
                        </span><!--.listing-archive-filter-->
                    </div><!--.listing-archive-thumb--->
                <?php echo '</a>'; ?>
                    
                   
                
                <?php if(!is_front_page() ) : ?>
                <div class="archive-listing-details">

                    <?php
                    if(is_single()){
                         the_title( '<h3 class="entry-title">', '</h3>' );
                    }else{ the_title( '<h2 class="entry-title">', '</h2>' ); }
                   
                    
                    //get the price
                    $listing_price = get_post_meta( get_the_ID() , '_rpmcpt_listing_price' , true );
                    
                    setlocale(LC_MONETARY, 'en_US');
                    
                    echo '<p class = "listing-price">'. money_format('%(#10n', $listing_price) .'</p>';
                    
                    //print out the location
                    $listing_location = get_post_meta( get_the_ID() , '_rpmcpt_listing_location' , true );

                    echo '<p class = "listing-location">'. $listing_location .'</p>';

                    if ( 'listing' === get_post_type() ) : ?>
                    <div class="entry-meta">
                            <?php 
                                //print listing details
                                $listing_bed = get_post_meta( get_the_ID() , '_rpmcpt_listing_bedrooms' , true );
                                $listing_bath = get_post_meta( get_the_ID() , '_rpmcpt_listing_bathrooms' , true );
                                $listing_sqft = get_post_meta( get_the_ID() , '_rpmcpt_listing_sqft' , true );
                                $listing_acreage = get_post_meta( get_the_ID() , '_rpmcpt_listing_acreage' , true );

                                $listing_details = "";

                                if( $listing_bed != null && $listing_bed != 0 ){
                                    if($listing_bed == 4){
                                        $listing_details .= '<li>' . $listing_bed . '+ bed </li>';
                                    }else{
                                        $listing_details .= '<li>' . $listing_bed . ' bed </li>';
                                    }
                                }

                                if( $listing_bath != null ){
                                    if($listing_bath == 3){
                                        $listing_details .= '<li>' . $listing_bath . '+ bath </li>';
                                    }else{
                                        $listing_details .= '<li>' . $listing_bath . ' bath </li>';
                                    }
                                }

                                if( $listing_sqft != null ){
                                    $listing_details .= '<li>' . $listing_sqft . ' sqft </li>';
                                }

                                if( $listing_acreage != null ){
                                    $listing_details .= '<li>' . $listing_acreage . ' acres </li>';
                                }

                                echo '<ul class = "listing-details">'. $listing_details .'</ul>';
                            ?>
                    </div><!-- .entry-meta -->
                    <?php
                    endif; ?>
                </div><!--.archive-listing-details-->
                
                <div class = "continue-reading">

                    <?php 
                    $read_more_link = sprintf(
                            /* translators: %s: Name of current post. */
                            wp_kses( __( 'Continue reading %s', 'proper-tea' ), array( 'span' => array( 'class' => array() ) ) ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                    );

                    ?>
                    <a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
                        <button>  
                            <?php echo $read_more_link; ?>
                        </button>
                    </a>  
                </div><!-- .continue-reading -->
                
                <?php
                endif; ?>
              
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php proper_tea_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->


