<?php
/**
 * Kwall Demo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kwall_Demo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kwall_demo_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Kwall Demo, use a find and replace
		* to change 'kwall-demo' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'kwall-demo', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'kwall-demo' ),
			'menu-2' => esc_html__( 'Secondary', 'kwall-demo' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'kwall_demo_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kwall_demo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kwall_demo_content_width', 640 );
}
add_action( 'after_setup_theme', 'kwall_demo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

 if( function_exists('acf_add_options_page') ) {

	 acf_add_options_page(array(
 			'page_title' => 'Alert Banner',

 	));

 }


function kwall_demo_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kwall-demo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kwall-demo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'footer-1', 'kwall-demo' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'kwall-demo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'footer-2', 'kwall-demo' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'kwall-demo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'footer-3', 'kwall-demo' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'kwall-demo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'kwall_demo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kwall_demo_scripts() {
	wp_enqueue_style( 'kwall-demo-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'kwall-demo-style', 'rtl', 'replace' );

	wp_enqueue_script( 'kwall-demo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	$compiled_css = get_template_directory() . '/assets/css/styles.css';
	if ( file_exists( $compiled_css ) ) {
	  wp_enqueue_style( 'kwall_demo-theme', get_template_directory_uri() . '/assets/css/styles.css' );

	  wp_enqueue_script( 'kwall_demo_custom-theme-js', get_template_directory_uri() . '/assets/js/all.min.js', array(), '1.0.0', true );
	  wp_localize_script( 'kwall_demo_custom-theme-js', 'theme',
		array(
		  'ajaxurl' => admin_url( 'admin-ajax.php' ),
		)
	  );
	}


}
add_action( 'wp_enqueue_scripts', 'kwall_demo_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require_once('inc/degree-filter-ajax.php');
require get_template_directory() . '/inc/scssphp/scss.inc.php';
/**
 * Color Picker.
 */
//require_once(TEMPLATEPATH.'/inc/color-picker.php');
/**
 * ACF Config.
 */
require_once(TEMPLATEPATH.'/inc/acf-config.php');

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require_once('inc/degree-filter-ajax.php');
require_once('inc/directory-ajax.php');

function include_font_awesome_styles(){

    wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/inc/font-awesome/6.0.0/css/all.css', );

}

add_action( 'wp_enqueue_scripts', 'include_font_awesome_styles');


function loadup_scripts()
{
    wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider.js', array( 'jquery' ), '', true );
    wp_enqueue_style( 'flexslider', get_stylesheet_directory_uri() . '/inc/flexslider/flexslider.css' );
}

add_action( 'wp_enqueue_scripts', 'loadup_scripts' );

function owl_scripts()
{
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/inc/owl-carousel/js/owl.carousel.min.js', array( 'jquery' ), '', true );
    wp_enqueue_style( 'owl-style-min', get_stylesheet_directory_uri() . '/inc/owl-carousel/css/owl.carousel.min.css' );
    wp_enqueue_style( 'owl-style-def', get_stylesheet_directory_uri() . '/inc/owl-carousel/css/owl.theme.default.min.css' );
}

add_action( 'wp_enqueue_scripts', 'owl_scripts' );

function my_acf_json_save_point( $path ) {
    return get_stylesheet_directory() . '/inc/acf';
}
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );




