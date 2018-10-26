<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package corporate_education
	 */

	/**
	 * corporate_education_doctype hook
	 *
	 * @hooked corporate_education_doctype -  10
	 *
	 */
	do_action( 'corporate_education_doctype' );
?>
<head>
<?php
	/**
	 * corporate_education_before_wp_head hook
	 *
	 * @hooked corporate_education_head -  10
	 *
	 */
	do_action( 'corporate_education_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * corporate_education_page_start_action hook
	 *
	 * @hooked corporate_education_page_start -  10
	 *
	 */
	do_action( 'corporate_education_page_start_action' ); 

	/**
	 * corporate_education_before_header hook
	 *
	 * @hooked corporate_education_add_breadcrumb -  20
	 *
	 */
	do_action( 'corporate_education_before_header' );

	/**
	 * corporate_education_header_action hook
	 *
	 * @hooked corporate_education_header_start -  10
	 * @hooked corporate_education_site_branding_wrapper_start -  20
	 * @hooked corporate_education_site_branding -  30
	 * @hooked corporate_education_site_branding_wrapper_end -  40
	 * @hooked corporate_education_add_headline_section -  45
	 * @hooked corporate_education_site_navigation -  50
	 * @hooked corporate_education_header_end -  60
	 *
	 */
	do_action( 'corporate_education_header_action' );

	/**
	 * corporate_education_content_start_action hook
	 *
	 * @hooked corporate_education_content_start -  10
	 *
	 */
	do_action( 'corporate_education_content_start_action' );
	
	/**
	 * corporate_education_primary_content_action hook
	 *
	 * @hooked corporate_education_add_slider_section -  10
	 * @hooked corporate_education_add_about_section -  20
	 * @hooked corporate_education_add_courses_section -  40
	 * @hooked corporate_education_add_call_to_action_section -  50
	 * @hooked corporate_education_add_latest_news_section -  60
	 * @hooked corporate_education_add_counter_section -  80
	 * @hooked corporate_education_add_social_section -  110
	 */
	do_action( 'corporate_education_primary_content_action' );
