<?php
/**
 * Custom link/button section.
 */
if( ! class_exists( 'Thorium_Section_Pro' ) ) {

	class Thorium_Section_Pro extends WP_Customize_Control {

        public function render_content() { ?>
            <a class="button-secondary alignleft" href="<?php echo esc_url( 'http://marvinthemes.tk/thorium/' ); ?>" title="<?php esc_attr_e( 'Thorium Pro Demo', 'thorium' ); ?>" target="_blank">
            <?php _e( 'Thorium Demo', 'thorium' ); ?>
            </a>
            <a class="button-secondary alignright" href="<?php echo esc_url( 'http://marvinkome.com/thorium/' ); ?>" title="<?php esc_attr_e( 'Thorium Docs', 'thorium' ); ?>" target="_blank">
            <?php _e( 'Thorium Docs', 'thorium' ); ?>
            </a>
            <br>
            <br>
            <p><?php _e( 'Thank you for using the free version of Thorium! We have loaded this theme with many options, so use it to create something beautiful!', 'thorium' ); ?></p>
            <p><?php _e( 'If you are looking for more customization options, you can check out the Pro version of Thorium, which includes additiona features, such as:', 'thorium' ); ?></p>
            <ol>
                <li><?php _e( 'Section Re-ordering', 'thorium' ); ?></li>
                <li><?php _e( 'Unlimited color options', 'thorium' ); ?></li>
                <li><?php _e( '15+ custom fonts', 'thorium' ); ?></li>
                <li><?php _e( '24/7 Support', 'thorium' ); ?></li>
                <li><?php _e( 'Remove the "Thorium developed by Marvin Kome" from the footer','thorium') ?></li>
            </ol>            
            <a class="button-primary alignleft" href="<?php echo esc_url( 'https://wordpress.org/support/theme/thorium/reviews/#new-post' ); ?>" title="<?php esc_attr_e( 'Thorium Rating', 'thorium' ); ?>" target="_blank">
            <?php _e( 'Leave a review', 'thorium' ); ?>
            </a>
            <a class="button-primary alignright" href="<?php echo esc_url( 'https://www.themesnap.com/wordpress-themes/thorium-responsive-business-theme.html' ); ?>" title="<?php esc_attr_e( 'Thorium Pro', 'thorium' ); ?>" target="_blank">
            <?php _e( 'Buy Now', 'thorium' ); ?>
            </a>
        <?php }

    }
}
