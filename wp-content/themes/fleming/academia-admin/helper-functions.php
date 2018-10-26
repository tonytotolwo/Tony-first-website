<?php

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_breadcrumbs' ) ) {
	function academiathemes_helper_display_breadcrumbs() {

		// CONDITIONAL FOR "Breadcrumb NavXT" plugin OR Yoast SEO Breadcrumbs
		// https://wordpress.org/plugins/breadcrumb-navxt/

		if ( function_exists('bcn_display') ) { ?>
		<div class="site-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<p class="site-breadcrumbs-p"><?php bcn_display(); ?></p>
		</div><!-- .site-breadcrumbs--><?php }

		// CONDITIONAL FOR "Yoast SEO" plugin, Breadcrumbs feature
		// https://wordpress.org/plugins/wordpress-seo/
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<div class="site-breadcrumbs"><p class="site-breadcrumbs-p">','</p></div>');
		}

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_title' ) ) {
	function academiathemes_helper_display_title($post) {

		if( ! is_object( $post ) ) return;
		the_title( '<h1 class="page-title">', '</h1>' );
	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_entry_title' ) ) {
	function academiathemes_helper_display_entry_title($post) {

		if( ! is_object( $post ) ) return;
		return the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>', 0 );

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_datetime' ) ) {
	function academiathemes_helper_display_datetime($post) {
		
		if( ! is_object( $post ) ) return;

		return '<p class="entry-descriptor"><span class="entry-descriptor-span"><time class="entry-date published" datetime="' . esc_attr(get_the_date('c')) . '">' . get_the_date() . '</time></span></p>';

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_excerpt' ) ) {
	function academiathemes_helper_display_excerpt($post) {

		if( ! is_object( $post ) ) return;

		return '<p class="entry-excerpt">' . get_the_excerpt() . '</p>';

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_button_readmore' ) ) {
	function academiathemes_helper_display_button_readmore($post) {

		if( ! is_object( $post ) ) return;

		return '<p class="entry-actions"><span class="site-readmore-span"><a href="' . esc_url( get_permalink() ) . '" title="' . sprintf( /* translators: %s: Link tittle attribute */ esc_attr__( 'Continue Reading: %s', 'fleming' ), the_title_attribute( 'echo=0' ) ) . '" class="site-readmore-anchor" rel="bookmark">' . __('Read More','fleming') . '</a></span></p>';
		
	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_comments' ) ) {
	function academiathemes_helper_display_comments($post) {

		if( ! is_object( $post ) ) return;

		if ( comments_open() || get_comments_number() ) :

			echo '<hr /><div id="academia-comments"">';
			comments_template();
			echo '</div><!-- #academia-comments -->';

		endif;

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_content' ) ) {
	function academiathemes_helper_display_content($post) {

		if( ! is_object( $post ) ) return;

		echo '<div class="entry-content">';
			
			the_content();
			
			wp_link_pages(array('before' => '<p class="page-navigation"><strong>'.__('Pages', 'fleming').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));

		echo '</div><!-- .entry-content -->';

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_tags' ) ) {
	function academiathemes_helper_display_tags($post) {

		if( ! is_object( $post ) ) return;

		if ( get_post_type($post->ID) == 'post' ) { 
			the_tags( '<p class="post-meta post-tags"><strong>'.__('Tags', 'fleming').':</strong> ', ', ', '</p>');
		}

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_postmeta' ) ) {
	function academiathemes_helper_display_postmeta($post) {

		if( ! is_object( $post ) ) return;

		if ( get_post_type($post->ID) == 'post' ) { 

			echo '<p class="entry-tagline">';
			echo '<span class="post-meta-span"><time datetime="' . esc_attr(get_the_time("Y-m-d")) . '" pubdate>' . esc_html(get_the_time(get_option('date_format'))) . '</time></span>';
			echo '<span class="post-meta-span category">'; the_category(', '); echo '</span>';
			echo '</p><!-- .entry-tagline -->';

		}

	}
}

// Get Sidebar Position for Current Page or Post
if( ! function_exists( 'academiathemes_helper_get_sidebar_position' ) ) {
	function academiathemes_helper_get_sidebar_position() {

		$return_sidebar = '';
		$display_sidebar = esc_attr(get_theme_mod( 'theme-sidebar-position', 'both' ));

		if ( $display_sidebar == 'both' ) {
			$return_sidebar = 'page-sidebar-both';
		} elseif ( $display_sidebar == 'none' ) {
			$return_sidebar = 'page-sidebar-none';
		} elseif ( $display_sidebar == 'left' ) {
			$return_sidebar = 'page-sidebar-primary';
		} elseif ( $display_sidebar == 'right' ) {
			$return_sidebar = 'page-sidebar-secondary';
		}

		return $return_sidebar;
	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_page_sidebar_column' ) ) {
	function academiathemes_helper_display_page_sidebar_column() {

		$display_sidebar_position = academiathemes_helper_get_sidebar_position();

		if ( isset($display_sidebar_position) && ( $display_sidebar_position == 'page-sidebar-primary' || $display_sidebar_position == 'page-sidebar-both' ) ) {

		?><div id="site-aside-primary" class="site-column site-column-aside">
			<div class="site-column-wrapper site-aside-wrapper clearfix">

				<?php get_sidebar(); ?>

			</div><!-- .site-column-wrapper .site-aside-wrapper .clearfix -->
		</div><!-- #site-aside-primary .site-column site-column-aside --><?php
		}

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_page_sidebar_secondary' ) ) {
	function academiathemes_helper_display_page_sidebar_secondary() {

		$display_sidebar_position = academiathemes_helper_get_sidebar_position();

		if ( isset($display_sidebar_position) && ( $display_sidebar_position == 'page-sidebar-secondary' || $display_sidebar_position == 'page-sidebar-both' ) ) {

		?><div id="site-aside-secondary" class="site-column site-column-aside">
			<div class="site-column-wrapper site-aside-wrapper clearfix">

				<?php 
				if (is_active_sidebar('sidebar-secondary')) {
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar: Secondary') ) : ?> <?php endif;
				}
				?>

			</div><!-- .site-column-wrapper .site-aside-wrapper .clearfix -->
		</div><!-- #site-aside-secondary .site-column site-column-aside --><?php
		}

	}
}

// Content Column Wrapper Start
if( ! function_exists( 'academiathemes_helper_display_page_content_wrapper_start' ) ) {
	function academiathemes_helper_display_page_content_wrapper_start() {

		?><div id="site-column-content" class="site-column site-column-content"><div class="site-column-wrapper site-column-content-wrapper"><?php

	}
}

// Content Column Wrapper Start
if( ! function_exists( 'academiathemes_helper_display_page_content_wrapper_end' ) ) {
	function academiathemes_helper_display_page_content_wrapper_end() {

		?></div><!-- .site-column-wrapper .site-column-content-wrapper --></div><!-- .#site-column-content .site-column .site-column-content --><?php

	}
}