<?php
/**
 * Courses Section options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$wp_customize->add_section( 'corporate_education_courses', array(
	'title'             => esc_html__( 'Courses','corporate-education' ),
	'description'       => esc_html__( 'Courses Section Options.', 'corporate-education' ),
	'panel'             => 'corporate_education_sections_panel',
) );

// courses Section enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[courses_enable]', array(
	'sanitize_callback'	=> 'corporate_education_sanitize_checkbox',
	'default'          	=> $options['courses_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[courses_enable]', array(
	'label'            	=> esc_html__( 'Enable Courses Section', 'corporate-education' ),
	'section'          	=> 'corporate_education_courses',
	'type'             	=> 'checkbox',
) );

// courses Section title setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[courses_title]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['courses_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corporate_education_theme_options[courses_title]', array(
	'label'            	=> esc_html__( 'Title', 'corporate-education' ),
	'section'          	=> 'corporate_education_courses',
	'type'             	=> 'text',
	'active_callback'	=> 'corporate_education_is_courses_enable',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'corporate_education_theme_options[courses_title]', array(
		'selector'            => '#featured-courses .wrapper .entry-header h2.entry-title',
		'settings'            => 'corporate_education_theme_options[courses_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'corporate_education_courses_title',
    ) );
}


// courses Section content type setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[courses_content_type]', array(
	'default'          	=> $options['courses_content_type'],
	'sanitize_callback'	=> 'corporate_education_sanitize_select',
) );

$wp_customize->add_control( 'corporate_education_theme_options[courses_content_type]', array(
	'label'            	=> esc_html__( 'Courses Content Type', 'corporate-education' ),
	'section'          	=> 'corporate_education_courses',
	'type'             	=> 'select',
	'active_callback'	=> 'corporate_education_is_courses_enable',
	'choices'			=> corporate_education_courses_content_type(),
) );

// courses Section content type post setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[courses_content_post]', array(
	'validate_callback' => 'corporate_education_validate_post_id',
	'sanitize_callback' => 'corporate_education_sanitize_post_ids',
) );

$wp_customize->add_control( 'corporate_education_theme_options[courses_content_post]', array(
	'active_callback'	=> 'corporate_education_courses_content_post',
	'label'             => esc_html__( 'Input Post Ids', 'corporate-education' ),
	'description'       => esc_html__( 'Simply hover post title on dashboard to see the Post ID. Max no. of posts allowed is 3. ie: 11, 24, 34', 'corporate-education' ),
	'section'           => 'corporate_education_courses',
	'type'				=> 'text',
) );

// courses Section category setting and control
$wp_customize->add_setting( 'corporate_education_theme_options[courses_content_category]', array(
	'sanitize_callback' => 'corporate_education_sanitize_single_category'
) );

$wp_customize->add_control( new Corporate_Education_Dropdown_Single_Category_Control( $wp_customize, 'corporate_education_theme_options[courses_content_category]', array(
	'label'           => esc_html__( 'Select Category', 'corporate-education' ),
	'description'     => esc_html__( 'Latest three posts from selected category will be shown.', 'corporate-education' ),
	'section'         => 'corporate_education_courses',
	'type'			  => 'dropdown-category',
	'active_callback' => 'corporate_education_courses_content_category',
) ) );
