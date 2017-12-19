<?php 

	// header section
	$wp_customize->add_section( 'thorium_layout', array(
  		'title' => __( 'Layout', 'thorium' ),
  		'panel' => 'thorium_theme_settings',
  		'priority' => 50,
	) );

	thorium_select_control( 
		'thorium_site_layout', 
		'thorium_layout', 
		array(
			'right' => __('Right (default)','thorium'),
			'left' => __('Left','thorium'),
		), 
		__('Site Layout','thorium'), 
		'right', 
		10 
		);

?>