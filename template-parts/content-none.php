<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thorium
 */

?>

<!-- 404 content -->

<div class="entry">
	
	<?php if( is_home() ) : ?>
	
		<h2><?php esc_html_e('Soorry', 'thorium'); ?></h2>
		<p><?php esc_html_e(' No posts yet to display', 'thorium' ) ?></p>
	
	<?php endif; ?>
	
	<?php if( is_404() ) : ?>
	
		<p>
			<?php esc_html_e('Seems this page doesn\'t exist go back to the ','thorium'); ?>
				<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e('home page','thorium'); ?></a>
			<?php esc_html_e(' or try searching','thorium'); ?>
		</p>
		
		<?php get_search_form(); ?>
	
	<?php endif; ?>
	
	<?php if( is_search() ) : ?>
	
		<h2><?php esc_html_e('Oops', 'thorium'); ?></h2>
		<p><?php esc_html_e(' Your requested page wasn\'t found. Maybe try searching again', 'thorium' ) ?></p>
	
	<?php endif; ?>
	
</div>

<hr>