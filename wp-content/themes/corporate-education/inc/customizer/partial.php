<?php
/**
 * Partial functions
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

if ( ! function_exists( 'corporate_education_headline_label' ) ) :
	// headline label
	function corporate_education_headline_label() {
		$options = corporate_education_get_theme_options();
		return esc_html( $options['headline_label'] );
	}
endif;

if ( ! function_exists( 'corporate_education_about_title' ) ) :
	// headline label
	function corporate_education_about_title() {
		$options = corporate_education_get_theme_options();
		return esc_html( $options['about_title'] );
	}
endif;

if ( ! function_exists( 'corporate_education_courses_title' ) ) :
	// headline label
	function corporate_education_courses_title() {
		$options = corporate_education_get_theme_options();
		return esc_html( $options['courses_title'] );
	}
endif;


if ( ! function_exists( 'corporate_education_call_to_action_title' ) ) :
	// headline label
	function corporate_education_call_to_action_title() {
		$options = corporate_education_get_theme_options();
		return esc_html( $options['call_to_action_title'] );
	}
endif;

if ( ! function_exists( 'corporate_education_call_to_action_sub_title' ) ) :
	// headline label
	function corporate_education_call_to_action_sub_title() {
		$options = corporate_education_get_theme_options();
		return esc_html( $options['call_to_action_sub_title'] );
	}
endif;

if ( ! function_exists( 'corporate_education_latest_news_title_1' ) ) :
	// headline label
	function corporate_education_latest_news_title_1() {
		$options = corporate_education_get_theme_options();
		return esc_html( $options['latest_news_title_1'] );
	}
endif;

if ( ! function_exists( 'corporate_education_latest_news_title_2' ) ) :
	// headline label
	function corporate_education_latest_news_title_2() {
		$options = corporate_education_get_theme_options();
		return esc_html( $options['latest_news_title_2'] );
	}
endif;

if ( ! function_exists( 'corporate_education_testimonial_title' ) ) :
	// headline label
	function corporate_education_testimonial_title() {
		$options = corporate_education_get_theme_options();
		return esc_html( $options['testimonial_title'] );
	}
endif;
