<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$wp_customize->add_section( 'corporate_education_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','corporate-education' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'corporate-education' ),
	'panel'             => 'corporate_education_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[breadcrumb_enable]', array(
	'sanitize_callback'	=> 'corporate_education_sanitize_checkbox',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'corporate-education' ),
	'section'          	=> 'corporate_education_breadcrumb',
	'type'             	=> 'checkbox',
) );
