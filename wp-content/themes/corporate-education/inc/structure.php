<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

$options = corporate_education_get_theme_options();


if ( ! function_exists( 'corporate_education_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Corporate Education 0.1
	 */
	function corporate_education_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'corporate_education_doctype', 'corporate_education_doctype', 10 );


if ( ! function_exists( 'corporate_education_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'corporate_education_before_wp_head', 'corporate_education_head', 10 );

if ( ! function_exists( 'corporate_education_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'corporate-education' ); ?></a>

		<?php
	}
endif;

add_action( 'corporate_education_page_start_action', 'corporate_education_page_start', 10 );

if ( ! function_exists( 'corporate_education_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'corporate_education_page_end_action', 'corporate_education_page_end', 10 );

if ( ! function_exists( 'corporate_education_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_header_start() { ?>
			<header id="masthead" class="site-header" role="banner">
		<?php
	}
endif;
add_action( 'corporate_education_header_action', 'corporate_education_header_start', 10 );

if ( ! function_exists( 'corporate_education_site_branding_wrapper_start' ) ) :
	/**
	 * Site branding wrapper start html codes
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_site_branding_wrapper_start() {
		?>
		<div class="site-branding-wrapper">
                <div class="wrapper">
		<?php
	}
endif;
add_action( 'corporate_education_header_action', 'corporate_education_site_branding_wrapper_start', 20 );

if ( ! function_exists( 'corporate_education_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_site_branding() {
		?>
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<div class="site-logo">
            		<?php echo get_custom_logo(); ?>
          		</div>
      		<?php endif; ?>

			<div id="site-details">
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- #site-details -->
		</div><!-- .site-branding -->
		<?php
		if ( is_active_sidebar( 'header-widget' ) ) {
			echo '<div class="widget-area">';
			dynamic_sidebar( 'header-widget' );
			echo '</div><!-- .widget -->';
		}
	}
endif;
add_action( 'corporate_education_header_action', 'corporate_education_site_branding', 30 );

if ( ! function_exists( 'corporate_education_site_branding_wrapper_end' ) ) :
	/**
	 * Site branding end html codes
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_site_branding_wrapper_end() {
		?>
			</div><!-- .wrapper -->
        </div><!-- .site-branding-wrapper -->
		<?php
	}
endif;
add_action( 'corporate_education_header_action', 'corporate_education_site_branding_wrapper_end', 40 );

if ( ! function_exists( 'corporate_education_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_site_navigation() {
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="wrapper">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
				</button>
				<?php wp_nav_menu( array( 
						'theme_location' 	=> 'primary', 
						'menu_id' 			=> 'primary-menu',
						'menu_class' 		=> 'menu',
					) ); 
				?>
			</div><!-- .wrapper -->
		</nav><!-- #site-navigation -->
		<?php
	}
endif;
add_action( 'corporate_education_header_action', 'corporate_education_site_navigation', 50 );


if ( ! function_exists( 'corporate_education_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_header_end() {
		?>
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'corporate_education_header_action', 'corporate_education_header_end', 60 );

if ( ! function_exists( 'corporate_education_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'corporate_education_content_start_action', 'corporate_education_content_start', 10 );

if ( ! function_exists( 'corporate_education_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_content_end() {
		?>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'corporate_education_content_end_action', 'corporate_education_content_end', 10 );

if ( ! function_exists( 'corporate_education_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since Corporate Education 0.1
	 */
	function corporate_education_add_breadcrumb() {
		$options = corporate_education_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		// Bail if Home Page.
		if ( is_front_page() || is_home() ) {
			return;
		}

		echo '<div id="breadcrumb-list" class="os-animation" data-os-animation="fadeInUp">
			<div class="container">';
				/**
				 * corporate_education_simple_breadcrumb hook
				 *
				 * @hooked corporate_education_simple_breadcrumb -  10
				 *
				 */
				do_action( 'corporate_education_simple_breadcrumb' );
		echo '</div><!-- .container -->
			</div><!-- #breadcrumb-list -->';
		return;
	}

endif;
add_action( 'corporate_education_add_breadcrumb', 'corporate_education_add_breadcrumb' , 20 );


if ( ! function_exists( 'corporate_education_footer_start' ) ) :
	/**
	 * Site footer start
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="blue-shape top move-up left"></div>
		<?php
	}
endif;
add_action( 'corporate_education_footer', 'corporate_education_footer_start', 10 );


if ( ! function_exists( 'corporate_education_footer_widget' ) ) :
	/**
	 * Site footer widgets
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_footer_widget() {
		$options = corporate_education_get_theme_options();
		$footer_sidebar_data = corporate_education_footer_sidebar_class();
		$footer_sidebar 	 = $footer_sidebar_data['active_sidebar'];
		$footer_class 		 = $footer_sidebar_data['class'];
		if ( empty( $footer_sidebar ) ) {
			return;
		} ?>
        <div class="footer-widget-area page-section <?php echo esc_attr( $footer_class ); ?>">
                <div class="wrapper">
		      	<?php foreach( $footer_sidebar as $active_widget ) : ?>
					<div class="hentry">
			      		<?php 
			      		if ( is_active_sidebar( esc_html( $active_widget ) ) ){
			      			dynamic_sidebar( esc_html( $active_widget ) );
			      		}
			      		?>
			      	</div>
		      	<?php endforeach; ?>
	      	</div><!-- .wrapper -->  
            
        </div><!-- .footer-widget-area -->
		<?php
	}
endif;
add_action( 'corporate_education_footer', 'corporate_education_footer_widget', 10 );


if ( ! function_exists( 'corporate_education_footer_site_info' ) ) :
	/**
	 * Site footer site info
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_footer_site_info() {
		$options = corporate_education_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; ?>
		
		<div class="site-info">
			<?php if ( true === $options['scroll_top_visible'] ) : ?>   
	            <div class="backtotop"><i class="fa fa-angle-up"></i></div><!-- .backtotop -->
	        <?php endif; ?>
            <div class="wrapper">
                <p>
					<?php echo corporate_education_santize_allow_tag( $options['copyright_text'] ); ?>
					<span> | </span>
					<?php printf( esc_html__( '%1$s by %2$s', 'corporate-education' ), 'Corporate Education', '<a href="' . esc_url( 'https://www.themepalace.com/' ) . '" rel="designer" target="_blank">Theme Palace</a>' ); 
						if ( function_exists( 'the_privacy_policy_link' ) ) {
						the_privacy_policy_link( '<span> | </span>' );
					} ?>
				</p>
            </div><!-- .wrapper -->    
        </div><!-- .site-info -->
	<?php
	}
endif;
add_action( 'corporate_education_footer', 'corporate_education_footer_site_info', 10 );


if ( ! function_exists( 'corporate_education_footer_end' ) ) :
	/**
	 * Site footer end
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_footer_end() {
		?>
		</footer><!-- #colophon -->
		<?php
	}
endif;
add_action( 'corporate_education_footer', 'corporate_education_footer_end', 10 );

