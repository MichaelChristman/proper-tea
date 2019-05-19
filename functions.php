<?php
/**
 * Proper Tea functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Proper_Tea
 */

require_once('rpm-custom-post-types.php');

if ( ! function_exists( 'proper_tea_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function proper_tea_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Proper Tea, use a find and replace
	 * to change 'proper-tea' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'proper-tea', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
        add_image_size('homepage-three-listing-thumb', 1640, 9999 );
        
        /*
         * add support for post-formats
         */
        //add_theme_support('post-formats', ['gallery']);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'proper-tea' ),
                'footer-menu'  => esc_html__( 'footer-menu', 'proper-tea' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'proper_tea_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
                
}
endif;
add_action( 'after_setup_theme', 'proper_tea_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function proper_tea_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'proper_tea_content_width', 640 );
}
add_action( 'after_setup_theme', 'proper_tea_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function proper_tea_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'proper-tea' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'proper-tea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        
        /**
        *  Add widget area to allow for residents log in
        * 
        * 
        */
        register_sidebar( array(
		'name'          => 'Residents Login Area',
		'id'            => 'residents_login_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="login-form-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'proper_tea_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function proper_tea_scripts() {
	wp_enqueue_style( 'proper-tea-style', get_stylesheet_uri() );
        
        //Add Google Fonts: Montserrat and Rubik
        wp_enqueue_style('proper-tea-local-fonts',get_template_directory_uri() .'/fonts/custom-fonts.css'  );
        
        wp_enqueue_style( 'proper-tea-fontawesome','https://use.fontawesome.com/releases/v5.8.1/css/all.css' );
        
        //load jquery
        wp_enqueue_script('jquery', get_template_directory_uri() .'/js/jquery-3.1.1.js');
        
        wp_enqueue_script('proper-tea-functions', get_template_directory_uri() .'/js/functions.js', ['jquery'],'20170725', true);
        
        wp_enqueue_script('proper-tea-listing-carousel', get_template_directory_uri() .'/js/listing-carousel.js', ['jquery'],'20190122', true);
        
        wp_register_script('proper_tea_price_sort',get_template_directory_uri() .'/js/priceSort.js', ['jquery'],'20170808', true);
        wp_enqueue_script('proper_tea_price_sort', get_template_directory_uri() .'/js/priceSort.js', ['jquery'],'20170808', true);
        global $wp_query;
        $qv = $wp_query->query;
        wp_localize_script('proper_tea_price_sort', 'proper_tea_price_sort_data', ['query' => $qv] );
        
        wp_enqueue_script('proper-tea-team-member-display-info', get_template_directory_uri() .'/js/team-member-display-info.js', ['jquery'],'20180315', true);
       
        wp_enqueue_script('proper-tea-services-rollout', get_template_directory_uri() .'/js/services_rollout.js', ['jquery'],'20170424', true);
        
        wp_enqueue_script('proper-tea-viewportSize', get_template_directory_uri() .'/js/viewportSize.js', ['jquery'],'20170414', true);
        
	wp_enqueue_script( 'proper-tea-navigation', get_template_directory_uri() . '/js/navigation.js', ['jquery'], '20190326', true );
        wp_localize_script( 'proper-tea-navigation', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'proper-tea' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'proper-tea' ) . '</span>',
	) );
        
        wp_enqueue_script('proper-tea-smooth-scroll', get_template_directory_uri() .'/js/smooth-scroll.js', ['jquery'],'20170320', true);
        
	wp_enqueue_script( 'proper-tea-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

        
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'proper_tea_scripts' );

//add featured gallery support for listings
function proper_tea_add_featured_galleries_to_listings( $postTypes ) {

    array_push($postTypes, 'listing' );

    return $postTypes;

}

add_filter('fg_post_types', 'proper_tea_add_featured_galleries_to_listings' );




/*
 * Enqueue AJAX script and localize main querey
 */
//add_action('wp_enqueue_script','rpmcpt_listing_filter_add_scripts');
//
//function rpmcpt_listing_filter_add_scripts(){
//    wp_enqueue_script('proper_tea_price_sort', get_template_directory_uri() .'/js/priceSort.js', ['jquery'],'20170808', true);
//    global $wp_query;
//    $qv = $wp_query->query;
//    wp_localize_script('proper_tea_price_sort', 'proper_tea_price_sort_data', ['query' => $qv] );
//}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
