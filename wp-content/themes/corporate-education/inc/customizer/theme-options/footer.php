<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

// Footer Section
$wp_customize->add_section( 'corporate_education_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'corporate-education' ),
		'priority'   			=> 900,
		'panel'      			=> 'corporate_education_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'corporate_education_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'corporate_education_santize_allow_tag',
	)
);
$wp_customize->add_control( 'corporate_education_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Footer Text', 'corporate-education' ),
		'section'    			=> 'corporate_education_section_footer',
		'type'		 			=> 'textarea',
    )
);

// scroll top visible
$wp_customize->add_setting( 'corporate_education_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback'		=> 'corporate_education_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'corporate_education_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'corporate-education' ),
		'section'    			=> 'corporate_education_section_footer',
		'type'		 			=> 'checkbox',
    )
);