<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proper_Tea
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="contact-us-title">
                                <h1 class="page-title screen-reader-text">Contact Us</h1>
                                
                                <div>Contact</div>
                                <div>Us</div>
                                
                </div>
	</header><!-- .entry-header -->
        
        <div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->
        
        <div class="entry-meta">
            
            <div class="meta-item">
                <figure class="meta-icon">
                    <img src="<?php echo get_template_directory_uri().'/bg-images/largePhoneIcon.png' ?>"/> 
                </figure><!--.meta-icon-->
                
                <h3>Phone</h3>
                <p>
                    (435) 215-7172
                </p>
            </div><!--.meta-item-->
            
            <div class="meta-item">
                <figure class="meta-icon">
                    <img src="<?php echo get_template_directory_uri().'/bg-images/largePhoneIcon.png' ?>"/> 
                </figure><!--.meta-icon-->
                
                <h3>Address</h3>
                <p>
                    Resolutions Property Management</br>
                    50 West 100 South</br>
                    Moab, Utah 84532
                </p>
            </div><!--.meta-item-->
            
            <div class="meta-item">
                <figure class="meta-icon">
                    <img src="<?php echo get_template_directory_uri().'/bg-images/largePhoneIcon.png' ?>"/> 
                </figure><!--.meta-icon-->
                
                <h3>Email</h3>
                <p>
                    info@bzrez.com
                </p>
            </div><!--.meta-item-->
            
            
        </div><!--.entry-meta-->

	
        
        <div class="contact-form-wrap">
            <div class="contact-form-heading">
                <h2 class="screen-reader-text">Reach Out</h2>
                <div>Reach</div>
                <div>Out</div>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="1881" title="Resolutions Contact Us"]')?>
        </div><!--.contact-form-wrap-->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'proper-tea' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->

