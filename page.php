<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thorium
 */

get_header(); ?>

	<!-- Page Content -->
    <div class="container blog-content">

        <div class="row">

            <?php if( get_theme_mod( 'thorium_site_layout','right' ) == 'left' ){ get_sidebar(); } ?>
            
            <!-- Blog Post Content Column -->
            <div class="col-sm-8">

			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );
					
				 endwhile; // End of the loop.
			?>

			</div>
			
			<?php if( get_theme_mod( 'thorium_site_layout','right' ) == 'right' ){ get_sidebar(); } ?>
		
		</div><!--row-->
		
		<hr>
		
		<?php get_footer(); ?>