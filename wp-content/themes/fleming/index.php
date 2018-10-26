<?php get_header(); ?>

<main id="site-main">

<?php if ( is_front_page() && !is_paged() ) { ?>
	<?php if ( is_active_sidebar('homepage-content-widgets') ) { ?>
	<div id="site-homepage-widgets">
	
		<?php if ( is_active_sidebar('homepage-content-widgets') ) { dynamic_sidebar( 'homepage-content-widgets' ); } ?>

	</div><!-- #site-homepage-widgets --><?php }
}
?>

	<div class="site-section-wrapper site-section-wrapper-main">

		<div id="site-page-columns">

			<?php 
			// Function to display the SIDEBAR (if not hidden)
			academiathemes_helper_display_page_sidebar_column(); ?><!-- ws fix

			--><div id="site-column-main" class="site-column site-column-main">
				
				<div class="site-column-main-wrapper clearfix">

					<?php

					// Function to display the START of the content column markup
					academiathemes_helper_display_page_content_wrapper_start(); ?>

					<?php 
					if ( have_posts() ) { 
						$i = 0; 
					
						if ( is_home() && ! is_front_page() ) { ?>
						<h1 class="page-title archives-title"><?php single_post_title(); ?></h1>
						<?php } ?>

						<?php if ( is_home() ) { ?><p class="page-title archives-title"><?php esc_html_e('Recent Posts','fleming'); ?></p><?php } ?>

						<hr />

						<?php get_template_part('loop');

					}

					// Function to display the END of the content column markup
					academiathemes_helper_display_page_content_wrapper_end();

					// Function to display the SECONDARY SIDEBAR (if not hidden)
					academiathemes_helper_display_page_sidebar_secondary(); ?>

				</div><!-- .site-column-wrapper .site-content-wrapper .clearfix -->
			</div><!-- #site-column-main .site-column .site-column-main -->

		</div><!-- #site-page-columns -->

	</div><!-- .site-section-wrapper .site-section-wrapper-main -->

</main><!-- #site-main -->

<?php get_footer(); ?>