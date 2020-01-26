<?php

//Allow users to change theme colors through WordPress Customizer

function nasio_customize_colors( $wp_customize ) {
	
	$wp_customize->add_setting('header_background_color', array(
		'default'        => '#61DBFB',
		'transport'   => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
	   ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
	   'label'   => 'Header Background Color',
	   'section' => 'colors',
		)));

	$wp_customize->add_setting( 'menu_text_color' , array(
		'default'     => "rgba(0,0,0,.5)",
		'transport'   => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
	) );
	

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_text_color', array(
		'label'        => __( 'Top Menu Text Color', 'nasio' ),
		'section'    => 'colors',
	) ) );

	$wp_customize->add_setting( 'header_textcolor' , array(
        'default'     => "#000000",
		'transport'   => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
		'label'        => __( 'Headings Text Color', 'nasio' ),
        'section'    => 'colors',
	) ) );
	
}
add_action( 'customize_register', 'nasio_customize_colors' );

function nasio_customize_css() {
    ?>
    <style type="text/css">
    h1,h2,h3 {
        color: #<?php echo esc_attr(get_theme_mod('header_textcolor', "#000000"));
        ?>;
    }

    .top-bar {
        background-color: <?php echo esc_attr(get_theme_mod('header_background_color', "#61DBFB"));
        ?>;
    }

    header .navbar a {
        color: <?php echo esc_attr(get_theme_mod('menu_text_color', "rgba(0,0,0,.5)"));
        ?>
	}

    </style>
    <?php
}
add_action( 'wp_footer', 'nasio_customize_css');