<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 * @return array An array of default values
 */

function corporate_education_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$corporate_education_default_options = array(

		// Theme Options
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'long_excerpt_length'           => 25,
		'read_more_text'		        => esc_html__( 'Read More', 'corporate-education' ),
		'breadcrumb_enable'         	=> true,
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',
		'copyright_text'           		=> sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved', '1: Year, 2: Site Title with home URL', 'corporate-education' ), '[the-year]', '[site-link]' ),
		'powered_by'                    =>  esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'corporate-education' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( $theme_data->get( 'Author' ) ) .'</a>',
		'scroll_top_visible'        	=> true,
		'reset_options'      			=> false,
		'enable_frontpage_content' 		=> true,
		'author_box_enable' 			=> true,
		'post_navigation_enable' 		=> true,
		'menu_sticky' 					=> false,

		// Headline Section
		'headline_enable'				=> false,
		'headline_label'				=> esc_html__( 'News', 'corporate-education' ),
		'headline_content_type'			=> 'category',
		'headline_content_count'		=> 6,

		// Slider Section
		'slider_enable'					=> false,
		'slider_overlay_enable'			=> false,
		'slider_content_type'			=> 'page',
		'no_of_slider'					=> 3,
		'slider_btn_label'				=> esc_html__( 'Start Learning', 'corporate-education' ),

		// About Section
		'about_enable'					=> false,
		'about_content_type'			=> 'page',
		'about_alphabet'				=> esc_html__( 'A', 'corporate-education' ),


		// Courses Section
		'courses_enable'				=> false,
		'courses_content_type'			=> 'category',
		'courses_title'					=> esc_html__( 'Our Courses', 'corporate-education' ),

		// call to action section
		'call_to_action_enable'			=> false,
		'call_to_action_title'			=> esc_html__( 'Your success..!! Is our goal..!!', 'corporate-education' ),
		'call_to_action_sub_title'		=> esc_html__( 'Build your career with us', 'corporate-education' ),
		'call_to_action_btn_label_1'	=> esc_html__( 'Start Learning', 'corporate-education' ),
		'call_to_action_btn_url_1'		=> '#',
		'call_to_action_image'			=> get_template_directory_uri() . '/assets/uploads/promotion.jpg',

		// latest news
		'latest_news_enable'			=> false,
		'latest_news_title_1'			=> esc_html__( 'Events', 'corporate-education' ),
		'latest_news_content_type_1'	=> 'category',
		'latest_news_title_2'			=> esc_html__( 'News', 'corporate-education' ),
		'latest_news_content_type_2'	=> 'category',

		// team
		'team_enable'					=> false,
		'team_intro_content_type'		=> 'page',
		'team_content_type'				=> 'category',

		// testimonial
		'testimonial_enable'			=> false,	
		'testimonial_title'				=> esc_html__( 'Testimonials', 'corporate-education' ),	
		'testimonial_content_type'		=> 'category',	
		'no_of_testimonial'				=> 4,	

		// social
		'social_enable'					=> false,
		'social_entire_site_enable'		=> false,
		'social_title_link_1'			=> esc_url( 'http://facebook.com' ),
		'social_title_link_2'			=> esc_url( 'http://twitter.com' ),
		'social_title_link_3'			=> esc_url( 'http://instagram.com' ),
		'social_title_link_4'			=> esc_url( 'http://plus.google.com' ),
		'social_title_link_5'			=> esc_url( 'http://pinterest.com' ),


	);

	$output = apply_filters( 'corporate_education_default_theme_options', $corporate_education_default_options );
	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}