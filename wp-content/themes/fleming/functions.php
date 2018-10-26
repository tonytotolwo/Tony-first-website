<?php			

if ( ! isset( $content_width ) ) $content_width = 900;

/**
 * Define some constats
 */
if( ! defined( 'ACADEMIATHEMES_AUTHOR' ) ) {
	define( 'ACADEMIATHEMES_AUTHOR', 'https://www.academiathemes.com' );
}
if( ! defined( 'ACADEMIATHEMES_THEME_URL' ) ) {
	define( 'ACADEMIATHEMES_THEME_URL', 'https://www.academiathemes.com/themes/fleming-lite/' );
}
if( ! defined( 'ACADEMIATHEMES_VERSION' ) ) {
	define( 'ACADEMIATHEMES_VERSION', '1.0.0' );
}
if( ! defined( 'ACADEMIATHEMES_DIR' ) ) {
	define( 'ACADEMIATHEMES_DIR', trailingslashit( get_template_directory() ) );
}
if( ! defined( 'ACADEMIATHEMES_DIR_URI' ) ) {
	define( 'ACADEMIATHEMES_DIR_URI', trailingslashit( get_template_directory_uri() ) );
}

/* Disable PHP error reporting for notices, leave only the important ones 
================================== */

// error_reporting(E_ERROR | E_PARSE);

/**
 * Theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 */

if ( ! function_exists( 'fleming_setup' ) ) :
/**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 */
function fleming_setup() {
    // This theme styles the visual editor to resemble the theme style.
    add_editor_style( array( 'css/editor-style.css' ) );

	add_image_size( 'thumb-academia-slideshow', 1200, 500, true );
	add_image_size( 'thumb-featured-page', 580, 380, true );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

	/* Add support for Custom Background 
	==================================== */
	
	add_theme_support( 'custom-background' );
	
    /* Add support for Custom Logo 
	==================================== */

    add_theme_support( 'custom-logo', array(
	   'height'      => 80,
	   'width'       => 300,
	   'flex-width'  => true,
	   'flex-height' => true,
	) );

	/* Add support for post and comment RSS feed links in <head>
	==================================== */
	
	add_theme_support( 'automatic-feed-links' ); 

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 150, 100, true );

	/* Add support for Localization
	==================================== */
	
	load_theme_textdomain( 'fleming', get_template_directory() . '/languages' );
	
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable($locale_file) )
		require_once($locale_file);

	/* Add support for Custom Headers 
	==================================== */
	
	// add_theme_support( 'custom-header', $defaults );
    
	// Register nav menus
    register_nav_menus( array(
        'primary' => __( 'Main Menu', 'fleming' ),
        'secondary' => __( 'Secondary Menu', 'fleming' ),
    ) );
}
endif;

add_action( 'after_setup_theme', 'fleming_setup' );

add_filter( 'image_size_names_choose', 'fleming_custom_sizes' );
 
function fleming_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'thumb-academia-slideshow' => __( 'Featured Image: Slideshow Size', 'fleming' ),
		'thumb-featured-page' => __( 'Featured Image: Page Thumbnail', 'fleming' ),
		'post-thumbnail' => __( 'Featured Image: Thumbnail', 'fleming' ),
	) );
}

if ( ! function_exists( 'fleming_fonts_url' ) ) :
/**
 * Register Google fonts for Fleming
 *
 * Create your own fleming_fonts_url() function to override in a child theme.
 *
 * @since Fleming 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function fleming_fonts_url() {
	
	$fonts_url = '';
	$subsets   = 'latin,latin-ext';	

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'fleming' ) ) {
		$fonts[] = 'Lato:400,400i,700,700i';
	}

	if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'fleming' ) ) {
		$fonts[] = 'Oswald:700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/* Add javascripts and CSS used by the theme 
================================== */

function fleming_js_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'fleming-style', get_stylesheet_uri() );

	if (! is_admin()) {

		wp_enqueue_script(
			'jquery-slicknav',
			get_template_directory_uri() . '/js/jquery.slicknav.min.js',
			array('jquery'),
			true
		);

		wp_enqueue_script(
			'jquery-superfish',
			get_template_directory_uri() . '/js/superfish.min.js',
			array('jquery'),
			true
		);

		wp_enqueue_script(
			'jquery-flexslider',
			get_template_directory_uri() . '/js/jquery.flexslider.js',
			array('jquery'),
			true
		);

		wp_register_script( 'fleming-scripts', get_template_directory_uri() . '/js/fleming.js', array( 'jquery' ), '20180502', true );

		/* Contains the strings used in our JavaScript file */
		$flemingStrings = array (
			'slicknav_menu_home' => _x( 'Click for Menu', 'The main label for the expandable mobile menu', 'fleming' )
		);

		wp_localize_script( 'fleming-scripts', 'flemingStrings', $flemingStrings );

		wp_enqueue_script( 'fleming-scripts' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

		/* Font-Awesome */
		
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', null, '4.7.0');
		
		// Loads our default Google Webfont
		wp_enqueue_style( 'fleming-webfonts', fleming_fonts_url(), array(), null, null );

	}

}
add_action('wp_enqueue_scripts', 'fleming_js_scripts');

if ( ! function_exists( 'fleming_get_the_archive_title' ) ) :
/* Custom Archives titles.
=================================== */
function fleming_get_the_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }

    return $title;
}
endif;
add_filter( 'get_the_archive_title', 'fleming_get_the_archive_title' );

