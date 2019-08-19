<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Nasio
 * @since 1.0
 * @version 1.0
 */

 //Starter content in the sidebar

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<aside id="secondary" class="col-md-12 col-lg-4 sidebar widget-area>" role="complementary"
    aria-label="<?php esc_attr_e( 'Right Sidebar', 'nasio' ); ?>">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
<?php endif; // end primary widget area ?>