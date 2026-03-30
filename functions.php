<?php
/**
 * Simontsao functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Simontsao
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
function simontsao_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Simontsao, use a find and replace
		* to change 'simontsao' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'simontsao', get_template_directory() . '/languages' );

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
			'mainMenu' => esc_html__( 'Main Menu', 'simontsao' ),
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
			'simontsao_custom_background_args',
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
add_action( 'after_setup_theme', 'simontsao_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simontsao_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'simontsao_content_width', 640 );
}
add_action( 'after_setup_theme', 'simontsao_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simontsao_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'simontsao' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'simontsao' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'simontsao_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function simontsao_scripts() {
	$theme_uri  = get_template_directory_uri();
	$theme_path = get_template_directory();

	wp_enqueue_style( 'simontsao-bootstrap', $theme_uri . '/assets/css/bootstrap.min.css', array(), filemtime( $theme_path . '/assets/css/bootstrap.min.css' ) );
	wp_enqueue_style( 'simontsao-fonts', 'https://fonts.googleapis.com/css?family=Ubuntu&display=swap&subset=latin,latin-ext', array(), null );
	
	wp_enqueue_style( 'simontsao-style', get_stylesheet_uri(), array( 'simontsao-bootstrap', 'simontsao-fonts' ), filemtime( $theme_path . '/style.css' ) );
	wp_style_add_data( 'simontsao-style', 'rtl', 'replace' );
	wp_enqueue_style( 'simontsao-animate', $theme_uri . '/assets/css/animate.min.css', array( 'simontsao-style' ), filemtime( $theme_path . '/assets/css/animate.min.css' ) );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'simontsao-bootstrap', $theme_uri . '/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), filemtime( $theme_path . '/assets/js/bootstrap.bundle.min.js' ), true );
	wp_enqueue_script( 'simontsao-main', $theme_uri . '/assets/js/main.js', array( 'jquery', 'simontsao-bootstrap' ), filemtime( $theme_path . '/assets/js/main.js' ), true );
	wp_enqueue_script( 'simontsao-jq-bootstrap-validation', $theme_uri . '/assets/js/jq-bootstrap-validation.js', array( 'jquery' ), filemtime( $theme_path . '/assets/js/jq-bootstrap-validation.js' ), true );
	wp_enqueue_script( 'simontsao-form-handler', $theme_uri . '/assets/js/form-handler.js', array( 'jquery', 'simontsao-jq-bootstrap-validation', 'simontsao-main' ), filemtime( $theme_path . '/assets/js/form-handler.js' ), true );
	wp_enqueue_script( 'simontsao-lazysizes', $theme_uri . '/assets/js/lazysizes.min.js', array(), filemtime( $theme_path . '/assets/js/lazysizes.min.js' ), true );
	wp_enqueue_script( 'simontsao-universal-parallax', $theme_uri . '/assets/js/universal-parallax.js', array(), filemtime( $theme_path . '/assets/js/universal-parallax.js' ), true );
	wp_enqueue_script( 'simontsao-scroll-fx', $theme_uri . '/assets/js/scroll-fx.js', array( 'simontsao-universal-parallax' ), filemtime( $theme_path . '/assets/js/scroll-fx.js' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'simontsao_scripts' );


/**
 * Disable Gutenberg Editor Completely
 * Use Classic Editor for all post types
 */
function simontsao_disable_gutenberg() {
	// Disable Gutenberg for all post types
	add_filter( 'use_block_editor_for_post_type', '__return_false' );

	// Disable Gutenberg for posts
	add_filter( 'use_block_editor_for_post', '__return_false' );
}
add_action( 'wp_loaded', 'simontsao_disable_gutenberg' );

/**
 * Disable the block widget editor and restore classic widgets
 */
function simontsao_disable_block_widgets() {
	remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'simontsao_disable_block_widgets' );

/**
 * Disable Gutenberg block library CSS
 * Removes unnecessary CSS from frontend for better performance
 */
