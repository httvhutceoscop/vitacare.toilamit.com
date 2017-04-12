<?php

/**

 * Twenty Thirteen functions and definitions

 *

 * Sets up the theme and provides some helper functions, which are used in the

 * theme as custom template tags. Others are attached to action and filter

 * hooks in WordPress to change core functionality.

 *

 * When using a child theme (see https://codex.wordpress.org/Theme_Development

 * and https://codex.wordpress.org/Child_Themes), you can override certain

 * functions (those wrapped in a function_exists() call) by defining them first

 * in your child theme's functions.php file. The child theme's functions.php

 * file is included before the parent theme's file, so the child theme

 * functions would be used.

 *

 * Functions that are not pluggable (not wrapped in function_exists()) are

 * instead attached to a filter or action hook.

 *

 * For more information on hooks, actions, and filters, @link https://codex.wordpress.org/Plugin_API

 *

 * @package WordPress

 * @subpackage Twenty_Thirteen

 * @since Twenty Thirteen 1.0

 */



/*

 * Set up the content width value based on the theme's design.

 *

 * @see twentythirteen_content_width() for template-specific adjustments.

 */

if ( ! isset( $content_width ) )

	$content_width = 604;



/**

 * Add support for a custom header image.

 */

require get_template_directory() . '/inc/custom-header.php';

include(TEMPLATEPATH . '/includes/widget-from-categories.php');

include(TEMPLATEPATH . '/includes/widget-post-category.php');

include(TEMPLATEPATH . '/includes/widget-post-by-category-slidebar.php');

include(TEMPLATEPATH . '/includes/widget-post-by_category-home.php');

include(TEMPLATEPATH . '/includes/widget-show-post-by-categories-2.php');

include(TEMPLATEPATH . '/includes/widget-post-viewed.php');

include(TEMPLATEPATH . '/includes/widget-post-hot.php');

include(TEMPLATEPATH . '/includes/widget-post-new.php');

/**

 * Twenty Thirteen only works in WordPress 3.6 or later.

 */

if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )

	require get_template_directory() . '/inc/back-compat.php';



/**

 * Twenty Thirteen setup.

 *

 * Sets up theme defaults and registers the various WordPress features that

 * Twenty Thirteen supports.

 *

 * @uses load_theme_textdomain() For translation/localization support.

 * @uses add_editor_style() To add Visual Editor stylesheets.

 * @uses add_theme_support() To add support for automatic feed links, post

 * formats, and post thumbnails.

 * @uses register_nav_menu() To add support for a navigation menu.

 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.

 *

 * @since Twenty Thirteen 1.0

 */

function twentythirteen_setup() {

	/*

	 * Makes Twenty Thirteen available for translation.

	 *

	 * Translations can be added to the /languages/ directory.

	 * If you're building a theme based on Twenty Thirteen, use a find and

	 * replace to change 'twentythirteen' to the name of your theme in all

	 * template files.

	 */

	load_theme_textdomain( 'twentythirteen', get_template_directory() . '/languages' );



	/*

	 * This theme styles the visual editor to resemble the theme style,

	 * specifically font, colors, icons, and column width.

	 */

	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentythirteen_fonts_url() ) );



	// Adds RSS feed links to <head> for posts and comments.

	add_theme_support( 'automatic-feed-links' );



	/*

	 * Switches default core markup for search form, comment form,

	 * and comments to output valid HTML5.

	 */

	add_theme_support( 'html5', array(

		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'

	) );



	/*

	 * This theme supports all available post formats by default.

	 * See https://codex.wordpress.org/Post_Formats

	 */

	add_theme_support( 'post-formats', array(

		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'

	) );



	// This theme uses wp_nav_menu() in one location.

	register_nav_menu( 'primary', __( 'Navigation Menu', 'twentythirteen' ) );



	/*

	 * This theme uses a custom image size for featured images, displayed on

	 * "standard" posts and pages.

	 */

	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 604, 270, true );



	// This theme uses its own gallery styles.

	add_filter( 'use_default_gallery_style', '__return_false' );

}

add_action( 'after_setup_theme', 'twentythirteen_setup' );



/**

 * Return the Google font stylesheet URL, if available.

 *

 * The use of Source Sans Pro and Bitter by default is localized. For languages

 * that use characters not supported by the font, the font can be disabled.

 *

 * @since Twenty Thirteen 1.0

 *

 * @return string Font stylesheet or empty string if disabled.

 */

function twentythirteen_fonts_url() {

	$fonts_url = '';



	/* Translators: If there are characters in your language that are not

	 * supported by Source Sans Pro, translate this to 'off'. Do not translate

	 * into your own language.

	 */

	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'twentythirteen' );



	/* Translators: If there are characters in your language that are not

	 * supported by Bitter, translate this to 'off'. Do not translate into your

	 * own language.

	 */

	$bitter = _x( 'on', 'Bitter font: on or off', 'twentythirteen' );



	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {

		$font_families = array();



		if ( 'off' !== $source_sans_pro )

			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';



		if ( 'off' !== $bitter )

			$font_families[] = 'Bitter:400,700';



		$query_args = array(

			'family' => urlencode( implode( '|', $font_families ) ),

			'subset' => urlencode( 'latin,latin-ext' ),

		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	}



	return $fonts_url;

}





//remove wordpress authentication

/*remove_filter('authenticate', 'wp_authenticate_username_password', 20);

add_filter('authenticate', function($user, $email, $password){



    //Check for empty fields

        if(empty($email) || empty ($password)){

            //create new error object and add errors to it.

            $error = new WP_Error();



            if(empty($email)){ //No email

                $error->add('empty_username', __('<strong>ERROR</strong>: Email field is empty.'));

            }

            else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //Invalid Email

                $error->add('invalid_username', __('<strong>ERROR</strong>: Email is invalid.'));

            }



            if(empty($password)){ //No password

                $error->add('empty_password', __('<strong>ERROR</strong>: Password field is empty.'));

            }



            return $error;

        }



        //Check if user exists in WordPress database

        $user = get_user_by('email', $email);



        //bad email

        if(!$user){

            $error = new WP_Error();

            $error->add('invalid', __('<strong>ERROR</strong>: Either the email or password you entered is invalid.'));

            return $error;

        }

        else{ //check password

            if(!wp_check_password($password, $user->user_pass, $user->ID)){ //bad password

                $error = new WP_Error();

                $error->add('invalid', __('<strong>ERROR</strong>: Either the email or password you entered is invalid.'));

                return $error;

            }else{

                return $user; //passed

            }

        }

}, 20, 3);*/

/**

 * Enqueue scripts and styles for the front end.

 *

 * @since Twenty Thirteen 1.0

 */

