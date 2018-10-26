<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

// Add excerpt section
$wp_customize->add_section( 'corporate_education_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','corporate-education' ),
	'description'       => esc_html__( 'Excerpt section options.', 'corporate-education' ),
	'panel'             => 'corporate_education_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'corporate_education_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'corporate_education_sanitize_number_range',
	'validate_callback' => 'corporate_education_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[long_excerpt_length]', array(
	'label'       => esc_html__( 'Blog Page Excerpt Length', 'corporate-education' ),
	'description' => esc_html__( 'Total words to be displayed in archive page/search page.', 'corporate-education' ),
	'section'     => 'corporate_education_excerpt_section',
	'type'        => 'number',
	'input_attrs' => array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );


// Read more text.
$wp_customize->add_setting( 'corporate_education_theme_options[read_more_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			  => $options['read_more_text'],
) );

$wp_customize->add_control( 'corporate_education_theme_options[read_more_text]', array(
	'label'       => esc_html__( 'Read More Text', 'corporate-education' ),
	'section'     => 'corporate_education_excerpt_section',
	'type'        => 'text',
) );
