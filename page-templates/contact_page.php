<?php
/**
 * Template Name: Contact Page
 *
 * @package WordPress
 * @subpackage proper-tea
 * @since proper-tea 0.1
 */

get_header(); ?>
    <div class = "contact-page-wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'contact-page' );


			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div><!-- .information-page-wrap -->  
<?php
get_footer();

