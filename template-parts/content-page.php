<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thorium
 */

?>

<!-- Blog Post -->

<!-- Preview Image -->
<?php the_post_thumbnail( 'thorium-thumbnail', array('class' => 'img-responsive') ); ?>


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
	) );
?>