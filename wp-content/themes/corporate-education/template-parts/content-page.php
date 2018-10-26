<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	if ( is_front_page() )
		the_title( '<h2 class="page-title">', '</h2>' );

	$header_image_meta = get_post_meta( get_the_id(), 'corporate-education-header-image', true );

	if ( 'show-both' == $header_image_meta ) { 
		if ( has_post_thumbnail() ) : ?>
			<figure class="featured-image">
				<?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
			</figure>
		<?php endif; 
	} ?>
	<div class="entry-content">
		<?php 
		the_content(); 

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'corporate-education' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'corporate-education' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
