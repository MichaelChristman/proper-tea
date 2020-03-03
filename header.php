<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Proper_Tea
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'proper-tea' ); ?></a>

        <?php if ( get_header_image() && is_front_page()) { ?>
            <header id="masthead" class="site-header" style="background-image: url(<?php header_image(); ?>)" role="banner">
        <?php } else { ?>
            <header id="masthead" class="site-header" role="banner">
        <?php } ?>
		
            <?php // Display site icon or first letter as logo?>
            <div id="top" class="site-logo">
                <?php $site_title = get_bloginfo( 'name' ); ?>
               
                    
                    
                    <?php if( has_custom_logo() ) {?>
                        <span class="screen-reader-text">
                            <?php printf( esc_html__('Go to the home page of %1$s','proper-tea'), $site_title ) ?>
                        </span>
                        
                        <?php the_custom_logo();
                        
                    }else { ?>
                        <a href="<?php echo esc_url(home_url( '/' ) ); ?>" rel="home">
                            <div class="site-firstletter" aria-hidden="true">
                                <?php echo substr($site_title, 0, 1); ?>
                            </div>
                        </a>
                    <?php } ?>
                
            </div>
            
            
                
            <nav id="site-navigation" class="main-navigation" role="navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
                    
                    <!--<div id="listing-search" class = "main-search">-->
                    <button class="search-toggle" aria-controls="rpmcpt_search_form" aria-expanded="false"><i class="fas fa-search"></i></button>

                    <div class="listing-search-primary-container">
                        <?php 
                        echo do_shortcode('[rpmcpt_search_form]');
                        ?>
                    </div><!-- .listing-search-primary-container -->
                    
                    <button class="account-navigation-toggle" aria-controls="account-navigation-menu" aria-expanded="false"><i class="fas fa-user"></i></button>
                    <div id="account-navigation" role="navigation">
                        
                        <div class="account-navigation-menu">
                            <?php 

                                $current_user = wp_get_current_user();
                                $user_first_name = $current_user->user_firstname;
                                $text_domain = 'proper-tea';

                                if ( is_user_logged_in() ) : ?>
                                     <!--needs to be a translateable string-->
                                    <p class="login-status"><?php echo  __( 'status: signed in as', $text_domain ) ." ". $user_first_name; ?> </p>
                                    <ul>
                                        <li><a href="<?php echo site_url();?>/current-residents">Resident Portal</a></li>
                                        <li><a href="<?php echo site_url();?>/my-account">My Account</a></li>
                                        <li><a href="<?php echo wp_logout_url( home_url() );?>">Sign Out</a></li>
                                    </ul>
                                <?php else : ?>
                                     <!--needs to be a translateable string-->
                                    <p class="login-status"><?php echo __( 'status: not signed in', $text_domain ) ?></p>

                                        <a href="<?php echo site_url();?>/log-in" class="account-log-in-link">Log In</a>

                                <?php
                                endif;
                            ?>

                        </div>
                    </div> <!--#account-navigation -->
            </nav><!-- #site-navigation -->
            
            <div class="site-branding<?php if ( is_singular() || is_archive() || is_search() || is_404() ) {echo ' screen-reader-text'; } ?>">
                    <?php
                    if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                            <p class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                    endif;
                    
                    ?>
                    <div id="splash-logo" class="front-page-logo-wrap">
                        <div class="splash-logo-placeholder">
                           <?php echo '<img src="'.get_template_directory_uri().'/icons/resolutions_icon.svg">'?>
                        </div>
                    </div>
                    
                    <div id="custom-company-text" class="custom-company-text-wrapper">
                        <div class="custom-company-text-inner-block">
                            <p>Real Estate</p>
                            <p>Business</p>
                            <p>Resolutions</p>
                            <p>Property Management</p>
                        </div>
                    </div>
                            
                    
            </div><!-- .site-branding -->

            
	</header><!-- #masthead -->

	<div id="content" class="site-content">
       