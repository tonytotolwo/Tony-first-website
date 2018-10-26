<?php
/**
 * Call to action Section options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$wp_customize->add_section( 'corporate_education_call_to_action', array(
	'title'             => esc_html__( 'Call to Action','corporate-education' ),
	'description'       => esc_html__( 'Call to Action Section Options.', 'corporate-education' ),
	'panel'             => 'corporate_education_sections_panel',
) );

// call_to_action Section enable setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[call_to_action_enable]', array(
	'sanitize_callback'	=> 'corporate_education_sanitize_checkbox',
	'default'          	=> $options['call_to_action_enable'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[call_to_action_enable]', array(
	'label'            	=> esc_html__( 'Enable Call to Action Section', 'corporate-education' ),
	'section'          	=> 'corporate_education_call_to_action',
	'type'             	=> 'checkbox',
) );

// call_to_action Section background setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[call_to_action_image]', array(
	'default'           => $options['call_to_action_image'],
	'sanitize_callback' => 'corporate_education_sanitize_image'
) );

$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize, 'corporate_education_theme_options[call_to_action_image]',
		array(
		'label'       		=> esc_html__( 'Select Background Image', 'corporate-education' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'corporate-education' ), 1500, 1000 ),
		'section'     		=> 'corporate_education_call_to_action',
		'active_callback'	=> 'corporate_education_is_call_to_action_enable',
) ) );

// call_to_action Section title setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[call_to_action_title]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['call_to_action_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corporate_education_theme_options[call_to_action_title]', array(
	'label'            	=> esc_html__( 'Title', 'corporate-education' ),
	'section'          	=> 'corporate_education_call_to_action',
	'type'             	=> 'text',
	'active_callback'	=> 'corporate_education_is_call_to_action_enable',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'corporate_education_theme_options[call_to_action_title]', array(
		'selector'            => '#promotion .wrapper .entry-header h2.entry-title',
		'settings'            => 'corporate_education_theme_options[call_to_action_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'corporate_education_call_to_action_title',
    ) );
}

// call_to_action Section subtitle setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[call_to_action_sub_title]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['call_to_action_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corporate_education_theme_options[call_to_action_sub_title]', array(
	'label'            	=> esc_html__( 'Sub Title', 'corporate-education' ),
	'section'          	=> 'corporate_education_call_to_action',
	'type'             	=> 'text',
	'active_callback'	=> 'corporate_education_is_call_to_action_enable',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'corporate_education_theme_options[call_to_action_sub_title]', array(
		'selector'            => '#promotion .wrapper .entry-header p.entry-title-desc',
		'settings'            => 'corporate_education_theme_options[call_to_action_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'corporate_education_call_to_action_sub_title',
    ) );
}


// service post hr setting and control
$wp_customize->add_setting( 'corporate_education_theme_options[call_to_action_hr_1]', array(
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new Corporate_Education_Customize_Horizontal_Line( $wp_customize, 'corporate_education_theme_options[call_to_action_hr_1]',
	array(
		'section'         => 'corporate_education_call_to_action',
		'active_callback' => 'corporate_education_is_call_to_action_enable',
		'type'			  => 'hr'
) ) );

// call_to_action Section button label setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[call_to_action_btn_label_1]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['call_to_action_btn_label_1'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[call_to_action_btn_label_1]', array(
	'label'            	=> esc_html__( 'Button Label %d', 'corporate-education' ),
	'section'          	=> 'corporate_education_call_to_action',
	'type'             	=> 'text',
	'active_callback'	=> 'corporate_education_is_call_to_action_enable',
) );

// call_to_action Section button url setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[call_to_action_btn_url_1]', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'          	=> $options['call_to_action_btn_url_1'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[call_to_action_btn_url_1]', array(
	'label'            	=> esc_html__( 'Button URL %d', 'corporate-education' ),
	'section'          	=> 'corporate_education_call_to_action',
	'type'             	=> 'url',
	'active_callback'	=> 'corporate_education_is_call_to_action_enable',
) );