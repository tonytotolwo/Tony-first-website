<?php
/**
 * corporate_education options
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

if ( ! function_exists( 'corporate_education_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function corporate_education_site_layout() {
        $corporate_education_site_layout = array(
            'wide'  => esc_html__( 'Wide', 'corporate-education' ),
            'boxed' => esc_html__( 'Boxed', 'corporate-education' ),
        );

        $output = apply_filters( 'corporate_education_site_layout', $corporate_education_site_layout );

        return $output;
    }
endif;


if ( ! function_exists( 'corporate_education_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function corporate_education_sidebar_position() {
        $corporate_education_sidebar_position = array(
            'right-sidebar' => esc_html__( 'Right', 'corporate-education' ),
            'no-sidebar'    => esc_html__( 'No Sidebar', 'corporate-education' ),
        );

        $output = apply_filters( 'corporate_education_sidebar_position', $corporate_education_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'corporate_education_selected_sidebar' ) ) :
    /**
     * Sidebar selected
     * @return array Sidbar selected
     */
    function corporate_education_selected_sidebar() {
        $corporate_education_selected_sidebar = array(
            'sidebar-1'                               => esc_html__( 'Primary Sidebar', 'corporate-education' ),
            'corporate-education-optional-sidebar'    => esc_html__( 'Optional Sidebar 1', 'corporate-education' ),
        );

        $output = apply_filters( 'corporate_education_selected_sidebar', $corporate_education_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'corporate_education_header_image' ) ) :
    /**
     * Header image options
     * @return array Header image options
     */
    function corporate_education_header_image() {
        $corporate_education_header_image = array(
            'show-both' => esc_html__( 'Show Both( Featured and Header Image )', 'corporate-education' ),
            'enable'    => esc_html__( 'Enable( Featured Image )', 'corporate-education' ),
            'default'   => esc_html__( 'Default ( Customizer Header Image )', 'corporate-education' ),
        );

        $output = apply_filters( 'corporate_education_header_image', $corporate_education_header_image );

        return $output;
    }
endif;


if ( ! function_exists( 'corporate_education_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function corporate_education_pagination_options() {
        $corporate_education_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'corporate-education' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'corporate-education' ),
        );

        $output = apply_filters( 'corporate_education_pagination_options', $corporate_education_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'corporate_education_headline_options' ) ) :
    /**
     * Headline
     * @return array site headline options
     */
    function corporate_education_headline_options() {
        $corporate_education_headline_options = array(
            'category'  => esc_html__( 'Category', 'corporate-education' ),
        );

        $output = apply_filters( 'corporate_education_headline_options', $corporate_education_headline_options );

        return $output;
    }
endif;

if ( ! function_exists( 'corporate_education_common_content_type' ) ) :
    /**
     * Common content types
     * @return array Content types
     */
    function corporate_education_common_content_type() {
        $corporate_education_content_type = array(
            'page'      => esc_html__( 'Page', 'corporate-education' ),
        ); 

        $output = apply_filters( 'corporate_education_common_content_type', $corporate_education_content_type );

        return $output;
    }
endif;

if ( ! function_exists( 'corporate_education_courses_content_type' ) ) :
    /**
     * courses content types
     * @return array Content types
     */
    function corporate_education_courses_content_type() {
        $corporate_education_content_type = array(
            'post'      => esc_html__( 'Post', 'corporate-education' ),
            'category'  => esc_html__( 'Category', 'corporate-education' ),
        ); 

        $output = apply_filters( 'corporate_education_courses_content_type', $corporate_education_content_type );

        return $output;
    }
endif;

if ( ! function_exists( 'corporate_education_latest_news_content_type' ) ) :
    /**
     * latest news content types
     * @return array Content types
     */
    function corporate_education_latest_news_content_type() {
        $corporate_education_content_type = array(
            'recent-post'   => esc_html__( 'Recent Posts', 'corporate-education' ),
            'category'      => esc_html__( 'Category', 'corporate-education' ),
        ); 

        $output = apply_filters( 'corporate_education_latest_news_content_type', $corporate_education_content_type );

        return $output;
    }
endif;
