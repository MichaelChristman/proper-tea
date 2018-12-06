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
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'proper-tea' ); ?></a>

        <?php if ( get_header_image() ) { ?>
            <header id="masthead" class="site-header" style="background-image: url(<?php header_image(); ?>)" role="banner">
        <?php } else { ?>
            <header id="masthead" class="site-header" role="banner">
        <?php } ?>
		
            <?php // Display site icon or first letter as logo?>
            <div id="top" class="site-logo">
                <?php $site_title = get_bloginfo( 'name' ); ?>
                <a href="<?php echo esc_url(home_url( '/' ) ); ?>" rel="home">
                    <div class="screen-reader-text">
                        <?php printf( esc_html__('Go to the home page of %1$s','proper-tea'), $site_title ) ?>
                    </div>
                    
                    <?php if( has_custom_logo() ) {
                        the_custom_logo();
                    }else { ?>
                        <div class="site-firstletter" aria-hidden="true">
                            <?php echo substr($site_title, 0, 1); ?>
                        </div>
                    <?php } ?>
                </a>
            </div>
            
            <nav id="site-navigation" class="main-navigation" role="navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'proper-tea' ); ?></button>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
                    
                    <!--<div id="listing-search" class = "main-search">-->
                    <button class="search-toggle" aria-controls="rpmcpt_search_form" aria-expanded="false"><?php esc_html_e( 'Search', 'proper-tea' ); ?></button>

                    <div class="listing-search-primary-container">
                        <?php 
                        echo do_shortcode('[rpmcpt_search_form]');
                        ?>
                    </div><!-- .listing-search-primary-container -->

                   
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
