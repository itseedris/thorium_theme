<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing content and footer elements.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Thorium
 */

?>


	<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p class="copyright-wrap"><span class="copyright"><?php if ( get_theme_mod('thorium_show_copyright', 1 ) === 1 ): echo esc_html( get_theme_mod('thorium_copyright',__('Copyright &copy; 2017','thorium') ) ); endif; ?></span></p>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                    	<?php 
                    		// Setting variables 
                    		$thorium_twitter = get_theme_mod('thorium_twitter_id', '' );
                    		$thorium_facebook = get_theme_mod('thorium_facebook_id', '' );
                    		$thorium_linkedin = get_theme_mod('thorium_linkedin_id', '' );
                    		$thorium_gplus = get_theme_mod('thorium_googleplus_id', '' );
						?>
                    	<?php if ( ! empty( $thorium_twitter ) ) : ?>
                        	<li><a class="twitter" href="<?php echo esc_url( $thorium_twitter ); ?>"><i class="fa fa-twitter"></i></a>
                        	</li>
                        <?php endif; ?>
                        <?php if ( ! empty( $thorium_facebook ) ) : ?>
                        	<li><a class="facebook" href="<?php echo esc_url( $thorium_facebook ); ?>"><i class="fa fa-facebook"></i></a>
                        	</li>
                        <?php endif; ?>
                        <?php if ( ! empty( $thorium_linkedin ) ) : ?>
                        	<li><a class="linkedin" href="<?php echo esc_url( $thorium_linkedin ); ?>"><i class="fa fa-linkedin"></i></a>
                        	</li>
                        <?php endif; ?>
                        <?php if ( ! empty( $thorium_gplus ) ) : ?>
                        	<li><a class="gplus" href="<?php echo esc_url( $thorium_gplus ); ?>"><i class="fa fa-google-plus"></i></a>
                        	</li>
                        <?php endif; ?>
                    </ul>                   
                </div>
                <div class="col-md-4">
                <?php if ( has_nav_menu( 'footer' ) ) : ?>
                    <?php 
                    	wp_nav_menu( array( 
                    		'theme_location' => 'footer',
                    		'depth' => 2,
                    		'menu_class' => 'list-inline quicklinks' 
                    	) ); ?>
                 <?php endif; ?>
                </div>
            </div>          
            <p class="text-center"><span class="copyright"><a href="<?php echo esc_url( 'http://marvinkome.com/' ); ?>"><?php esc_html_e(' Thorium Developed By Marvin Kome', 'thorium'); ?></a></span></p>
        </div>
    </footer>
  <?php if ( !is_front_page() ) : ?> 
   
  </div> <!-- /.container -->
  
  <?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
