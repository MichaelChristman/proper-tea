<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proper_Tea
 */

?>
<?php the_post_thumbnail() ?>
<?php 

    //test if we have a gallery
    $the_content_haystack = get_the_content();
    $needle = '[gallery';
    $pos = strpos($the_content_haystack,$needle);
    
    //echo $the_content_haystack;
    
    if($pos === false)
    {
        //No image gallery. 
        
    }else
    {
        //this post has an image gallery
        echo '<div id="gallery-link" class="button"><a href="'. get_permalink().'#gallery-'. get_the_ID().'"><img src="'.get_template_directory_uri() . '/icons/camera-icon.png"></a></div>';
    }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
                
                //$meta_data = get_post_meta( get_the_ID() );
                //var_dump($meta_data);
                //$term_list = get_the_term_list(get_the_ID())
                
                //print out the type of listing
                $listing_type  = get_post_meta( get_the_ID() , '_rpmcpt_listing_type' , true );
                $listing_type .= " ";
                $listing_type .= get_post_meta( get_the_ID() , '_rpmcpt_listing_availability' , true );
                
                echo '<p class="listing-type">'.ucwords($listing_type).'</p>';
                
                //Print out the price of the listing
                $listing_price = get_post_meta( get_the_ID() , '_rpmcpt_listing_price' , true );
                
                setlocale(LC_MONETARY, 'en_US');
                
                if( get_post_meta( get_the_ID() , '_rpmcpt_listing_availability' , true ) == 'for rent' )
                    {
                        echo '<p class="listing-price">' . money_format('%(#10n', $listing_price ) . ' / month </p>';
                    }else {
                        echo '<p class="listing-price">' . money_format('%(#10n', $listing_price ) . '</p>';
                    }
    
                //output the title of the listing
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
                
                //print out the location
                $listing_location = get_post_meta( get_the_ID() , '_rpmcpt_listing_location' , true );
                
                echo '<p class = "listing-location">'. $listing_location .'</p>';
                
                //print listing details
                $listing_bed = get_post_meta( get_the_ID() , '_rpmcpt_listing_bedrooms' , true );
                $listing_bath = get_post_meta( get_the_ID() , '_rpmcpt_listing_bathrooms' , true );
                $listing_sqft = get_post_meta( get_the_ID() , '_rpmcpt_listing_sqft' , true );
                $listing_acreage = get_post_meta( get_the_ID() , '_rpmcpt_listing_acreage' , true );
                
                $listing_details = "";
                
                if( $listing_bed != null ){
                    $listing_details .= '<li>' . $listing_bed . ' bed </li>';
                }
                
                if( $listing_bath != null ){
                    $listing_details .= '<li>' . $listing_bath . ' bath </li>';
                }
                
                if( $listing_sqft != null ){
                    $listing_details .= '<li>' . $listing_sqft . ' sqft </li>';
                }
                
                if( $listing_acreage != null ){
                    $listing_details .= '<li>' . $listing_acreage . ' acres </li>';
                }
                
                
                echo '<ul class = "listing-details">'. $listing_details .'</ul>';

		?>
	</header><!-- .entry-header -->
        
        <h3 class = "listing-content-header">
            Overview
        </h3>
	<div class="entry-content">
            
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'proper-tea' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'proper-tea' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php proper_tea_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->


