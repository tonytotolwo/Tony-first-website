<?php 
/**
 * Testimonial section
 *
 * This is the template for the content of testimonial section
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */
if ( ! function_exists( 'corporate_education_add_testimonial_section' ) ) :
    /**
    * Add testimonial section
    *
    *@since Corporate Education 0.1
    */
    function corporate_education_add_testimonial_section() {
        $options = corporate_education_get_theme_options();

        // Check if testimonial is enabled
        $enable_testimonial = apply_filters( 'corporate_education_section_status', true, 'testimonial_enable' );

        if ( true !== $enable_testimonial ) {
            return false;
        }

        // Get testimonial section details
        $section_details = array();
        $section_details = apply_filters( 'corporate_education_filter_testimonial_section_details', $section_details );
        if ( empty( $section_details ) ) {
            return;
        }
        // Render testimonial section now.
        corporate_education_render_testimonial_section( $section_details );
    }
endif;
add_action( 'corporate_education_primary_content_action', 'corporate_education_add_testimonial_section', 90 );


if ( ! function_exists( 'corporate_education_get_testimonial_section_details' ) ) :
    /**
    * testimonial section details.
    *
    * @since Corporate Education 0.1
    * @param array $input testimonial section details.
    */
    function corporate_education_get_testimonial_section_details( $input ) {
        $options = corporate_education_get_theme_options();

        // testimonial type
        $testimonial_content_type  = $options['testimonial_content_type'];

        $content = array();
        switch ( $testimonial_content_type ) {

            case 'post':
                $ids = array();
                
                if ( ! empty( $options['testimonial_content_post'] ) )
                    $ids = ( array ) $options['testimonial_content_post'];

                // Bail if no valid pages are selected.
                if ( empty( $ids ) ) {
                    return $input;
                }

                $args = array(
                    'no_found_rows'  => true,
                    'orderby'        => 'post__in',
                    'post_type'      => 'post',
                    'post__in'       => $ids,
                    'posts_per_page' => 3,
                );  
                
          	break;

            case 'category':
                $cat_id = '';
                if ( ! empty( $options['testimonial_content_category'] ) ) {
                    $cat_id = $options['testimonial_content_category'];
                }

                // Bail if no valid pages are selected.
                if ( empty( $cat_id ) ) {
                    return $input;
                }else{
                    $cat_id = absint( $cat_id );
                }

                $args = array(
                    'no_found_rows'  => true,
                    'cat'            => $cat_id,
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
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
                    $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'corporate-education-medium' );
                } else {
                    $img_array[0] =  get_template_directory_uri().'/assets/uploads/no-featured-image-500x500.jpg';
                    $img_array[1] =  500;
                    $img_array[2] =  500;
                }
                if ( isset( $img_array ) ) {
                    $content[$i]['img_array'] = $img_array;
                }

                $content[$i]['id']       = $post_id;
                $content[$i]['title']    = get_the_title( $post_id );
                $content[$i]['url']      = get_the_permalink( $post_id );
                $content[$i]['excerpt']  = corporate_education_trim_content( 20, $post );
                $i++;
            endforeach;
        endif;

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// testimonial section content details.
add_filter( 'corporate_education_filter_testimonial_section_details', 'corporate_education_get_testimonial_section_details' );


if ( ! function_exists( 'corporate_education_render_testimonial_section' ) ) :
    /**
    * Start testimonial section
    *
    * @return string testimonial content
    * @since Corporate Education 0.1
    *
    */
    function corporate_education_render_testimonial_section( $content_details ) {
        $options = corporate_education_get_theme_options();
        $title = ! empty( $options['testimonial_title'] ) ? $options['testimonial_title'] : '';
        $testimonial_content_type  = $options['testimonial_content_type'];

        if ( empty( $content_details ) ) {
            return;
        }
        ?>
            <section id="client-testimonial" class="page-section">

                <div class="wrapper">
                    <header class="entry-header align-center">
                        <?php if ( ! empty( $title ) ) : ?>
                            <h2 class="entry-title"><?php echo esc_html( $title ); ?></h2>
                        <?php endif; ?>
                    </header>

                    <div class="entry-content">
                        <div class="testimonial-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": true, "arrows":false, "autoplay": true, "fade": false, "draggable": false }'>
                            <?php foreach ( $content_details as $content_detail ) : ?>
                                <div class="slick-item">
                                    <div class="testimonial-wrapper">
                                        <div class="featured-image">
                                            <a href="<?php echo esc_url( $content_detail['url'] ); ?>"><img src="<?php echo esc_url( $content_detail['img_array'][0] ); ?>" width="<?php echo esc_attr( $content_detail['img_array'][1] ); ?>" height="<?php echo esc_attr( $content_detail['img_array'][2] ); ?>" alt="<?php echo esc_attr( $content_detail['title'] ); ?>"></a>
                                        </div><!-- .featured-image -->

                                        <div class="testimonial-details">
                                            <p><?php echo esc_html( $content_detail['excerpt'] ); ?></p>
                                            <h5 class="featured-title"><a href="<?php echo esc_url( $content_detail['url'] ); ?>"><?php echo esc_html( $content_detail['title'] ); ?></a></h5>
                                        </div><!-- .testimonial-details -->
                                    </div><!-- .testimonial-wrapper -->
                                </div><!-- .slick-item -->
                            <?php endforeach; ?>
                        </div><!-- .testimonial-slider -->
                    </div><!-- .entry-content -->
                </div><!-- .wrapper -->
            </section><!-- #client-testimonial -->
        <?php }
endif;
