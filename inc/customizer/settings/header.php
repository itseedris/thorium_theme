<?php 
	// header section
	$wp_customize->add_section( 'thorium_header_settings', array(
		'title' => __( 'Header Settings', 'thorium' ),
		'panel' => 'thorium_theme_settings',
		'priority' => 40,
	) );
	
	// Use featured image as header image
	thorium_checkbox_control( 
		'thorium_featured_image_posts', 
		'thorium_header_settings', 
		__( 'Use featured image as header image in Single post and page?', 'thorium' ), 
		0, 
		10, 
		'refresh' 
	);
	
	// Blog Heading
	thorium_text_control( 
		'thorium_blog_heading', 
		'thorium_header_settings', 
		__( 'Blog Heading', 'thorium' ), 
		__('page heading','thorium'), 
		20, 
		'postMessage' 
	);
	
	// Blog Secondary
	thorium_text_control( 
		'thorium_blog_secondary_heading', 
		'thorium_header_settings', 
		__( 'Blog Secondary Heading', 'thorium' ), 
		'', 
		30, 
		'postMessage' 
	); 
	