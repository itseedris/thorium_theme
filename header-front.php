<?php
/**
 * The header for our frontPage
 *
 * This is the template that displays all of the <head> section and everything up until </header>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thorium
 */
 
 // Setting variables 
 $thorium_header_leadin = get_theme_mod('thorium_ext_header_leadin', __( 'Welcome To Our Studio!','thorium' ) );
 $thorium_header_heading = get_theme_mod('thorium_ext_header_heading', __( 'It\'s nice to meet you','thorium' ) );
 $thorium_header_show_button = get_theme_mod('thorium_ext_header_show_button', 1 );
 $thorium_header_button_link = get_theme_mod('thorium_ext_header_button_link', '' );
 $thorium_header_button_text = get_theme_mod('thorium_ext_header_button_text', __( 'Tell Me More','thorium' ) );

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body id="page-top" <?php body_class(); ?>>

	<!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1">
                    <span class="sr-only"><?php __('Toggle navigation','thorium'); ?></span><?php esc_html_e(' Menu ','thorium'); ?><i class="fa fa-bars"></i>
                </button>
                <?php
  					$thorium_custom_logo_id = get_theme_mod( 'custom_logo' );
  					$thorium_logo = wp_get_attachment_image_src( $thorium_custom_logo_id , 'full' );
  					$thorium_blogname = get_bloginfo('name');
  					if ( has_custom_logo() ) {
        				echo '<div class="navbar-brand"><a href="'. esc_url( home_url('/') ) .'">'.'<img src="'. esc_url( $thorium_logo[0] ) .'"></div>';
  					} else {
        			echo '<a class="navbar-brand page-scroll" href="'. esc_url( home_url('/') ) .'">'. esc_html( $thorium_blogname ) .'</a>';
  					}
  				?>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php 
				/**
 				  * Use Bootstrap nav walker for responsive nav menu.
				  *
 				  * @Since thorium 1.0
 				  */

				wp_nav_menu( array( 
   					'theme_location' => 'front',
   					'depth' => 2,
   					'container' => 'div', 
   					'container_class' => 'collapse navbar-collapse bs-example-navbar-collapse-1',
   					'menu_class' => 'nav navbar-nav navbar-right', 
   					'fallback_cb' => 'wp_bootstrap_navwalker::fallback', 
   					'walker' => new wp_bootstrap_navwalker()
            	) ); ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	
	<!-- Header -->
    <header class="head front">
        <div class="container">
            <div class="intro-text">                
                <?php if ( ( is_front_page() ) && ( 'page' == get_option( 'show_on_front' ) ) ) : ?>
                	<div class="intro-lead-in"><?php echo esc_html( $thorium_header_leadin ); ?></div>
                	<div class="intro-heading"><?php echo esc_html( $thorium_header_heading ); ?></div>
                	<?php if ( $thorium_header_show_button === 1 ) : ?>
                		<a href="<?php echo esc_url( $thorium_header_button_link ); ?>" class="page-scroll btn btn-xl"><?php echo esc_html( $thorium_header_button_text ); ?></a>
                	<?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </header>
