<?php
/**
 * Headline Section options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$wp_customize->add_section( 'corporate_education_headline', array(
	'title'             => esc_html__( 'Headline','corporate-education' ),
	'description'       => esc_html__( 'Headline Section Options.', 'corporate-education' ),
	'panel'             => 'corporate_education_sections_panel',
) );

// Headline Section enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[headline_enable]', array(
	'sanitize_callback'	=> 'corporate_education_sanitize_checkbox',
	'default'          	=> $options['headline_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[headline_enable]', array(
	'label'            	=> esc_html__( 'Enable Headline Section', 'corporate-education' ),
	'section'          	=> 'corporate_education_headline',
	'type'             	=> 'checkbox',
) );

// Headline Section label setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[headline_label]', array(
	'default'          	=> $options['headline_label'],
	'sanitize_callback'	=> 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corporate_education_theme_options[headline_label]', array(
	'label'            	=> esc_html__( 'Headline Label', 'corporate-education' ),
	'section'          	=> 'corporate_education_headline',
	'type'             	=> 'text',
	'active_callback'	=> 'corporate_education_is_headline_enable',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'corporate_education_theme_options[headline_label]', array(
		'selector'            => 'header #news-ticker .wrapper h2.news-ticker-label',
		'settings'            => 'corporate_education_theme_options[headline_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'corporate_education_headline_label',
    ) );
}

// Headline Section content type setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[headline_content_type]', array(
	'default'          	=> $options['headline_content_type'],
	'sanitize_callback'	=> 'corporate_education_sanitize_select',
) );

$wp_customize->add_control( 'corporate_education_theme_options[headline_content_type]', array(
	'label'            	=> esc_html__( 'Headline Content Type', 'corporate-education' ),
	'section'          	=> 'corporate_education_headline',
	'type'             	=> 'select',
	'active_callback'	=> 'corporate_education_is_headline_enable',
	'choices'			=> corporate_education_headline_options(),
) );

// Headline Section content count setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[headline_content_count]', array(
	'default'			=> $options['headline_content_count'],
	'sanitize_callback' => 'corporate_education_sanitize_number_range',
	'validate_callback' => 'corporate_education_validate_headline_content_count',
) );

$wp_customize->add_control( 'corporate_education_theme_options[headline_content_count]', array(
	'active_callback'	=> 'corporate_education_headline_content_category',
	'label'             => esc_html__( 'No. of Posts', 'corporate-education' ),
	'description'       => esc_html__( 'Max no of posts: 10', 'corporate-education' ),
	'section'           => 'corporate_education_headline',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 10,
		'style'	=> 'width:100px',
		),
) );

// Headline Section category setting and control
$wp_customize->add_setting( 'corporate_education_theme_options[headline_content_category]', array(
	'sanitize_callback' => 'corporate_education_sanitize_single_category'
) );

$wp_customize->add_control( new Corporate_Education_Dropdown_Single_Category_Control( $wp_customize, 'corporate_education_theme_options[headline_content_category]', array(
	'label'           => esc_html__( 'Select Category', 'corporate-education' ),
	'description'     => esc_html__( 'Latest posts from selected category will be shown.', 'corporate-education' ),
	'section'         => 'corporate_education_headline',
	'type'			  => 'dropdown-category',
	'active_callback' => 'corporate_education_headline_content_category',
) ) );
