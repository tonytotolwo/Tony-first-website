<?php
/**
 * Testimonial Section options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$wp_customize->add_section( 'corporate_education_testimonial', array(
	'title'             => esc_html__( 'Testimonial','corporate-education' ),
	'description'       => esc_html__( 'Testimonial Section Options.', 'corporate-education' ),
	'panel'             => 'corporate_education_sections_panel',
) );

// testimonial Section enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[testimonial_enable]', array(
	'sanitize_callback'	=> 'corporate_education_sanitize_checkbox',
	'default'          	=> $options['testimonial_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[testimonial_enable]', array(
	'label'            	=> esc_html__( 'Enable Testimonial Section', 'corporate-education' ),
	'section'          	=> 'corporate_education_testimonial',
	'type'             	=> 'checkbox',
) );

// testimonial Section title setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[testimonial_title]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['testimonial_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corporate_education_theme_options[testimonial_title]', array(
	'label'            	=> esc_html__( 'Title', 'corporate-education' ),
	'section'          	=> 'corporate_education_testimonial',
	'type'             	=> 'text',
	'active_callback'	=> 'corporate_education_is_testimonial_enable',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'corporate_education_theme_options[testimonial_title]', array(
		'selector'            => '#client-testimonial .wrapper .entry-header h2.entry-title',
		'settings'            => 'corporate_education_theme_options[testimonial_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'corporate_education_testimonial_title',
    ) );
}

// testimonial Section content type setting and control.
// choices options are similar to courses content type
$wp_customize->add_setting( 'corporate_education_theme_options[testimonial_content_type]', array(
	'default'          	=> $options['testimonial_content_type'],
	'sanitize_callback'	=> 'corporate_education_sanitize_select',
) );

$wp_customize->add_control( 'corporate_education_theme_options[testimonial_content_type]', array(
	'label'            	=> esc_html__( 'Testimonial Content Type', 'corporate-education' ),
	'section'          	=> 'corporate_education_testimonial',
	'type'             	=> 'select',
	'active_callback'	=> 'corporate_education_is_testimonial_enable',
	'choices'			=> corporate_education_courses_content_type(),
) );

// testimonial Section content type post setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[testimonial_content_post]', array(
	'validate_callback' => 'corporate_education_validate_post_id',
	'sanitize_callback' => 'corporate_education_sanitize_post_ids',
) );

$wp_customize->add_control( 'corporate_education_theme_options[testimonial_content_post]', array(
	'active_callback'	=> 'corporate_education_testimonial_content_post',
	'label'             => esc_html__( 'Input Post Ids', 'corporate-education' ),
	'description'       => esc_html__( 'Simply hover post title on dashboard to see the Post ID. Max no. of posts allowed is 3. ie: 11, 24, 34', 'corporate-education' ),
	'section'           => 'corporate_education_testimonial',
	'type'				=> 'text',
) );

// testimonial Section category setting and control
$wp_customize->add_setting( 'corporate_education_theme_options[testimonial_content_category]', array(
	'sanitize_callback' => 'corporate_education_sanitize_single_category'
) );

$wp_customize->add_control( new Corporate_Education_Dropdown_Single_Category_Control( $wp_customize, 'corporate_education_theme_options[testimonial_content_category]', array(
	'label'           => esc_html__( 'Select Category', 'corporate-education' ),
	'description'     => esc_html__( 'Latest three posts from selected category will be shown.', 'corporate-education' ),
	'section'         => 'corporate_education_testimonial',
	'type'			  => 'dropdown-category',
	'active_callback' => 'corporate_education_testimonial_content_category',
) ) );
