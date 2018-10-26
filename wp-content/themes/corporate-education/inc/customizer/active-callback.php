<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

if ( ! function_exists( 'corporate_education_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'corporate_education_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'corporate_education_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'corporate_education_theme_options[pagination_enable]' )->value();
	}
endif;

if ( ! function_exists( 'corporate_education_is_reset_checked' ) ) :
	/**
	 * Check if reset option is checked.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_is_reset_checked( $control ) {
		return $control->manager->get_setting( 'corporate_education_theme_options[reset_options]' )->value();
	}
endif;

if ( ! function_exists( 'corporate_education_is_headline_enable' ) ) :
	/**
	 * Check if headline is enabled.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_is_headline_enable( $control ) {
		if ( true === $control->manager->get_setting( 'corporate_education_theme_options[headline_enable]' )->value() )
			return true;
	}
endif;

if ( ! function_exists( 'corporate_education_headline_content_category' ) ) :
	/**
	 * Check if headline content is category.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_headline_content_category( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[headline_content_type]' )->value();
		if ( corporate_education_is_headline_enable( $control ) && 'category' === $content_type )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_is_slider_enable' ) ) :
	/**
	 * Check if slider is enabled.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_is_slider_enable( $control ) {
		return $control->manager->get_setting( 'corporate_education_theme_options[slider_enable]' )->value();
	}
endif;

if ( ! function_exists( 'corporate_education_slider_content_page' ) ) :
	/**
	 * Check if slider content is page.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_slider_content_page( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[slider_content_type]' )->value();
		if ( corporate_education_is_slider_enable( $control ) && 'page' === $content_type )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_is_about_enable' ) ) :
	/**
	 * Check if about is enabled.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_is_about_enable( $control ) {
		return $control->manager->get_setting( 'corporate_education_theme_options[about_enable]' )->value();
	}
endif;

if ( ! function_exists( 'corporate_education_about_content_page' ) ) :
	/**
	 * Check if about content is page.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_about_content_page( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[about_content_type]' )->value();
		if ( corporate_education_is_about_enable( $control ) && 'page' === $content_type )
			return true;
		else
			return false;
	}
endif;


if ( ! function_exists( 'corporate_education_is_courses_enable' ) ) :
	/**
	 * Check if courses is enabled.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_is_courses_enable( $control ) {
		return $control->manager->get_setting( 'corporate_education_theme_options[courses_enable]' )->value();
	}
endif;

if ( ! function_exists( 'corporate_education_courses_content_count' ) ) :
	/**
	 * Check if courses content count is allowed for callback.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_courses_content_count( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[courses_content_type]' )->value();
		if ( corporate_education_is_courses_enable( $control ) && 'category' == $content_type )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_courses_content_post' ) ) :
	/**
	 * Check if courses content is post.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_courses_content_post( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[courses_content_type]' )->value();
		if ( corporate_education_is_courses_enable( $control ) && 'post' === $content_type )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_courses_content_category' ) ) :
	/**
	 * Check if courses content is category.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_courses_content_category( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[courses_content_type]' )->value();
		if ( corporate_education_is_courses_enable( $control ) && 'category' === $content_type )
			return true;
		else
			return false;
	}
endif;


if ( ! function_exists( 'corporate_education_is_call_to_action_enable' ) ) :
	/**
	 * Check if call to action is enabled.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_is_call_to_action_enable( $control ) {
		return $control->manager->get_setting( 'corporate_education_theme_options[call_to_action_enable]' )->value();
	}
endif;

if ( ! function_exists( 'corporate_education_is_latest_news_enable' ) ) :
	/**
	 * Check if latest_news is enabled.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_is_latest_news_enable( $control ) {
		return $control->manager->get_setting( 'corporate_education_theme_options[latest_news_enable]' )->value();
	}
endif;

if ( ! function_exists( 'corporate_education_latest_news_content_category_1' ) ) :
	/**
	 * Check if is latest news category.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_latest_news_content_category_1( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[latest_news_content_type_1]' )->value();
		if ( corporate_education_is_latest_news_enable( $control ) && 'category' === $content_type )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_latest_news_content_recent_post_1' ) ) :
	/**
	 * Check if is latest news recent posts.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_latest_news_content_recent_post_1( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[latest_news_content_type_1]' )->value();
		if ( corporate_education_is_latest_news_enable( $control ) && 'recent-post' === $content_type )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_latest_news_content_category_2' ) ) :
	/**
	 * Check if is latest news category.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_latest_news_content_category_2( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[latest_news_content_type_2]' )->value();
		if ( corporate_education_is_latest_news_enable( $control ) && 'category' === $content_type )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_latest_news_content_recent_post_2' ) ) :
	/**
	 * Check if is latest news recent posts.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_latest_news_content_recent_post_2( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[latest_news_content_type_2]' )->value();
		if ( corporate_education_is_latest_news_enable( $control ) && 'recent-post' === $content_type )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_is_team_enable' ) ) :
	/**
	 * Check if team is enabled.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_is_team_enable( $control ) {
		return $control->manager->get_setting( 'corporate_education_theme_options[team_enable]' )->value();
	}
endif;

if ( ! function_exists( 'corporate_education_team_intro_content_page' ) ) :
	/**
	 * Check if is team content type page.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_team_intro_content_page( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[team_intro_content_type]' )->value();
		if ( corporate_education_is_team_enable( $control ) && 'page' === $content_type )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_team_content_category' ) ) :
	/**
	 * Check if is team content type category.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_team_content_category( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[team_content_type]' )->value();
		if ( corporate_education_is_team_enable( $control ) && 'category' === $content_type )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_team_content_post' ) ) :
	/**
	 * Check if is team content type post.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_team_content_post( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[team_content_type]' )->value();
		if ( corporate_education_is_team_enable( $control ) && 'post' === $content_type )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_is_testimonial_enable' ) ) :
	/**
	 * Check if testimonial is enabled.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_is_testimonial_enable( $control ) {
		return $control->manager->get_setting( 'corporate_education_theme_options[testimonial_enable]' )->value();
	}
endif;

if ( ! function_exists( 'corporate_education_testimonial_content_post' ) ) :
	/**
	 * Check if is testimonial content type post.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_testimonial_content_post( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[testimonial_content_type]' )->value();
		if ( corporate_education_is_testimonial_enable( $control ) && 'post' === $content_type )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_testimonial_content_category' ) ) :
	/**
	 * Check if is testimonial content type category.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_testimonial_content_category( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[testimonial_content_type]' )->value();
		if ( corporate_education_is_testimonial_enable( $control ) && 'category' === $content_type )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_testimonial_content_count' ) ) :
	/**
	 * Check if testimonial content count is allowed for callback.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_testimonial_content_count( $control ) {
		$content_type = $control->manager->get_setting( 'corporate_education_theme_options[testimonial_content_type]' )->value();
		if ( corporate_education_is_testimonial_enable( $control ) && ! in_array( $content_type, array( 'demo', 'post', 'testimonial' ) ) )
			return true;
		else
			return false;
	}
endif;

if ( ! function_exists( 'corporate_education_is_social_enable' ) ) :
	/**
	 * Check if social is enabled.
	 *
	 * @since Corporate Education 0.1
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corporate_education_is_social_enable( $control ) {
		return $control->manager->get_setting( 'corporate_education_theme_options[social_enable]' )->value();
	}
endif;
