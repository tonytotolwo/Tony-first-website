<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

get_header(); ?>
<div class="template-wrapper">
    <div class="white-shape top move-up left innerpage"></div>
    <div class="white-shape top full-width innerpage"></div>
    <div class="white-shape bottom right move-down"></div>
    
	<div class="wrapper page-section less-top-padding">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single' );

				/**
				* Hook corporate_education_action_post_pagination
				*  
				* @hooked corporate_education_post_pagination 
				*/
				do_action( 'corporate_education_action_post_pagination' );

				/**
				* Hook corporate_education_author_profile
				*  
				* @hooked corporate_education_get_author_profile 
				*/
				do_action( 'corporate_education_author_profile' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php  
		if ( corporate_education_is_sidebar_enable() ) {
			get_sidebar();
		}
		?>
	</div><!-- .wrapper/.page-section -->
</div><!-- .template-wrapper -->
<?php
get_footer();
