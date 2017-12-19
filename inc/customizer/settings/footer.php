<?php 
	// footer section
	$wp_customize->add_section( 'thorium_footer_settings', array(
		'title' => __( 'Footer Settings', 'thorium' ),
		'panel' => 'thorium_theme_settings',
		'priority' => 30,
	) );
	
	// Show copyright
	thorium_checkbox_control( 
		'thorium_show_copyright', 
		'thorium_footer_settings', 
		__( 'Show Copyright?', 'thorium' ), 
		1, 
		10, 
		'postMessage' 
	);
	
	// Copyright
	thorium_textarea_control( 
		'thorium_copyright', 
		'thorium_footer_settings', 
		__( 'Copyright Text', 'thorium' ), 
		__('Copyright &copy; 2017','thorium'), 
		20, 
		'postMessage' 
	);
