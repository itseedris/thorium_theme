<?php
/**
 * Thorium functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Thorium
 */

if ( ! function_exists( 'thorium_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function thorium_setup() {

	if( !defined( 'THORIUM_VERSION' ) ) :
            define( 'THORIUM_VERSION', '1.1.1' );
    endif;
	
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
	add_image_size( 'thorium-thumbnail', 1900, 872 );

	// This theme uses wp_nav_menu() in two location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'thorium' ),
		'footer' => esc_html__( 'Footer Menu', 'thorium' ),
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
	add_theme_support( 'custom-background', apply_filters( 'thorium_custom_background_args', array(
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
}
endif;
add_action( 'after_setup_theme', 'thorium_setup' );

if ( ! function_exists('thorium_content_width') ){
	/**
 	* Set the content width in pixels, based on the theme's design and stylesheet.
 	*
 	* Priority 0 to make it available to lower priority callbacks.
 	*
 	* @global int $content_width
 	*/
	function thorium_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'thorium_content_width', 640 );
	}
}
add_action( 'after_setup_theme', 'thorium_content_width', 0 );

if ( ! function_exists('thorium_widgets_init') ){
	/**
 	* Register widget area.
 	*
 	* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 	*/
	function thorium_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'thorium' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets to sidebar here.', 'thorium' ),
			'before_widget' => '<div class="well widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );
	}
}
add_action( 'widgets_init', 'thorium_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function thorium_scripts() {
	wp_enqueue_style( 'thorium-style', get_stylesheet_uri(), array('bootstrap'), THORIUM_VERSION );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '3.3.7' );
	
	wp_enqueue_style( 'thorium-main', get_template_directory_uri() . '/assets/css/main.min.css', array('bootstrap'), THORIUM_VERSION );
	
	if ( ( get_theme_mod('thorium_color_scheme', 'yellow') === 'yellow') ) {
	
		wp_enqueue_style( 'thorium-yellow', get_template_directory_uri() . '/assets/css/yellow.css', array('bootstrap'), THORIUM_VERSION );
	
	}
	elseif ( ( get_theme_mod('thorium_color_scheme', 'yellow') === 'red') ) {
	
		wp_enqueue_style( 'thorium-red', get_template_directory_uri() . '/assets/css/red.css', array('bootstrap'), THORIUM_VERSION );
	
	}
	elseif ( ( get_theme_mod('thorium_color_scheme', 'yellow') === 'green') ) {
	
		wp_enqueue_style( 'thorium-green', get_template_directory_uri() . '/assets/css/green.css', array('bootstrap'), THORIUM_VERSION );
	
	}
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/vendor/font-awesome/css/font-awesome.min.css', array(), '4.6.3' );
	
	wp_enqueue_style( 'thorium-Montserrat-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700');
	
	wp_enqueue_style( 'thorium-Kaushan-Script-google-fonts', 'https://fonts.googleapis.com/css?family=Kaushan+Script');
	
	wp_enqueue_style( 'thorium-Droid-Serif-google-fonts', 'https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic');
	
	wp_enqueue_style( 'thorium-Roboto-Slab-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700');
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	
	wp_enqueue_script( 'thorium-js', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), THORIUM_VERSION, true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thorium_scripts' );

if ( ! function_exists('thorium_excerpt_length') ){
	/**
 	* Reduce excerpt lenght to 40 words and link to page.
 	*
 	* @since Thorium 1.0
 	*/
  	function thorium_excerpt_length( $length ) {
  		if( is_admin() ) { return $length; }
  		return 40;
  	}
}
add_filter('excerpt_length','thorium_excerpt_length');

if ( ! function_exists('thorium_excerpt_more') ){
  	function thorium_excerpt_more( $more ) {
  		if( is_admin() ) { return $more; }
  		return '<br><br><a class="excerpt-more" href="'.esc_url( get_permalink() ).'">'.__('Read More &rarr;','thorium').' </a>';
  	}
}
add_filter('excerpt_more','thorium_excerpt_more',999);

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
 * Add the bootstrap nav-menu walker.
 *
 * @since thorium 1.0
 */
  require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
  
/**
 * thorium main functions.
 *
 * @since thorium 1.0
 */
  require get_template_directory() . '/inc/thorium.php';
  
/**
 * Required Plugins.
 *
 * @since thorium 1.0
 */
  require get_template_directory() . '/inc/required-plugins.php';  
 
/**
 * TGMPA.
 *
 * @since thorium 1.0
 */
  require get_template_directory() . '/inc/class-tgm-plugin-activation.php'; 
 
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';
