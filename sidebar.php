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

if (is_active_sidebar('sidebar-1')): ?>
<aside id="secondary" class="sidebar-wrapper sidebar widget-area>" role="complementary"
    aria-label="<?php esc_attr_e('Right Sidebar', 'nasio');?>">
    <?php dynamic_sidebar('sidebar-1');?>
</aside><!-- #secondary -->
<?php else: //Starter content in the right sidebar ?>
<aside id="secondary" class="sidebar-wrapper sidebar widget-area>" role="complementary"
    aria-label="<?php esc_attr_e('Right Sidebar', 'nasio');?>">
    <section id="search-form-2" class="sidebar-box">
        <?php get_search_form();?>
    </section>
    <section id="recent-posts-2" class="sidebar-box"> 
        <?php the_widget('Nasio_Recent_Posts_Widget');?>
    </section>
</aside><!-- #secondary -->
<?php endif; // end primary widget area