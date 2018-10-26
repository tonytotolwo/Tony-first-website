<?php
/**
 * Woocommerce
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

/**
 * Make theme WooCommerce ready
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20 );

add_filter( 'woocommerce_show_page_title', 'corporate_education_show_title' );
if ( ! function_exists( 'corporate_education_show_title' ) ) :
	function corporate_education_show_title() {
	  return;
	}
endif;

add_action('woocommerce_before_main_content', 'corporate_education_primary_content_start', 20);
if ( ! function_exists( 'corporate_education_primary_content_start' ) ) :
	function corporate_education_primary_content_start() {
	  echo '<div class="template-wrapper">
			    <div class="white-shape top move-up left innerpage"></div>
			    <div class="white-shape top full-width innerpage"></div>
			    <div class="white-shape bottom right move-down"></div>
			    <div class="wrapper page-section less-top-padding">
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">';
	}
endif;

add_action('woocommerce_after_main_content', 'corporate_education_primary_content_end', 10);
add_action('woocommerce_sidebar', 'corporate_education_page_section_end', 20);

if ( ! function_exists( 'corporate_education_primary_content_end' ) ) :
	function corporate_education_primary_content_end() {
	  echo '</main>
	  </div>';
	}
endif;

if ( ! function_exists( 'corporate_education_page_section_end' ) ) :
	function corporate_education_page_section_end() {
	  echo '</div> </div>';
	}
endif;
