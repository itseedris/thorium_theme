<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

					get_template_part( 'template-parts/content', 'single' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif; ?>
					
					<hr>
					
					<!-- Pager -->
                    <ul class="pager">
                    	<li class="previous">
                        	<?php next_post_link( '%link', '&larr; %title', true ); ?>
                    	</li>
                    	<li class="next">
                        	<?php previous_post_link('%link', '%title  &rarr;', true); ?>
                    	</li>
                    </ul>
                    <hr>

				<?php endwhile; // End of the loop.
			?>

			</div>
			
			<?php if( get_theme_mod( 'thorium_site_layout','right' ) == 'right' ){ get_sidebar(); } ?>
		
		</div><!--row-->
		
		<hr>
		
		<?php get_footer(); ?>
	