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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'kwall_demo_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


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



add_action('acf/init', 'my_register_blocks');
function my_register_blocks() {

    // check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register homepage hero block.
        acf_register_block_type(array(
            'name'              => 'home-slider',
            'title'             => __('Home Slider'),
            'description'       => __('A custom hero block.'),
            'render_template'   => 'template-parts/blocks/home-slider/home-slider.php',
			'category'          => 'formatting',
			'icon' 				=> 'images-alt2',
			'align'				=> 'full',
			// 'enqueue_assets' 	=> function(){
			// 	wp_enqueue_style( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
			// 					wp_enqueue_style( 'slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
			// 					wp_enqueue_script( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
			//
			// 					wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.css', array(), '1.0.0' );
			// 					wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.js', array(), '1.0.0', true );
			 // },
        ));
				// register graudation cta block.
				acf_register_block_type(array(
						'name'              => 'countdown-cta',
						'title'             => __('Countdown CTA'),
						'description'       => __('A custom countdown timer with a call to action block.'),
						'render_template'   => 'template-parts/blocks/countdown-cta.php',
				'category'          => 'formatting',
				'icon' 				=> 'hourglass',
				'align'				=> 'full',

  		));
			// register request info block.
			acf_register_block_type(array(
					'name'              => 'request-info',
					'title'             => __('Button CTA'),
					'description'       => __('Button CTA block with 2 buttons, title and copy.'),
					'render_template'   => 'template-parts/blocks/request-info/request-info.php',
			'category'          => 'formatting',
			'icon' 				=> '<svg><path d="M17 3H7c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm.5 6c0 .3-.2.5-.5.5H7c-.3 0-.5-.2-.5-.5V5c0-.3.2-.5.5-.5h10c.3 0 .5.2.5.5v4zm-8-1.2h5V6.2h-5v1.6zM17 13H7c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2v-4c0-1.1-.9-2-2-2zm.5 6c0 .3-.2.5-.5.5H7c-.3 0-.5-.2-.5-.5v-4c0-.3.2-.5.5-.5h10c.3 0 .5.2.5.5v4zm-8-1.2h5v-1.5h-5v1.5z"></path></svg>',
			'align'				=> 'full',

		));
		// register your experience block.
		acf_register_block_type(array(
				'name'              => 'experience-carousel',
				'title'             => __('Carousel'),
				'description'       => __('your experience block.'),
				'render_template'   => 'template-parts/blocks/experience-carousel/experience-carousel.php',
		'category'          => 'formatting',
		'icon' 				=> '<svg><path d="M19 3H5c-.6 0-1 .4-1 1v7c0 .5.4 1 1 1h14c.5 0 1-.4 1-1V4c0-.6-.4-1-1-1zM5.5 10.5v-.4l1.8-1.3 1.3.8c.3.2.7.2.9-.1L11 8.1l2.4 2.4H5.5zm13 0h-2.9l-4-4c-.3-.3-.8-.3-1.1 0L8.9 8l-1.2-.8c-.3-.2-.6-.2-.9 0l-1.3 1V4.5h13v6zM4 20h9v-1.5H4V20zm0-4h16v-1.5H4V16z"></path></svg>',
		'align'				=> 'full',

	));
	// register future career block.
	acf_register_block_type(array(
			'name'              => 'future-career',
			'title'             => __('Featured Academics'),
			'description'       => __('Featured academics for homepage. Majors repeater with cta and copy block, stats repeater at bottom'),
			'render_template'   => 'template-parts/blocks/future-career/future-career.php',
	'category'          => 'formatting',
	'icon' 				=> 'welcome-learn-more',
	'align'				=> 'full',

));
		acf_register_block_type(array(
				'name'              => 'footer-address',
				'title'             => __('Footer Address'),
				'description'       => __('A footer address block.'),
				'render_template'   => 'template-parts/blocks/footer-address/footer-address.php',
		'category'          => 'formatting',
		'icon' 				=> '<svg><path d="M4 20h16v-1.5H4V20zm0-4.8h16v-1.5H4v1.5zm0-6.4v1.5h16V8.8H4zM16 4H4v1.5h12V4z"></path></svg>',
		'align'				=> 'full',

	));
	acf_register_block_type(array(
			'name'              => 'fullwidth-media-section',
			'title'             => __('Full Width Media Section'),
			'description'       => __('A next steps block.'),
			'render_template'   => 'template-parts/blocks/fullwidth-media-section/fullwidth-media-section.php',
	'category'          => 'formatting',
	'icon' 				=> '<svg><path d="m7 6.5 4 2.5-4 2.5z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="m5 3c-1.10457 0-2 .89543-2 2v14c0 1.1046.89543 2 2 2h14c1.1046 0 2-.8954 2-2v-14c0-1.10457-.8954-2-2-2zm14 1.5h-14c-.27614 0-.5.22386-.5.5v10.7072l3.62953-2.6465c.25108-.1831.58905-.1924.84981-.0234l2.92666 1.8969 3.5712-3.4719c.2911-.2831.7545-.2831 1.0456 0l2.9772 2.8945v-9.3568c0-.27614-.2239-.5-.5-.5zm-14.5 14.5v-1.4364l4.09643-2.987 2.99567 1.9417c.2936.1903.6798.1523.9307-.0917l3.4772-3.3806 3.4772 3.3806.0228-.0234v2.5968c0 .2761-.2239.5-.5.5h-14c-.27614 0-.5-.2239-.5-.5z"></path></svg>',
	'align'				=> 'full',

));
acf_register_block_type(array(
		'name'              => 'hero-banner',
		'title'             => __('Hero Banner'),
		'description'       => __('A hero banner for landing pages'),
		'render_template'   => 'template-parts/blocks/hero-banner/hero-banner.php',
'category'          => 'formatting',
'icon' 				=> '<svg><path d="m7 6.5 4 2.5-4 2.5z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="m5 3c-1.10457 0-2 .89543-2 2v14c0 1.1046.89543 2 2 2h14c1.1046 0 2-.8954 2-2v-14c0-1.10457-.8954-2-2-2zm14 1.5h-14c-.27614 0-.5.22386-.5.5v10.7072l3.62953-2.6465c.25108-.1831.58905-.1924.84981-.0234l2.92666 1.8969 3.5712-3.4719c.2911-.2831.7545-.2831 1.0456 0l2.9772 2.8945v-9.3568c0-.27614-.2239-.5-.5-.5zm-14.5 14.5v-1.4364l4.09643-2.987 2.99567 1.9417c.2936.1903.6798.1523.9307-.0917l3.4772-3.3806 3.4772 3.3806.0228-.0234v2.5968c0 .2761-.2239.5-.5.5h-14c-.27614 0-.5-.2239-.5-.5z"></path></svg>',
'align'				=> 'full',

));
acf_register_block_type(array(
		'name'              => 'accordion',
		'title'             => __('Accordion'),
		'description'       => __('An Accordion'),
		'render_template'   => 'template-parts/blocks/accordion/accordion.php',
'category'          => 'formatting',
'icon' 				=> '<svg><path d="M17.5 4v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V4H8v5a.5.5 0 0 0 .5.5h7A.5.5 0 0 0 16 9V4h1.5Zm0 16v-5a2 2 0 0 0-2-2h-7a2 2 0 0 0-2 2v5H8v-5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v5h1.5Z"></path></svg>',
'align'				=> 'full',

));
acf_register_block_type(array(
		'name'              => 'gallery',
		'title'             => __('Gallery (KWALL)'),
		'description'       => __('A gallery w/ thumbnails'),
		'render_template'   => 'template-parts/blocks/gallery/gallery.php',
'category'          => 'formatting',
'icon' 				=> '<svg><path d="M16.375 4.5H4.625a.125.125 0 0 0-.125.125v8.254l2.859-1.54a.75.75 0 0 1 .68-.016l2.384 1.142 2.89-2.074a.75.75 0 0 1 .874 0l2.313 1.66V4.625a.125.125 0 0 0-.125-.125Zm.125 9.398-2.75-1.975-2.813 2.02a.75.75 0 0 1-.76.067l-2.444-1.17L4.5 14.583v1.792c0 .069.056.125.125.125h11.75a.125.125 0 0 0 .125-.125v-2.477ZM4.625 3C3.728 3 3 3.728 3 4.625v11.75C3 17.273 3.728 18 4.625 18h11.75c.898 0 1.625-.727 1.625-1.625V4.625C18 3.728 17.273 3 16.375 3H4.625ZM20 8v11c0 .69-.31 1-.999 1H6v1.5h13.001c1.52 0 2.499-.982 2.499-2.5V8H20Z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>',
'align'				=> 'full',

));
			}
		}
require_once('inc/degree-filter-ajax.php');
require_once('inc/directory-ajax.php');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'icon_url' => 'dashicons-art',
    ));
}