function twentythirteen_scripts_styles() {

	/*

	 * Adds JavaScript to pages with the comment form to support

	 * sites with threaded comments (when in use).

	 */

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )

		wp_enqueue_script( 'comment-reply' );



	// Adds Masonry to handle vertical alignment of footer widgets.

	if ( is_active_sidebar( 'sidebar-1' ) )

		wp_enqueue_script( 'jquery-masonry' );



	// Loads JavaScript file with functionality specific to Twenty Thirteen.

	wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );



	// Add Source Sans Pro and Bitter fonts, used in the main stylesheet.

	wp_enqueue_style( 'twentythirteen-fonts', twentythirteen_fonts_url(), array(), null );



	// Add Genericons font, used in the main stylesheet.

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.03' );



	// Loads our main stylesheet.

	wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18' );



	// Loads the Internet Explorer specific stylesheet.

	wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );

	wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );

}

add_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );



/**

 * Filter the page title.

 *

 * Creates a nicely formatted and more specific title element text for output

 * in head of document, based on current view.

 *

 * @since Twenty Thirteen 1.0

 *

 * @param string $title Default title text for current view.

 * @param string $sep   Optional separator.

 * @return string The filtered title.

 */

function twentythirteen_wp_title( $title, $sep ) {

	global $paged, $page;



	if ( is_feed() )

		return $title;



	// Add the site name.

	$title .= get_bloginfo( 'name', 'display' );



	// Add the site description for the home/front page.

	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) )

		$title = "$title $sep $site_description";



	// Add a page number if necessary.

	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )

		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );



	return $title;

}

add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );



/**

 * Register two widget areas.

 *

 * @since Twenty Thirteen 1.0

 */

function twentythirteen_widgets_init() {

	register_sidebar(array(

		   'name' => __('Right Sidebar 1'),//Ten cua sidebar

		   'id' => 'right-sidebar',//id cua sidebar

		   'description' => 'Right sidebar',//Mo ta sidebar

		   'class' => 'right-sidebar',//

		   	'before_widget' => '<div id="%1$s" class="innersidebar %2$s">',

			'after_widget' => '</div>',

		   'before_title' => '<h3 class="widgettitle">',

		   'after_title' => '</h3>'

		));

		register_sidebar(array(

		   'name' => __('Main Sidebar'),

		   'id' => 'main-sidebar',

		   'description' => 'Main sidebar',

		   'class' => 'main-sidebar',

		   'before_widget' => '<div class="owl-carousels owl-theme box col-xs-12 col-sm-12 col-md-12 col-lg-12">',

			'after_widget' => '</div>',

		   'before_title' => '<h3 class="widgettitle">',

		   'after_title' => '</h3>'

		));

		register_sidebar(array(

		   'name' => __('New Post Sidebar'),

		   'id' => 'new-post-sidebar',

		   'description' => 'New Post sidebar',

		   'class' => 'new-post-sidebar',

		   'before_widget' => '<div id="%1$s" class="%2$s col-xs-12 col-sm-12 col-md-12 col-lg-12">',

			'after_widget' => '</div>',

		   'before_title' => '<h3 class="widgettitle">',

		   'after_title' => '</h3>'

		));

		register_sidebar(array(

		   'name' => __('Anh Chat Luong'),

		   'id' => 'image-quatity',

		   'description' => 'Anh chat luong',

		   'class' => 'image-quatity',

		   'before_title' => '<h3 class="widgettitle">',

		   'after_title' => '</h3>'

		));

		register_sidebar(array(

		   'name' => __('Right Sidebar 2'),

		   'id' => 'right-sidebar-2',

		   'description' => 'Right Sidebar 2',

		   'class' => 'right-sidebar-2',

		   'before_widget' => '<div id="%1$s" class="innersidebar %2$s">',

			'after_widget' => '</div>',

		   'before_title' => '<h3 class="widgettitle">',

		   'after_title' => '</h3>'

		));

		register_sidebar(array(

		   'name' => __('Left Sidebar'),

		   'id' => 'left-sidebar',

		   'description' => 'Left Sidebar',

		   'class' => 'left-sidebar',

		   'before_widget' => '<div id="%1$s" class="%2$s">',

			'after_widget' => '</div>',

		   'before_title' => '<h3 class="widgettitle">',

		   'after_title' => '</h3>'

		));

		register_sidebar(array(

		   'name' => __('Right Sidebar 3'),

		   'id' => 'right-sidebar-3',

		   'description' => 'Right Sidebar 3',

		   'class' => 'right-sidebar-3',

		   'before_widget' => '<div id="%1$s" class="innersidebar %2$s">',

			'after_widget' => '</div>',

		   'before_title' => '<h3 class="widgettitle">',

		   'after_title' => '</h3>'

		));

		register_sidebar(array(

		   'name' => __('Sidebar Footer 1'),

		   'id' => 'sidebar-footer-1',

		   'description' => 'Sidebar Footer 1',

		   'class' => 'sidebar-footer-1',

		   'before_widget' => '<aside id="%1$s" class="widget %2$s">',

			'after_widget'  => '</aside>',

		   'before_title' => '<h4 class="widgettitle">',

		   'after_title' => '</h4>'

		));

		register_sidebar(array(

		   'name' => __('Sidebar Footer 2'),

		   'id' => 'sidebar-footer-2',

		   'description' => 'Sidebar Footer 2',

		   'class' => 'sidebar-footer-2',

		   'before_widget' => '<aside id="%1$s" class="widget %2$s">',

			'after_widget'  => '</aside>',

		   'before_title' => '<h4 class="widgettitle">',

		   'after_title' => '</h4>'

		));

		register_sidebar(array(

		   'name' => __('Sidebar Footer 3'),

		   'id' => 'sidebar-footer-3',

		   'description' => 'Sidebar Footer 3',

		   'class' => 'sidebar-footer-3',

		   'before_widget' => '<aside id="%1$s" class="widget %2$s">',

			'after_widget'  => '</aside>',

		   'before_title' => '<h4 class="widgettitle">',

		   'after_title' => '</h4>'

		));

		register_sidebar(array(

		   'name' => __('Sidebar Footer 4'),

		   'id' => 'sidebar-footer-4',

		   'description' => 'Sidebar Footer 4',

		   'class' => 'sidebar-footer-4',

		   'before_widget' => '<aside id="%1$s" class="widget %2$s">',

			'after_widget'  => '</aside>',

		   'before_title' => '<h4 class="widgettitle">',

		   'after_title' => '</h4>'

		));

		register_sidebar(array(

		   'name' => __('Sidebar Footer 5'),

		   'id' => 'sidebar-footer-5',

		   'description' => 'Sidebar Footer 5',

		   'class' => 'sidebar-footer-5',

		   'before_widget' => '<aside id="%1$s" class="widget %2$s">',

			'after_widget'  => '</aside>',

		   'before_title' => '<h4 class="widgettitle">',

		   'after_title' => '</h4>'

		));

		register_sidebar(array(

		   'name' => __('Copy Right'),

		   'id' => 'sidebar-footer-6',

		   'description' => 'Copy Right',

		   'class' => 'sidebar-footer-6',

		   'before_widget' => '<aside id="%1$s" class="widget %2$s">',

			'after_widget'  => '</aside>',

		   'before_title' => '<h4 class="widgettitle">',

		   'after_title' => '</h4>'

		));

		register_sidebar(array(

		   'name' => __('Khuyến Cáo'),

		   'id' => 'sidebar-footer-7',

		   'description' => 'Copy Right',

		   'class' => 'sidebar-footer-7',

		   'before_widget' => '<aside id="%1$s" class="widget %2$s">',

			'after_widget'  => '</aside>',

		   'before_title' => '<h4 class="widgettitle">',

		   'after_title' => '</h4>'

		));

		register_sidebar(array(

		   'name' => __('Sidebar Myaccount'),

		   'id' => 'sidebar-footer-8',

		   'description' => 'Sidebar Myaccount',

		   'class' => 'sidebar-footer-8',

		   'before_widget' => '<aside id="%1$s" class="widget %2$s">',

			'after_widget'  => '</aside>',

		   'before_title' => '<h3 class="widgettitle">',

		   'after_title' => '</h3>'

		));

		register_sidebar(array(

		   'name' => __('Sidebar Category Cart 1'),

		   'id' => 'sidebar-category-1',

		   'description' => 'Sidebar Category Cart 1',

		   'class' => 'sidebar-category-1',

		   'before_title' => '<h4 class="title_cart">',

		   'after_title' => '</h4>'

		));

		register_sidebar(array(

		   'name' => __('Sidebar Category Cart 2'),

		   'id' => 'sidebar-category-2',

		   'description' => 'Sidebar Category Cart 2',

		   'class' => 'sidebar-category-2',

		   'before_title' => '<h4 class="title_cart">',

		   'after_title' => '</h4>'

		));



}

