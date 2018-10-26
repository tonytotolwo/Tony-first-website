<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

// Add sidebar section
$wp_customize->add_section( 'corporate_education_pagination', array(
	'title'               => esc_html__('Pagination','corporate-education'),
	'description'         => esc_html__( 'Pagination section options.', 'corporate-education' ),
	'panel'               => 'corporate_education_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[pagination_enable]', array(
	'sanitize_callback'   => 'corporate_education_sanitize_checkbox',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'corporate-education' ),
	'section'             => 'corporate_education_pagination',
	'type'                => 'checkbox',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'corporate_education_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'corporate-education' ),
	'section'             => 'corporate_education_pagination',
	'type'                => 'select',
	'choices'			  => corporate_education_pagination_options(),
	'active_callback'	  => 'corporate_education_is_pagination_enable',
) );
