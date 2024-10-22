<?php
/**
 * Foodie Review Blog functions and definitions
 *
 * @package Foodie Review Blog
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'foodie_review_blog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function foodie_review_blog_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 680;
	
	load_theme_textdomain( 'foodie-review-blog', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 80,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'foodie-review-blog' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );
}
endif; // foodie_review_blog_setup
add_action( 'after_setup_theme', 'foodie_review_blog_setup' );

function foodie_review_blog_the_breadcrumb() {
    echo '<div class="breadcrumb my-3">';

    if (!is_home()) {
        echo '<a class="home-main align-self-center" href="' . esc_url(home_url()) . '">';
        bloginfo('name');
        echo "</a>";

        if (is_category() || is_single()) {
            the_category(' ');
            if (is_single()) {
                echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
            }
        } elseif (is_page()) {
            echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
        }
    }

    echo '</div>';
}

function foodie_review_blog_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'foodie-review-blog' ),
		'description'   => __( 'Appears on blog page sidebar', 'foodie-review-blog' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'foodie-review-blog' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'foodie-review-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'foodie-review-blog' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'foodie-review-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar(array(
        'name'          => __('Shop Sidebar', 'foodie-review-blog'),
        'description'   => __('Sidebar for WooCommerce shop pages', 'foodie-review-blog'),
		'id'            => 'woocommerce_sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
	register_sidebar(array(
        'name'          => __('Single Product Sidebar', 'foodie-review-blog'),
        'description'   => __('Sidebar for single product pages', 'foodie-review-blog'),
		'id'            => 'woocommerce-single-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));		
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'foodie-review-blog' ),
		'description'   => __( 'Appears on footer', 'foodie-review-blog' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'foodie-review-blog' ),
		'description'   => __( 'Appears on footer', 'foodie-review-blog' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'foodie-review-blog' ),
		'description'   => __( 'Appears on footer', 'foodie-review-blog' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'foodie-review-blog' ),
		'description'   => __( 'Appears on footer', 'foodie-review-blog' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'foodie_review_blog_widgets_init' );

// Change number of products per row to 3
add_filter('loop_shop_columns', 'foodie_review_blog_loop_columns');
if (!function_exists('foodie_review_blog_loop_columns')) {
    function foodie_review_blog_loop_columns() {
        $colm = get_theme_mod('foodie_review_blog_products_per_row', 3); // Default to 3 if not set
        return $colm;
    }
}

// Use the customizer setting to set the number of products per page
function foodie_review_blog_products_per_page($cols) {
    $cols = get_theme_mod('foodie_review_blog_products_per_page', 9); // Default to 9 if not set
    return $cols;
}
add_filter('loop_shop_per_page', 'foodie_review_blog_products_per_page', 9);

function foodie_review_blog_scripts() {
	
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style('foodie-review-blog-style', get_stylesheet_uri(), array() );
		wp_style_add_data('foodie-review-blog-style', 'rtl', 'replace');

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'foodie-review-blog-style',$foodie_review_blog_color_scheme_css );
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'foodie-review-blog-default', esc_url(get_template_directory_uri())."/css/default.css" );
	
	wp_enqueue_style( 'foodie-review-blog-style', get_stylesheet_uri() );
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'foodie-review-blog-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );
	wp_enqueue_style( 'foodie-review-blog-block-style', esc_url( get_template_directory_uri() ).'/css/blocks.css' );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// font-family
	$foodie_review_blog_headings_font = esc_html(get_theme_mod('foodie_review_blog_headings_fonts'));
    $foodie_review_blog_body_font = esc_html(get_theme_mod('foodie_review_blog_body_fonts'));

    if ($foodie_review_blog_headings_font) {
        wp_enqueue_style('foodie-review-blog-headings-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($foodie_review_blog_headings_font));
    } else {
        wp_enqueue_style('Roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900');
    }

    if ($foodie_review_blog_body_font) {
        wp_enqueue_style('foodie-review-blog-body-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($foodie_review_blog_body_font));
    } else {
        wp_enqueue_style('Mulish', 'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000');
    }

}
add_action( 'wp_enqueue_scripts', 'foodie_review_blog_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Sanitization Callbacks.
 */