add_action( 'widgets_init', 'twentythirteen_widgets_init' );



if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :

/**

 * Display navigation to next/previous set of posts when applicable.

 *

 * @since Twenty Thirteen 1.0

 */

function twentythirteen_paging_nav() {

	global $wp_query;



	// Don't print empty markup if there's only one page.

	if ( $wp_query->max_num_pages < 2 )

		return;

	?>

	<nav class="navigation paging-navigation" role="navigation">

		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>

		<div class="nav-links">



			<?php if ( get_next_posts_link() ) : ?>

			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen' ) ); ?></div>

			<?php endif; ?>



			<?php if ( get_previous_posts_link() ) : ?>

			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>

			<?php endif; ?>



		</div><!-- .nav-links -->

	</nav><!-- .navigation -->

	<?php

}

endif;

function page_nav() {

    if (is_singular())
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (( $paged + 2 ) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="pagination"><ul>';

    /** Previous Post Link */
    if (get_previous_posts_link())
        printf('<li>%s</li>', get_previous_posts_link());

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf('<li%s><a href="%s">%s</a></li>', $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>', $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "n";

        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>', $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link())
        printf('<li>%s</li>', get_next_posts_link());

    echo '</ul></div>';
}

if ( ! function_exists( 'twentythirteen_post_nav' ) ) :

/**

 * Display navigation to next/previous post when applicable.

*

* @since Twenty Thirteen 1.0

*/

function twentythirteen_post_nav() {

	global $post;



	// Don't print empty markup if there's nowhere to navigate.

	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );

	$next     = get_adjacent_post( false, '', false );



	if ( ! $next && ! $previous )

		return;

	?>

	<nav class="navigation post-navigation" role="navigation">

		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentythirteen' ); ?></h1>

		<div class="nav-links">



			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'twentythirteen' ) ); ?>

			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen' ) ); ?>



		</div><!-- .nav-links -->

	</nav><!-- .navigation -->

	<?php

}

endif;



if ( ! function_exists( 'twentythirteen_entry_meta' ) ) :

/**

 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.

 *

 * Create your own twentythirteen_entry_meta() to override in a child theme.

 *

 * @since Twenty Thirteen 1.0

 */

function twentythirteen_entry_meta() {

	if ( is_sticky() && is_home() && ! is_paged() )

		echo '<span class="featured-post">' . esc_html__( 'Sticky', 'twentythirteen' ) . '</span>';



	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )

		twentythirteen_entry_date();



	// Translators: used between list items, there is a space after the comma.

	$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );

	if ( $categories_list ) {

		echo '<span class="categories-links">' . $categories_list . '</span>';

	}



	// Translators: used between list items, there is a space after the comma.

	$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );

	if ( $tag_list ) {

		echo '<span class="tags-links">' . $tag_list . '</span>';

	}



	// Post author

	if ( 'post' == get_post_type() ) {

		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',

			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),

			esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),

			get_the_author()

		);

	}

}

endif;



if ( ! function_exists( 'twentythirteen_entry_date' ) ) :

/**

 * Print HTML with date information for current post.

 *

 * Create your own twentythirteen_entry_date() to override in a child theme.

 *

 * @since Twenty Thirteen 1.0

 *

 * @param boolean $echo (optional) Whether to echo the date. Default true.

 * @return string The HTML-formatted post date.

 */

function twentythirteen_entry_date( $echo = true ) {

	if ( has_post_format( array( 'chat', 'status' ) ) )

		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' );

	else

		$format_prefix = '%2$s';



	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',

		esc_url( get_permalink() ),

		esc_attr( sprintf( __( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ),

		esc_attr( get_the_date( 'c' ) ),

		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )

	);



	if ( $echo )

		echo $date;



	return $date;

}

endif;



if ( ! function_exists( 'twentythirteen_the_attached_image' ) ) :

/**

 * Print the attached image with a link to the next attached image.

 *

 * @since Twenty Thirteen 1.0

 */

function twentythirteen_the_attached_image() {

	/**

	 * Filter the image attachment size to use.

	 *

	 * @since Twenty thirteen 1.0

	 *

	 * @param array $size {

	 *     @type int The attachment height in pixels.

	 *     @type int The attachment width in pixels.

	 * }

	 */

	$attachment_size     = apply_filters( 'twentythirteen_attachment_size', array( 724, 724 ) );

	$next_attachment_url = wp_get_attachment_url();

	$post                = get_post();



	/*

	 * Grab the IDs of all the image attachments in a gallery so we can get the URL

	 * of the next adjacent image in a gallery, or the first image (if we're

	 * looking at the last image in a gallery), or, in a gallery of one, just the

	 * link to that image file.

	 */

	$attachment_ids = get_posts( array(

		'post_parent'    => $post->post_parent,

		'fields'         => 'ids',

		'numberposts'    => -1,

		'post_status'    => 'inherit',

		'post_type'      => 'attachment',

		'post_mime_type' => 'image',

		'order'          => 'ASC',

		'orderby'        => 'menu_order ID',

	) );



	// If there is more than 1 attachment in a gallery...

	if ( count( $attachment_ids ) > 1 ) {

		foreach ( $attachment_ids as $attachment_id ) {

			if ( $attachment_id == $post->ID ) {

				$next_id = current( $attachment_ids );

				break;

			}

		}



		// get the URL of the next image attachment...

		if ( $next_id )

			$next_attachment_url = get_attachment_link( $next_id );



		// or get the URL of the first image attachment.

		else

			$next_attachment_url = get_attachment_link( reset( $attachment_ids ) );

	}



	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',

		esc_url( $next_attachment_url ),

		the_title_attribute( array( 'echo' => false ) ),

		wp_get_attachment_image( $post->ID, $attachment_size )

	);

}

