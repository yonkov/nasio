<?php

function nasio_setup() {
    // Make theme available for translation. 
	load_theme_textdomain( 'nasio', get_template_directory() . '/languages');
    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );
    //Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links');
    // This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'nasio' ),
		'social' => __( 'Social Links Menu', 'nasio' ),
	) );
    
    /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}

add_action( 'after_setup_theme', 'nasio_setup' );

if (isset( $content_width ))
    $nasio_content_width = 900;

//Register widget area.

function nasio_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'nasio' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'nasio' ),
		'before_widget' => '<section id="%1$s" class="sidebar-box">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="heading">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'nasio' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add 1 widget here to appear in your footer.', 'nasio' ),
		'before_widget' => '<section id="%1$s" class="col-footer">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="heading">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'nasio' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add 2 widgets here to appear in your footer.', 'nasio' ),
		'before_widget' => '<section id="%1$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'nasio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function nasio_styles() {
	//Theme Navigation 
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/assets/js/navigation-min.js', array( 'jquery' ),'',true);
	//Toggle Dark Theme Mode
    wp_enqueue_script( 'dark-mode', get_template_directory_uri() . '/assets/js/toggleDarkMode.js', array(),'',true);
	//Theme stylesheet.
	wp_enqueue_style( 'nasio-css', get_template_directory_uri() . '/style.min.css', '', '1.1.8' );
}

add_action( 'wp_enqueue_scripts', 'nasio_styles' );

/**
 * Enqueue fonts to the footer for better peformance
 */

function nasio_fonts() { 
	//Font Awesome
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/public/css/font-awesome.min.css');
    //Add google fonts
	wp_enqueue_style( 'Merriweather', '//fonts.googleapis.com/css?family=Merriweather&display=swap' ); 
	wp_enqueue_style( 'OpenSans', '//fonts.googleapis.com/css?family=Open+Sans' ); 
}
add_action( 'wp_footer', 'nasio_fonts' ); 

//Remove default width and height attributes from image tags

function nasio_remove_image_size_attributes( $html ) {
    return preg_replace( '/(width|height)="\d*"/', '', $html );
    }   
    // Remove image size attributes from post thumbnails
    add_filter( 'post_thumbnail_html', 'nasio_remove_image_size_attributes' );
    
    // Remove image size attributes from images added to a WordPress post
    add_filter( 'image_send_to_editor', 'nasio_remove_image_size_attributes' );


function nasio_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'nasio_front_page_template' );

function nasio_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span class="featured-post">' . __( 'Sticky', 'nasio' ) . '</span>';
	}

	// Set up and print post meta information.
	printf('<span><a href="%1$s" rel="bookmark" class="entry-date" datetime="%2$s">%3$s</a></span><span><a class="author-meta-field" href="%4$s" rel="author">%5$s</a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr(get_the_author())
	);
}

function nasio_get_category(){
	$categories = get_the_category();
	$separator = ' ';
	$output = '';
	if ( ! empty( $categories ) ) {
		foreach( $categories as $category ) {
			$output .= '<span><a class="category-meta-field" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'nasio' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a></span>' . $separator;
		}
	echo trim( $output, $separator );
	}
}

//Make drop down menu accessible by screen readers

/**
 * WCAG 2.0 Attributes for Dropdown Menus
 *
 * Adjustments to menu attributes tot support WCAG 2.0 recommendations
 * for flyout and dropdown menus.
 *
 * @ref https://www.w3.org/WAI/tutorials/menus/flyout/
 */
function nasio_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
    // Add [aria-haspopup] and [aria-expanded] to menu items that have children
    $item_has_children = in_array( 'menu-item-has-children', $item->classes );
    if ( $item_has_children ) {
        $atts['aria-haspopup'] = "true";
        $atts['aria-expanded'] = "false";
    }
	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'nasio_nav_menu_link_attributes', 10, 4 );

/**
 * Extend Recent Posts Widget 
 *
 * Adds Images to the default WordPress Recent Posts Widget
 */

Class Nasio_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {

			if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'nasio' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
		if ( ! $number )
			$number = 3;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */


		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
			echo $args['before_widget']; ?>
			<?php if ( $title ) {
				echo $args['before_title'] . $title . $args['after_title'];
			} ?>
			<ul>
			<?php while ( $r->have_posts() ) : $r->the_post(); ?>
				<li>
				<?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
					if  ( ! empty( $featured_image_url ) ) {
							the_post_thumbnail();
					}
					else{ 
						?> <img class="default-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-image.jpg"
						alt="<?php the_title(); ?>" /> <?php
					} ?>
					<a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(get_the_title()) ? the_title() : the_ID(); ?></a>
					<?php if ( $show_date ) : ?>
						<span class="post-date"><?php echo esc_attr(get_the_date()); ?></span>
					<?php endif; ?>
				</li>
			<?php endwhile; ?>
			</ul>
			<?php echo $args['after_widget']; ?>
			<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();
		endif;
	}
}

