<?php
/**
 * The template for displaying search results pages
 * @package WordPress
 * @subpackage gurukul-education
 * @since 1.0
 * @version 1.4
 */

get_header(); ?>

<div class="container">

	<header class="page-header">
		<?php if ( have_posts() ) : ?>
			<h1 class="entry-title"><?php printf( esc_html('Results For: %s', 'gurukul-education' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'gurukul-education' ); ?></h1>
		<?php endif; ?>
	</header>

	<div class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
	    $layout_option = get_theme_mod( 'gurukul_education_theme_options','Right Sidebar');
	    if($layout_option == 'Left Sidebar'){ ?>
	    	<div class="row">
		        <div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
		        <div class="content_area col-md-8 col-sm-8">
		    	<section id="post_section">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/post/content', get_post_format() );

						endwhile; // End of the loop.

						else : ?>

						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gurukul-education' ); ?></p>
						<?php
							get_search_form();

					endif;
					?>
					<div class="navigation">
		                <?php
		                    // Previous/next page navigation.
		                    the_posts_pagination( array(
		                        'prev_text'          => __( 'Previous page', 'gurukul-education' ),
		                        'next_text'          => __( 'Next page', 'gurukul-education' ),
		                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'gurukul-education' ) . ' </span>',
		                    ) );
		                ?>
		                <div class="clearfix"></div>
		            </div>
				</section>
				</div>
			</div>
			<div class="clearfix"></div>
		<?php }else if($layout_option == 'Right Sidebar'){ ?>
			<div class="row">
				<div class="content_area col-md-8 col-sm-8">
				<section id="post_section">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/post/content', get_post_format() );

						endwhile; // End of the loop.

						else : ?>

						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gurukul-education' ); ?></p>
						<?php
							get_search_form();

					endif;
					?>
					<div class="navigation">
		                <?php
		                    // Previous/next page navigation.
		                    the_posts_pagination( array(
		                        'prev_text'          => __( 'Previous page', 'gurukul-education' ),
		                        'next_text'          => __( 'Next page', 'gurukul-education' ),
		                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'gurukul-education' ) . ' </span>',
		                    ) );
		                ?>
		                <div class="clearfix"></div>
		            </div>
				</section>
				</div>
				<div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-2'); ?></div>
			</div>
		<?php }else if($layout_option == 'One Column'){ ?>
			<div class="row">
				<div class="content_area">
				<section id="post_section">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/post/content', get_post_format() );

						endwhile; // End of the loop.

						else : ?>

						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gurukul-education' ); ?></p>
						<?php
							get_search_form();

					endif;
					?>
					<div class="navigation">
		                <?php
		                    // Previous/next page navigation.
		                    the_posts_pagination( array(
		                        'prev_text'          => __( 'Previous page', 'gurukul-education' ),
		                        'next_text'          => __( 'Next page', 'gurukul-education' ),
		                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'gurukul-education' ) . ' </span>',
		                    ) );
		                ?>
		                <div class="clearfix"></div>
		            </div>
				</section>
				</div>
			</div>
		<?php }else if($layout_option == 'Three Columns'){ ?>	
			<div class="row">
				<div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>	
				<div class="content_area col-md-6 col-sm-6">
				<section id="post_section">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/post/content', get_post_format() );

						endwhile; // End of the loop.

						else : ?>

						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gurukul-education' ); ?></p>
						<?php
							get_search_form();

					endif;
					?>
					<div class="navigation">
		                <?php
		                    // Previous/next page navigation.
		                    the_posts_pagination( array(
		                        'prev_text'          => __( 'Previous page', 'gurukul-education' ),
		                        'next_text'          => __( 'Next page', 'gurukul-education' ),
		                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'gurukul-education' ) . ' </span>',
		                    ) );
		                ?>
		                <div class="clearfix"></div>
		            </div>
				</section>
				</div>
				<div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
			</div>
		<?php }else if($layout_option == 'Four Columns'){ ?>
			<div class="row">
				<div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
				<div class="content_area col-md-3">
				<section id="post_section">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/post/content', get_post_format() );

						endwhile; // End of the loop.

						else : ?>

						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gurukul-education' ); ?></p>
						<?php
							get_search_form();

					endif;
					?>
					<div class="navigation">
		                <?php
		                    // Previous/next page navigation.
		                    the_posts_pagination( array(
		                        'prev_text'          => __( 'Previous page', 'gurukul-education' ),
		                        'next_text'          => __( 'Next page', 'gurukul-education' ),
		                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'gurukul-education' ) . ' </span>',
		                    ) );
		                ?>
		                <div class="clearfix"></div>
		            </div>
				</section>
				</div>
				<div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
		        <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
	        </div>
	    <?php }else if($layout_option == 'Grid Layout'){ ?>
	    	<div class="row">
		    	<div class="content_area col-md-8 col-sm-8">
				<section id="post_section">
				<div class="row">
					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/post/grid-layout', get_post_format() );

						endwhile;

						else :

						get_template_part( 'template-parts/post/grid-layout', 'none' );

					endif;
					?>
					<div class="navigation">
		                <?php
		                    // Previous/next page navigation.
		                    the_posts_pagination( array(
		                        'prev_text'          => __( 'Previous page', 'gurukul-education' ),
		                        'next_text'          => __( 'Next page', 'gurukul-education' ),
		                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'gurukul-education' ) . ' </span>',
		                    ) );
		                ?>
		                <div class="clearfix"></div>
		            </div>
				</div>
				</section>
				</div>
				<div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-1'); ?></div>	
			</div>	
			<?php } ?>
			</main>
		</div>
</div>

<?php get_footer();
