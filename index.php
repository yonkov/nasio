<?php get_header(); ?>
<div>
    <!-- Start of main-content -->
    <section class="site-section py-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-4"><?php echo _e( 'Latest Posts', 'nasio'); ?></h3>
                </div>
            </div>
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="row">
                        <?php
                    //Dynamic content here
                    if (have_posts() ) :
                        while (have_posts() ) : the_post(); ?>
                        <div class="col-md-6">
                            <a class="blog-entry" href="<?php the_permalink() ?>">
                                <?php the_post_thumbnail() ?>
                                <div class="blog-content-body">
                                    <h2><?php the_title() ?></h2>
                                </div>
                            </a>
                        </div>
                        <?php endwhile;
                    nasio_numeric_posts_nav();
                    else :
                        echo _e( 'There are no posts!', 'nasio');                
                    endif;
                    ?>
                    </div>
                </div>
                <!-- END of main-content -->
                <!-- Show Sidebar -->
                <?php get_sidebar() ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>