require get_template_directory() . '/inc/sanitization-callbacks.php';

/**
 * Webfont-Loader.
 */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * select .
 */
require get_template_directory() . '/inc/select/category-dropdown-custom-control.php';

/**
 * Load TGM.
 */
require get_template_directory() . '/inc/tgm/tgm.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';

if ( ! defined( 'FOODIE_REVIEW_BLOG_PRO_NAME' ) ) {
	define( 'FOODIE_REVIEW_BLOG_PRO_NAME', __( 'About Foodie Review Blog', 'foodie-review-blog' ));
}
if ( ! defined( 'FOODIE_REVIEW_BLOG_PREMIUM_PAGE' ) ) {
define('FOODIE_REVIEW_BLOG_PREMIUM_PAGE',__('https://www.theclassictemplates.com/products/food-review-wordpress-theme','foodie-review-blog'));
}
if ( ! defined( 'FOODIE_REVIEW_BLOG_THEME_PAGE' ) ) {
	define('FOODIE_REVIEW_BLOG_THEME_PAGE',__('https://www.theclassictemplates.com/collections/best-wordpress-templates','foodie-review-blog'));
}
if ( ! defined( 'FOODIE_REVIEW_BLOG_SUPPORT' ) ) {
define('FOODIE_REVIEW_BLOG_SUPPORT',__('https://wordpress.org/support/theme/foodie-review-blog/','foodie-review-blog'));
}
if ( ! defined( 'FOODIE_REVIEW_BLOG_REVIEW' ) ) {
define('FOODIE_REVIEW_BLOG_REVIEW',__('https://wordpress.org/support/theme/foodie-review-blog/reviews/#new-post','foodie-review-blog'));
}
if ( ! defined( 'FOODIE_REVIEW_BLOG_PRO_DEMO' ) ) {
define('FOODIE_REVIEW_BLOG_PRO_DEMO',__('https://live.theclassictemplates.com/foodie-review-blog-pro/','foodie-review-blog'));
}
if ( ! defined( 'FOODIE_REVIEW_BLOG_THEME_DOCUMENTATION' ) ) {
define('FOODIE_REVIEW_BLOG_THEME_DOCUMENTATION',__('https://live.theclassictemplates.com/demo/docs/foodie-review-blog-free/','foodie-review-blog'));
}

/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'footer-1' => array(
				'categories',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'meta',
			),
			'footer-4' => array(
				'search',
			),
		),
    ));
    
// logo
if ( ! function_exists( 'foodie_review_blog_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function foodie_review_blog_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

// Function to track post views
function foodie_review_blog_set_post_views($foodie_review_blog_postID) {
    $foodie_review_blog_count_key = 'post_views_count';
    $foodie_review_blog_count = get_post_meta($foodie_review_blog_postID, $foodie_review_blog_count_key, true);
    if($foodie_review_blog_count == '') {
        $foodie_review_blog_count = 0;
        delete_post_meta($foodie_review_blog_postID, $foodie_review_blog_count_key);
        add_post_meta($foodie_review_blog_postID, $foodie_review_blog_count_key, '0');
    } else {
        $foodie_review_blog_count++;
        update_post_meta($foodie_review_blog_postID, $foodie_review_blog_count_key, $foodie_review_blog_count);
    }
}

function foodie_review_blog_get_post_views($foodie_review_blog_postID){
    $foodie_review_blog_count_key = 'post_views_count';
    $foodie_review_blog_count = get_post_meta($foodie_review_blog_postID, $foodie_review_blog_count_key, true);
    if($foodie_review_blog_count == '') {
        $foodie_review_blog_count = 0;
    }

    return '<i class="fa-regular fa-eye"></i>' . $foodie_review_blog_count . '';
}

// To track views on single post
function foodie_review_blog_track_post_views ($foodie_review_blog_post_id) {
    if ( !is_single() ) return;
    if ( empty ( $foodie_review_blog_post_id) ) {
        global $post;
        $foodie_review_blog_post_id = $post->ID;
    }
    foodie_review_blog_set_post_views($foodie_review_blog_post_id);
}
add_action( 'wp_head', 'foodie_review_blog_track_post_views');

if ( is_user_logged_in() ) return; // Exclude logged-in users
