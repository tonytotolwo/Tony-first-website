<?php 
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */
if ( ! function_exists( 'corporate_education_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Corporate Education 0.1
    */
    function corporate_education_add_about_section() {
        $options = corporate_education_get_theme_options();

        // Check if about is enabled
        $enable_about = apply_filters( 'corporate_education_section_status', true, 'about_enable' );

        if ( true !== $enable_about ) {
            return false;
        }

        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'corporate_education_filter_about_section_details', $section_details );
        if ( empty( $section_details ) ) {
            return;
        }
        // Render about section now.
        corporate_education_render_about_section( $section_details );
    }
endif;
add_action( 'corporate_education_primary_content_action', 'corporate_education_add_about_section', 20 );


if ( ! function_exists( 'corporate_education_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Corporate Education 0.1
    * @param array $input about section details.
    */
    function corporate_education_get_about_section_details( $input ) {
        $options = corporate_education_get_theme_options();

        // about type
        $about_content_type  = $options['about_content_type'];

        $content = array();
        switch ( $about_content_type ) {

            case 'page':
                $page_id = '';
                
                if ( ! empty( $options['about_content_page'] ) )
                    $page_id = absint( $options['about_content_page'] );

                // Bail if no valid pages are selected.
                if ( empty( $page_id ) ) {
                    return $input;
                }

                $content[0]['title']    = get_the_title( $page_id );
                $content[0]['excerpt']  = get_post_field( 'post_content', $page_id );
                                            
            break;
        }

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// about section content details.
add_filter( 'corporate_education_filter_about_section_details', 'corporate_education_get_about_section_details' );


if ( ! function_exists( 'corporate_education_render_about_section' ) ) :
    /**
    * Start about section
    *
    * @return string about content
    * @since Corporate Education 0.1
    *
    */
    function corporate_education_render_about_section( $content_details ) {
        $options = corporate_education_get_theme_options();
        $alphabet = ! empty( $options['about_alphabet'] ) ? $options['about_alphabet'] : '';

        if ( empty( $content_details ) ) {
            return;
        }

        foreach ( $content_details as $content_detail ) :
        ?>
            <section id="hero-section" class="page-section col-2">
                <div class="wrapper">
                    <div class="row">
                        <?php if ( ! empty( $alphabet ) ) : ?>
                            <div class="hentry">
                                <h2><span><?php echo esc_html( $alphabet ); ?></span></h2>
                            </div><!-- .hentry -->
                        <?php endif; ?>
                        <div class="hentry">
                            <header class="entry-header">
                                <h2 class="entry-title"><?php echo esc_html( $content_detail['title'] ); ?></h2>
                            </header>

                            <div class="entry-content">
                                <?php echo wp_kses_post( $content_detail['excerpt'] ); ?>
                            </div><!-- .entry-content -->
                        </div><!-- .hentry -->
                    </div><!-- .row -->
                </div><!-- .wrapper -->
            </section><!-- #hero-section -->
        <?php endforeach;
    }
endif;