<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Theme Palace
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

if ( ! class_exists( 'Corporate_Education_Latest_Post' ) ) :

     
    class Corporate_Education_Latest_Post extends WP_Widget {
        /**
         * Sets up the widgets name etc
         */
        public function __construct() {
            $tp_widget_popular_post = array(
                'classname'   => 'widget_latest_posts',
                'description' => esc_html__( 'Retrive latest posts.', 'corporate-education' ),
            );
            parent::__construct( 'Corporate_Education_Latest_Post', esc_html__( 'TP : Latest Posts', 'corporate-education' ), $tp_widget_popular_post );
        }

        /**
         * Outputs the content of the widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget( $args, $instance ) {
            // outputs the content of the widget
            if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }

            $tp_title  = ( ! empty( $instance['title'] ) ) ? ( $instance['title'] ) : esc_html__( 'Latest Posts', 'corporate-education' );
            $tp_number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;

            echo $args['before_widget'];
            echo '<ul>';
                if ( ! empty( $tp_title ) ) {
                    echo $args['before_title'] . esc_html( $tp_title ) . $args['after_title'];
                }
            $popular_args = array(
                'post_type'         => 'post',
                'posts_per_page'    => $tp_number,
                'order'             => 'DESC'
                );

            $wp_query = get_posts( $popular_args );
            foreach ( $wp_query as $post ) :
            ?>

                <li class="has-post-thumbnail clear">
                    <div class="post-image">
                        <a href="<?php the_permalink( $post->ID ); ?>">
                            <?php 
                            if ( has_post_thumbnail( $post->ID ) ) :
                                $image = get_the_post_thumbnail( $post->ID, $size = 'thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) );
                                echo $image;
                            else :
                                echo '<img src="' . esc_url( get_template_directory_uri() .'/assets/uploads/no-featured-image-300x300.jpg') .'" alt="'. the_title_attribute( 'echo=0' ) .'">';
                            endif; 
                            ?>
                        </a>
                    </div><!-- .post-image-->
                    <div class="post-wrapper">
                        <div class="post-title">
                            <h5><a href="<?php the_permalink( $post->ID ); ?>"><?php echo esc_html( $post->post_title ); ?></a></h5>
                        </div><!-- .post-title -->
                        <div class="article-entry-meta">
                            <time><?php the_time( get_option( 'date_format' ) ); ?></time>
                        </div><!-- .article-desc -->
                    </div><!-- .post-wrapper -->
                </li>

            <?php
            endforeach;
            echo '</ul>';
            echo $args['after_widget'];
        }

        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public function form( $instance ) {
            $tp_title      = isset( $instance['title'] ) ? ( $instance['title'] ) : esc_html__( 'Latest Posts', 'corporate-education' );
            $tp_number     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
           ?>

           <p>
               <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'corporate-education' ); ?></label>
               <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $tp_title ); ?>" />
           </p>

           <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'corporate-education' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="7" value="<?php echo absint( $tp_number ); ?>" size="3" />
           </p>

           <?php
        }

        /**
        * Processing widget options on save
        *
        * @param array $new_instance The new options
        * @param array $old_instance The previous options
        */
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
            $instance           = $old_instance;
            $instance['title']  = sanitize_text_field( $new_instance['title'] );
            $instance['number'] = (int) $new_instance['number'];
           
            return $instance;
        }
    }
endif;
