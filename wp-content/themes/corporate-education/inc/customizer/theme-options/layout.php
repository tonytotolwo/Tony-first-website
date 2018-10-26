<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

// Add sidebar section
$wp_customize->add_section( 'corporate_education_layout', array(
	'title'               => esc_html__('Layout','corporate-education'),
	'description'         => esc_html__( 'Layout section options.', 'corporate-education' ),
	'panel'               => 'corporate_education_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[site_layout]', array(
	'sanitize_callback'   => 'corporate_education_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'corporate-education' ),
	'section'             => 'corporate_education_layout',
	'type'                => 'select',
	'choices'			  => corporate_education_site_layout(),
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'corporate_education_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Sidebar Position', 'corporate-education' ),
	'section'             => 'corporate_education_layout',
	'type'                => 'select',
	'choices'			  => corporate_education_sidebar_position(),
) );
