<?php 
	// social section
	$wp_customize->add_section( 'thorium_social_settings', array(
		'title' => __( 'Social Settings', 'thorium' ),
		'panel' => 'thorium_theme_settings',
		'priority' => 10,
	) ); 
	
	// Facebook Id
	thorium_link_control( 
		'thorium_facebook_id', 
		'thorium_social_settings', 
		__('Facebook URL','thorium'), 
		__('Add your Facebook profile ID', 'thorium'), 
		'', 
		10
	);
	
	// Twitter Id
	thorium_link_control( 
		'thorium_twitter_id', 
		'thorium_social_settings', 
		__('Twitter URL','thorium'), 
		__('Add your Twitter profile ID', 'thorium'), 
		'', 
		20 
	);
	
	// LinkedIn Id
	thorium_link_control( 
		'thorium_linkedin_id', 
		'thorium_social_settings', 
		__('LinkedIn URL','thorium'), 
		__('Add your LinkedIn profile ID', 'thorium'), 
		'', 
		30 
	);
	
	// Google+ Id
	thorium_link_control( 
		'thorium_googleplus_id', 
		'thorium_social_settings', 
		__('Google+ URL','thorium'), 
		__('Add your Google Plus profile ID', 'thorium'), 
		'', 
		40 
	);
	
	
?>