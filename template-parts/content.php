<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thorium
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- Blog Post -->
	<h2>
		<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
	</h2>
	
	<?php if( is_multi_author() && ( get_theme_mod('thorium_show_index_author=', 1 ) === 1 ) ) : ?>
	<p class="lead author">
		<i><?php __('by ','thorium'); the_author_posts_link(); ?></i>
	</p>
	<?php endif; ?>
	<p class="time">
		<span class="glyphicon glyphicon-time"></span> 
		<i><?php __('Posted on ','thorium'); the_time( get_option('date_format') ); ?></i>
	</p>
	<?php if( get_theme_mod('thorium_show_index_category', 1 ) === 1 ) : ?>
	<p class="category">
		<span class="fa fa-folder"></span> 
		<i><?php __('In: ','thorium'); the_category( ', ' ); ?></i>
	</p>
	<?php endif; ?>
	
	<p class="tag">
		<i><?php the_tags('<i class="fa fa-tags"></i> Tagged: ', ', '); ?></i>
	</p>
	
	<?php if( has_post_thumbnail() ) : ?>
	<hr>
		<?php the_post_thumbnail( 'thorium-thumbnail', array('class' => 'img-responsive post-thumbnail') ); 
		
	endif; ?>
	
	<hr>
	
	<div class="entry">
		
		<?php the_excerpt(); ?>
		
	</div>
	
	<hr>

</div><!-- #post-<?php the_ID(); ?> -->
