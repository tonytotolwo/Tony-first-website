<?php 
/**
 * Latest News section
 *
 * This is the template for the content of latest_news section
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */
if ( ! function_exists( 'corporate_education_add_latest_news_section' ) ) :
    /**
    * Add latest_news section
    *
    *@since Corporate Education 0.1
    */
    function corporate_education_add_latest_news_section() {
        $options = corporate_education_get_theme_options();

        // Check if latest_news is enabled
        $enable_latest_news = apply_filters( 'corporate_education_section_status', true, 'latest_news_enable' );

        if ( true !== $enable_latest_news ) {
            return false;
        }

        // Get latest_news section details
        $section_details = array();
        $section_details = apply_filters( 'corporate_education_filter_latest_news_section_details', $section_details );
        if ( empty( $section_details ) ) {
            return;
        }
        // Render latest_news section now.
        corporate_education_render_latest_news_section( $section_details );
    }
endif;
add_action( 'corporate_education_primary_content_action', 'corporate_education_add_latest_news_section', 60 );


if ( ! function_exists( 'corporate_education_get_latest_news_section_details' ) ) :
    /**
    * latest_news section details.
    *
    * @since Corporate Education 0.1
    * @param array $input latest_news section details.
    */
    function corporate_education_get_latest_news_section_details( $input ) {
        $options = corporate_education_get_theme_options();

        // latest_news type
        $latest_news_content_type_1  = $options['latest_news_content_type_1'];

        $content = array();
        switch ( $latest_news_content_type_1 ) {
            case 'category':
                $cat_id = '';
                if ( ! empty( $options['latest_news_content_category_1'] ) ) {
                    $cat_id = $options['latest_news_content_category_1'];
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
                    'posts_per_page'  => 3,
                );
                                            
          	break;

            case 'recent-post':
                $args = array(
                    'no_found_rows'  => true,
                    'post_type'      => 'post',
                    'posts_per_page'  => 3,
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
                    $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium_large' );
                } else {
                    $img_array[0] =  '';
                }

                if ( isset( $img_array ) ) {
                    $content['left'][$i]['img_array'] = $img_array;
                }
                $content['left'][$i]['id']      = $post_id;
                $content['left'][$i]['date']    = get_the_date( 'd M Y', $post_id );
                $content['left'][$i]['title']   = get_the_title( $post_id );
                $content['left'][$i]['url']     = get_the_permalink( $post_id );
                $content['left'][$i]['excerpt'] = corporate_education_trim_content( 15, $post  );
                $i++;
            endforeach;
        endif;

        $latest_news_content_type_2  = $options['latest_news_content_type_2'];

        switch ( $latest_news_content_type_2 ) {
            case 'category':
                $cat_id = '';
                if ( ! empty( $options['latest_news_content_category_2'] ) ) {
                    $cat_id = $options['latest_news_content_category_2'];
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
                    'posts_per_page'  => 3,
                );
                                            
            break;

            case 'recent-post':
                $args = array(
                    'no_found_rows'  => true,
                    'post_type'      => 'post',
                    'posts_per_page'  => 3,
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
                    $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium_large' );
                } else {
                    $img_array[0] =  '';
                }

                if ( isset( $img_array ) ) {
                    $content['right'][$i]['img_array'] = $img_array;
                }
                $content['right'][$i]['id']      = $post_id;
                $content['right'][$i]['date']    = get_the_date( 'd M Y', $post_id );
                $content['right'][$i]['title']   = get_the_title( $post_id );
                $content['right'][$i]['url']     = get_the_permalink( $post_id );
                $content['right'][$i]['excerpt'] = corporate_education_trim_content( 15, $post  );
                $i++;
            endforeach;
        endif;

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// latest_news section content details.
add_filter( 'corporate_education_filter_latest_news_section_details', 'corporate_education_get_latest_news_section_details' );


if ( ! function_exists( 'corporate_education_render_latest_news_section' ) ) :
    /**
    * Start latest_news section
    *
    * @return string latest_news content
    * @since Corporate Education 0.1
    *
    */
    function corporate_education_render_latest_news_section( $content_details ) {
        $options = corporate_education_get_theme_options();
        $latest_news_content_type_1  = $options['latest_news_content_type_1'];
        $latest_news_content_type_2  = $options['latest_news_content_type_2'];
        $title_1 = ! empty( $options['latest_news_title_1'] ) ? $options['latest_news_title_1'] : '';
        $title_2 = ! empty( $options['latest_news_title_2'] ) ? $options['latest_news_title_2'] : '';

        if ( empty( $content_details ) ) {
            return;
        }
        ?>
        <section id="latest-news" class="page-section col-2">

            <div class="wrapper">
                <div class="hentry">
                    <header class="entry-header left">
                        <?php if ( ! empty( $title_1 ) ) : ?>
                            <h2 class="entry-title"><?php echo esc_html( $title_1 ); ?></h2>
                        <?php endif; ?>
                    </header>

                    <div class="featured-events-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": false, "arrows":true, "autoplay": true, "fade": false, "draggable": false, "vertical" : true }'>
                        <?php foreach ( $content_details['left'] as $content_detail ) : ?>
                            <div class="slick-item <?php if ( empty( $content_detail['img_array'][0] ) ) echo 'no-post-thumbnail'; ?>" data-hoverimage="<?php if ( ! empty( $content_detail['img_array'][0] ) ) echo esc_url( $content_detail['img_array'][0] ); ?>">
                                <div class="event-details">
                                    <div class="black-overlay"></div>
                                    <div class="event-date">
                                        <a href="<?php echo esc_url( $content_detail['url'] ); ?>">
                                            <time> <?php echo esc_html( $content_detail['date'] ); ?></time>
                                        </a>        
                                    </div><!-- .event-date -->

                                    <div class="entry-container">
                                        <h5 class="featured-title"><a href="<?php echo esc_url( $content_detail['url'] ); ?>"><?php echo esc_html( $content_detail['title'] ); ?></a></h5>  
                                        <p><?php echo esc_html( $content_detail['excerpt'] ); ?></p>
                                        <div class="entry-meta">
                                            <span class="cat-links">
                                                <?php the_category( '', '', $content_detail['id'] ); ?>
                                            </span><!-- .cat-links -->
                                        </div><!-- .entry-meta -->
                                    </div><!-- .entry-container -->
                                </div><!-- .event-details -->
                            </div><!-- .slick-item -->
                        <?php endforeach; ?>
                    </div><!-- .featured-events-slider --> 
                </div><!-- .hentry -->

                <div class="hentry">
                    <header class="entry-header right">
                        <?php if ( ! empty( $title_2 ) ) : ?>
                            <h2 class="entry-title"><?php echo esc_html( $title_2 ); ?></h2>
                        <?php endif; ?>
                    </header>

                    <div class="featured-news-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": false, "arrows":true, "autoplay": true, "fade": false, "draggable": false, "vertical" : true }'>
                        <?php foreach ( $content_details['right'] as $content_detail ) : ?>
                            <div class="slick-item <?php if ( empty( $content_detail['img_array'][0] ) ) echo 'no-post-thumbnail'; ?>" data-hoverimage="<?php if ( ! empty( $content_detail['img_array'][0] ) ) echo esc_url( $content_detail['img_array'][0] ); ?>">
                                <div class="news-details">
                                    <div class="black-overlay"></div>
                                    <div class="news-date">
                                        <a href="<?php echo esc_url( $content_detail['url'] ); ?>">
                                            <time><?php echo esc_html( $content_detail['date'] ); ?></time>
                                        </a>     
                                    </div><!-- .news-date -->

                                    <div class="entry-container">
                                        <h5 class="featured-title"><a href="<?php echo esc_url( $content_detail['url'] ); ?>"><?php echo esc_html( $content_detail['title'] ); ?></a></h5>  
                                        <p><?php echo esc_html( $content_detail['excerpt'] ); ?></p>
                                        <div class="entry-meta">
                                            <span class="cat-links">
                                                <?php the_category( '', '', $content_detail['id'] ); ?>
                                            </span><!-- .cat-links -->
                                        </div><!-- .entry-meta -->
                                    </div><!-- .entry-container -->
                                </div><!-- .news-details -->
                            </div><!-- .slick-item -->
                        <?php endforeach; ?>

                    </div><!-- .featured-news-slider -->
                </div><!-- .hentry -->
            </div><!-- .wrapper -->
        </section><!-- #latest-news -->
    <?php }
endif;