/* Enable Excerpts for Static Pages
==================================== */

add_action( 'init', 'fleming_excerpts_for_pages' );

function fleming_excerpts_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}

/* Custom Excerpt Length
==================================== */

function new_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

/* Replace invalid ellipsis from excerpts
==================================== */

function fleming_excerpt($text)
{
   return str_replace(' [...]', '...', $text); // if there is a space before ellipsis
   return str_replace('[...]', '...', $text);
}
add_filter('the_excerpt', 'fleming_excerpt');

/* Convert HEX color to RGB value (for the customizer)						
==================================== */

function fleming_hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);
	
	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = "$r, $g, $b";
	return $rgb; // returns an array with the rgb values
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function fleming_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'fleming_pingback_header' );

/**
 * --------------------------------------------
 * Enqueue scripts and styles for the backend.
 *
 * @package AcademiaThemes
 * --------------------------------------------
 */

if ( ! function_exists( 'fleming_scripts_admin' ) ) {
	/**
	 * Enqueue admin styles and scripts
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function fleming_scripts_admin( $hook ) {
		// if ( 'widgets.php' !== $hook ) return;

		// Styles
		wp_enqueue_style(
			'fleming-style-admin',
			get_template_directory_uri() . '/academia-admin/css/academia_theme_settings.css',
			'', ACADEMIATHEMES_VERSION, 'all'
		);
	}
}
add_action( 'admin_enqueue_scripts', 'fleming_scripts_admin' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Fleming 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function fleming_body_classes( $classes ) {

	$attachments_num = 0;

	$fleming_loop = new WP_Query( array( 
		'post_type'			=> array('post','page'),
		'order' 			=> 'DESC',
		'orderby' 			=> 'date',
		'post__not_in' 		=> get_option( 'sticky_posts' ),
		'posts_per_page' 	=> 5,
		'meta_key' 			=> 'academiathemes_meta_featured_item',
		'meta_value' 		=> 1				
	) );

	$fleming_loop_count = $fleming_loop->post_count;

	if ( is_404() ) {
		$classes[] = 'site-page-noslideshow';
	}

	if ( is_search() ) {
		$classes[] = 'site-page-noslideshow';
	}

	if ( ( is_home() || is_front_page() ) && $fleming_loop_count == 0 ) {
		$classes[] = 'site-page-noslideshow';
	} elseif ( ( is_home() || is_front_page() ) && $fleming_loop_count > 0 ) {
		$classes[] = 'site-page-withslideshow';
	}

	if ( is_archive() || is_search() ) {
		$classes[] = 'site-page-noslideshow';
	}

	if ( is_singular() ) {

		global $post;

		$args = array(
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'post_parent'    => $post->ID,
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'post_status'    => null,
			'numberposts'    => -1
		);
		
		$attachments = get_posts($args);
		$attachments_num = count($attachments);

		if ( $attachments_num == 0 && !has_post_thumbnail() ) {
			$classes[] = 'site-page-noslideshow';
		} else {
			$classes[] = 'site-page-withslideshow';
		}

	}

	$classes[] = academiathemes_helper_get_sidebar_position();

	return $classes;
}

add_filter( 'body_class', 'fleming_body_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function fleming_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'fleming' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'fleming_wp_title', 10, 2 );

if ( ! function_exists( 'fleming_the_custom_logo' ) ) {

/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Fleming 1.0
 */

	function fleming_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			
			// We don't use the default the_custom_logo() function because of its automatic addition of itemprop attributes (they fail the ARIA tests)
			
			$site = get_bloginfo('name');
			$custom_logo_id = get_theme_mod( 'custom_logo' );

			if ( $custom_logo_id ) {
			$html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>', 
				esc_url( home_url( '/' ) ),
				wp_get_attachment_image( $custom_logo_id, 'full', false, array(
					'class'    => 'custom-logo',
					'alt' => __('Logo for ','fleming') . esc_attr($site),
					) )
				);
			}

			echo $html;

		}

	}
}

if ( ! function_exists( 'fleming_comment' ) ) :
/**
 * Template for comments and pingbacks.
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function fleming_comment( $comment, $args, $depth ) {

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php esc_html_e( 'Pingback:', 'fleming' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'fleming' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<div class="comment-author vcard">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</div><!-- .comment-author -->

			<header class="comment-meta">
				<?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( esc_html_x( '%1$s at %2$s', '1: date, 2: time', 'fleming' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'fleming' ); ?></p>
				<?php endif; ?>

				<div class="comment-tools">
					<?php edit_comment_link( esc_html__( 'Edit', 'fleming' ), '<span class="edit-link">', '</span>' ); ?>

					<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<span class="reply">',
							'after'     => '</span>',
						) ) );
					?>
				</div><!-- .comment-tools -->
			</header><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for fleming_comment()

/* Include WordPress Theme Customizer
================================== */

require_once( get_template_directory() . '/customizer/customizer.php');

/* Include Additional Options and Components
================================== */

require_once( get_template_directory() . '/academia-admin/sidebars.php');
require_once( get_template_directory() . '/academia-admin/widgets/featured-pages.php');
require_once( get_template_directory() . '/academia-admin/helper-functions.php');

/* Include Theme Options Page for Admin
================================== */

//require only in admin!
if(is_admin()){	
	require_once('academia-admin/academia-theme-settings.php');
}