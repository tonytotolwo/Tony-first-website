<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage Corporate Education
* @since Corporate Education 0.1
*/

if ( ! function_exists( 'corporate_education_validate_long_excerpt' ) ) :
  function corporate_education_validate_long_excerpt( $validity, $value ){
         $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corporate-education' ) );
     } elseif ( $value < 5 ) {
         $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'corporate-education' ) );
     } elseif ( $value > 100 ) {
         $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'corporate-education' ) );
     }
     return $validity;
  }
endif;

if ( ! function_exists( 'corporate_education_validate_headline_content_count' ) ) :
  function corporate_education_validate_headline_content_count( $validity, $value ){
         $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corporate-education' ) );
     } elseif ( $value < 1 ) {
         $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'corporate-education' ) );
     } elseif ( $value > 10 ) {
         $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 10', 'corporate-education' ) );
     }
     return $validity;
  }
endif;


if ( ! function_exists( 'corporate_education_validate_slider_count' ) ) :
  function corporate_education_validate_slider_count( $validity, $value ){
         $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corporate-education' ) );
     } elseif ( $value < 1 ) {
         $validity->add( 'min_no_of_sliders', esc_html__( 'Minimum no of sliders is 1', 'corporate-education' ) );
     } elseif ( $value > 5 ) {
         $validity->add( 'max_no_of_sliders', esc_html__( 'Maximum no of sliders is 5', 'corporate-education' ) );
     }
     return $validity;
  }
endif;

if ( ! function_exists( 'corporate_education_validate_post_id' ) ) :
  function corporate_education_validate_post_id( $validity, $value ){
         $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corporate-education' ) );
     } elseif ( $value < 1 ) {
         $validity->add( 'min_value', esc_html__( 'Minimum value is 1', 'corporate-education' ) );
     } 
     return $validity;
  }
endif;

if ( ! function_exists( 'corporate_education_validate_course_count' ) ) :
  function corporate_education_validate_course_count( $validity, $value ){
         $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corporate-education' ) );
     } elseif ( $value < 3 ) {
         $validity->add( 'min_no_of_courses', esc_html__( 'Minimum no of courses is 3', 'corporate-education' ) );
     } elseif ( $value > 6 ) {
         $validity->add( 'max_no_of_courses', esc_html__( 'Maximum no of courses is 6', 'corporate-education' ) );
     }
     return $validity;
  }
endif;


if ( ! function_exists( 'corporate_education_validate_testimonial_count' ) ) :
  function corporate_education_validate_testimonial_count( $validity, $value ){
         $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corporate-education' ) );
     } elseif ( $value < 3 ) {
         $validity->add( 'min_no_of_testimonials', esc_html__( 'Minimum no of testimonials is 3', 'corporate-education' ) );
     } elseif ( $value > 9 ) {
         $validity->add( 'max_no_of_testimonials', esc_html__( 'Maximum no of testimonials is 9', 'corporate-education' ) );
     }
     return $validity;
  }
endif;

