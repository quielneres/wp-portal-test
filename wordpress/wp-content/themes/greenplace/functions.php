<?php
/**
 * Greenplace functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Greenplace
 */

/**
 * Load Auth
 */
require get_template_directory() . '/inc/auth-intranet/BB_AuthIntranet.php';


@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

$auth = new BB_AuthIntranet();
$auth->checkLogin();

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '2.0.0' );
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

		wp_enqueue_style( 'process', get_template_directory_uri() . '/css/process.css',false,'1.1','all');
		wp_enqueue_style( 'guide', get_template_directory_uri() . '/css/guide.css',false,'1.1','all');
		wp_enqueue_style( 'employee', get_template_directory_uri() . '/css/employee.css',false,'1.1','all');

		wp_enqueue_style( 'footer', get_template_directory_uri() . '/css/footer.css',false,'1.1','all');
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
	$register_sidebar = [
		[
			'name' => 'Home Middle',
			'id'   => 'home-mid-1',
			'description' => 'Add widgets here.'
		],
		[
			'name' => 'Home Bottom',
			'id'   => 'home-bottom-1',
			'description' => 'Add widgets here.'
		],
		[
			'name' => 'Process Sidebar',
			'id'   => 'process-sidebar-1',
			'description' => 'Add widgets here.'
		],
		[
			'name' => 'Home Topo Right',
			'id'   => 'home-topo-2',
			'description' => 'Add widgets here.'
		],
		[
			'name' => 'Home Middle Right',
			'id'   => 'home-mid-2',
			'description' => 'Add widgets here.'
		],
		[
			'name' => 'Home Bottom Left',
			'id'   => 'home-bot-1',
			'description' => 'Add widgets here.'
		],
		[
			'name' => 'Home Bottom Right',
			'id'   => 'home-bot-2',
			'description' => 'Add widgets here.'
		],
	];

	foreach ($register_sidebar as $sidebar) {
		register_sidebar(
			array(
				'name'          => esc_html__($sidebar['name'], 'greenplace'),
				'id'            => $sidebar['id'],
				'description'   => esc_html__($sidebar['description'], 'greenplace'),
				'before_widget' => '<section id="%1$s" class="widget fx-grow %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget__title">',
				'after_title'   => '</h2>',
			)
		);
	}
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

	wp_enqueue_script( 'greenplace-questions', get_template_directory_uri() . '/js/questions.js', array(), '20151215', true );

	wp_enqueue_script( 'greenplace-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'greenplace-menu-fix', get_template_directory_uri() . '/js/menu-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'greenplace-tab-guide', get_template_directory_uri() . '/js/tab-guide.js', array(), '20151215', true );

	wp_enqueue_script( 'greenplace-contract', get_template_directory_uri() . '/js/contract.js', array(), '20151215', true );

	wp_enqueue_script( 'greenplace-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'greenplace-professional-profiles', get_template_directory_uri() . '/js/professional-profiles.js', array(), '20151215', true );

	wp_enqueue_script( 'greenplace-logout-intranet', get_template_directory_uri() . '/js/logout-intranet.js', array(), '20151215', true );

	wp_enqueue_script( 'greenplace-employee', get_template_directory_uri() . '/js/employee.js', array(), '20151215', true );

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


add_action( 'wp_ajax_get_professional_profiles', 'professional_profiles' );
add_action( 'wp_ajax_nopriv_get_professional_profiles', 'professional_profiles' );

function logout_intranet() {

	$auth = new BB_AuthIntranet();
	$resposta = $auth->logoutIntranet();
	echo json_encode($resposta);
	die();
}

add_action( 'wp_ajax_get_logout_intranet', 'logout_intranet' );
add_action( 'wp_ajax_nopriv_get_logout_intranet', 'logout_intranet' );


function cyb_document_title_separator( $sep ) {

	$sep = "";

	return $sep;

}

function get_questions_faq($category): array {
	$questions = new Questions();
	return $questions->list_questions($category);
}

function get_process($category): array {
	$process = new Process();
	return $process->list_process($category);
}

function get_guides($category): array {
	$process = new Guide();
	return $process->list_guides($category);
}

function get_employees(): array {
	$process = new Employee();
	return $process->list_employees();
}

function dynamic_select_form_contact ( $scanned_tag, $replace ) {

	if ( $scanned_tag['name'] != 'empresas' )
		return $scanned_tag;

	$rows = get_posts( array(
		'post_type'      => 'company',
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC'
	) );

	if ( ! $rows )
		return $scanned_tag;

	foreach ( $rows as $row ) {
		$scanned_tag['raw_values'][] = $row->post_title . '|' . $row->post_title;
	}

	$pipes = new WPCF7_Pipes($scanned_tag['raw_values']);

	$scanned_tag['values'] = $pipes->collect_befores();
	$scanned_tag['labels'] = $pipes->collect_afters();
	$scanned_tag['pipes'] = $pipes;

	return $scanned_tag;
}

add_filter( 'wpcf7_form_tag', 'dynamic_select_form_contact', 10, 2);

function get_question_category(): array {

	$raw_fields = acf_get_raw_fields( 456 );

	$category_field = array_filter($raw_fields, function($filed) {
		if ($filed['name'] == 'category') {
			return $filed;
		}
	});

	$arr_category = [];

	foreach ($category_field as $field) {
		$arr_category[] = $field['choices'];
	}

	return $arr_category[0];
}

function get_usuario_intranet(): array {
	$usuaria_intarnet = new UsuarioIntranet();

	return $usuaria_intarnet->obterUsuario();
}

function get_content_portal_maps_footer(): array
{
	$maps = new PortalMap();
	return $maps->get_map_footer();
}

function get_content_professional_profiles(): array
{
	$professionals = new ProfessionalProfiles();
	return $professionals->get_professional_profiles();
}

function get_content_outsourcing_journey(): array
{
	$outsourcing = new OutsourcingJourney();
	return $outsourcing->get_outsourcing_journey();
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
//require get_template_directory() . '/post-types/acionamento.php';
require get_template_directory() . '/post-types/guide-acionamento.php';
require get_template_directory() . '/post-types/employee.php';
require get_template_directory() . '/post-types/user.php';
require get_template_directory() . '/post-types/team.php';
require get_template_directory() . '/post-types/simple.php';

require get_template_directory() . '/post-types/portal-map.php';
require get_template_directory() . '/post-types/professional-profiles.php';
require get_template_directory() . '/post-types/outsourcing-journey.php';

/**
 * Call a modular widget function
 */
require get_template_directory() . '/inc/widgets/widget-block.php';
require get_template_directory() . '/inc/widgets/widget-process.php';
require get_template_directory() . '/inc/widgets/widget-important.php';
require get_template_directory() . '/inc/widgets/widget-timeline.php';
require get_template_directory() . '/inc/widgets/widget-professional-profile.php';
require get_template_directory() . '/inc/widgets/widget-guides.php';
require get_template_directory() . '/inc/widgets/widget-outsourcing-journey.php';

/**
 * Load controllers
 */
require get_template_directory() . '/inc/controllers/ProfessionalProfiles.php';
require get_template_directory() . '/inc/controllers/Questions.php';
require get_template_directory() . '/inc/controllers/Process.php';
require get_template_directory() . '/inc/controllers/Guide.php';
require get_template_directory() . '/inc/controllers/UsuarioIntranet.php';
require get_template_directory() . '/inc/controllers/Employee.php';

require get_template_directory() . '/inc/controllers/PortalMap.php';

require get_template_directory() . '/inc/controllers/CustomRewriteController.php';
require get_template_directory() . '/inc/controllers/OutsourcingJourney.php';

