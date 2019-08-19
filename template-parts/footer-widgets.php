<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'nasio' ); ?>">
    <?php
//Predefine content in the footer
if ( !is_active_sidebar( 'sidebar-2' ) && !is_active_sidebar( 'sidebar-3' ) ) : ?>
    <div class="widget-column footer-widget-1">
        <section id="custom_html-3" class="widget_text col-md-9">
            <h3 class="heading"><?php echo _e( 'About me', 'nasio'); ?></h3>
            <div class="textwidget custom-html-widget">
                <p class="mb-4"><img src="<?php echo esc_url( get_template_directory_uri() );?>/images/about.jpg"
                        alt="About" class="img-fluid"></p>
                <p><?php echo _e( 'This is a good place to introduce yourself. Write about your work, hobbies and passion.', 'nasio'); ?><a
                        href="/about"> <?php echo _e( 'Read more', 'nasio'); ?></a></p>
            </div>
        </section>
    </div>
    <div class="widget-column footer-widget-2">
        <section id="recent-posts-3" class="col-md-6">
            <?php the_widget( 'Nasio_Recent_Posts_Widget'); ?>
        </section>

        <section id="custom_html-4" class="widget_text col-md-6">
            <h3 class="widget-title"><?php echo _e( 'Get Social', 'nasio'); ?></h3>
            <div class="textwidget custom-html-widget">
                <ul class="list-unstyled footer-social">
                    <li><a href="/#"><span class="fa fa-twitter"></span> Twitter</a></li>
                    <li><a href="/#"><span class="fa fa-facebook"></span> Facebook</a></li>
                    <li><a href="/#"><span class="fa fa-instagram"></span> Instagram</a></li>
                    <li><a href="/#"><span class="fa fa-vimeo"></span> Vimeo</a></li>
                    <li><a href="/#"><span class="fa fa-youtube-play"></span> Youtube</a></li>
                    <li><a href="/#"><span class="fa fa-snapchat"></span> Snapshot</a></li>
                </ul>
            </div>
        </section>
    </div>

    <?php else: ?>

    <?php
		if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
    <div class="widget-column footer-widget-1">
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
    </div>
    <?php }
		if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
    <div class="widget-column footer-widget-2">
        <?php dynamic_sidebar( 'sidebar-3' ); ?>
    </div>
    <?php } ?>

    <?php endif; ?>
</aside><!-- .widget-area -->