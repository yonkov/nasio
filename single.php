<?php
/**
 * The template for displaying a single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Nasio
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="site-section py-lg">
    <div class="container">
        <div class="row blog-entries single-post">
            <div class="col-md-12 col-lg-8 main-content">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );
				the_tags();
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;       

			endwhile; // End of the loop.
			?>
			<?php wp_link_pages(); ?> 
        </div>
        <?php get_sidebar(); ?>
       </div>
	</div>
</section>

<?php get_footer();
