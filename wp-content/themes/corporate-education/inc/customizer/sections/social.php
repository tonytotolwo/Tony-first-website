<?php
/**
 * Social Section options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$wp_customize->add_section( 'corporate_education_social', array(
	'title'             => esc_html__( 'Social','corporate-education' ),
	'description'       => esc_html__( 'Social Section Options', 'corporate-education' ),
	'panel'             => 'corporate_education_sections_panel',
) );

// social Section enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[social_enable]', array(
	'sanitize_callback'	=> 'corporate_education_sanitize_checkbox',
	'default'          	=> $options['social_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[social_enable]', array(
	'label'            	=> esc_html__( 'Enable Social Section', 'corporate-education' ),
	'section'          	=> 'corporate_education_social',
	'type'             	=> 'checkbox',
) );

// social Section enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[social_entire_site_enable]', array(
	'sanitize_callback'	=> 'corporate_education_sanitize_checkbox',
	'default'          	=> $options['social_entire_site_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[social_entire_site_enable]', array(
	'label'            	=> esc_html__( 'Enable Section Entire Site', 'corporate-education' ),
	'section'          	=> 'corporate_education_social',
	'type'             	=> 'checkbox',
	'active_callback'	=> 'corporate_education_is_social_enable',
) );

for ( $i = 1; $i <= 5; $i++ ) :
	// social Section title setting and control.
	$wp_customize->add_setting( 'corporate_education_theme_options[social_title_link_' . $i . ']', array(
		'sanitize_callback'	=> 'esc_url_raw',
		'default'          	=> $options['social_title_link_' . $i],
	) );

	$wp_customize->add_control( 'corporate_education_theme_options[social_title_link_' . $i . ']', array(
		'label'            	=> sprintf( esc_html__( 'Social Link %d', 'corporate-education' ), $i ),
		'section'          	=> 'corporate_education_social',
		'type'             	=> 'url',
		'active_callback'	=> 'corporate_education_is_social_enable',
		'input_attrs'	=> array(
			'placeholder'	=> esc_attr__( 'http://facebook.com', 'corporate-education' ),
			),
	) );
endfor;
