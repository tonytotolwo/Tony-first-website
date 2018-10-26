<?php 
/**
 * Headline section
 *
 * This is the template for the content of headline section
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */
if ( ! function_exists( 'corporate_education_add_headline_section' ) ) :
    /**
    * Add headline section
    *
    *@since Corporate Education 0.1
    */
    function corporate_education_add_headline_section() {
        $options = corporate_education_get_theme_options();

        // Check if headline is enabled
        $enable_headline = $options['headline_enable'];

        if ( true !== $enable_headline ) {
            return false;
        }

        // Get headline section details
        $section_details = array();
        $section_details = apply_filters( 'corporate_education_filter_headline_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render headline section now.
        corporate_education_render_headline_section( $section_details );
    }
endif;
add_action( 'corporate_education_header_action', 'corporate_education_add_headline_section', 45 );


if ( ! function_exists( 'corporate_education_get_headline_section_details' ) ) :
    /**
    * headline section details.
    *
    * @since Corporate Education 0.1
    * @param array $input headline section details.
    */
    function corporate_education_get_headline_section_details( $input ) {
        $options = corporate_education_get_theme_options();

        // headline type
        $headline_content_type  = $options['headline_content_type'];

        $content = array();
        switch ( $headline_content_type ) {

          	case 'category':
                $cat_id = '';
                $count = ! empty( $options['headline_content_count'] ) ? $options['headline_content_count']: 6;

                if ( ! empty( $options['headline_content_category'] ) )
                    $cat_id = $options['headline_content_category'];

                // Bail if no valid pages are selected.
                if ( empty( $cat_id ) ) {
                    return $input;
                }

                $args = array(
                  'no_found_rows'  => true,
                  'cat'            => $cat_id,
                  'post_type'      => 'post',
                  'posts_per_page' => absint( $count ),
                );
            break;

        }

        $posts = get_posts( $args );
        if ( ! empty( $posts ) ) :
            $i = 1;
            foreach ( $posts as $post ) :
                $post_id = $post->ID;
                $content[$i]['title']   = get_the_title( $post_id );
                $content[$i]['url']     = get_the_permalink( $post_id );
                $i++;
            endforeach;
        endif;

        if ( ! empty( $content ) ) {
            $input = $content;
        }

        return $input;
    }
endif;
// headline section content details.
add_filter( 'corporate_education_filter_headline_section_details', 'corporate_education_get_headline_section_details' );


if ( ! function_exists( 'corporate_education_render_headline_section' ) ) :
    /**
    * Start headline section
    *
    * @return string headline content
    * @since Corporate Education 0.1
    *
    */
    function corporate_education_render_headline_section( $content_details ) {
        $options = corporate_education_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        }
        $i = 1;
        ?>
        <div id="news-ticker">
            <div class="wrapper">
                <?php if ( ! empty( $options['headline_label'] ) ) : ?>
                    <h2 class="news-ticker-label"><?php echo esc_html( $options['headline_label'] ); ?></h2>
                <?php endif; ?>

                <div class="news-ticker-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": false, "arrows":false, "autoplay": true, "fade": false, "draggable": false, "vertical" : true }'>
                    <?php foreach ( $content_details as $content_detail ) : ?>
                        <div class="slick-item <?php echo ( $i == 1 ) ? 'display-block' : 'display-none'; ?>">
                            <h2 class="news-ticker-title">
                                <a href="<?php echo esc_url( $content_detail['url'] ); ?>"><?php echo esc_html( $content_detail['title'] ); ?></a>
                            </h2>
                        </div><!-- .slick-item -->
                    <?php $i++;
                    endforeach; ?>
                </div><!-- .news-ticker-slider -->
            </div><!-- .wrapper -->
        </div><!-- #news-ticker -->
    <?php }
endif;