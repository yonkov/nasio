<?php
function nasio_custom_header_setup() {
    $args = array(
        'default-text-color' => '333',
        'width'              => 2000,
		'height'             => 330,
        'flex-width'         => true,
        'flex-height'        => true,
        'wp-head-callback'   => 'nasio_header_image_css',
    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'nasio_custom_header_setup' );

function nasio_header_image_css() {

    $header_text_color = get_header_textcolor();
    $height = get_theme_mod( 'header-background-height', '330px' );
    $repeat = get_theme_mod( 'header-background-repeat', 'no-repeat' );
    $size = get_theme_mod( 'header-background-size', 'cover' );
    $background_position = get_theme_mod( 'header-background-position', 'center' );
    $position = get_theme_mod( 'header-position', 'relative' );
    $margin = get_theme_mod('header-margin-bottom', '.7em');
    
    ?>
    
    <style type="text/css">

<?php if ( has_header_image() ) : ?>
    .header-image {
        height: <?php echo esc_attr( $height ); ?>;
        background-repeat: <?php echo esc_attr( $repeat ); ?>;
        background-size: <?php echo esc_attr( $size ); ?>;
        background-position: <?php echo esc_attr( $background_position ); ?>;
        position: <?php echo esc_attr ($position); ?>;
        padding-bottom: <?php echo esc_attr( $margin ); ?>;
    }
    .site-title {
        bottom: 5px;
        left: 0;
        right: 0;
        position: absolute;
        width: 100%;
    }
<?php endif; ?>

</style>
<?php
}