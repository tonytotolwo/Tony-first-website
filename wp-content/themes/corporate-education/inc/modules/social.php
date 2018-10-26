<?php 
/**
 * Social section
 *
 * This is the template for the content of social section
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */
if ( ! function_exists( 'corporate_education_add_social_section' ) ) :
    /**
    * Add social section
    *
    *@since Corporate Education 0.1
    */
    function corporate_education_add_social_section() {
        $options = corporate_education_get_theme_options();

        // Check if social is enabled
        $enable_social = apply_filters( 'corporate_education_section_status', true, 'social_enable' );
        if ( is_front_page() ) {
            if ( true !== $enable_social ) {
                return false;
            }
        } else {
            if ( true !== $options['social_enable'] || true !== $options['social_entire_site_enable'] )
                return false;
        }

        // Render social section now.
        corporate_education_render_social_section();
    }
endif;
add_action( 'corporate_education_content_end_action', 'corporate_education_add_social_section', 5 );

if ( ! function_exists( 'corporate_education_render_social_section' ) ) :
    /**
    * Start social section
    *
    * @return string social content
    * @since Corporate Education 0.1
    *
    */
    function corporate_education_render_social_section() {
        $options    = corporate_education_get_theme_options();
        
        ?>
        <section id="social-medias">
            <div class="wrapper">
                <ul class="social-icons col-5">
                    <?php for ( $i = 1; $i <= 5; $i++ ) : 
                        $social_link = $options['social_title_link_' . $i];
                        if ( ! empty( $social_link ) ) :
                        ?>
                            <li><a href="<?php echo esc_url( $social_link ); ?>" target="_blank"></a></li>
                        <?php endif; 
                    endfor; ?>
                </ul><!-- .social-icons -->
            </div><!-- .wrapper -->
        </section><!-- #social-medias -->
    <?php }
endif;
