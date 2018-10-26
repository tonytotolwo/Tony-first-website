<?php
/**
 * Latest News Section options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$wp_customize->add_section( 'corporate_education_latest_news', array(
	'title'             => esc_html__( 'Latest News & Events','corporate-education' ),
	'description'       => esc_html__( 'Latest News & Events Section Options.', 'corporate-education' ),
	'panel'             => 'corporate_education_sections_panel',
) );

// latest_news Section enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[latest_news_enable]', array(
	'sanitize_callback'	=> 'corporate_education_sanitize_checkbox',
	'default'          	=> $options['latest_news_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[latest_news_enable]', array(
	'label'            	=> esc_html__( 'Enable Latest News Section', 'corporate-education' ),
	'section'          	=> 'corporate_education_latest_news',
	'type'             	=> 'checkbox',
) );

// Latest News left side news
$wp_customize->add_setting( 'corporate_education_theme_options[latest_news_left]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
) );

$wp_customize->add_control( new Corporate_Education_Note_Control( $wp_customize, 'corporate_education_theme_options[latest_news_left]', array(
	'label'           	=> esc_html__( 'Left News & Events ', 'corporate-education' ),
	'section'         	=> 'corporate_education_latest_news',
	'type'            	=> 'description',
	'active_callback' 	=> 'corporate_education_is_latest_news_enable',
) ) );

// latest_news Section title setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[latest_news_title_1]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['latest_news_title_1'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corporate_education_theme_options[latest_news_title_1]', array(
	'label'            	=> esc_html__( 'Title', 'corporate-education' ),
	'section'          	=> 'corporate_education_latest_news',
	'type'             	=> 'text',
	'active_callback'	=> 'corporate_education_is_latest_news_enable',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'corporate_education_theme_options[latest_news_title_1]', array(
		'selector'            => '#latest-news .wrapper .entry-header.left h2.entry-title',
		'settings'            => 'corporate_education_theme_options[latest_news_title_1]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'corporate_education_latest_news_title_1',
    ) );
}

// latest_news Section content type setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[latest_news_content_type_1]', array(
	'default'          	=> $options['latest_news_content_type_1'],
	'sanitize_callback'	=> 'corporate_education_sanitize_select',
) );

$wp_customize->add_control( 'corporate_education_theme_options[latest_news_content_type_1]', array(
	'label'            	=> esc_html__( 'Content Type', 'corporate-education' ),
	'section'          	=> 'corporate_education_latest_news',
	'type'             	=> 'select',
	'active_callback'	=> 'corporate_education_is_latest_news_enable',
	'choices'			=> corporate_education_latest_news_content_type(),
) );

// latest_news Section category setting and control
$wp_customize->add_setting( 'corporate_education_theme_options[latest_news_content_category_1]', array(
	'sanitize_callback' => 'corporate_education_sanitize_single_category'
) );

$wp_customize->add_control( new Corporate_Education_Dropdown_Single_Category_Control( $wp_customize, 'corporate_education_theme_options[latest_news_content_category_1]', array(
	'label'           => esc_html__( 'Select Category', 'corporate-education' ),
	'description'     => esc_html__( 'Latest three posts from selected category will be shown.', 'corporate-education' ),
	'section'         => 'corporate_education_latest_news',
	'type'			  => 'dropdown-category',
	'active_callback' => 'corporate_education_latest_news_content_category_1',
) ) );

// Latest News left side news
$wp_customize->add_setting( 'corporate_education_theme_options[latest_news_recent_post_1]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
) );

$wp_customize->add_control( new Corporate_Education_Note_Control( $wp_customize, 'corporate_education_theme_options[latest_news_recent_post_1]', array(
	'label'       => esc_html__( 'Latest three posts will be shown.', 'corporate-education' ),
	'section'         	=> 'corporate_education_latest_news',
	'type'            	=> 'description',
	'active_callback' 	=> 'corporate_education_latest_news_content_recent_post_1',
) ) );


// latest_news post hr setting and control
$wp_customize->add_setting( 'corporate_education_theme_options[latest_news_hr]', array(
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new Corporate_Education_Customize_Horizontal_Line( $wp_customize, 'corporate_education_theme_options[latest_news_hr]',
	array(
		'section'         => 'corporate_education_latest_news',
		'active_callback' => 'corporate_education_is_latest_news_enable',
		'type'			  => 'hr'
) ) );

// Latest News right side news
$wp_customize->add_setting( 'corporate_education_theme_options[latest_news_right]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
) );

$wp_customize->add_control( new Corporate_Education_Note_Control( $wp_customize, 'corporate_education_theme_options[latest_news_right]', array(
	'label'           	=> esc_html__( 'Right News & Events ', 'corporate-education' ),
	'section'         	=> 'corporate_education_latest_news',
	'type'            	=> 'description',
	'active_callback' 	=> 'corporate_education_is_latest_news_enable',
) ) );

// latest_news Section title setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[latest_news_title_2]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['latest_news_title_2'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corporate_education_theme_options[latest_news_title_2]', array(
	'label'            	=> esc_html__( 'Title', 'corporate-education' ),
	'section'          	=> 'corporate_education_latest_news',
	'type'             	=> 'text',
	'active_callback'	=> 'corporate_education_is_latest_news_enable',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'corporate_education_theme_options[latest_news_title_2]', array(
		'selector'            => '#latest-news .wrapper .entry-header.right h2.entry-title',
		'settings'            => 'corporate_education_theme_options[latest_news_title_2]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'corporate_education_latest_news_title_2',
    ) );
}

// latest_news Section content type setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[latest_news_content_type_2]', array(
	'default'          	=> $options['latest_news_content_type_2'],
	'sanitize_callback'	=> 'corporate_education_sanitize_select',
) );

$wp_customize->add_control( 'corporate_education_theme_options[latest_news_content_type_2]', array(
	'label'            	=> esc_html__( 'Content Type', 'corporate-education' ),
	'section'          	=> 'corporate_education_latest_news',
	'type'             	=> 'select',
	'active_callback'	=> 'corporate_education_is_latest_news_enable',
	'choices'			=> corporate_education_latest_news_content_type(),
) );

// latest_news Section category setting and control
$wp_customize->add_setting( 'corporate_education_theme_options[latest_news_content_category_2]', array(
	'sanitize_callback' => 'corporate_education_sanitize_single_category'
) );

$wp_customize->add_control( new Corporate_Education_Dropdown_Single_Category_Control( $wp_customize, 'corporate_education_theme_options[latest_news_content_category_2]', array(
	'label'           => esc_html__( 'Select Category', 'corporate-education' ),
	'description'     => esc_html__( 'Latest three posts from selected category will be shown.', 'corporate-education' ),
	'section'         => 'corporate_education_latest_news',
	'type'			  => 'dropdown-category',
	'active_callback' => 'corporate_education_latest_news_content_category_2',
) ) );


// Latest News left side news
$wp_customize->add_setting( 'corporate_education_theme_options[latest_news_recent_post_2]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
) );

$wp_customize->add_control( new Corporate_Education_Note_Control( $wp_customize, 'corporate_education_theme_options[latest_news_recent_post_2]', array(
	'label'       => esc_html__( 'Latest three posts will be shown.', 'corporate-education' ),
	'section'         	=> 'corporate_education_latest_news',
	'type'            	=> 'description',
	'active_callback' 	=> 'corporate_education_latest_news_content_recent_post_2',
) ) );