function simontsao_disable_block_library_css() {
	// Remove block library CSS from loading on the frontend
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );

	// Remove WooCommerce Blocks CSS
	wp_dequeue_style( 'wc-blocks-style' );
	wp_dequeue_style( 'wc-blocks-style-active-filters' );
	wp_dequeue_style( 'wc-blocks-style-add-to-cart-form' );
	wp_dequeue_style( 'wc-blocks-style-all-products' );
	wp_dequeue_style( 'wc-blocks-style-all-reviews' );
	wp_dequeue_style( 'wc-blocks-style-attribute-filter' );
	wp_dequeue_style( 'wc-blocks-style-breadcrumbs' );
	wp_dequeue_style( 'wc-blocks-style-catalog-sorting' );
	wp_dequeue_style( 'wc-blocks-style-customer-account' );
	wp_dequeue_style( 'wc-blocks-style-featured-category' );
	wp_dequeue_style( 'wc-blocks-style-featured-product' );
	wp_dequeue_style( 'wc-blocks-style-mini-cart' );
	wp_dequeue_style( 'wc-blocks-style-price-filter' );
	wp_dequeue_style( 'wc-blocks-style-product-add-to-cart' );
	wp_dequeue_style( 'wc-blocks-style-product-button' );
	wp_dequeue_style( 'wc-blocks-style-product-categories' );
	wp_dequeue_style( 'wc-blocks-style-product-image' );
	wp_dequeue_style( 'wc-blocks-style-product-image-gallery' );
	wp_dequeue_style( 'wc-blocks-style-product-query' );
	wp_dequeue_style( 'wc-blocks-style-product-results-count' );
	wp_dequeue_style( 'wc-blocks-style-product-reviews' );
	wp_dequeue_style( 'wc-blocks-style-product-sale-badge' );
	wp_dequeue_style( 'wc-blocks-style-product-search' );
	wp_dequeue_style( 'wc-blocks-style-product-sku' );
	wp_dequeue_style( 'wc-blocks-style-product-stock-indicator' );
	wp_dequeue_style( 'wc-blocks-style-product-summary' );
	wp_dequeue_style( 'wc-blocks-style-product-title' );
	wp_dequeue_style( 'wc-blocks-style-rating-filter' );
	wp_dequeue_style( 'wc-blocks-style-reviews-by-category' );
	wp_dequeue_style( 'wc-blocks-style-reviews-by-product' );
	wp_dequeue_style( 'wc-blocks-style-product-details' );
	wp_dequeue_style( 'wc-blocks-style-single-product' );
	wp_dequeue_style( 'wc-blocks-style-stock-filter' );
	wp_dequeue_style( 'wc-blocks-style-cart' );
	wp_dequeue_style( 'wc-blocks-style-checkout' );
	wp_dequeue_style( 'wc-blocks-style-mini-cart-contents' );

	// Remove other WordPress default styles
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'simontsao_disable_block_library_css', 100 );

/**
 * Disable Gutenberg block library CSS in admin
 * Further performance optimization
 */
function simontsao_disable_block_library_css_admin() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'admin_enqueue_scripts', 'simontsao_disable_block_library_css_admin', 100 );

/**
 * Register ACF options pages used for shared site-wide content.
 *
 * @return void
 */
function simontsao_register_acf_options_pages() {
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}

	acf_add_options_page(
		[
			'page_title' => __( 'Site Settings', 'simontsao' ),
			'menu_title' => __( 'Site Settings', 'simontsao' ),
			'menu_slug'  => 'site-settings',
			'capability' => 'edit_posts',
			'redirect'   => false,
		]
	);
}
add_action( 'acf/init', 'simontsao_register_acf_options_pages' );

require_once get_template_directory() . '/inc/helper-functions/flexible-content.php';
require_once get_template_directory() . '/inc/helper-functions/icon-renderer.php';
require_once get_template_directory() . '/inc/helper-functions/responsive-picture.php';
require_once get_template_directory() . '/inc/helper-functions/site-settings.php';



