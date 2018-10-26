<?php 
/**
 * Slider section
 *
 * This is the template for the content of slider section
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

if ( ! function_exists( 'corporate_education_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Corporate Education 0.1
    */
    function corporate_education_add_slider_section() {
        $options = corporate_education_get_theme_options();

        // Check if slider is enabled
        $enable_slider = apply_filters( 'corporate_education_section_status', true, 'slider_enable' );

        if ( true !== $enable_slider ) {
            return false;
        }

        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'corporate_education_filter_slider_section_details', $section_details );
        if ( empty( $section_details ) ) {
            return;
        }
        // Render slider section now.
        corporate_education_render_slider_section( $section_details );
    }
endif;
add_action( 'corporate_education_primary_content_action', 'corporate_education_add_slider_section', 10 );


if ( ! function_exists( 'corporate_education_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Corporate Education 0.1
    * @param array $input slider section details.
    */
    function corporate_education_get_slider_section_details( $input ) {
        $options = corporate_education_get_theme_options();

        // slider type
        $slider_content_type  = $options['slider_content_type'];

        $content = array();
        switch ( $slider_content_type ) {

          	case 'page':
                $ids = array();

                for ( $i = 1; $i <= $options['no_of_slider']; $i++ ) {
                    $id = null;
                    if ( isset( $options[ 'slider_content_page_'.$i ] ) ) {
                        $id = $options[ 'slider_content_page_'.$i ];
                    }
                    if ( ! empty( $id ) ) {
                        $ids[] = absint( $id );
                    }
                }

                // Bail if no valid pages are selected.
                if ( empty( $ids ) ) {
                    return $input;
                }

                $args = array(
                    'no_found_rows'  => true,
                    'orderby'        => 'post__in',
                    'post_type'      => 'page',
                    'post__in'       => $ids,
                );
            break;

        }

        $posts = get_posts( $args );
        if ( ! empty( $posts ) ) :
            $i = 1;
            foreach ( $posts as $post ) :
                $post_id = $post->ID;
                $img_array = null;
                if ( has_post_thumbnail( $post_id ) ) {
                    $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
                } else {
                    $img_array[0] =  get_template_directory_uri().'/assets/uploads/no-featured-image-1920x1080.jpg';
                }

                if ( isset( $img_array ) ) {
                    $content[$i]['img_array'] = $img_array;
                }
                $content[$i]['title']   = get_the_title( $post_id );
                $content[$i]['url']     = get_the_permalink( $post_id );
                $content[$i]['excerpt'] = corporate_education_trim_content( 6, $post  );
                $i++;
            endforeach;
        endif;

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// slider section content details.
add_filter( 'corporate_education_filter_slider_section_details', 'corporate_education_get_slider_section_details' );


if ( ! function_exists( 'corporate_education_render_slider_section' ) ) :
    /**
    * Start slider section
    *
    * @return string slider content
    * @since Corporate Education 0.1
    *
    */
    function corporate_education_render_slider_section( $content_details ) {
        $options = corporate_education_get_theme_options();
        $btn_label = ! empty( $options['slider_btn_label'] ) ? $options['slider_btn_label'] : esc_html__( 'Start Learning', 'corporate-education' );

        if ( empty( $content_details ) ) {
            return;
        }
        $i = 1;
        ?>
        <section id="main-slider" class="main-featured-slider">
            <div class="regular" data-effect="linear" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows": true, "autoplay": true, "fade": true, "draggable": false, "pauseOnHover": true }'>
                <?php foreach ( $content_details as $content_detail ) : ?>
                    <div class="slick-item <?php echo ( $i == 1 ) ? 'display-block' : 'display-none'; ?>" style="background-image:url('<?php echo esc_url( $content_detail['img_array'][0] ); ?>')">
                        <?php if ( true === $options['slider_overlay_enable'] ) : ?>
                            <div class="black-overlay"></div>
                        <?php endif; ?>
                        <div class="wrapper">
                            <div class="slider-content">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content_detail['url'] ); ?>"><?php echo esc_html( $content_detail['title'] ); ?></a></h2>
                                </header>
                                <p class="entry-title-desc"><?php echo esc_html( $content_detail['excerpt'] ); ?></p>
                                <a href="<?php echo esc_url( $content_detail['url'] ); ?>" class="btn btn-white"><?php echo esc_html( $btn_label ); ?></a>
                            </div><!-- .slider-content -->
                        </div><!-- .wrapper -->
                    </div><!-- .slick-item -->
                <?php $i ++;
                endforeach; ?>
            </div><!-- .regular -->
        </section><!-- #main-slider -->
    <?php }
endif;
