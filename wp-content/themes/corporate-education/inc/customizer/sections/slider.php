<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$wp_customize->add_section( 'corporate_education_slider', array(
	'title'             => esc_html__( 'Featured Slider','corporate-education' ),
	'description'       => esc_html__( 'Slider Section Options.', 'corporate-education' ),
	'panel'             => 'corporate_education_sections_panel',
) );

// Slider Section enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[slider_enable]', array(
	'sanitize_callback'	=> 'corporate_education_sanitize_checkbox',
	'default'          	=> $options['slider_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[slider_enable]', array(
	'label'            	=> esc_html__( 'Enable Slider Section', 'corporate-education' ),
	'section'          	=> 'corporate_education_slider',
	'type'             	=> 'checkbox',
) );

// Slider Section enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[slider_overlay_enable]', array(
	'sanitize_callback'	=> 'corporate_education_sanitize_checkbox',
	'default'          	=> $options['slider_overlay_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[slider_overlay_enable]', array(
	'label'            	=> esc_html__( 'Enable Slider Overlay', 'corporate-education' ),
	'section'          	=> 'corporate_education_slider',
	'type'             	=> 'checkbox',
	'active_callback'	=> 'corporate_education_is_slider_enable',
) );

// Slider post hr setting and control
$wp_customize->add_setting( 'corporate_education_theme_options[slider_hr]', array(
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new Corporate_Education_Customize_Horizontal_Line( $wp_customize, 'corporate_education_theme_options[slider_hr]',
	array(
		'section'         => 'corporate_education_slider',
		'active_callback' => 'corporate_education_is_slider_enable',
		'type'			  => 'hr'
) ) );

// Add slider content type setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[slider_content_type]', array(
	'default'           => $options['slider_content_type'],
	'sanitize_callback' => 'corporate_education_sanitize_select'
) );

$wp_customize->add_control( 'corporate_education_theme_options[slider_content_type]', array(
	'label'           	=> esc_html__( 'Slider Content Type', 'corporate-education' ),
	'description'     	=> esc_html__( 'Recommended slider image size is 1500x844 px', 'corporate-education' ),
	'section'         	=> 'corporate_education_slider',
	'type'            	=> 'select',
	'active_callback' 	=> 'corporate_education_is_slider_enable',
	'choices'         	=> corporate_education_common_content_type()
) );

// Add slider number setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[no_of_slider]', array(
	'default'           => $options['no_of_slider'],
	'sanitize_callback' => 'corporate_education_sanitize_number_range',
	'validate_callback' => 'corporate_education_validate_slider_count',
) );

$wp_customize->add_control( 'corporate_education_theme_options[no_of_slider]', array(
	'label'           	=> esc_html__( 'Number of slides', 'corporate-education' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 5. Please input the valid number and save. Then referesh the page to see the change.', 'corporate-education' ),
	'section'         	=> 'corporate_education_slider',
	'type'            	=> 'number',
	'active_callback' 	=> 'corporate_education_is_slider_enable',
	'input_attrs'     	=> array(
		'max' 	=> 5,
		'min' 	=> 1,
		'style' => 'width:100px'
	)
) );


// Slider Section page setting and control
for ( $i = 1; $i <= $options['no_of_slider']; $i++ ) {
	// Show page drop-down setting and control
	$wp_customize->add_setting( 'corporate_education_theme_options[slider_content_page_'.$i.']', array(
		'sanitize_callback' => 'corporate_education_sanitize_page'
	) );

	$wp_customize->add_control( 'corporate_education_theme_options[slider_content_page_'.$i.']', array(
		'label'           	=> sprintf( esc_html__( 'Select Page %d', 'corporate-education' ), $i ),
		'section'        	=> 'corporate_education_slider',
		'active_callback' 	=> 'corporate_education_slider_content_page',
		'type'				=> 'dropdown-pages'
	) );
}

// Slider Section content type post setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[slider_btn_label]', array(
	'default'           => $options['slider_btn_label'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corporate_education_theme_options[slider_btn_label]', array(
	'active_callback'	=> 'corporate_education_is_slider_enable',
	'label'             => esc_html__( 'Input link button label', 'corporate-education' ),
	'section'           => 'corporate_education_slider',
	'type'				=> 'text'
) );
