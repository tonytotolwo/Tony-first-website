<?php 
/*-----------------------------------------------------------------------------------*/
/* Initializing Widgetized Areas (Sidebars)																			 */
/*-----------------------------------------------------------------------------------*/

/*----------------------------------*/
/* Sidebar							*/
/*----------------------------------*/

function fleming_widgets_init() {

	register_sidebar(array(
		'name' => __('Sidebar: Primary','fleming'),
		'id' => 'sidebar-primary',
		'before_widget' => '<div class="widget %2$s clearfix" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar(array(
		'name' => __('Sidebar: Secondary','fleming'),
		'id' => 'sidebar-secondary',
		'before_widget' => '<div class="widget %2$s clearfix" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar(array(
		'name' => __('Homepage: Content Widgets','fleming'),
		'id' => 'homepage-content-widgets',
		'description' => __('Recommended widgets: [Academia: Recent Posts], [Academia: Featured Pages]','fleming'),
		'before_widget' => '<div class="site-section"><div class="site-section-wrapper site-section-wrapper-widget %2$s clearfix" id="%1$s">',
		'after_widget' => '</div><!-- .site-section-wrapper .site-section-wrapper-widget .clearfix --></div><!-- .site-section -->',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 1', 'fleming' ),
		'id'            => 'footer-col-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content-wrapper">',
		'after_widget'  => '</div><!-- .widget-content-wrapper --></div>',
		'before_title'  => '<p class="widget-title"><span>',
		'after_title'   => '</span></p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 2', 'fleming' ),
		'id'            => 'footer-col-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content-wrapper">',
		'after_widget'  => '</div><!-- .widget-content-wrapper --></div>',
		'before_title'  => '<p class="widget-title"><span>',
		'after_title'   => '</span></p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 3', 'fleming' ),
		'id'            => 'footer-col-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content-wrapper">',
		'after_widget'  => '</div><!-- .widget-content-wrapper --></div>',
		'before_title'  => '<p class="widget-title"><span>',
		'after_title'   => '</span></p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 4', 'fleming' ),
		'id'            => 'footer-col-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content-wrapper">',
		'after_widget'  => '</div><!-- .widget-content-wrapper --></div>',
		'before_title'  => '<p class="widget-title"><span>',
		'after_title'   => '</span></p>',
	) );

} 

add_action( 'widgets_init', 'fleming_widgets_init' );