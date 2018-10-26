<?php
/**
 * Theme Palace Theme Customizer.
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

//load upgrade-to-pro section
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function corporate_education_customize_register( $wp_customize ) {
	$options = corporate_education_get_theme_options();

	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callback.php';

	// Load validation callback functions.
	require get_template_directory() . '/inc/customizer/validation.php';

	// Load partial callback functions.
	require get_template_directory() . '/inc/customizer/partial.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add panel for section options
	$wp_customize->add_panel( 'corporate_education_sections_panel' , array(
	    'title'      => esc_html__( 'Homepage Sections','corporate-education' ),
	    'description'=> esc_html__( 'Homepage Section Options', 'corporate-education' ),
	    'priority'   => 150,
	) );
	
	// headline
	require get_template_directory() . '/inc/customizer/sections/headline.php';

	// slider
	require get_template_directory() . '/inc/customizer/sections/slider.php';

	// about
	require get_template_directory() . '/inc/customizer/sections/about.php';

	// courses
	require get_template_directory() . '/inc/customizer/sections/courses.php';

	// call to action
	require get_template_directory() . '/inc/customizer/sections/call-to-action.php';

	// latest news
	require get_template_directory() . '/inc/customizer/sections/latest-news.php';

	// team
	require get_template_directory() . '/inc/customizer/sections/team.php';

	// testimonial
	require get_template_directory() . '/inc/customizer/sections/testimonial.php';

	// social
	require get_template_directory() . '/inc/customizer/sections/social.php';

	// Add panel for common theme options
	$wp_customize->add_panel( 'corporate_education_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','corporate-education' ),
	    'description'=> esc_html__( 'Theme Palace Theme Options', 'corporate-education' ),
	    'priority'   => 150,
	) );

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load blog
	require get_template_directory() . '/inc/customizer/theme-options/blog.php';

	// load single
	require get_template_directory() . '/inc/customizer/theme-options/single.php';

	// load static homepage option
	require get_template_directory() . '/inc/customizer/theme-options/homepage-static.php';

	// load excerpt option
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// load breadcrumb option
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// load pagination option
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	// load reset option
	require get_template_directory() . '/inc/customizer/theme-options/reset.php';

	
}
add_action( 'customize_register', 'corporate_education_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function corporate_education_customize_preview_js() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script( 'corporate_education_customizer', get_template_directory_uri() . '/assets/js/customizer' . $min . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'corporate_education_customize_preview_js' );


if ( !function_exists( 'corporate_education_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since Corporate Education 0.1
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function corporate_education_reset_options() {
		$options = corporate_education_get_theme_options();
		if ( true === $options['reset_options'] ) {
			// Reset custom theme options.
			set_theme_mod( 'corporate_education_theme_options', array() );
			// Reset custom header and backgrounds.
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'corporate_education_reset_options' );

if ( !function_exists( 'corporate_education_customize_scripts' ) ) :
	/**
	 * Custom scripts and styles on customize.php
	 *
	 * @since Corporate Education 0.1
	 */
	function corporate_education_customize_scripts() {
		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_script( 'corporate_education_custom_customizer', get_template_directory_uri() . '/assets/js/custom-customizer' . $min . '.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '', true );

		$corporate_education_data = array(
			'reset_message'             => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'corporate-education' )
		);

		// Send list of color variables as object to custom customizer js
		wp_localize_script( 'corporate_education_custom_customizer', 'corporate_education_data', $corporate_education_data );
	}
endif;
add_action( 'customize_controls_enqueue_scripts', 'corporate_education_customize_scripts');