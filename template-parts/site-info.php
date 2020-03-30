<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Nasio
 * @since 1.0
 * @version 1.0
 */

?>
<div class="footer-meta">
    <?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
    ?>
    <div class="footer-credits">
    <?php if( get_theme_mod( 'footer_text_block') != "" ) : ?> 
    <?php esc_attr(get_theme_mod( 'footer_text_block')); ?>
    
    <?php else : ?>
            <a href="<?php echo esc_url( 'https://yonkov.github.io/' ); ?>" class="imprint">
                <?php printf( __( 'Designed by %s', 'nasio' ), 'Atanas Yonkov' );?>
            </a>
            <span> || </span>
            <a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>" class="imprint">
                <?php printf( __( 'Powered by %s', 'nasio' ), 'WordPress' ); ?>
            </a>
    <?php endif ?>
    </div>
    <div class="wpnm-button">
        <div class="wpnm-button-inner-left"></div>
        <div class="wpnm-button-inner"></div>
    </div>

</div>