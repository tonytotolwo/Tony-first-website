<?php 
/**
 * Team section
 *
 * This is the template for the content of team section
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */
if ( ! function_exists( 'corporate_education_add_team_section' ) ) :
    /**
    * Add team section
    *
    *@since Corporate Education 0.1
    */
    function corporate_education_add_team_section() {
        $options = corporate_education_get_theme_options();

        // Check if team is enabled
        $enable_team = apply_filters( 'corporate_education_section_status', true, 'team_enable' );

        if ( true !== $enable_team ) {
            return false;
        }

        // Get team section details
        $section_details = array();
        $section_details = apply_filters( 'corporate_education_filter_team_section_details', $section_details );
        if ( empty( $section_details ) ) {
            return;
        }
        // Render team section now.
        corporate_education_render_team_section( $section_details );
    }
endif;
add_action( 'corporate_education_primary_content_action', 'corporate_education_add_team_section', 70 );


if ( ! function_exists( 'corporate_education_get_team_section_details' ) ) :
    /**
    * team section details.
    *
    * @since Corporate Education 0.1
    * @param array $input team section details.
    */
    function corporate_education_get_team_section_details( $input ) {
        $options = corporate_education_get_theme_options();

        // team intro type
        $team_intro_content_type  = $options['team_intro_content_type'];

        $content = array();
        switch ( $team_intro_content_type ) {
            case 'page':
                $page_id = '';
                
                if ( ! empty( $options['team_intro_content_page'] ) )
                    $page_id = absint( $options['team_intro_content_page'] );

                // Bail if no valid pages are selected.
                if ( empty( $page_id ) ) {
                    return $input;
                }

                $content['intro'][1]['title']    = get_the_title( $page_id );
                $content['intro'][1]['url']      = get_the_permalink( $page_id );
                $content['intro'][1]['excerpt']  = corporate_education_trim_content( 40, get_post( $page_id ) );
                                            
            break;
        }

        // team type
        $team_content_type  = $options['team_content_type'];

        switch ( $team_content_type ) {
            case 'category':
                $cat_id = '';
                if ( ! empty( $options['team_content_category'] ) ) {
                    $cat_id = $options['team_content_category'];
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
                    'posts_per_page' => 6,
                );
            break;

            case 'post':
                $ids = array();
                
                if ( ! empty( $options['team_content_post'] ) )
                    $ids = ( array ) $options['team_content_post'];

                // Bail if no valid pages are selected.
                if ( empty( $ids ) ) {
                    return $input;
                }

                $args = array(
                    'no_found_rows'  => true,
                    'orderby'        => 'post__in',
                    'post_type'      => 'post',
                    'post__in'       => $ids,
                    'posts_per_page' => 6,
                );                             
            break;
                
        } 

        $posts = get_posts( $args );
        if ( ! empty( $posts ) ) :
            $i = 1;
            foreach ( $posts as $post ) :
                $post_id = $post->ID;
                $img_array = array();
                if ( has_post_thumbnail( $post_id ) ) {
                    $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'corporate-education-medium' );
                } else {
                    $img_array[0] =  get_template_directory_uri().'/assets/uploads/no-featured-image-500x500.jpg';
                    $img_array[1] =  500;
                    $img_array[2] =  500;
                }

                if ( isset( $img_array ) ) {
                    $content['team'][$i]['img_array'] = $img_array;
                }
                $content['team'][$i]['id']      = $post_id;
                $content['team'][$i]['title']   = get_the_title( $post_id );
                $content['team'][$i]['url']     = get_the_permalink( $post_id );
                $i++;
            endforeach;
        endif;

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// team section content details.
add_filter( 'corporate_education_filter_team_section_details', 'corporate_education_get_team_section_details' );


if ( ! function_exists( 'corporate_education_render_team_section' ) ) :
    /**
    * Start team section
    *
    * @return string team content
    * @since Corporate Education 0.1
    *
    */
    function corporate_education_render_team_section( $content_details ) {
        $options    = corporate_education_get_theme_options();
        $team_content_type  = $options['team_content_type'];
        $readmore   = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'corporate-education' );

        if ( empty( $content_details ) ) {
            return;
        }
        ?>
        <section id="team-members">

            <div class="team-section-wrapper col-2">
                <?php foreach ( $content_details['intro'] as $content_detail ) : ?>
                    <div class="hentry">
                        <div class="left-half page-section">
                            <header class="entry-header">
                                <h2 class="entry-title"><?php echo esc_html( $content_detail['title'] ); ?></h2>
                            </header>

                            <div class="entry-content">
                                <p><?php echo esc_html( $content_detail['excerpt'] ); ?></p>
                            </div><!-- .entry-content -->

                            <?php if ( ! empty( $content_detail['url'] ) ) : ?>
                                <div class="view-more">
                                    <a href="<?php echo esc_url( $content_detail['url'] ); ?>" class="btn btn-blue-transparent"><?php echo esc_html( $readmore ); ?></a>
                                </div><!-- .view-more -->
                            <?php endif; ?>
                        </div><!-- .left-half -->
                    </div><!-- .hentry -->
                <?php endforeach; ?>

                <div class="hentry">
                    <div class="right-half page-section">
                        <div class="staff-members-wrapper col-3 clear">
                            <?php foreach ( $content_details['team'] as $content_detail ) : ?>
                                <div class="staff">
                                    <div class="staff-detail-wrapper">
                                        <figure class="featured-image">
                                            <a href="<?php echo esc_url( $content_detail['url'] ); ?>"><img src="<?php echo esc_url( $content_detail['img_array'][0] ); ?>" width="<?php echo esc_attr( $content_detail['img_array'][1] ); ?>" height="<?php echo esc_attr( $content_detail['img_array'][2] ); ?>" alt="<?php echo esc_attr( $content_detail['title'] ); ?>"></a>
                                        </figure>
                                        <div class="staff-details">
                                            <h5 class="staff-name"><a href="<?php echo esc_url( $content_detail['url'] ); ?>"><?php echo esc_html( $content_detail['title'] ); ?></a></h5>
                                        </div><!-- .staff-details -->
                                    </div><!-- .staff-detail-wrapper -->
                                </div><!-- .staff -->
                            <?php endforeach; ?>
                        </div><!-- .staff-members-wrapper -->
                    </div><!-- .right-half -->
                </div><!-- .hentry -->
            </div><!-- .team-section-wrapper -->
        </section><!-- #team-members -->
    <?php }
endif;
