<?php
/**
 * Template part for displaying posts.
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
	$tags = get_the_tags();
	if ( ! empty( $tags ) ) : ?>
		<p class="entry-meta">
			<span class="tag-links">
				<?php foreach ( $tags as $tag ) : ?>
					<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" rel="tag"><?php echo esc_html( $tag->name ); ?></a>
				<?php endforeach; ?>
			</span><!-- .tag-links -->
		</p><!-- .entry-meta -->
	<?php endif; ?>	

    <?php
    $header_image_meta = corporate_education_header_image_meta_option();
	if ( is_array( $header_image_meta ) ) {
		$header_image_meta = $header_image_meta[1];
	} 
	if ( 'show-both' == $header_image_meta ) { 
		if ( has_post_thumbnail() ) : ?>
			<figure class="featured-image">
				<?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
			</figure>
		<?php endif; 
	} ?>

	<div class="entry-container">
		<header class="entry-header">
			<?php
			if ( 'post' === get_post_type() ) : ?>
			<p class="entry-meta">
				<?php corporate_education_posted_on(); ?>
			</p><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'corporate-education' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'corporate-education' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php corporate_education_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .entry-container -->
</article><!-- #post-## -->
