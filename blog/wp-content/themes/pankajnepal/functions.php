<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2/22/2016
 * Time: 4:52 PM
 */

/**
 * This theme only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
    require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'personalblog_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * Create your own personalblog_setup() function to override in a child theme.
     *
     */
    function personalblog_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Twenty Sixteen, use a find and replace
         * to change 'twentysixteen' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'personalblog', get_template_directory() . '/languages' );

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
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1200, 9999 );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'personalblog' ),
            'social'  => __( 'Social Links Menu', 'personalblog' ),
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

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ) );

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style( array( 'css/editor-style.css', personalblog_fonts_url() ) );
    }
endif; // personalblog_setup
add_action( 'after_setup_theme', 'personalblog_setup' );

if ( ! function_exists( 'personalblog_fonts_url' ) ) :
    /**
     * Register Google fonts for this theme.
     *
     * Create your own personalblog_fonts_url() function to override in a child theme.
     *
     * @return string Google fonts URL for the theme.
     */
    function personalblog_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Open+Sans, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Open+Sans font: on or off', 'personalblog' ) ) {
            $fonts[] = 'Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300,300italic';
        }

        /* translators: If there are characters in your language that are not supported by Handlee, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Handlee font: on or off', 'twentysixteen' ) ) {
            $fonts[] = 'Handlee';
        }

        /* translators: If there are characters in your language that are not supported by Economica, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Economica font: on or off', 'twentysixteen' ) ) {
            $fonts[] = 'Economica:700,400italic,400,700italic';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 */
function personalblog_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'personalblog_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 */
function personalblog_scripts() {
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'google-fonts', personalblog_fonts_url(), array(), null );

    // Styles
    wp_enqueue_style( 'materialize-css', get_template_directory_uri() . '/assets/vendor/materialize/css/materialize.min.css');
    wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/vendor/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style( 'personalblog-style', get_template_directory_uri() . '/assets/theme/css/style.css');

    // Scripts
    wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/assets/vendor/jquery-2.1.1.min.js' );
    wp_enqueue_script( 'materialize-js', get_template_directory_uri() . '/assets/vendor/materialize/js/materialize.min.js' );
    wp_enqueue_script( 'custome-js', get_template_directory_uri() . '/assets/theme/js/main.js' );
}
add_action( 'wp_enqueue_scripts', 'personalblog_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function personalblog_body_classes( $classes ) {
    // Adds a class of custom-background-image to sites with a custom background image.
    if ( get_background_image() ) {
        $classes[] = 'custom-background-image';
    }

    // Adds a class of group-blog to sites with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of no-sidebar to sites without active sidebar.
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    return $classes;
}
add_filter( 'body_class', 'personalblog_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function personalblog_hex2rgb( $color ) {
    $color = trim( $color, '#' );

    if ( strlen( $color ) === 3 ) {
        $r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
        $g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
        $b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
    } else if ( strlen( $color ) === 6 ) {
        $r = hexdec( substr( $color, 0, 2 ) );
        $g = hexdec( substr( $color, 2, 2 ) );
        $b = hexdec( substr( $color, 4, 2 ) );
    } else {
        return array();
    }

    return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';