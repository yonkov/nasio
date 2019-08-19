<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Nasio
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light bg-light nav" role="navigation"
    aria-label="<?php esc_attr_e( 'Top Menu', 'nasio' ); ?>">
    <div class="container">
        <div class="navbar-collapse collapse" id="navbarMenu">
            <?php
				//_e( 'Menu', 'nasio' );
			?>


            <?php wp_nav_menu( array(
		'container' => '',
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
		'menu_class'        => 'navbar-nav mx-auto',
	) ); ?>

        </div>
</nav><!-- #site-navigation -->