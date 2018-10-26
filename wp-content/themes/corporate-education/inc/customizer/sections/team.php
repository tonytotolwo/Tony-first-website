<?php
/**
 * Team Section options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$wp_customize->add_section( 'corporate_education_team', array(
	'title'             => esc_html__( 'Team','corporate-education' ),
	'description'       => esc_html__( 'Team Section Options.', 'corporate-education' ),
	'panel'             => 'corporate_education_sections_panel',
) );

// team Section enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[team_enable]', array(
	'sanitize_callback'	=> 'corporate_education_sanitize_checkbox',
	'default'          	=> $options['team_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[team_enable]', array(
	'label'            	=> esc_html__( 'Enable Team Section', 'corporate-education' ),
	'section'          	=> 'corporate_education_team',
	'type'             	=> 'checkbox',
) );

// team Section content type setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[team_intro_content_type]', array(
	'default'          	=> $options['team_intro_content_type'],
	'sanitize_callback'	=> 'corporate_education_sanitize_select',
) );

$wp_customize->add_control( 'corporate_education_theme_options[team_intro_content_type]', array(
	'label'            	=> esc_html__( 'Team Intro Content Type', 'corporate-education' ),
	'section'          	=> 'corporate_education_team',
	'type'             	=> 'select',
	'active_callback'	=> 'corporate_education_is_team_enable',
	'choices'			=> corporate_education_common_content_type(),
) );

// Show page drop-down setting and control
$wp_customize->add_setting( 'corporate_education_theme_options[team_intro_content_page]', array(
	'sanitize_callback' => 'corporate_education_sanitize_page'
) );

$wp_customize->add_control( 'corporate_education_theme_options[team_intro_content_page]', array(
	'label'           	=> esc_html__( 'Select Page', 'corporate-education' ),
	'section'        	=> 'corporate_education_team',
	'active_callback' 	=> 'corporate_education_team_intro_content_page',
	'type'				=> 'dropdown-pages'
) );

// team post hr setting and control
$wp_customize->add_setting( 'corporate_education_theme_options[team_hr]', array(
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new Corporate_Education_Customize_Horizontal_Line( $wp_customize, 'corporate_education_theme_options[team_hr]',
	array(
		'section'         => 'corporate_education_team',
		'active_callback' => 'corporate_education_is_team_enable',
		'type'			  => 'hr'
) ) );

// team Section content type setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[team_content_type]', array(
	'default'          	=> $options['team_content_type'],
	'sanitize_callback'	=> 'corporate_education_sanitize_select',
) );

$wp_customize->add_control( 'corporate_education_theme_options[team_content_type]', array(
	'label'            	=> esc_html__( 'Team Content Type', 'corporate-education' ),
	'section'          	=> 'corporate_education_team',
	'type'             	=> 'select',
	'active_callback'	=> 'corporate_education_is_team_enable',
	'choices'			=> corporate_education_courses_content_type(),
) );

// team Section category setting and control
$wp_customize->add_setting( 'corporate_education_theme_options[team_content_category]', array(
	'sanitize_callback' => 'corporate_education_sanitize_single_category'
) );

$wp_customize->add_control( new Corporate_Education_Dropdown_Single_Category_Control( $wp_customize, 'corporate_education_theme_options[team_content_category]', array(
	'label'           => esc_html__( 'Select Category', 'corporate-education' ),
	'description'     => esc_html__( 'Six latest posts from selected category will be shown.', 'corporate-education' ),
	'section'         => 'corporate_education_team',
	'type'			  => 'dropdown-category',
	'active_callback' => 'corporate_education_team_content_category',
) ) );

// team Section content type post setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[team_content_post]', array(
	'sanitize_callback' => 'corporate_education_sanitize_post_ids',
) );

$wp_customize->add_control( 'corporate_education_theme_options[team_content_post]', array(
	'active_callback'	=> 'corporate_education_team_content_post',
	'label'             => esc_html__( 'Input Post Ids', 'corporate-education' ),
	'description'       => esc_html__( 'Simply hover post title on dashboard to see the Post ID. Max no. of posts allowed is 6. ie: 11, 24, 34', 'corporate-education' ),
	'section'           => 'corporate_education_team',
	'type'				=> 'text'
) );
