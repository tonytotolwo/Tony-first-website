<?php 
/**
 * Call to action section
 *
 * This is the template for the content of call_to_action section
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */
if ( ! function_exists( 'corporate_education_add_call_to_action_section' ) ) :
    /**
    * Add call_to_action section
    *
    *@since Corporate Education 0.1
    */
    function corporate_education_add_call_to_action_section() {
        $options = corporate_education_get_theme_options();

        // Check if call_to_action is enabled
        $enable_call_to_action = apply_filters( 'corporate_education_section_status', true, 'call_to_action_enable' );

        if ( true !== $enable_call_to_action ) {
            return false;
        }

        // Render call_to_action section now.
        corporate_education_render_call_to_action_section();
    }
endif;
add_action( 'corporate_education_primary_content_action', 'corporate_education_add_call_to_action_section', 50 );

if ( ! function_exists( 'corporate_education_render_call_to_action_section' ) ) :
    /**
    * Start call_to_action section
    *
    * @return string call_to_action content
    * @since Corporate Education 0.1
    *
    */
    function corporate_education_render_call_to_action_section() {
        $options = corporate_education_get_theme_options();
        $title = ! empty( $options['call_to_action_title'] ) ? $options['call_to_action_title'] : '';
        $sub_title = ! empty( $options['call_to_action_sub_title'] ) ? $options['call_to_action_sub_title'] : '';
        $btn_label_1 = ! empty( $options['call_to_action_btn_label_1'] ) ? $options['call_to_action_btn_label_1'] : '';
        $btn_url_1 = ! empty( $options['call_to_action_btn_url_1'] ) ? $options['call_to_action_btn_url_1'] : '';
        $background = ! empty( $options['call_to_action_image'] ) ? $options['call_to_action_image'] : get_template_directory_uri() . '/assets/uploads/promotion.jpg';
        ?>
        <section id="promotion" class="page-section align-center parallax" style="background-image:url('<?php echo esc_url( $background ); ?>')" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
            <div class="black-overlay"></div>
            <div class="wrapper">
                <header class="entry-header">
                    <?php if ( ! empty( $title ) ) : ?>
                        <h2 class="entry-title"><?php echo esc_html( $title ); ?></h2>
                    <?php endif; 
                    if ( ! empty( $sub_title ) ) : ?>
                        <p class="entry-title-desc"><?php echo esc_html( $sub_title ); ?></p>
                    <?php endif; ?>
                </header>
                <?php if ( ! empty( $btn_url_1 ) || ! empty( $btn_url_2 ) ) : ?>
                    <div class="view-more">
                        <?php if ( ! empty( $btn_url_1 ) ) : ?>
                            <a href="<?php echo esc_url( $btn_url_1 ); ?>" class="btn btn-orange"><?php echo esc_html( $btn_label_1 ); ?></a>
                        <?php endif; ?>
                    </div><!-- .view-more -->
                <?php endif; ?>
            </div><!-- .wrapper -->
        </section><!-- #promotion -->
    <?php }
endif;
