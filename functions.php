<?php
/**
 * Teemu Laurell functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Infinity_Seeker
 */

if ( ! function_exists('infinity_seeker_setup')) :

/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
function infinity_seeker_setup() {
    /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Teemu Laurell, use a find and replace
		 * to change 'infinity-seeker' to the name of your theme in all the template files.
		 */
    load_theme_textdomain('infinity-seeker', get_template_directory() . '/languages');

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
    register_nav_menus(array('menu-1'=> esc_html__('Primary', 'infinity-seeker'),
    ));

    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
    add_theme_support('html5', array('search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('infinity_seeker_custom_background_args', array('default-color'=> 'ffffff',
    'default-image'=> '',
    )));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
    add_theme_support('custom-logo', array('height'=> 250,
    'width'=> 250,
    'flex-width'=> true,
    'flex-height'=> true,
    ));
}

endif;
add_action('after_setup_theme', 'infinity_seeker_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function infinity_seeker_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width']=apply_filters('infinity_seeker_content_width', 640);
}

add_action('after_setup_theme', 'infinity_seeker_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function infinity_seeker_widgets_init() {
    register_sidebar(array('name'=> esc_html__('Sidebar', 'infinity-seeker'),
    'id'=> 'sidebar-1',
    'description'=> esc_html__('Add widgets here.', 'infinity-seeker'),
    'before_widget'=> '<section id="%1$s" class="widget %2$s">',
    'after_widget'=> '</section>',
    'before_title'=> '<h2 class="widget-title">',
    'after_title'=> '</h2>',
    ));
}

add_action('widgets_init', 'infinity_seeker_widgets_init');

/**
 *  Remove junk from header
 */

// Remove Blog and Comments Feed Link from WordPress Head
remove_action('wp_head', 'feed_links', 2);

// Remove RSD Link from WordPress head
remove_action('wp_head', 'rsd_link');

// Remove Manifest Link from WordPress Head
// Disable Windows Live Writer Support
remove_action('wp_head', 'wlwmanifest_link');

// Remove Next Previous Links from WordPress Head
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Remove Emoji Style and Script from WordPress Head
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove dns-prefetch Link from WordPress Head (Frontend)
remove_action('wp_head', 'wp_resource_hints', 2);

// Remove oembed Post Links from WordPress Head (Frontend)
remove_action('wp_head', 'wp_oembed_add_discovery_links');

// Remove WP Json Rest Api link from WordPress Head (Frontend)
remove_action('wp_head', 'rest_output_link_wp_head');

// Remove html5shivmin.js from WordPress Head (Frontend)
function remove_default_scripts3() {
    wp_deregister_script('html5shiv');
}

add_action('wp_enqueue_scripts', 'remove_default_scripts3');


/**
 * Enqueue scripts and styles.
 */

function infinity_seeker_scripts() {

    wp_enqueue_style('infinity-seeker-style', get_template_directory_uri() . '/css/style.css');

    wp_enqueue_script('infinity-seeker-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('infinity-seeker-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'infinity_seeker_scripts');

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

function cc_mime_types($mimes) {
    $mimes['svg']='image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

// Remove autoformatting
remove_filter('the_content', 'wpautop');