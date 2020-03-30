<?php

//Allow users to change theme colors through WordPress Customizer

function nasio_customize_colors( $wp_customize ) {

	$wp_customize->add_section('colors', array(
        'title' => esc_html__('Colors', 'kickstarter'),
        'description' => esc_html__('Customze the main colors of the Nasio theme. To customize the dark theme mode, please go to "Night Mode" tab.', 'nasio'),
        'priority' => 99,
	));
	
	//Social menu background color
	$wp_customize->add_setting('header_background_color', array(
		'default'        => '#61DBFB',
		'sanitize_callback' => 'sanitize_hex_color',
	   ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
	   'label'   => __('Header Background Color', 'nasio'),
	   'section' => 'colors',
		)));

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
	$header_text_color = get_theme_mod('header_textcolor');
	$default_text_color = '333333';
    ?>
    <style type="text/css">
    h1, h2, h3 {
        color: <?php echo esc_attr(get_theme_mod('headings_textcolor', "#000")); ?>;
    }
    .top-bar {
        background-color: <?php echo esc_attr(get_theme_mod('header_background_color', "#61DBFB")); ?>;
	}
	<?php if( $header_text_color!==$default_text_color) : ?>
	.site-title a {
		color: #<?php echo esc_attr(get_theme_mod('header_textcolor', '333')); ?>;
	}
	<?php endif; ?>
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
        'title' => esc_html(__('Page Layout', 'nasio')),
        'description' => esc_html(__('Change the layout of the whole website. You can choose to display or to hide the right sidebar.', 'nasio' )
    )));

    $wp_customize->add_setting('page_layout', array(
        'default' => 'one',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'layout_options',
        array(
            'label' => esc_html(__('Page Layout', 'nasio')),
            'section' => 'layout_options',
            'settings' => 'page_layout',
            'type' => 'radio',
            'choices' => array(
                'one' => esc_html(__('Right Sidebar', 'nasio')),
                'two' => esc_html(__('Full-width', 'nasio')),
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
			min-height: 280px;
		}	
	}
	@media (min-width:1200px) {
		body .container {
			max-width:980px
		}
	}
	.sidebar {
		display: none
	}
	</style>

    <?php endif;
}
add_action('wp_footer', 'nasio_full_width_css');


//Night Mode

function nasio_night_mode_customizer($wp_customize) {

    $wp_customize->add_section('night_mode', array(
        'title' => esc_html(__('Night Mode', 'nasio')),
        'description' => esc_html(__('Customize the dark theme mode. For additional customization, you can use the "dark-mode" body class and add the code to the Additional Css tab', 'nasio' )
	)));
	
	//Enable Dark Mode 
	$wp_customize->add_setting(
        'enable_dark_mode',
        array(
			'default' => 1,
			'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'enable_dark_mode',
        array(
            'label' => esc_html__('Enable Dark Mode', 'nasio'),
            'section' => 'night_mode',
            'description' => esc_html__('Enable site visitors to switch to dark theme mode.', 'nasio'),
            'type' => 'checkbox',
        )
	);
	
	//Change Dark Mode Colors

	//Dark Mode Background
	$wp_customize->add_setting('dark_mode_background_color', array(
		'default'        => '#262626',
		'sanitize_callback' => 'sanitize_hex_color',
	   ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_mode_background_color', array(
	   'label'   => __('Background', 'nasio'),
	   'section' => 'night_mode'
		)));
}

add_action('customize_register', 'nasio_night_mode_customizer');


function nasio_customize_night_mode_css() {

	$isDarkMode = get_theme_mod('enable_dark_mode', 1)? 'block': 'none';
    ?>
    <style type="text/css">
    
	body.dark-mode #content, 
	body.dark-mode header, 
	body.dark-mode #content *:not(.post-meta):not(a) {
        background-color: <?php echo esc_attr(get_theme_mod('dark_mode_background_color', "#262626")); ?>;
	}

	.wpnm-button{
		display: <?php echo $isDarkMode;?>
	}

	</style>
	
	<?php
}
add_action( 'wp_head', 'nasio_customize_night_mode_css');