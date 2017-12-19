<?php
/**
 * thorium Theme Customizer
 *
 * @package thorium
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
if ( ! function_exists( 'thorium_customize_register' ) ) {
	function thorium_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector'        => 'navbar-brand',
				'render_callback' => 'thorium_customize_partial_blogname',
			) );
		}
		
				
		/*
		 * All theme controls
		 * V1.0.0
		 */
		// Button Control
		require get_template_directory() . '/inc/customizer/controls/pro.php';

		// Main theme controls
		
		thorium_select_control( 
			'thorium_color_scheme', 
			'colors', 
			array(
				'yellow' => __('Yellow (default)','thorium'),
				'red' => __('Red','thorium'),
				'green' => __('Green','thorium'),
			), 
			__('Site Color','thorium'), 
			'yellow', 
			30 
		);
		
		/*
		 * All theme settings
		 * v1.0.0
		 */
		// Social
		require get_template_directory() . '/inc/customizer/settings/social.php';
		// Post
		require get_template_directory() . '/inc/customizer/settings/post.php';
		// Footer
		require get_template_directory() . '/inc/customizer/settings/footer.php';
		// Header
		require get_template_directory() . '/inc/customizer/settings/header.php';
		// Layout
		require get_template_directory() . '/inc/customizer/settings/layout.php';
		
		// Panel for theme settings
		$wp_customize->add_panel( 'thorium_theme_settings',
    		array(
        		'priority'          => 70,
        		'capability'        => 'edit_theme_options',
        		'title'             => __( 'Settings', 'thorium' ),
    		)
		);
		
				// Documentation
		$wp_customize->add_section('thorium_pro', array(
    		'title'     => __( 'Thorium Pro', 'thorium'),
    		'priority'  => 0,
		));

    	$wp_customize->add_setting( 'thorium_pro_details', array(
        	'default'           => false,
        	'capability'        => 'edit_theme_options',
        	'sanitize_callback' => 'wp_filter_nohtml_kses',
    	));
    	
    	$wp_customize->add_control(
        	new Thorium_Section_Pro(
        	$wp_customize,
        	'thorium_pro',
            	array(
                	'label'     => __('Thorium Pro','thorium'),
                	'section'   => 'thorium_pro',
                	'settings'  => 'thorium_pro_details',
            	)
        	)
    	);


	}
}
add_action( 'customize_register', 'thorium_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function thorium_customize_partial_blogname() {
	bloginfo( 'name' );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function thorium_customize_preview_js() {
	wp_enqueue_script( 'thorium_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), THORIUM_VERSION, true );
}
add_action( 'customize_preview_init', 'thorium_customize_preview_js' );

/**
 * Enqueue customizer css
 */
function thorium_customize_css() {
	wp_enqueue_style( 'thorium_customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer.css', array(), THORIUM_VERSION, 'all' );
}
add_action( 'customize_controls_print_styles', 'thorium_customize_css' );
