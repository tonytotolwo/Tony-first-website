<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

/**
 * corporate_education_content_end_action hook
 *
 * @hooked corporate_education_add_social_section -  5
 * @hooked corporate_education_content_end -  10
 *
 */
do_action( 'corporate_education_content_end_action' );

/**
 * corporate_education_footer hook
 *
 * @hooked corporate_education_footer_start -  10
 * @hooked corporate_education_footer_site_info -  10
 * @hooked corporate_education_footer_end -  10
 *
 */
do_action( 'corporate_education_footer' );

/**
 * corporate_education_page_end_action hook
 *
 * @hooked corporate_education_page_end -  10
 *
 */
do_action( 'corporate_education_page_end_action' ); 
?>

<?php wp_footer(); ?>

</body>
</html>