endif;



/**

 * Return the post URL.

 *

 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or

 * the first link found in the post content.

 *

 * Falls back to the post permalink if no URL is found in the post.

 *

 * @since Twenty Thirteen 1.0

 *

 * @return string The Link format URL.

 */

function twentythirteen_get_link_url() {

	$content = get_the_content();

	$has_url = get_url_in_content( $content );



	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );

}



if ( ! function_exists( 'twentythirteen_excerpt_more' ) && ! is_admin() ) :

/**

 * Replaces "[...]" (appended to automatically generated excerpts) with ...

 * and a Continue reading link.

 *

 * @since Twenty Thirteen 1.4

 *

 * @param string $more Default Read More excerpt link.

 * @return string Filtered Read More excerpt link.

 */

function twentythirteen_excerpt_more( $more ) {

	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',

		esc_url( get_permalink( get_the_ID() ) ),

			/* translators: %s: Name of current post */

			sprintf( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentythirteen' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )

		);

	return ' &hellip; ' . $link;

}

add_filter( 'excerpt_more', 'twentythirteen_excerpt_more' );

endif;



/**

 * Extend the default WordPress body classes.

 *

 * Adds body classes to denote:

 * 1. Single or multiple authors.

 * 2. Active widgets in the sidebar to change the layout and spacing.

 * 3. When avatars are disabled in discussion settings.

 *

 * @since Twenty Thirteen 1.0

 *

 * @param array $classes A list of existing body class values.

 * @return array The filtered body class list.

 */

function twentythirteen_body_class( $classes ) {

	if ( ! is_multi_author() )

		$classes[] = 'single-author';



	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )

		$classes[] = 'sidebar';



	if ( ! get_option( 'show_avatars' ) )

		$classes[] = 'no-avatars';



	return $classes;

}

add_filter( 'body_class', 'twentythirteen_body_class' );



/**

 * Adjust content_width value for video post formats and attachment templates.

 *

 * @since Twenty Thirteen 1.0

 */

function twentythirteen_content_width() {

	global $content_width;



	if ( is_attachment() )

		$content_width = 724;

	elseif ( has_post_format( 'audio' ) )

		$content_width = 484;

}

add_action( 'template_redirect', 'twentythirteen_content_width' );



/**

 * Add postMessage support for site title and description for the Customizer.

 *

 * @since Twenty Thirteen 1.0

 *

 * @param WP_Customize_Manager $wp_customize Customizer object.

 */

function twentythirteen_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

}

add_action( 'customize_register', 'twentythirteen_customize_register' );



/**

 * Enqueue Javascript postMessage handlers for the Customizer.

 *

 * Binds JavaScript handlers to make the Customizer preview

 * reload changes asynchronously.

 *

 * @since Twenty Thirteen 1.0

 */

function twentythirteen_customize_preview_js() {

	wp_enqueue_script( 'twentythirteen-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20141120', true );

}

add_action( 'customize_preview_init', 'twentythirteen_customize_preview_js' );





function get_post_with_catalog_id($id, $post_id) {

    global $wpdb;

    echo '<ul>';

    $results = $wpdb->get_results("SELECT p.post_title, p.ID FROM xtl_posts p

INNER JOIN xtl_term_relationships t on t.object_id = p.ID

  WHERE p.post_status = 'publish' AND t.term_taxonomy_id = '" . $id . "'");

    foreach ($results as $parent) {

        if ($parent->ID == $post_id) {

         ?>

		<li class="title_product"><a class="link" href="<?php echo get_permalink($parent->ID);?>"><?php echo $parent->post_title;?></a></li>

		<li class="image_thumb"><a class="link" href="<?php echo get_permalink($parent->ID);?>"><?php echo the_post_thumbnail();?></a></li>

		<li class="desc"><?php echo get_field('description');?></li>

		<li class="price">$<?php echo get_field('price');?></li>

		<li class="addtocart"><a href="<?php bloginfo('url'); ?>/gio-hang/them/<?php echo get_the_ID(); ?>" class="add_to_cart btn btn-warning">Buy Now</a></li>

	<?php



        } else {

       ?>



    <?php    }

    }

    echo '</ul>';

}





/*-----------------------------------------------------------------------------------*/

/* Custom post type Tin-tuc

/*-----------------------------------------------------------------------------------*/

add_action('init', 'cptui_register_my_cpt_tin_tuc');

function cptui_register_my_cpt_tin_tuc() {

register_post_type('tin-tuc', array(

'label' => 'Tin tức',

'description' => '',

'public' => true,

'show_ui' => true,

'show_in_menu' => true,

'capability_type' => 'post',

'map_meta_cap' => true,

'hierarchical' => false,

'rewrite' => array('slug' => 'tin-tuc', 'with_front' => true),

'query_var' => true,

'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),

'labels' => array (

  'name' => 'Tin tức',

  'singular_name' => 'Tin tức',

  'menu_name' => 'Tin tức',

  'add_new' => 'Đăng tin',

  'add_new_item' => 'Đăng tin',

  'edit' => 'Sửa',

  'edit_item' => 'Sửa',

  'new_item' => 'Đăng tin',

  'view' => 'Xem tin',

  'view_item' => 'Xem tin',

  'search_items' => 'Tìm',

  'not_found' => 'Không thấy',

  'not_found_in_trash' => 'Không thấy',

  'parent' => 'Cha',

)

) ); }



// Add danh muc tin



add_action('init', 'cptui_register_my_taxes_danhmuc');

function cptui_register_my_taxes_danhmuc() {

register_taxonomy( 'danhmuc',array (

  0 => 'tin-tuc',

),

array( 'hierarchical' => true,

  'label' => 'Danh mục tin',

  'show_ui' => true,

  'query_var' => true,

  'show_admin_column' => true,

  'labels' => array (

  'search_items' => 'Danh mục tin',

  'popular_items' => 'Nổi bật',

  'all_items' => 'Tất cả',

  'parent_item' => 'Cha',

  'parent_item_colon' => 'Cha',

  'edit_item' => 'Sửa',

  'update_item' => 'Cập nhật',

  'add_new_item' => 'Thêm',

  'new_item_name' => 'Thêm',

  'separate_items_with_commas' => 'Cách nhau bằng dấu phẩy',

  'add_or_remove_items' => 'Thêm hoặc xóa',

  'choose_from_most_used' => 'Chọn nổi bật nhất',

)

) );

}



// add filter danhmuc in admin

function restrict_books_by_genre() {

    global $typenow;

    $post_type = 'tin-tuc'; // change HERE

    $taxonomy = 'danhmuc'; // change HERE

    if ($typenow == $post_type) {

      $selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';

      $info_taxonomy = get_taxonomy($taxonomy);

      wp_dropdown_categories(array(

        'show_option_all' => __("Hiển thị tất cả"),

        'taxonomy' => $taxonomy,

        'name' => $taxonomy,

        'orderby' => 'name',

        'selected' => $selected,

        'show_count' => true,

        'hide_empty' => true,

      ));

    };

  }

add_action('restrict_manage_posts', 'restrict_books_by_genre');



function convert_id_to_term_in_query($query) {

  global $pagenow;

  $post_type = 'tin-tuc'; // change HERE

  $taxonomy = 'danhmuc'; // change HERE

  $q_vars = &$query->query_vars;

  if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0) {

    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);

    $q_vars[$taxonomy] = $term->slug;

  }

}

