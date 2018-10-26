<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * 
 * @since Corporate Education 0.1
 */

get_header(); ?>
<div class="template-wrapper">
    <div class="white-shape top move-up left innerpage"></div>
    <div class="white-shape top full-width innerpage"></div>
    <div class="white-shape bottom right move-down"></div>
    
	<div class="wrapper page-section less-top-padding">
		<section class="error-404 not-found">
			<img src="<?php echo esc_url( get_template_directory_uri() . ' /assets/uploads/404.png' ); ?>" alt="<?php esc_attr_e( '404', 'corporate-education' ); ?>">
			<header class="entry-header">
				<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'corporate-education' ); ?></h1>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'corporate-education' ); ?></p>
				<?php
					get_search_form();
				?>
			</div><!-- .entry-content -->
		</section><!-- .error-404 -->
	</div><!-- .wrapper/.page-section -->
</div><!-- .template-wrapper -->
<?php
get_footer();
