<?php

/* 
 * Copyright (C) 2017 ChristmanMichael
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

get_header(); ?>
    <div class="rpm-front-page-wrap">
	<div id="primary" class="content-area">
           
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
                                <p>Front page test marker</p>

			<?php
			endif;
                        
                        
                        
                        ?>
                        <div class="services-sub-section">
                            <div class="services-sub-section-header-wrap">
                                <div class="services-sub-section-header">
                                    <h2 class="screen-reader-text"> Our Services</h2>
                                    <p>Our</p>
                                    <p>Services</p>
                                </div><!--.services-sub-section-header -->
                            </div><!--.services-sub-section-header-wrap -->
                            
                            <div class="services-sub-section-wrap">
                            <?php 
                            $services_loop = 
                                new WP_Query([
                                    'post_type' => 'service',
                                    'posts_per_page' => 3,
                                    'order'=>'DESC',
                                    'orderby'=>'ID'
                                    ]); 
                            ?>
                            
                                <?php
                                while( $services_loop->have_posts() ) : $services_loop->the_post();

                                     get_template_part( 'template-parts/content', 'service' );

                                endwhile;                            
                                wp_reset_query();
                                ?>
                            </div><!--.services-sub-section-wrap -->
                            
                        </div><!-- .services-sub-section-->
                            
                        <div class="listing-sub-section">
                            <div class="listing-sub-section-header-wrap">
                                <div class="listing-sub-section-header">
                                    <h2 class="screen-reader-text"> New Listings</h2>
                                    <p>Our</p>
                                    <p>Properties</p>
                                </div><!--.listing-sub-section-header -->
                            </div><!--.listing-sub-section-header-wrap -->
                            
                            <div class="three-listing-sub-section-wrap">
                            <?php 
                            $listing_loop = 
                                new WP_Query([
                                    'post_type' => 'listing',
                                    'posts_per_page' => 3,
                                    'order'=>'DESC',
                                    'orderby'=>'ID'
                                    ]); 
                            ?>
                            
                            <?php
                            while( $listing_loop->have_posts() ) : $listing_loop->the_post();
                                
                                 get_template_part( 'template-parts/content', 'listing-archive' );
                                 
                            endwhile;                            
                            wp_reset_query();
                            ?>
                            </div><!--.three-listing-sub-section-wrap -->
                            
                            <div class="five-listing-sub-section-wrap">
                            <?php 
                            $listing_loop = 
                                new WP_Query([
                                    'post_type' => 'listing',
                                    'posts_per_page' => 5,
                                    'order'=>'DESC',
                                    'orderby'=>'ID'
                                    ]); 
                            ?>
                            
                            <?php
                            while( $listing_loop->have_posts() ) : $listing_loop->the_post();
                                
                                 get_template_part( 'template-parts/content', 'listing-archive' );
                                 
                            endwhile;                            
                            wp_reset_query();
                            ?>
                            </div><!--.five-listing-sub-section-wrap -->
                            
                            
                        </div><!-- .listing-sub-section-->
                        
                        <div class="team-sub-section">
                            <div class="team-sub-section-header-wrap">
                                <div class="team-sub-section-header">
                                    <h2 class="screen-reader-text"> Our Team</h2>
                                    <p>Our</p>
                                    <p>Team</p>
                                </div><!--.team-sub-section-header -->
                            </div><!--.team-sub-section-header-wrap -->
                            
                            
                            <a href="<?php echo site_url('/team-member/');?>" tabindex="0">
                                <button>
                                    Meet the Team
                                </button>
                            </a>
                            
                            
                            
                                
                                <div class="team-sub-section-loop-wrap">

                                    <?php 
                                    $team_loop = 
                                        new WP_Query([
                                            'post_type' => 'team-member',
                                            'posts_per_page' => 3,
                                            'order'=>'DESC',
                                            'orderby'=>'ID'
                                            ]); 
                                    ?>

                                    <?php
                                    while( $team_loop->have_posts() ) : $team_loop->the_post();

                                         get_template_part( 'template-parts/content', 'team-member-archive' );

                                    endwhile;                            
                                    wp_reset_query();
                                    ?>
                                </div><!--.team-sub-section-loop-wrap-->
                           
                        </div><!--.team-sub-section -->
                        
                        <div class="current-residents-sub-section" style="background-image: url(<?php echo get_template_directory_uri().'/bg-images/current_residents_dark.png'?>)">
                            <div class="current-residents-sub-section-inner" style="background-image: url(<?php echo get_template_directory_uri().'/bg-images/current_residents_light.png'?>)">
                                <div class="current-residents-sub-section-header-wrap">
                                    <div class="current-residents-sub-section-header">
                                        <h2 class="screen-reader-text">Current Residents</h2>
                                        <p>Current</p>
                                        <p>Residents</p>
                                    </div><!--.team-sub-section-header -->
                                </div><!--.team-sub-section-header-wrap -->


                                <div class="current-residents-sub-section-content-wrap">
                                    
                                    <a href="<?php echo site_url('/current-residents/');?>" tabindex="0">
                                        <button>
                                            Information
                                        </button>
                                    </a>
                                    
                                </div><!--.current-residents-sub-section-loop-wrap-->
                            </div><!--.current-residents-sub-section-inner -->
                            
                        </div><!--.current-residents-sub-section -->
                        
                        
                        <div class="contact-sub-section">
                            <div class="contact-sub-section-header-wrap">
                                <div class="contact-sub-section-header">
                                    <h2 class="screen-reader-text">Contact Us</h2>
                                    <p>Contact</p>
                                    <p>Us</p>
                                </div><!--.contact-sub-section-header -->
                            </div><!--.contact-sub-section-header-wrap -->
                            
                            <div class="contact-sub-section-form-wrap">
                                <?php echo do_shortcode('[contact-form-7 id="1881" title="Resolutions Contact Us"]')?>
                            </div><!--.contact-sub-section-form-wrap-->
                            
                        </div><!--.contact-sub-section-->
                        
                        <?php
			

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div><!-- .rpm-front-page-wrap -->
<?php
//get_sidebar();
get_footer();