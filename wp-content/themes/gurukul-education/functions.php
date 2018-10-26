<?php
/**
 * gurukul-education functions and definitions
 *
 * @package WordPress
 * @subpackage gurukul-education
 * @since 1.0
 */

if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

function gurukul_education_setup() {
	
	load_theme_textdomain( 'gurukul-education', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background', $defaults = array(
    'default-color'          => '',
    'default-image'          => '',
    'default-repeat'         => '',
    'default-position-x'     => '',
    'default-attachment'     => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
	));

	add_image_size( 'gurukul-education-featured-image', 2000, 1200, true );

	add_image_size( 'gurukul-education-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'gurukul-education' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */

	add_editor_style( array( 'assets/css/editor-style.css', gurukul_education_fonts_url() ) );

	// Theme Activation Notice
	global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'gurukul_education_activation_notice' );
	}

}
add_action( 'after_setup_theme', 'gurukul_education_setup' );

// Notice after Theme Activation
function gurukul_education_activation_notice() {
	echo '<div class="notice notice-success is-dismissible start-notice">';
		echo '<h3>'. esc_html__( 'Welcome to Luzuk!!', 'gurukul-education' ) .'</h3>';
		echo '<p>'. esc_html__( 'Thank you for choosing Gurukul Education theme. It will be our pleasure to have you on our Welcome page to serve you better.', 'gurukul-education' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=gurukul_education_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'gurukul-education' ) .'</a></p>';
	echo '</div>';
}

function gurukul_education_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'gurukul-education' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'gurukul-education' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'gurukul-education' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'gurukul-education' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'gurukul-education' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'gurukul-education' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'gurukul-education' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'gurukul-education' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'gurukul-education' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'gurukul-education' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'gurukul-education' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'gurukul-education' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'gurukul-education' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'gurukul-education' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gurukul_education_widgets_init' );

function gurukul_education_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Lato';
	$font_family[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';
	$font_family[] = 'Sacramento';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//Enqueue scripts and styles.
function gurukul_education_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'gurukul-education-fonts', gurukul_education_fonts_url(), array(), null );
		//Bootstarp 
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css' );	
	
	// Theme stylesheet.
	wp_enqueue_style( 'gurukul-education-style', get_stylesheet_uri() );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'gurukul-education-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'gurukul-education-style' ), '1.0' );
		wp_style_add_data( 'gurukul-education-ie9', 'conditional', 'IE 9' );
	}
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'gurukul-education-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'gurukul-education-style' ), '1.0' );
	wp_style_add_data( 'gurukul-education-ie8', 'conditional', 'lt IE 9' );

	//font-awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	//Nivo Slider
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri().'/assets/css/nivo-slider.css' );
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'gurukul-education-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$gurukul_education_l10n=array();
	
	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'gurukul-education-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$gurukul_education_l10n['expand']         = __( 'Expand child menu', 'gurukul-education' );
		$gurukul_education_l10n['collapse']       = __( 'Collapse child menu', 'gurukul-education' );		
	}

	wp_enqueue_script( 'gurukul-education-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'gurukul-education-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );
	wp_enqueue_script( 'jquery.nivo.slider', get_theme_file_uri( '/assets/js/jquery.nivo.slider.js' ), array(), '1.0', true );
	wp_enqueue_script( 'gurukul-education-custom', get_theme_file_uri( '/assets/js/custom.js' ), array(), '1.0', true );

	wp_localize_script( 'gurukul-education-skip-link-focus-fix', 'gurukul_educationScreenReaderText', $gurukul_education_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gurukul_education_scripts' );

function gurukul_education_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'gurukul_education_front_page_template' );

function gurukul_education_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

//footer Link
define('GURUKUL_EDUCATION_LIVE_DEMO','https://luzuk.com/demo/gurukul/','gurukul-education');
define('GURUKUL_EDUCATION_PRO_DOCS','https://luzuk.com/demo/gurukul/documentation/','gurukul-education');
define('GURUKUL_EDUCATION_BUY_NOW','https://www.luzuk.com/themes/premium-gurukul-education-wordpress-theme/','gurukul-education');
define('GURUKUL_EDUCATION_SUPPORT','https://www.luzuk.com/contact-us/','gurukul-education');
define('GURUKUL_EDUCATION_FREE_DOCS','https://www.luzuk.com/demo/gurukul/free-documentation/','gurukul-education');
define('GURUKUL_EDUCATION_CREDIT','https://www.luzuk.com/','gurukul-education');

if ( ! function_exists( 'gurukul_education_credit' ) ) {
	function gurukul_education_credit(){
		echo "<a href=".esc_url(GURUKUL_EDUCATION_CREDIT)." target='_blank'>".esc_html__('Luzuk','gurukul-education')."</a>";
	}
}

/* Excerpt Limit Begin */
function gurukul_education_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );

require get_parent_theme_file_path( '/inc/getting-started/getting-started.php' );