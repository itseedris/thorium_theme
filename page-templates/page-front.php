<?php
/**
 * Template Name: Front Page
 * The template for displaying the frontPage if this page is set to
 * 'static page'.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Thorium 
 * 
 * @Since Thorium 1.0
 */
if( ! defined( 'THORIUM_EXTS_VERSION' ) )
{
	get_header(); ?>
	
	<!-- Page Content -->
    <div class="container blog-content">

        <div class="row">

            <?php if( get_theme_mod( 'thorium_site_layout','right' ) == 'left' ){ get_sidebar(); } ?>
            
            <!-- Blog Post Content Column -->
            <div class="col-sm-8">

			<?php

					esc_html_e('To be able to use the front page you must install and activate the Thorium Extension plugin.','thorium');
					
			?>

			</div>
			
			<?php if( get_theme_mod( 'thorium_site_layout','right' ) == 'right' ){ get_sidebar(); } ?>
		
		</div><!--row-->
		
		<hr>
		<?php
} else {
	get_header( 'front' );

		/*
		A way for Thorium Extensions to hook
		and display sections on the front page;
		-----------
		hooked:
		*/
		do_action( 'thorium_frontpage_sections' );

}

get_footer();?>
