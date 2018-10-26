<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$wp_customize->add_section( 'corporate_education_about', array(
	'title'             => esc_html__( 'About','corporate-education' ),
	'description'       => esc_html__( 'About Section Options.', 'corporate-education' ),
	'panel'             => 'corporate_education_sections_panel',
) );

// about Section enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[about_enable]', array(
	'sanitize_callback'	=> 'corporate_education_sanitize_checkbox',
	'default'          	=> $options['about_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[about_enable]', array(
	'label'            	=> esc_html__( 'Enable About Section', 'corporate-education' ),
	'section'          	=> 'corporate_education_about',
	'type'             	=> 'checkbox',
) );

// about Section content type setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[about_content_type]', array(
	'default'          	=> $options['about_content_type'],
	'sanitize_callback'	=> 'corporate_education_sanitize_select',
) );

$wp_customize->add_control( 'corporate_education_theme_options[about_content_type]', array(
	'label'            	=> esc_html__( 'About Content Type', 'corporate-education' ),
	'section'          	=> 'corporate_education_about',
	'type'             	=> 'select',
	'active_callback'	=> 'corporate_education_is_about_enable',
	'choices'			=> corporate_education_common_content_type(),
) );

// Show page drop-down setting and control
$wp_customize->add_setting( 'corporate_education_theme_options[about_content_page]', array(
	'sanitize_callback' => 'corporate_education_sanitize_page'
) );

$wp_customize->add_control( 'corporate_education_theme_options[about_content_page]', array(
	'label'           	=> esc_html__( 'Select Page', 'corporate-education' ),
	'section'        	=> 'corporate_education_about',
	'active_callback' 	=> 'corporate_education_about_content_page',
	'type'				=> 'dropdown-pages'
) );


// about Section enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[about_alphabet]', array(
	'sanitize_callback'	=> 'corporate_education_sanitize_alphabet',
	'default'          	=> $options['about_alphabet'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[about_alphabet]', array(
	'label'            	=> esc_html__( 'Set Alphabet', 'corporate-education' ),
	'description'       => esc_html__( 'Please input single alphabet', 'corporate-education' ),
	'section'          	=> 'corporate_education_about',
	'type'             	=> 'text',
	'active_callback'	=> 'corporate_education_is_about_enable',
) );
