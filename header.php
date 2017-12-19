<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until </header>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thorium
 */
 
 // Setting variables
 $thorium_blog_heading = get_theme_mod('thorium_blog_heading', __('page heading','thorium') );
 $thorium_blog_secondary_heading = get_theme_mod('thorium_blog_secondary_heading', '' );

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
   					'theme_location' => 'primary',
   					'depth' => 10,
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
    <header class="head">
        <div class="container">
            <div class="intro-text">                
                <?php if ( is_home() ) : ?>
                <div class="intro-heading"><?php echo esc_html( $thorium_blog_heading ); ?></div>
                <div class="intro-lead-in"><?php echo esc_html( $thorium_blog_secondary_heading ); ?></div>
                <?php endif; ?>
                
                <?php if ( is_singular() && !is_front_page() ) : ?>
                <!-- The title -->
                <div class="intro-heading"> <?php single_post_title() ?></div>
                <?php endif; ?>
                
                <?php if ( is_single() && ( get_theme_mod('thorium_show_single_date', 1 ) === 1 ) ) : ?>
                <!-- Date and byline -->
                <div class="intro-lead-in"> on <?php echo esc_html( get_the_time( get_option('date_format'), $post->ID ) ); ?></div>
                <?php endif; ?>
                
                <?php if ( is_404() ) : ?>
                <!-- 404 header -->
                <div class="intro-lead-in"><?php esc_html_e('404', 'thorium'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </header>
    
