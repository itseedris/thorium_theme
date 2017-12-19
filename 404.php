<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Thorium
 */

get_header(); ?>

	<!-- Page Content -->
    <div class="container blog-content">

        <div class="row">

            <?php if( get_theme_mod( 'thorium_site_layout','right' ) == 'left' ){ get_sidebar(); } ?>
            
            <!-- Blog Post Content Column -->
            <div class="col-sm-8">

			<?php

					get_template_part( 'template-parts/content', 'none' );
					
			?>

			</div>
			
			<?php if( get_theme_mod( 'thorium_site_layout','right' ) == 'right' ){ get_sidebar(); } ?>
		
		</div><!--row-->
		
		<hr>
		
		<?php get_footer(); ?>
	