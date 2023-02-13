<?php
/**
 * gross_yui functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gross_yui
 */



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gross_yui_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on gross_yui, use a find and replace
		* to change 'gross_yui' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('gross_yui', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'gross_yui'),
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
			'gross_yui_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'gross_yui_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gross_yui_content_width()
{
	$GLOBALS['content_width'] = apply_filters('gross_yui_content_width', 640);
}
add_action('after_setup_theme', 'gross_yui_content_width', 0);

function gross_yui_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'gross_yui'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'gross_yui'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'gross_yui_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function gross_yui_scripts()
{
	wp_enqueue_style('gross_yui-style', get_template_directory_uri() . '/dist/css/style.css?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/dist/css/style.css')), null, array());

    wp_enqueue_script('gross_yui-script', get_template_directory_uri() . '/dist/index.js?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/dist/index.js')), array(), null, true);
	wp_enqueue_script('gross_yui-theme-script', get_template_directory_uri() . '/src/js/index.js?' . date("ymdHis", filemtime(get_stylesheet_directory() . '/src/js/index.js')), array(), null, true);
}
add_action('wp_enqueue_scripts', 'gross_yui_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

//自動出力ソースの削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);
add_action('wp_enqueue_scripts', 'remove_block_library_style');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function remove_block_library_style()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
}
function remove_dns_prefetch($hints, $relation_type)
{
	if ('dns-prefetch' === $relation_type) {
		return array_diff(wp_dependencies_unique_hosts(), $hints);
	}
	return $hints;
}
?>