add_filter('parse_query', 'convert_id_to_term_in_query');






/*-----------------------------------------------------------------------------------*/

/* Custom post type tuyen_bo_san_pham

/*-----------------------------------------------------------------------------------*/

add_action('init', 'cptui_register_tuyen_bo_san_pham');

function cptui_register_tuyen_bo_san_pham() {

register_post_type('tuyen-bo-san-pham', array(

'label' => 'Tuyên bố sản phẩm',

'description' => '',

'public' => true,

'show_ui' => true,

'show_in_menu' => true,

'capability_type' => 'post',

'map_meta_cap' => true,

'hierarchical' => false,

'rewrite' => array('slug' => 'tuyen-bo-san-pham', 'with_front' => true),

'query_var' => true,

'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),

'labels' => array (

  'name' => 'Tuyên bố sản phẩm',

  'singular_name' => 'Tuyên bố sản phẩm',

  'menu_name' => 'Tuyên bố sản phẩm',

  'add_new' => 'Đăng tin',

  'add_new_item' => 'Đăng tin',

  'edit' => 'Sửa',

  'edit_item' => 'Sửa',

  'new_item' => 'Đăng tin',

  'view' => 'Xem tin',

  'view_item' => 'Xem tin',

  'search_items' => 'Tìm',

  'not_found' => 'Không thấy',

  'not_found_in_trash' => 'Không thấy',

  'parent' => 'Cha',

)

) ); }

// Add danh muc tin



add_action('init', 'cptui_register_danh_muc_tuyen_bo_san_pham');

function cptui_register_danh_muc_tuyen_bo_san_pham() {

register_taxonomy( 'danh-muc-tuyen-bo-san-pham',array (

  0 => 'tuyen-bo-san-pham',

),

array( 'hierarchical' => true,

  'label' => 'Danh mục',

  'show_ui' => true,

  'query_var' => true,

  'show_admin_column' => true,

  'labels' => array (

  'search_items' => 'Danh mục',

  'popular_items' => 'Nổi bật',

  'all_items' => 'Tất cả',

  'parent_item' => 'Cha',

  'parent_item_colon' => 'Cha',

  'edit_item' => 'Sửa',

  'update_item' => 'Cập nhật',

  'add_new_item' => 'Thêm',

  'new_item_name' => 'Thêm',

  'separate_items_with_commas' => 'Cách nhau bằng dấu phẩy',

  'add_or_remove_items' => 'Thêm hoặc xóa',

  'choose_from_most_used' => 'Chọn nổi bật nhất',

)

) );

}





/*-----------------------------------------------------------------------------------*/

/* Custom post type bai-viet-trang-chu

/*-----------------------------------------------------------------------------------*/

add_action('init', 'cptui_register_bai_viet_trang_chu');

function cptui_register_bai_viet_trang_chu() {

register_post_type('bai-viet-trang-chu', array(

'label' => 'Bài viết quy trình',

'description' => '',

'public' => true,

'show_ui' => true,

'show_in_menu' => true,

'capability_type' => 'post',

'map_meta_cap' => true,

'hierarchical' => false,

'rewrite' => array('slug' => 'bai-viet-trang-chu', 'with_front' => true),

'query_var' => true,

'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),

'labels' => array (

  'name' => 'Bài viết quy trình',

  'singular_name' => 'Bài viết quy trình',

  'menu_name' => 'Bài viết quy trình',

  'add_new' => 'Đăng tin',

  'add_new_item' => 'Đăng tin',

  'edit' => 'Sửa',

  'edit_item' => 'Sửa',

  'new_item' => 'Đăng tin',

  'view' => 'Xem tin',

  'view_item' => 'Xem tin',

  'search_items' => 'Tìm',

  'not_found' => 'Không thấy',

  'not_found_in_trash' => 'Không thấy',

  'parent' => 'Cha',

)

) ); }

// Add danh muc tin



add_action('init', 'cptui_register_danh_muc_bai_viet_trang_chu');

function cptui_register_danh_muc_bai_viet_trang_chu() {

register_taxonomy( 'danh-muc-bai-viet-trang-chu',array (

  0 => 'bai-viet-trang-chu',

),

array( 'hierarchical' => true,

  'label' => 'Danh mục',

  'show_ui' => true,

  'query_var' => true,

  'show_admin_column' => true,

  'labels' => array (

  'search_items' => 'Danh mục',

  'popular_items' => 'Nổi bật',

  'all_items' => 'Tất cả',

  'parent_item' => 'Cha',

  'parent_item_colon' => 'Cha',

  'edit_item' => 'Sửa',

  'update_item' => 'Cập nhật',

  'add_new_item' => 'Thêm',

  'new_item_name' => 'Thêm',

  'separate_items_with_commas' => 'Cách nhau bằng dấu phẩy',

  'add_or_remove_items' => 'Thêm hoặc xóa',

  'choose_from_most_used' => 'Chọn nổi bật nhất',

)

) );

}

/*-----------------------------------------------------------------------------------*/

/* Custom post type y-kien-khach-hang

/*-----------------------------------------------------------------------------------*/

add_action('init', 'cptui_register_y_kien_khach_hang');

function cptui_register_y_kien_khach_hang() {

register_post_type('y-kien-khach-hang', array(

'label' => 'Ý kiến khách hàng',

'description' => '',

'public' => true,

'show_ui' => true,

'show_in_menu' => true,

'capability_type' => 'post',

'map_meta_cap' => true,

'hierarchical' => false,

'rewrite' => array('slug' => 'y-kien-khach-hang', 'with_front' => true),

'query_var' => true,

'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),

'labels' => array (

  'name' => 'Ý kiến khách hàng',

  'singular_name' => 'Ý kiến khách hàng',

  'menu_name' => 'Ý kiến khách hàng',

  'add_new' => 'Đăng tin',

  'add_new_item' => 'Đăng tin',

  'edit' => 'Sửa',

  'edit_item' => 'Sửa',

  'new_item' => 'Đăng tin',

  'view' => 'Xem tin',

  'view_item' => 'Xem tin',

  'search_items' => 'Tìm',

  'not_found' => 'Không thấy',

  'not_found_in_trash' => 'Không thấy',

  'parent' => 'Cha',

)

) ); }

// Add danh muc tin



