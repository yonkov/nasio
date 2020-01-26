<?php get_header(); ?>
    <!-- Start of main-content -->
    <section id="content" class="site-section">
        <div class="container">
            <div class="row">
                <div class="column">
                    <h3 class="mb-4"><?php _e( 'Latest Posts', 'nasio'); ?></h3>
                </div>
            </div>
            <div class="row blog-entries">
                <div class="main-content">
                    <div class="row">
                        <?php
                    //Dynamic content here
                    if (have_posts() ) :
                        while (have_posts() ) : the_post(); ?>
                        <div class="column<?php echo (is_sticky()) ?  ' sticky' : ''; ?>"> <?php
                        if ( has_post_thumbnail() ): ?>
                            <a class="blog-entry" href="<?php the_permalink() ?>">
                                <?php the_post_thumbnail() ?>
                                <div class="blog-content-body">
                                    <h2><?php the_title() ?></h2>
                                </div>
                            </a>
                            <?php else : ?>
                            <a class="blog-entry no-image" href="<?php the_permalink() ?>">
                                <?php the_post_thumbnail() ?>
                                <div class="blog-content-body">
                                    <h2><?php the_title() ?></h2>
                                </div>
                            </a>
                            <?php endif; ?>
                        </div>
                        <?php endwhile;
                    nasio_numeric_posts_nav();
                    else :
                        _e( 'There are no posts!', 'nasio');                
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

<?php get_footer(); ?>