 <?php
/**
 * Template for displaying search forms in thorium
 *
 * @package thorium
 *
 * @since thorium 1.0
 */
?> 
<form action="<?php echo esc_url( home_url('/') ); ?>" method="get" >
	<div class="input-group">	
		<input type="search" placeholder="<?php the_search_query(); ?>" class="form-control" name="s">
		<span class="input-group-btn">
			<button class="btn btn-default" type="button">
				<span class="glyphicon glyphicon-search"></span>
			</button>
		</span>
	</div>
</form>