/*add_action('init', 'cptui_register_danh_muc_y_kien_khach_hang');

function cptui_register_danh_muc_y_kien_khach_hang() {

register_taxonomy( 'danh-muc-y-kien-khach-hang',array (

  0 => 'y-kien-khach-hang',

),

array( 'hierarchical' => true,

  'label' => 'Danh mục',

  'show_ui' => true,

  'query_var' => true,

  'show_admin_column' => true,

  'labels' => array (

  'search_items' => 'Danh mục',

  'popular_items' => 'Nổi bật',

  'all_items' => 'Tất cả',

  'parent_item' => 'Cha',

  'parent_item_colon' => 'Cha',

  'edit_item' => 'Sửa',

  'update_item' => 'Cập nhật',

  'add_new_item' => 'Thêm',

  'new_item_name' => 'Thêm',

  'separate_items_with_commas' => 'Cách nhau bằng dấu phẩy',

  'add_or_remove_items' => 'Thêm hoặc xóa',

  'choose_from_most_used' => 'Chọn nổi bật nhất',

)

) );

}*/

/*-----------------------------------------------------------------------------------*/

/* Custom post type y-kien-khach-hang

/*-----------------------------------------------------------------------------------*/

add_action('init', 'cptui_register_loi_tam_su');

function cptui_register_loi_tam_su() {

register_post_type('loi-tam-su', array(

'label' => 'Lời tâm sự',

'description' => '',

'public' => true,

'show_ui' => true,

'show_in_menu' => true,

'capability_type' => 'post',

'map_meta_cap' => true,

'hierarchical' => false,

'rewrite' => array('slug' => 'loi-tam-su', 'with_front' => true),

'query_var' => true,

'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),

'labels' => array (

  'name' => 'Lời tâm sự',

  'singular_name' => 'Lời tâm sự',

  'menu_name' => 'Lời tâm sự',

  'add_new' => 'Đăng tin',

  'add_new_item' => 'Đăng tin',

  'edit' => 'Sửa',

  'edit_item' => 'Sửa',

  'new_item' => 'Đăng tin',

  'view' => 'Xem tin',

  'view_item' => 'Xem tin',

  'search_items' => 'Tìm',

  'not_found' => 'Không thấy',

  'not_found_in_trash' => 'Không thấy',

  'parent' => 'Cha',

)

) ); }





class Menu_With_Description extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth, $args) {

        global $wp_query;

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';

        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';

        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';

        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

        $item_output = $args->before;

        $item_output .= '<a'. $attributes .'>';

        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

        $item_output .= '<br /><span class="sub">' . $item->description . '</span>';

        $item_output .= '</a>';

        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

    }



}





/*-----------------------------------------------------------------------------------*/

/* Custom post type ve-chung-toi

/*-----------------------------------------------------------------------------------*/

add_action('init', 'cptui_register_ve_chung_toi');

function cptui_register_ve_chung_toi() {

register_post_type('ve_chung_toi', array(

'label' => 'Về chúng tôi',

'description' => '',

'public' => true,

'show_ui' => true,

'show_in_menu' => true,

'capability_type' => 'post',

'map_meta_cap' => true,

'hierarchical' => false,

'rewrite' => array('slug' => 've_chung_toi', 'with_front' => true),

'query_var' => true,

'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),

'labels' => array (

  'name' => 'Về chúng tôi',

  'singular_name' => 'Về chúng tôi',

  'menu_name' => 'Về chúng tôi',

  'add_new' => 'Đăng tin',

  'add_new_item' => 'Đăng tin',

  'edit' => 'Sửa',

  'edit_item' => 'Sửa',

  'new_item' => 'Đăng tin',

  'view' => 'Xem tin',

  'view_item' => 'Xem tin',

  'search_items' => 'Tìm',

  'not_found' => 'Không thấy',

  'not_found_in_trash' => 'Không thấy',

  'parent' => 'Cha',

)

) ); }

// Add danh muc tin



add_action('init', 'cptui_register_danh_muc_ve_chung_toi');

function cptui_register_danh_muc_ve_chung_toi() {

	register_taxonomy( 'danh-muc-ve-chung-toi',array (

	  0 => 've_chung_toi',

	),

	array( 'hierarchical' => true,

	  'label' => 'Danh mục về chúng tôi',

	  'show_ui' => true,

	  'query_var' => true,

	  'show_admin_column' => true,

	  'labels' => array (

			  'search_items' => 'Danh mục về chúng tôi',

			  'popular_items' => 'Nổi bật',

			  'all_items' => 'Tất cả',

			  'parent_item' => 'Cha',

			  'parent_item_colon' => 'Cha',

			  'edit_item' => 'Sửa',

			  'update_item' => 'Cập nhật',

			  'add_new_item' => 'Thêm',

			  'new_item_name' => 'Thêm',

			  'separate_items_with_commas' => 'Cách nhau bằng dấu phẩy',

			  'add_or_remove_items' => 'Thêm hoặc xóa',

			  'choose_from_most_used' => 'Chọn nổi bật nhất',

			)

	) );

}

/*-----------------------------------------------------------------------------------*/

/* Custom post type bai-viet-moi

/*-----------------------------------------------------------------------------------*/

add_action('init', 'cptui_register_bai_viet_moi');

function cptui_register_bai_viet_moi() {

register_post_type('bai-viet-moi', array(

'label' => 'Bài Viết Mới',

'description' => '',

'public' => true,

'show_ui' => true,

'show_in_menu' => true,

'capability_type' => 'post',

'map_meta_cap' => true,

'hierarchical' => false,

'rewrite' => array('slug' => 'bai-viet-moi', 'with_front' => true),

'query_var' => true,

'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),

'labels' => array (

  'name' => 'Bài Viết Mới',

  'singular_name' => 'Bài Viết Mới',

  'menu_name' => 'Bài Viết Mới',

  'add_new' => 'Đăng tin',

  'add_new_item' => 'Đăng tin',

  'edit' => 'Sửa',

  'edit_item' => 'Sửa',

  'new_item' => 'Đăng tin',

  'view' => 'Xem tin',

  'view_item' => 'Xem tin',

  'search_items' => 'Tìm',

  'not_found' => 'Không thấy',

  'not_found_in_trash' => 'Không thấy',

  'parent' => 'Cha',

)

) ); }

// Add danh muc tin



add_action('init', 'cptui_register_danh_muc_bai_viet_chung');

function cptui_register_danh_muc_bai_viet_chung() {

	register_taxonomy( 'danh-muc-bai-viet-moi',array (

	  0 => 'bai-viet-moi',

	),

	array( 'hierarchical' => true,

	  'label' => 'Danh mục bài viết mới',

	  'show_ui' => true,

	  'query_var' => true,

	  'show_admin_column' => true,

	  'labels' => array (

			  'search_items' => 'Danh mục bài viết mới',

			  'popular_items' => 'Nổi bật',

			  'all_items' => 'Tất cả',

			  'parent_item' => 'Cha',

			  'parent_item_colon' => 'Cha',

			  'edit_item' => 'Sửa',

			  'update_item' => 'Cập nhật',

			  'add_new_item' => 'Thêm',

			  'new_item_name' => 'Thêm',

			  'separate_items_with_commas' => 'Cách nhau bằng dấu phẩy',

			  'add_or_remove_items' => 'Thêm hoặc xóa',

			  'choose_from_most_used' => 'Chọn nổi bật nhất',

			)

	) );

}

