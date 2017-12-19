<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package thorium
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function thorium_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	// Adds a class of not-front to every page apart from frontPage.
	if ( 'page' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'not-front';
	}

	return $classes;
}
add_filter( 'body_class', 'thorium_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function thorium_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'thorium_pingback_header' );

/**
 * Customize Tag Cloud Widget font size.
 */
function thorium_tag_cloud_widget( $args ) {
	$args['largest'] = 17; //largest tag
	$args['smallest'] = 15; //smallest tag
	$args['unit'] = 'px'; //tag font unit

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'thorium_tag_cloud_widget' );


