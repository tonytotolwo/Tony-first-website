<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage gurukul-education
 * @since 1.0
 * @version 1.4
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gurukul-education' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>

		<div class="row padd0">
			<div class="offset-md-6 col-md-6 mag0">
				<div class="social-icon">
					<?php if( get_theme_mod( 'gurukul_education_facebook','' ) != '') { ?>
						<a href="<?php echo esc_url( get_theme_mod('gurukul_education_facebook','') ); ?>"><i class="fab fa-facebook-f"></i></a>
					<?php } ?>
					<?php if( get_theme_mod( 'gurukul_education_twitter','' ) != '') { ?>
						<a href="<?php echo esc_url( get_theme_mod('gurukul_education_twitter','') ); ?>"><i class="fab fa-twitter"></i></a>
					<?php } ?>
					<?php if( get_theme_mod( 'gurukul_education_googleplus','' ) != '') { ?>
						<a href="<?php echo esc_url( get_theme_mod('gurukul_education_googleplus','') ); ?>"><i class="fab fa-google-plus-g"></i></i></a>
					<?php } ?>
					<?php if( get_theme_mod( 'gurukul_education_linkdin','' ) != '') { ?>
						<a href="<?php echo esc_url( get_theme_mod('gurukul_education_linkdin','') ); ?>"><i class="fab fa-linkedin-in"></i></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="main-top">
			<div class="row padd0">
				<div class="col-md-4">
					<div class="logo">
				        <?php if( has_custom_logo() ){ gurukul_education_the_custom_logo();
				           }else{ ?>
				          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				          <?php $description = get_bloginfo( 'description', 'display' );
				          if ( $description || is_customize_preview() ) : ?> 
				            <p class="site-description"><?php echo esc_html($description); ?></p>       
				        <?php endif; }?>
				    </div>
				</div>
				<div class="col-md-8 call-details">
					<div class="row padd0">
						<div class="col-md-4 offset-md-2">
							<?php if( get_theme_mod( 'gurukul_education_mail1','' ) != '') { ?>
								<p><?php echo esc_html( get_theme_mod('gurukul_education_mail',__('EMAIL SUPPORT','gurukul-education')) ); ?></p>
						        <p class="col-org"><?php echo esc_html( get_theme_mod('gurukul_education_mail1',__('support@example.com','gurukul-education')) ); ?></p>
						    <?php } ?>
					   	</div>
					   	<div class="col-md-6">
					   		<?php if( get_theme_mod( 'gurukul_education_call1','' ) != '') { ?>
								<p><?php echo esc_html( get_theme_mod('gurukul_education_call',__('CALL SUPPORT','gurukul-education')) ); ?></p>
						        <p class="col-org"><?php echo esc_html( get_theme_mod('gurukul_education_call1',__('0800.123.9875','gurukul-education')) ); ?></p>
						    <?php } ?>
					   	</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="theme-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-9">
							<?php if ( has_nav_menu( 'top' ) ) : ?>
								<div class="navigation-top">
									<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
								</div>
							<?php endif; ?>
						</div>
						<div class="search-box col-md-3">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>

	<?php

	if ( ( is_single() || ( is_page() && ! gurukul_education_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'gurukul-education-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
