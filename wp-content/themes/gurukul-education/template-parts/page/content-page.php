<?php
/**
 * Template part for displaying page content in page.php
 * @package WordPress
 * @subpackage gurukul-education
 * @since 1.0
 * @version 1.4
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php gurukul_education_edit_link( get_the_ID() ); ?>
	</header>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gurukul-education' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article>