function nasio_recent_widget_registration() {
	register_widget('Nasio_Recent_Posts_Widget');
}
add_action('widgets_init', 'nasio_recent_widget_registration');

/* Modify comments markup*/

function nasio_modify_comment_output( $comment, $depth, $args ) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>"
    <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent', $comment ); ?>>
    <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
        <footer class="comment-meta">
            <div class="comment-author vcard">
                <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                <?php
				/* translators: %s: comment author link */
				printf( __( '%s <span class="says">says:</span>', 'nasio' ),
						sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) )
				);
				?>
            </div><!-- .comment-author -->

            <div class="comment-metadata">
                <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                    <time datetime="<?php comment_time( 'c' ); ?>">
                        <?php
						printf( _x( '%s ago', '%s = human-readable time difference', 'nasio' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) );
						?>
                    </time>
                </a>
                <?php edit_comment_link( __( 'edit', 'nasio' ), '<span class="edit-link">', '</span>' ); ?>
            </div><!-- .comment-metadata -->

            <?php if ( '0' == $comment->comment_approved ) : ?>
            <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'nasio' ); ?></p>
            <?php endif; ?>
        </footer><!-- .comment-meta -->

        <div class="comment-content">
            <?php comment_text(); ?>
        </div><!-- .comment-content -->

    </article><!-- .comment-body -->
    <?php
}

wp_list_comments("callback=nasio_modify_comment_output");

function nasio_truncate_string($phrase, $max_words) {
	
	$phrase_array = explode(' ', $phrase);
	
	if (count($phrase_array) > $max_words && $max_words > 0) 
		$phrase = implode(' ', array_slice($phrase_array, 0, $max_words)) . __('...', 'nasio');
	
	return $phrase;
	
}

if ( function_exists( 'get_parent_theme_file_path' ) ){ // Since WordPress 4.7
	// ADD OPTIONS TO THEME CUSTOMIZER
	require get_parent_theme_file_path( '/inc/customizer.php' );
	 
	//IMPLEMENT CUSTOM HEADER FEATURE.
 	require get_parent_theme_file_path( '/inc/custom-header.php' );
}
else{
	require get_template_directory() . '/inc/customizer.php';
	require get_template_directory() . '/inc/custom-header.php';
}

// PAGINATION
function nasio_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('&#x00AB') );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>...</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>...</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('&#x00BB') );
 
    echo '</ul></div>' . "\n";
 
}

/**
 * Enable dark theme mode
 * 
 * Inspired by https://wordpress.org/plugins/wp-night-mode/
 * 
 */

function nasio_dark_mode($classes) {

    $nasio_night_mode = isset( $_COOKIE['nasioNightMode'] ) ? $_COOKIE['nasioNightMode'] : '';

    if ($nasio_night_mode!=='' ) {
        
        // Add 'dark-mode' body class
            return array_merge( $classes, array( 'dark-mode' ) );

    }

    return $classes;
  
}

add_filter( 'body_class', 'nasio_dark_mode');

/**
 * Display the admin notice. Since v. 2.1.1
 */
function nasio_admin_notice() {
	global $current_user;
	$user_id = $current_user->ID;

	if ( ! get_user_meta( $user_id, 'nasio_ignore_customizer_notice' ) ) {
		?>

		<div class="notice notice-info">
			<p>
				<strong>New!</strong> Try our new dark mode! - <a target="_blank" href="https://docs.olympusthemes.com/kb/nasio-theme/customizer-settings-nasio/?utm_source=notice">Learn More</a>
				<span style="float:right">
					<a href="?nasio_ignore_customizer_notice=0"><?php esc_html_e( 'Hide Notice', 'nasio' ); ?></a>
				</span>
			</p>
		</div>

		<?php
	}
}
add_action( 'admin_notices', 'nasio_admin_notice' );

/**
 * Dismiss the admin notice.
 */
function nasio_dismiss_admin_notice() {
	global $current_user;
	$user_id = $current_user->ID;
	/* If user clicks to ignore the notice, add that to their user meta */
	if ( isset( $_GET['nasio_ignore_customizer_notice'] ) && '0' === $_GET['nasio_ignore_customizer_notice'] ) {
		add_user_meta( $user_id, 'nasio_ignore_customizer_notice', 'true', true );
	}
}
add_action( 'admin_init', 'nasio_dismiss_admin_notice' );