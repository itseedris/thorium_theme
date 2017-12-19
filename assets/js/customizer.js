/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( 'a.navbar-brand' ).text( to );
		} );
	} );
	

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( 'header .intro-text' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( 'header .intro-text' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( 'header .intro-text' ).css( {
					'color': to
				} );
			}
		} );
	} );
	
	// Toggle date - single page
	wp.customize( 'thorium_show_single_date', function( value ) {
		value.bind( function( to ) {
			$( 'body.single header.head .intro-lead-in' ).toggle( to )
		});
	});	
	
	// Toggle author - index page
	wp.customize( 'thorium_show_index_author', function( value ) {
		value.bind( function( to ) {
			$( 'body.blog .blog-content p.author' ).toggle( to )
		});
	});
	
	// Toggle category - index page
	wp.customize( 'thorium_show_index_category', function( value ) {
		value.bind( function( to ) {
			$( 'body.blog .blog-content p.category' ).toggle( to )
		});
	});
	
	// Blog Heading
	wp.customize( 'thorium_blog_heading', function( value ) {
		value.bind( function( to ) {
			$( 'body.blog header.head .intro-heading' ).text( to )
		});
	});
	
	// Blog Secondary
	wp.customize( 'thorium_blog_secondary_heading', function( value ) {
		value.bind( function( to ) {
			$( 'body.blog header.head .intro-lead-in' ).text( to )
		});
	});
	
	// Toggle copyright
	wp.customize( 'thorium_show_copyright', function( value ) {
		value.bind( function( to ) {
			$( 'footer p.copyright-wrap' ).toggle( to )
		});
	});
	
	// copyright
	wp.customize( 'thorium_copyright', function( value ) {
		value.bind( function( to ) {
			$( 'footer p.copyright-wrap span.copyright' ).text( to )
		});
	});
	
	
	
} )( jQuery );

