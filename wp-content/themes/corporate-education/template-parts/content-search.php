<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$options = corporate_education_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<figure class="featured-image">
        <div class="white-shape top"></div>
        <div class="white-shape top right"></div>
        <div class="white-shape bottom"></div>
        <div class="white-shape bottom left"></div>

        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
            <?php  
            if ( has_post_thumbnail() ) :
            	the_post_thumbnail( 'post-thumbnail', $attr = array( 'alt' => the_title_attribute( 'echo=0' ) ) );
            else :
            	echo '<img src="' . esc_url( get_template_directory_uri().'/assets/uploads/no-featured-image-400x270.jpg' ).'" alt="' . the_title_attribute('echo=0') . '">';
			endif; 
            ?>
        </a><!-- .post-thumbnail -->

        <p class="entry-meta">
        	<span class="posted-on">
                <?php corporate_education_post_date(); ?>
            </span><!-- .posted-on -->
        </p><!-- .entry-meta -->       
    </figure>

    <div class="entry-container">
        <header class="entry-header">
           	<?php  
           	if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
           	?>   

            <p class="entry-meta">
                <span class="cat-links">
                    <?php the_category(); ?>
                </span><!-- .cat-links -->
            </p><!-- .entry-meta -->
        </header>

        <div class="entry-content">
            <?php 
            the_excerpt(); 
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <p class="entry-meta">
               <a href="<?php the_permalink(); ?>">
                <?php echo ( ! empty( $options['read_more_text'] ) ) ? esc_html( $options['read_more_text'] ) : esc_html_e( 'Read More', 'corporate-education' );  ?>
                </a>
            </p><!-- .entry-meta -->        
        </footer>
    </div><!-- .entry-container -->
</article><!-- #post-## -->
