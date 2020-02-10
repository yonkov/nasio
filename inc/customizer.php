<?php

//Allow users to change theme colors through WordPress Customizer

function nasio_customize_colors( $wp_customize ) {
	//Social menu background color
	$wp_customize->add_setting('header_background_color', array(
		'default'        => '#61DBFB',
		'sanitize_callback' => 'sanitize_hex_color',
	   ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
	   'label'   => __('Header Background Color', 'nasio'),
	   'section' => 'colors',
		)));

	//Site title color
	$wp_customize->add_setting( 'site_title_textcolor' , array(
        'default'     => "#333",
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_title_textcolor', array(
		'label'        => __( 'Site Title Color', 'nasio' ),
        'section'    => 'colors',
	) ) );

	//Primary menu text color
	$wp_customize->add_setting( 'menu_text_color' , array(
		'default'     => "rgba(0,0,0,.5)",
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_text_color', array(
		'label'        => __( 'Top Menu Text Color', 'nasio' ),
		'section'    => 'colors',
	) ) );

	// Headings color
	$wp_customize->add_setting( 'headings_textcolor' , array(
		'default'     => "#000",
		'sanitize_callback' => 'sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headings_textcolor', array(
		'label'        => __( 'Headings Text Color', 'nasio' ),
        'section'    => 'colors',
	) ) );
}
add_action( 'customize_register', 'nasio_customize_colors' );

function nasio_customize_css() {
    ?>
    <style type="text/css">
    h1, h2, h3 {
        color: <?php echo esc_attr(get_theme_mod('headings_textcolor', "#000")); ?>;
    }
    .top-bar {
        background-color: <?php echo esc_attr(get_theme_mod('header_background_color', "#61DBFB")); ?>;
	}
	.site-title a {
		color: <?php echo esc_attr(get_theme_mod('site_title_textcolor', "#333")); ?>;
	}
    header .navbar a {
        color: <?php echo esc_attr(get_theme_mod('menu_text_color', "rgba(0,0,0,.5)")); ?>
	}

    </style>
    <?php
}
add_action( 'wp_footer', 'nasio_customize_css');

/*
**Allow users to change page layout (Right sidebar or Fullwidth) via Theme Customizer
*/

function nasio_register_full_width_customizer($wp_customize) {

    $wp_customize->add_section('layout_options', array(
        'title' => esc_html__('Page Layout', 'nasio'),
        'description' => esc_html__( 'Change the layout of the whole website. You can choose to display or to hide the right sidebar.', 'nasio' )
    ));

    $wp_customize->add_setting('page_layout', array(
        'default' => 'one',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'layout_options',
        array(
            'label' => esc_html__('Page Layout', 'nasio'),
            'section' => 'layout_options',
            'settings' => 'page_layout',
            'type' => 'radio',
            'choices' => array(
                'one' => esc_html__('Right Sidebar', 'nasio'),
                'two' => esc_html__('Full-width', 'nasio'),
                )
            )
        )
    );
}

add_action('customize_register', 'nasio_register_full_width_customizer');

function nasio_full_width_css() {

    $layout = get_theme_mod('page_layout');

    if ($layout == 'two'): ?>

	<style type="text/css">
	body .main-content {
		max-width: 100%;
		flex: 100%;
	}
	@media (min-width:768px){
		body .blog-entries .blog-entry img {
			width: 100%;
			min-height: 260px;
		}	
	}
	@media (min-width:1200px) {
		body .container {
			max-width:940px
		}
	}
	.sidebar {
		display: none
	}
	</style>

    <?php endif;
}
add_action('wp_footer', 'nasio_full_width_css');