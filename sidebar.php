<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thorium
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<!-- Blog Sidebar Widgets Column -->
<div class="col-sm-4">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
