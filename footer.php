<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Nasio
 * @version 1.0
 */

?>

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="row mb-5">
            <?php
				get_template_part( 'template-parts/footer', 'widgets' );

				get_template_part( 'template-parts/site', 'info' );
				?>
        </div>
        <!--row-->
    </div><!-- .container -->
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</main>
</body>

</html>