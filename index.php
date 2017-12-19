<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
			
			<!-- Blog Entries Column -->
			<div class="col-sm-8">
				<?php /* Start the Loop */
					if ( have_posts() ) : while ( have_posts() ) : the_post();

						/*
				 	 	 * Include the Post-Format-specific template for the content.
				 	 	 * If you want to override this in a child theme, then include a file
				 		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 		 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile; 
				?>
				
				<!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <?php previous_posts_link( __('&larr; Newer', 'thorium' ) ); ?>
                    </li>
                    <li class="next">
                        <?php next_posts_link( __('Older &rarr;', 'thorium' ) ); ?>
                    </li>
                </ul>
                <hr>		

				<?php else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			
			</div>
			
			<?php if( get_theme_mod( 'thorium_site_layout','right' ) == 'right' ){ get_sidebar(); } ?>
			
			 </div> <!-- /.row -->

        <hr>

	<?php get_footer(); ?>