/*add_action('wp_ajax_dshuyen_ajax', 'dshuyen_ajax');

add_action('wp_ajax_nopriv_dshuyen_ajax', 'dshuyen_ajax');

function dshuyen_ajax() {

    $id = $_POST['matinh']; //Lay parameter tu request

    global $wpdb;

    $kq ="";

    $sql = "select * from xtl_danh_sach_huyen where id_tinh = ".$id."";

    $result = $wpdb->get_results($sql);

    $kq .= '<option value="0">--- Chọn Quận/Huyên ---</option>';

    foreach ($result as $key => $rows) {

    	$kq .='<option value = "'.$rows->id_huyen.'" id="huyen'.$rows->id_huyen.'" data-huyen'.$rows->id_huyen.'="'.$rows->phi.'">'.$rows->ten_huyen.'</option>';

    }

    echo $kq;

    die();

}

add_action('wp_ajax_dsxa_ajax', 'dsxa_ajax');

add_action('wp_ajax_nopriv_dsxa_ajax', 'dsxa_ajax');

function dsxa_ajax() {

    $id = $_POST['mahuyen']; //Lay parameter tu request

    global $wpdb;

    $kq_xa ="";

    $sql_xa = "select * from xtl_danh_sach_xa where id_huyen = ".$id."";

    $result = $wpdb->get_results($sql_xa);

    $kq_xa .= '<option value="0">--- Chọn Xã/Phường ---</option>';

    foreach ($result as $key => $rows) {

    	$kq_xa .='<option value = "'.$rows->id_xa.'" id="xa'.$rows->id_xa.'" data-xa'.$rows->id_xa.'="'.$rows->phi.'">'.$rows->ten_xa.'</option>';

    	$kq_xa .="nb";

    }

    echo $kq_xa;

    die();

}*/

add_image_size( "thumb-images", 350, 350, true );

function donvi_taxonomy() {
  register_taxonomy(
            'don_vi', //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
            'product', //post type name
            array(
              'hierarchical' => true,
        'label' => 'Đơn vị', //Display name
        'query_var' => true,
        'show_in_nav_menus' => true,
        'rewrite' => array(
            'slug' => 'don-vi', // This controls the base slug that will display before each term
            'with_front' => false // Don't display the category base before
            )
        )
            );
}

add_action('init', 'donvi_taxonomy');

function add_metabox() {
    add_meta_box("_thanhphan", "Thành phần", "input_thanhphan", "product", "normal", "low");
    add_meta_box("_caccauhoi", "Các câu hỏi", "input_caccauhoi", "product", "normal", "low");
    add_meta_box("_huongdansudung", "Hướng dẫn sử dụng", "input_huongdansudung", "product", "normal", "low");
    add_meta_box("_thongtinthem", "Các thông tin thêm", "input_thongtinthem", "product", "normal", "low");
}

function input_thanhphan() {
	    global $post;
	    $custom = get_post_custom($post->ID);
	    ?>
	    <style>.width99 {width:99%;}</style>
	    <p>
	      <?php
	        wp_editor($custom["_thanhphan"][0], '_thanhphan_', array(
	                                        'wpautop' => true,
	                                        'media_buttons' => true,
	                                        'textarea_name' => thanhphan,
	                                        'textarea_rows' => 10,
	                                        'teeny' => true
	                                    ));
	     ?>
	    </p>
	    <?php
	}
function input_caccauhoi() {
	    global $post;
	    $custom = get_post_custom($post->ID);
	    ?>
	    <style>.width99 {width:99%;}</style>
	    <p>
	      <?php
	        wp_editor($custom["_caccauhoi"][0], '_caccauhoi_', array(
	                                        'wpautop' => true,
	                                        'media_buttons' => true,
	                                        'textarea_name' => caccauhoi,
	                                        'textarea_rows' => 10,
	                                        'teeny' => true
	                                    ));
	     ?>
	    </p>
	    <?php
	}
function input_huongdansudung() {
	    global $post;
	    $custom = get_post_custom($post->ID);
	    ?>
	    <style>.width99 {width:99%;}</style>
	    <p>
	      <?php
	        wp_editor($custom["_huongdansudung"][0], '_huongdansudung_', array(
	                                        'wpautop' => true,
	                                        'media_buttons' => true,
	                                        'textarea_name' => huongdansudung,
	                                        'textarea_rows' => 10,
	                                        'teeny' => true
	                                    ));
	     ?>
	    </p>
	    <?php
	}
function input_thongtinthem() {
	    global $post;
	    $custom = get_post_custom($post->ID);
	    ?>
	    <style>.width99 {width:99%;}</style>
	    <p>
	      <?php
	        wp_editor($custom["_thongtinthem"][0], '_thongtinthem_', array(
	                                        'wpautop' => true,
	                                        'media_buttons' => true,
	                                        'textarea_name' => thongtinthem,
	                                        'textarea_rows' => 10,
	                                        'teeny' => true
	                                    ));
	     ?>
	    </p>
	    <?php
	}
function save_post_doc() {
	    global $post;
	    if ($post) {
	        update_post_meta($post->ID, "_thanhphan", $_POST["thanhphan"]);
	        update_post_meta($post->ID, "_caccauhoi", $_POST["caccauhoi"]);
	        update_post_meta($post->ID, "_huongdansudung", $_POST["huongdansudung"]);
    		update_post_meta($post->ID, "_thongtinthem", $_POST["thongtinthem"]);
	    }
	}
add_action('save_post', 'save_post_doc');
add_action('admin_init', 'add_metabox');


/*add_filter ('add_to_cart_redirect', 'redirect_to_checkout');

function redirect_to_checkout() {
global $woocommerce;
$checkout_url = $woocommerce->cart->get_checkout_url();
return $checkout_url;
}*/
/** Theme Option***/


function add_theme_menu_item()
{
	add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");


function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Theme Panel</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");
	            submit_button();
	        ?>
	    </form>
		</div>
	<?php
}



function display_email()
{
	?>
    	<input type="text" name="email_email" id="email_email" value="<?php echo get_option('email_email'); ?>" size="100"/>
    <?php
}

