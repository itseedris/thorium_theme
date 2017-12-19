<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Thorium
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
                        <?php previous_posts_link( __('Older &rarr;', 'thorium' ) ); ?>
                    </li>
                    <li class="next">
                        <?php next_posts_link( __('&larr; Newer', 'thorium' ) ); ?>
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
