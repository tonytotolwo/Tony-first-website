<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
				<div id="archive-blog-wrapper" class="archive-blog-wrapper clear <?php echo ( false == corporate_education_is_sidebar_enable() ) ? 'col-3' : 'col-2'; ?>">
					<?php
					if ( have_posts() ) :
						$i = 1;
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							/**
							 * corporate_education_home_content_action hook
							 *
							 * @hooked corporate_education_home_content -  10
							 *
							 */
							do_action( 'corporate_education_home_content_action', $i );
							$i++;
						endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; 
					?>
				</div><!-- #archive-blog-wrapper -->
				<?php  
				/**
				* Hook - corporate_education_action_pagination.
				*
				* @hooked corporate_education_pagination 
				*/
				do_action( 'corporate_education_action_pagination' ); 
				?>
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php  
		if ( corporate_education_is_sidebar_enable() ) {
			get_sidebar();
		}
		?>

	</div><!-- .wrapper -->
</div><!-- .template-wrapper -->

<?php
get_footer();