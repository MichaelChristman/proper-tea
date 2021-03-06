<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proper_Tea
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	<header class="entry-header">
            
            <div class="service-thumbnail-wrap" tabindex="0">
                <?php the_post_thumbnail(); ?>
            </div>
            
            <div class ="service-title-wrap" >
                <?php 
                the_title( '<h2 class="entry-title">', '</h2>' );
                ?>
            </div><!--.service-title-wrap -->
            
	</header><!-- .entry-header -->
        
        
        
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

