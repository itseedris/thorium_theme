<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Thorium
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

<!-- Comments Form -->
<div class="well">
	<?php if( !comments_open() && get_comments_number() ) { ?>
	<p><?php esc_html_e('Comments are closed', 'thorium'); ?></p>
	<?php }
		else {
	 ?>
	
	<?php 
		$thorium_req = get_option( 'require_name_email' );
		$thorium_aria_req = ( $thorium_req ? ' required' : '' );

		$thorium_comments_args = array(
			// change the title of send button.
			'label_submit' => __( 'Submit', 'thorium' ),
			// change the markup of send button.
			'class_submit' => 'btn btn-primary',
			// change the title of the reply section.
			'title_reply' => __( 'Leave a Comment:', 'thorium' ),
			// remove "Text or HTML to be displayed after the set of comment fields".
			'comment_notes_after' => '',
			// Redefine your own title of the reply markup
			'title_reply_before' => '<h4>',
			'title_reply_after' => '</h4>',
			// redefine your own textarea (the comment body).
			'comment_field' => '
				<div class="form-group">
					<textarea class=" form-control" rows="3" placeholder="'.esc_attr__('Message','thorium').'" name="comment" id="'.esc_attr__('message','thorium').'" aria-required="true"></textarea>
				</div>',

			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '
					<div class="form-group">
						<input class="col-lg-12 form-control" placeholder="'.esc_attr__('Name *','thorium').'"  type="text" name="author" id="'.esc_attr__('name','thorium').'" value="' . esc_attr( $commenter['comment_author'] ). '"' . $thorium_aria_req . ' />
					</div>',

				'email' => '
					<div class="form-group">
						<input class="col-lg-12 form-control" placeholder="'.esc_attr__('Email *','thorium').'"  type="email" name="email" id="'.esc_attr__('email','thorium').'" value="' . esc_attr( $commenter['comment_author_email'] ). '"' . $thorium_aria_req . ' />
					</div>',

				'url' => '
					<div class="form-group">
						<input class="col-lg-12 form-control" placeholder="'.esc_attr__('Website','thorium').'"  id="'.esc_attr__('url','thorium').'" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ). '" />
					</div>',
			)
		),
	);
	ob_start();
	comment_form( $thorium_comments_args );
	$thorium_form = ob_get_clean();
	echo $thorium_form;
	
	}
	?>
</div>

<hr>

<h3><?php
	$thorium_comments_number = get_comments_number();
	if ( '1' === $thorium_comments_number ) {
		/* translators: %s: post title */
		printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'thorium' ), get_the_title() );
	} elseif ( '0' === $thorium_comments_number ) {
		esc_html_e('Be the first to comment','thorium');
	}
	else {
		printf(
			/* translators: 1: number of comments, 2: post title */
			_nx(
				'%1$s Reply to &ldquo;%2$s&rdquo;',
				'%1$s Replies to &ldquo;%2$s&rdquo;',
				$thorium_comments_number,
				'comments title',
				'thorium'
				),
			number_format_i18n( $thorium_comments_number ),
			get_the_title()
		);
	}
?></h3>

<!-- Posted Comments -->

<!-- Comment -->
<ul class="commentbox">
	<?php wp_list_comments( array(
		'style' => 'ul',
		'short_ping' => true,
		'avatar_size' => 84,
		 )
	); ?>
</ul>


<ul class="pager">
	<li class="previous"><?php previous_comments_link( __('Newer Comments', 'thorium' ) ); ?></li>
	<li class="next"><?php next_comments_link( __('Older Comments', 'thorium' ) ); ?></li>
</ul>

</div>