function display_phone()
{
	?>
    	<input type="text" name="phone_phone" id="phone_phone" value="<?php echo get_option('phone_phone'); ?>" size="100"/>
    <?php
}
function display_option1()
{
	?>
    	<input type="text" name="option1" id="option1" value="<?php echo get_option('option1'); ?>" size="100"/>
    <?php
}function display_option2()
{
	?>
    	<input type="text" name="option2" id="option2" value="<?php echo get_option('option2'); ?>" size="100"/>
    <?php
}function display_option3()
{
	?>
    	<input type="text" name="option3" id="option3" value="<?php echo get_option('option3'); ?>" size="100"/>
    <?php
}function display_option4()
{
	?>
    	<input type="text" name="option4" id="option4" value="<?php echo get_option('option4'); ?>" size="100"/>
    <?php
}function display_option5()
{
	?>
    	<input type="text" name="option5" id="option5" value="<?php echo get_option('option5'); ?>" size="100"/>
    <?php
}function display_option6()
{
	?>
    	<input type="text" name="option6" id="option6" value="<?php echo get_option('option6'); ?>" size="100"/>
    <?php
}
function display_calo()
{
	?>
    	<input type="text" name="calo" id="calo" value="<?php echo get_option('calo'); ?>" size="100"/>
    <?php
}
function display_dinhduong()
{
	?>
    	<input type="text" name="dinhduong" id="dinhduong" value="<?php echo get_option('dinhduong'); ?>" size="100"/>
    <?php
}
function display_buaan()
{
	?>
    	<input type="text" name="buaan" id="buaan" value="<?php echo get_option('buaan'); ?>" size="100"/>
    <?php
}
function display_vitamin()
{
	?>
    	<input type="text" name="vitamin" id="vitamin" value="<?php echo get_option('vitamin'); ?>" size="100"/>
    <?php
}

function display_hang_order()
{
	?>
    	<input type="text" name="hang_order" id="hang_order" value="<?php echo get_option('hang_order'); ?>" size="100"/>
    <?php
}

function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");

	add_settings_field("email_email", "Địa chỉ Email", "display_email", "theme-options", "section");
    add_settings_field("phone_phone", "Số điện thoại", "display_phone", "theme-options", "section");
    add_settings_field("option1", "Tùy chọn 1", "display_option1", "theme-options", "section");
    add_settings_field("option2", "Tùy chọn 2", "display_option2", "theme-options", "section");
    add_settings_field("option3", "Tùy chọn 3", "display_option3", "theme-options", "section");
    add_settings_field("option4", "Tùy chọn 4", "display_option4", "theme-options", "section");
    add_settings_field("option5", "Tùy chọn 5", "display_option5", "theme-options", "section");
    add_settings_field("option6", "Tùy chọn 6", "display_option6", "theme-options", "section");
    add_settings_field("calo", "Chuyên đề tính calo", "display_calo", "theme-options", "section");
    add_settings_field("dinhduong", "Chuyên đề tính dinh dưỡng", "display_dinhduong", "theme-options", "section");
    add_settings_field("buaan", "Chuyên đề tư vấn bữa ăn hợp lý", "display_buaan", "theme-options", "section");
    add_settings_field("vitamin", "Chuyên đề tư vấn chọn Vitamin", "display_vitamin", "theme-options", "section");
    add_settings_field("hang_order", "Lưu ý hàng order", "display_hang_order", "theme-options", "section");

    register_setting("section", "email_email");
    register_setting("section", "phone_phone");
    register_setting("section", "option1");
    register_setting("section", "option2");
    register_setting("section", "option3");
    register_setting("section", "option4");
    register_setting("section", "option5");
    register_setting("section", "option6");
    register_setting("section", "calo");
    register_setting("section", "dinhduong");
    register_setting("section", "buaan");
    register_setting("section", "vitamin");
    register_setting("section", "hang_order");
}

add_action("admin_init", "display_theme_panel_fields");


add_image_size( "thumb-product", 350, 350, true );


add_filter('the_title', 'wpse165333_the_title', 10, 2);
function wpse165333_the_title($title, $post_ID)
{
    if( 'nav_menu_item' == get_post_type($post_ID) )
    {
        if( 'taxonomy' == get_post_meta($post_ID, '_menu_item_type', true) && 'category' == get_post_meta($post_ID, '_menu_item_object', true) )
        {
            $category = get_category( get_post_meta($post_ID, '_menu_item_object_id', true) );
            $title .= sprintf(' (%d)', $category->count);
        }
    }
    return $title;
}
add_filter('the_title', 'wpse1653333_the_title', 10, 2);
function wpse1653333_the_title($title, $post_ID)
{
    if( 'nav_menu_item' == get_post_type($post_ID) )
    {
        if( 'taxonomy' == get_post_meta($post_ID, '_menu_item_type', true) && 'product_cat' == get_post_meta($post_ID, '_menu_item_object', true) )
        {
            $category = get_category( get_post_meta($post_ID, '_menu_item_object_id', true) );
            $title .= sprintf(' (%d)', $category->count);
        }
    }
    return $title;
}
add_filter('the_title', 'wpse16533333_the_title', 10, 2);
function wpse16533333_the_title($title, $post_ID)
{
    if( 'nav_menu_item' == get_post_type($post_ID) )
    {
        if( 'taxonomy' == get_post_meta($post_ID, '_menu_item_type', true) && 'danh-muc-ve-chung-toi' == get_post_meta($post_ID, '_menu_item_object', true) )
        {
            $category = get_category( get_post_meta($post_ID, '_menu_item_object_id', true) );
            $title .= sprintf(' (%d)', $category->count);
        }
    }
    return $title;
}
add_filter('the_title', 'wpse165333333_the_title', 10, 2);
function wpse165333333_the_title($title, $post_ID)
{
    if( 'nav_menu_item' == get_post_type($post_ID) )
    {
        if( 'taxonomy' == get_post_meta($post_ID, '_menu_item_type', true) && 'danh-muc-bai-viet-moi' == get_post_meta($post_ID, '_menu_item_object', true) )
        {
            $category = get_category( get_post_meta($post_ID, '_menu_item_object_id', true) );
            $title .= sprintf(' (%d)', $category->count);
        }
    }
    return $title;
}


// Stock status
function add_custom_stock_type() {
    ?>
    <script type="text/javascript">
    jQuery(function(){
        jQuery('._stock_status_field').not('.custom-stock-status').remove();
    });
    </script>
    <?php

    woocommerce_wp_select( array( 'id' => '_stock_status', 'wrapper_class' => 'hide_if_variable custom-stock-status', 'label' => __( 'Stock status', 'woocommerce' ), 'options' => array(
        'instock' => __( 'In stock', 'woocommerce' ),
        'outofstock' => __( 'Out of stock', 'woocommerce' ),
        'onrequest' => __( 'Hàng Order', 'woocommerce' ), // The new option !!!
    ), 'desc_tip' => true, 'description' => __( 'Controls whether or not the product is listed as "in stock" or "out of stock" on the frontend.', 'woocommerce' ) ) );
}
add_action('woocommerce_product_options_stock_status', 'add_custom_stock_type');
function save_custom_stock_status( $product_id ) {
    update_post_meta( $product_id, '_stock_status', wc_clean( $_POST['_stock_status'] ) );
}
add_action('woocommerce_process_product_meta', 'save_custom_stock_status',99,1);


function count_port_by_cat($id_cat,$slug_cat){
	$term = get_term( $id_cat, $slug_cat );
	$count = $term->count;
	return $count;
}