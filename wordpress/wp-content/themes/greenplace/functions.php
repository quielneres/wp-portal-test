<?php
/**
 * Greenplace functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Greenplace
 */

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.5' );
}

if ( ! function_exists( 'greenplace_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function greenplace_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Greenplace, use a find and replace
		 * to change 'greenplace' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'greenplace', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		add_filter( 'document_title_separator', 'cyb_document_title_separator' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'greenplace' ),
			'top' => esc_html__( 'Top Menu', 'greenplace' ),
			'process' => esc_html__( 'Process Menu', 'greenplace' ),
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
		add_theme_support( 'custom-background', apply_filters( 'greenplace_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'greenplace_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function greenplace_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'greenplace_content_width', 640 );
}
add_action( 'after_setup_theme', 'greenplace_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function greenplace_widgets_init() {
	// register_sidebar(
	// 	array(
	// 		'name'          => esc_html__( 'Sidebar', 'greenplace' ),
	// 		'id'            => 'sidebar-1',
	// 		'description'   => esc_html__( 'Add widgets here.', 'greenplace' ),
	// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 		'after_widget'  => '</section>',
	// 		'before_title'  => '<h2 class="widget__title">',
	// 		'after_title'   => '</h2>',
	// 	)
	// );

	register_sidebar(
		array(
			'name'          => esc_html__( 'Home Middle', 'greenplace' ),
			'id'            => 'home-mid-1',
			'description'   => esc_html__( 'Add widgets here.', 'greenplace' ),
			'before_widget' => '<section id="%1$s" class="widget fx-grow %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget__title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Home Bottom', 'greenplace' ),
			'id'            => 'home-bottom-1',
			'description'   => esc_html__( 'Add widgets here.', 'greenplace' ),
			'before_widget' => '<div class="col col--md-6"><section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section></div>',
			'before_title'  => '<h2 class="widget__title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Process Sidebar', 'greenplace' ),
			'id'            => 'process-sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'greenplace' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget__title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'greenplace_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function greenplace_scripts() {
	wp_enqueue_style( 'greenplace-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_style_add_data( 'greenplace-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'greenplace-glide-framework', get_template_directory_uri() . '/js/glide.min.js', array(), '20151215', true );

	wp_enqueue_script( 'greenplace-glide', get_template_directory_uri() . '/js/glide.js', array(), '20151215', true );

	wp_enqueue_script( 'greenplace-faq', get_template_directory_uri() . '/js/faq.js', array(), '20151215', true );

	wp_enqueue_script( 'greenplace-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'greenplace-contract', get_template_directory_uri() . '/js/contract.js', array(), '20151215', true );

	wp_enqueue_script( 'greenplace-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'greenplace_scripts' );

add_action('http_api_curl', function( $handle ){
    // Don't verify SSL certs
    // curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);

    // Use Charles HTTP Proxy
    // curl_setopt($handle, CURLOPT_PROXY, "127.0.0.1");
    // curl_setopt($handle, CURLOPT_PROXYPORT, 3128);
}, 10);

function cyb_document_title_separator( $sep ) {

	$sep = "";

	return $sep;

}

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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 *
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 *
 */
require get_template_directory() . '/inc/bem-menu.php';
require get_template_directory() . '/inc/process-menu.php';

/**
 * Custom Post Types.
 */
require get_template_directory() . '/post-types/system.php';
require get_template_directory() . '/post-types/company.php';
require get_template_directory() . '/post-types/process.php';
require get_template_directory() . '/post-types/contract.php';
require get_template_directory() . '/post-types/tutorial.php';
require get_template_directory() . '/post-types/panel.php';
require get_template_directory() . '/post-types/question.php';
require get_template_directory() . '/post-types/bulletin.php';
require get_template_directory() . '/post-types/guide.php';
require get_template_directory() . '/post-types/user.php';
require get_template_directory() . '/post-types/team.php';
require get_template_directory() . '/post-types/simple.php';

/**
 * Call a modular widget function
*/
require get_template_directory() . '/inc/widgets/widget-block.php';
require get_template_directory() . '/inc/widgets/widget-process.php';
require get_template_directory() . '/inc/widgets/widget-important.php';
