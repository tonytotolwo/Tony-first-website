<?php
/**
 * The template for displaying archive pages.
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

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

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
