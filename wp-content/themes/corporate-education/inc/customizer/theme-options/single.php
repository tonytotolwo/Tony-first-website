<?php
/**
 * Single post options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$wp_customize->add_section( 'corporate_education_single', array(
	'title'            		=> esc_html__( 'Single Post','corporate-education' ),
	'description'      		=> esc_html__( 'Single Post Options.', 'corporate-education' ),
	'panel'            		=> 'corporate_education_theme_options_panel',
) );

// author enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[author_box_enable]', array(
	'sanitize_callback'		=> 'corporate_education_sanitize_checkbox',
	'default'             	=> $options['author_box_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[author_box_enable]', array(
	'label'               	=> esc_html__( 'Enable Author Box', 'corporate-education' ),
	'section'             	=> 'corporate_education_single',
	'type'                	=> 'checkbox',
) );


// post navigation enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[post_navigation_enable]', array(
	'sanitize_callback'		=> 'corporate_education_sanitize_checkbox',
	'default'             	=> $options['post_navigation_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[post_navigation_enable]', array(
	'label'               	=> esc_html__( 'Enable Post Navigation', 'corporate-education' ),
	'section'             	=> 'corporate_education_single',
	'type'                	=> 'checkbox',
) );
