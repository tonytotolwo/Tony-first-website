<?php 
/**
 * Courses section
 *
 * This is the template for the content of courses section
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */
if ( ! function_exists( 'corporate_education_add_courses_section' ) ) :
    /**
    * Add courses section
    *
    *@since Corporate Education 0.1
    */
    function corporate_education_add_courses_section() {
        $options = corporate_education_get_theme_options();

        // Check if courses is enabled
        $enable_courses = apply_filters( 'corporate_education_section_status', true, 'courses_enable' );

        if ( true !== $enable_courses ) {
            return false;
        }

        // Get courses section details
        $section_details = array();
        $section_details = apply_filters( 'corporate_education_filter_courses_section_details', $section_details );
        if ( empty( $section_details ) ) {
            return;
        }
        // Render courses section now.
        corporate_education_render_courses_section( $section_details );
    }
endif;
add_action( 'corporate_education_primary_content_action', 'corporate_education_add_courses_section', 40 );


if ( ! function_exists( 'corporate_education_get_courses_section_details' ) ) :
    /**
    * courses section details.
    *
    * @since Corporate Education 0.1
    * @param array $input courses section details.
    */
    function corporate_education_get_courses_section_details( $input ) {
        $options = corporate_education_get_theme_options();

        // courses type
        $courses_content_type  = $options['courses_content_type'];

        $content = array();
        switch ( $courses_content_type ) {

            case 'post':
                $ids = array();
                
                if ( ! empty( $options['courses_content_post'] ) )
                    $ids = ( array ) $options['courses_content_post'];

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
                if ( ! empty( $options['courses_content_category'] ) ) {
                    $cat_id = $options['courses_content_category'];
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
                    $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'post-thumbnail' );
                } else {
                    $img_array[0] =  get_template_directory_uri().'/assets/uploads/no-featured-image-400x270.jpg';
                    $img_array[1] =  400;
                    $img_array[2] =  270;
                }
                if ( isset( $img_array ) ) {
                    $content[$i]['img_array'] = $img_array;
                }

                $content[$i]['id']       = $post_id;
                $content[$i]['title']    = get_the_title( $post_id );
                $content[$i]['url']      = get_the_permalink( $post_id );
                $content[$i]['excerpt']  = corporate_education_trim_content( 15, $post );
                $i++;
            endforeach;
        endif;

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// courses section content details.
add_filter( 'corporate_education_filter_courses_section_details', 'corporate_education_get_courses_section_details' );


if ( ! function_exists( 'corporate_education_render_courses_section' ) ) :
    /**
    * Start courses section
    *
    * @return string courses content
    * @since Corporate Education 0.1
    *
    */
    function corporate_education_render_courses_section( $content_details ) {
        $options = corporate_education_get_theme_options();
        $title = ! empty( $options['courses_title'] ) ? $options['courses_title'] : '';
        $courses_content_type  = $options['courses_content_type'];

        $category_link  = '';
        $cat_name       = '';
        if ( $courses_content_type == 'category' ) {
            $category_link  = get_category_link( $options['courses_content_category'] );
            $cat_name       = get_the_category_by_ID( $options['courses_content_category'] );
        }

        if ( empty( $content_details ) ) {
            return;
        }
        ?>
            <section id="featured-courses" class="page-section no-padding-top">
                <div class="wrapper">
                    <header class="entry-header align-center">
                        <?php if ( ! empty( $title ) ) : ?>
                            <h2 class="entry-title"><?php echo esc_html( $title ); ?></h2>
                        <?php endif; ?>
                    </header>

                    <div class="entry-content col-3">
                        <?php foreach( $content_details as $content_detail ) : ?>
                            <div class="hentry">
                                <div class="featured-course-wrapper">
                                    <figure class="featured-image">
                                        <a href="<?php echo esc_url( $content_detail['url'] ); ?>"><img src="<?php echo esc_url( $content_detail['img_array'][0] ); ?>" width="<?php echo esc_attr( $content_detail['img_array'][1] ); ?>" height="<?php echo esc_attr( $content_detail['img_array'][2] ); ?>" alt="<?php echo esc_attr( $content_detail['title'] ); ?>"></a>
                                    </figure>
                                    <div class="entry-container">
                                        <h5 class="featured-title"><a href="<?php echo esc_url( $content_detail['url'] ); ?>"><?php echo esc_html( $content_detail['title'] ); ?></a></h5>
                                        <p><?php echo esc_html( $content_detail['excerpt'] ); ?></p>
                                    </div><!-- .entry-container -->
                                </div><!-- .featured-course-wrapper -->
                            </div><!-- .hentry -->
                        <?php endforeach; ?>
                    </div><!-- .entry-content -->
                    <?php if ( ! empty( $category_link ) ) : ?>
                        <div class="view-more align-center">
                            <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-blue-transparent"><?php printf( '%s ' . esc_html( $cat_name ), esc_html__( 'View all', 'corporate-education' ) ); ?></a>
                        </div>
                    <?php endif; ?>
                </div><!-- .wrapper -->
            </section><!-- #featured-courses -->
        <?php }
endif;
