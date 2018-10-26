<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Theme Palace
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corporate_education_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'corporate-education' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'corporate-education' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Optional Sidebar Widget Area
	register_sidebar( array(
		'name'          => esc_html__( 'Optional Sidebar', 'corporate-education' ),
		'id'            => 'corporate-education-optional-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'corporate-education' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Header Widget Area
	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget Area', 'corporate-education' ),
		'id'            => 'header-widget',
		'description'   => esc_html__( 'Add widgets here.', 'corporate-education' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Footer Widget Area
	register_sidebars( 4, array(
		'name'          => esc_html__( 'Footer Widget Area %d', 'corporate-education' ),
		'id'            => 'corporate-education-footer-widget-area',
		'description'   => esc_html__( 'This Widget Area is for Footer Section.', 'corporate-education' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'corporate_education_widgets_init' );

/*
 * Add social link widget
 */
require get_template_directory() . '/inc/widgets/social-link.php';
/*
 * Add Latest Posts widget
 */
require get_template_directory() . '/inc/widgets/latest-posts.php';
/*
 * Add Contact Info widget
 */
require get_template_directory() . '/inc/widgets/contact-info.php';


function corporate_education_register_widgets() {

	register_widget( 'Corporate_Education_Social_Link' );

	register_widget( 'Corporate_Education_Latest_Post' );
	
	register_widget( 'Corporate_Education_Custom_Info_Widget' );
}
add_action( 'widgets_init', 'corporate_education_register_widgets' );