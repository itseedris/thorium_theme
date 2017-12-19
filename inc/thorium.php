<?php
/**
 * thorium main functions
 *
 * @package thorium
 */
 
if ( ! function_exists( 'thorium_header_style' ) ) :

	/**
	* gets the header image and text color and displays it in header.
	*
	* since 1.0.0
 	*/

	function thorium_header_style(){ 
	
		// Setting up variables
 		$thorium_header_image = get_header_image();
 		$thorium_header_text_color = get_header_textcolor();
 	
 		// Checks if it's a single post or page and uses the featured image else use header image
 		if( is_singular() && ( get_theme_mod('thorium_featured_image_posts', 0 ) === 1 ) ){
 		 	global $post;
      	 	if( has_post_thumbnail( $post->ID) ){
         		$thorium_header_image = esc_url( get_the_post_thumbnail_url( $post->ID, 'full' ) );
         	} else {
    			$thorium_header_image = get_header_image();
    		}
   		}
	?>
		<style>
			header{
				background-image:url('<?php echo esc_url( $thorium_header_image ); ?>');
				background-repeat:no-repeat;
				background-attachment:scroll;
				background-position:center center;
				-webkit-background-size:cover;
				-moz-background-size:cover;
				background-size:cover;
				-o-background-size:cover;
				text-align:center;
				color:#<?php echo esc_html( $thorium_header_text_color ); ?>;
			}
			<?php if ( 'blank' === $thorium_header_text_color ) { ?>
				header .intro-text{
					clip:rect(1px, 1px, 1px, 1px);
					position:absolute;
				}
			<?php } else { ?>
				header .intro-text{
					clip:auto;
					position:relative;
				}
			<?php } if( !is_customize_preview() ){
			?>
				@media screen and ( min-width:480px){
					body.admin-bar .navbar-fixed-top{
						top:28px !important; 
					}
				}
		<?php } ?>
		</style>
	<?php
	}

endif;

add_action( 'wp_head','thorium_header_style' );

/*
 * Text Controllers for customizer
 *
 * since 1.0.0
 */
function thorium_text_control( $setting_id, $section_id, $label = '', $default = '', $priority = 10, $transport = 'refresh', $description = '' ){
    global $wp_customize;
	$wp_customize->add_setting( $setting_id , array(
  		'type' => 'theme_mod',
 		'capability' => 'edit_theme_options',
  		'default' => $default,
  		'sanitize_callback' => 'sanitize_text_field',
  		'transport' => $transport
  	 ) );
  	
  	$wp_customize->add_control( $setting_id , array(
   		'type' => 'text',
   		'priority' => $priority,
   		'section' => $section_id,
   		'label' => $label,
   		'description' => $description,
  	) );
}

function thorium_textarea_control( $setting_id, $section_id, $label = '', $default = '', $priority = 10, $transport = 'refresh', $description = '' ){
    global $wp_customize;
	$wp_customize->add_setting( $setting_id , array(
  		'type' => 'theme_mod',
 		'capability' => 'edit_theme_options',
  		'default' => $default,
  		'sanitize_callback' => 'sanitize_text_field',
  		'transport' => $transport
  	 ) );
  	
  	$wp_customize->add_control( $setting_id , array(
   		'type' => 'textarea',
   		'priority' => $priority,
   		'section' => $section_id,
   		'label' => $label,
   		'description' => $description,
  	) );

}

function thorium_color_control( $setting_id, $section_id, $label = '', $default = '', $priority = 10, $transport = 'refresh', $description = '' ){
	global $wp_customize;
	$wp_customize->add_setting( $setting_id, array(
  		'type' => 'theme_mod',
 		'capability' => 'edit_theme_options',
  		'default' => $default,
  		'sanitize_callback' => 'sanitize_hex_color',
  		'transport' => $transport ) );
  		
  	$wp_customize->add_control( new WP_Customize_Color_Control (
		$wp_customize, $setting_id, array(
  			'label' => $label,
  			'description' => $description,
  			'section' => $section_id,
  			'priority' => $priority,
		) ) );
}

if ( ! function_exists( 'thorium_checkbox_control' ) ) {
	
	/*
	 * Check box controller
	 * v1.0.0
	 */
	function thorium_checkbox_control( $setting_id, $section_id, $label = '', $default = 0, $priority = 10, $transport = 'refresh', $description = '' ){
    	global $wp_customize;
		$wp_customize->add_setting( $setting_id, array(
  			'type' => 'theme_mod',
 			'capability' => 'edit_theme_options',
  			'default' => $default,
  			'sanitize_callback' => 'thorium_sanitize_checkbox',
  			'transport' => $transport 
  		) );
  	
  		$wp_customize->add_control( $setting_id, array(
   			'type' => 'checkbox',
   			'priority' => $priority,
   			'section' => $section_id,
   			'label' => $label,
   			'description' => $description,
  		) );


	}
}

if ( ! function_exists( 'thorium_link_control' ) ) {
	
	/*
	 * Links controller
	 * v1.0.0
	 */
	function thorium_link_control( $setting_id, $section_id, $label = '', $description = '', $default = '', $priority = 10, $transport = 'refresh' ){
    	global $wp_customize;
		$wp_customize->add_setting( $setting_id, array(
  			'type' => 'theme_mod',
  			'capability' => 'edit_theme_options',
  			'default' => $default,
  			'sanitize_callback' => 'esc_url_raw',
  			'transport' => $transport 
  		) );
  	
  		$wp_customize->add_control( $setting_id, array(
   			'type' => 'text',
   			'priority' => $priority,
   			'section' => $section_id,
   			'label' => $label,
   			'description' => $description,
   		 ) );


	}
}

if ( ! function_exists( 'thorium_select_control' ) ) {

	/*
	 * Select controller
	 * v1.0.0
	 */
	function thorium_select_control( $setting_id, $section_id, $choices, $label = '', $default = '', $priority = 10 ){
		global $wp_customize;
		$wp_customize->add_setting( $setting_id, array(
  			'type' => 'theme_mod',
 			'capability' => 'edit_theme_options',
  			'default' => $default,
  			'sanitize_callback' => 'thorium_sanitize_select',
  			'transport' => 'refresh'
  		 ) );
  		 
  		 $wp_customize->add_control( $setting_id, array(
   			'type' => 'select',
   			'priority' => $priority,
   			'section' => $section_id,
   			'label' => $label,
   			'choices' => $choices
  		  ) );
	}
}

/*
 * Sanitization 
 */
if ( ! function_exists( 'thorium_sanitize_checkbox' ) ) {
	/**
	 * Function to sanitize checkboxes
	 *
	 * @param $value
	 *
	 * @return int
	 */
	function thorium_sanitize_checkbox( $value ) {
		if ( $value == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'thorium_sanitize_select' ) ) {
	/**
 	*  Sanitize Select
 	*/
	function thorium_sanitize_select( $input ) {
		if ( filter_var( $input, FILTER_SANITIZE_STRING ) ) {
			return $input;
		}
	}
}
