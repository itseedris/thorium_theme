<?php 
	// post section
	$wp_customize->add_section( 'thorium_post_settings', array(
		'title' => __( 'Posts Settings', 'thorium' ),
		'panel' => 'thorium_theme_settings',
		'priority' => 20,
	) );
	
	// Show date - single page
	thorium_checkbox_control( 
		'thorium_show_single_date', 
		'thorium_post_settings', 
		__( 'Show Date in single posts?', 'thorium' ), 
		1, 
		10, 
		'postMessage' 
	);
	
	// Show category - index page
	thorium_checkbox_control( 
		'thorium_show_index_category', 
		'thorium_post_settings', 
		__( 'Show Category in blog page?', 'thorium' ), 
		1, 
		20, 
		'postMessage' 
	);
	
	// Show author - index page
	thorium_checkbox_control( 
		'thorium_show_index_author', 
		'thorium_post_settings', 
		__( 'Show Author in blog page?', 'thorium' ), 
		1, 
		30, 
		'postMessage', 
		__( 'Hidden by default if it\'s a single author blog','thorium' )
	);
	