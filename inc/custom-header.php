<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package thorium
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses thorium_header_style()
 */
function thorium_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'thorium_custom_header_args', array(
	    'default-image'          => esc_url( get_parent_theme_file_uri( '/assets/img/header-bg.jpg' ) ),
		'default-text-color'     => '#ffffff',
		'width'                  => 1900,
		'height'                 => 1250,
		'flex-height'            => true,
	) ) );
	 register_default_headers(  array(
       'default-image' => array(
          'url'           => '%s/assets/img/header-bg.jpg',
          'thumbnail_url' => '%s/assets/img/header-bg.jpg',
          'description'   => __( 'Default Header Image', 'thorium' )
       )
     )
  );
}
add_action( 'after_setup_theme', 'thorium_custom_header_setup' );

