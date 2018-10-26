<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Corporate Education
* @since Corporate Education 0.1
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'corporate_education_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'corporate-education' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'corporate-education' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );