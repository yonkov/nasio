<?php
/**
 * The header for Nasio theme
 *
 * This is the template that displays all of the <header> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Nasio
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open();} /*wp_body_open hook since WordPress 5.2 */ ?>
    <main id="root" class="wrap">
        <header role="banner">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-9 social">
                        <a class="screen-reader-text skip-link" href="#site-navigation"><?php _e( 'Skip to main menu', 'nasio'); ?></a>
                        <a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'nasio'); ?></a>
                            <?php
                if ( has_nav_menu( 'social' ) ) : ?>
                            <nav class="social-navigation" role="navigation"
                                aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'nasio' ); ?>">
                                <?php
                    wp_nav_menu( array(
                      'theme_location' => 'social',
                      'menu_class'     => 'social-links-menu',
                      'depth'          => 1,
                    ) ); ?>
                            </nav><!-- .social-navigation -->

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-wrapper">
                <div class="row header-image">
                    <div class="header-wrapper text-center">
                        <div class="toggle-icon absolute-toggle d-block d-md-none" data-toggle="collapse"
                            data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false"
                            aria-label="<?php esc_attr_e( 'Toggle navigation', 'nasio' );?>" role="button" aria-expanded="true"
                            aria-controls="navbarMenu"><span class="burger-lines" />
                        </div>
            <?php
            //display theme logo as starter content
              if ( !has_custom_logo() ) : ?>
                <img class="custom_logo"
                    src="<?php echo esc_url( get_template_directory_uri()); ?>/images/nasio-logo.png"
                    alt="<?php echo esc_attr('nasio theme logo')?>" />
              <?php else: ?>
                        <?php
                //allow the user to upload his own logo and replace theme logo
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                echo '<img class="custom_logo" src="' . esc_url( $custom_logo_url ) . '" alt="nasio-logo" />';              
                ?>
              <?php endif; ?>
                        <h1 class="site-title"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
                    </div>
                </div>
            </div>
            <!--Navigation-->
            <?php get_template_part( 'template-parts/navigation', 'top' ); ?>
        </header>