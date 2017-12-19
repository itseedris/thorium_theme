<?php
/**
 * Template part for displaying single content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thorium
 */

?>

<!-- Blog Post -->

<!-- Preview Image -->
<?php 
	if( get_theme_mod('thorium_featured_image_posts', 0 ) === 0 ) { ?>
		<?php the_post_thumbnail( 'thorium-thumbnail', array('class' => 'img-responsive post-thumbnail') ); ?>
<?php } ?>

<br>
<!-- Post Content -->
<div class="entry">
	
	<?php the_content(); ?>
	
</div>

<hr>

<?php 
	wp_link_pages( array(
		'before'      => '<div>' . __( 'Pages:', 'thorium' ),
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) );
?>
