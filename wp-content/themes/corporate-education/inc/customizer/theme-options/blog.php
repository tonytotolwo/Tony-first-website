<?php
/**
 * Blog page options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$wp_customize->add_section( 'corporate_education_blog', array(
	'title'            		=> esc_html__( 'Blog Page','corporate-education' ),
	'description'      		=> esc_html__( 'Blog Page Options.', 'corporate-education' ),
	'panel'            		=> 'corporate_education_theme_options_panel',
) );

// service Section category setting and control
$wp_customize->add_setting( 'corporate_education_theme_options[blog_exclude_categories]', array(
	'sanitize_callback' => 'corporate_education_sanitize_category_list'
) );

$wp_customize->add_control( new Corporate_Education_Dropdown_Category_Control( $wp_customize, 'corporate_education_theme_options[blog_exclude_categories]', array(
	'label'           => esc_html__( 'Select Categories to Exclude', 'corporate-education' ),
	'section'         => 'corporate_education_blog',
	'type'			  => 'dropdown-categories',
) ) );
