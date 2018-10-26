<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage gurukul-education
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-branding">
	<div class="container">
		<?php if ( ( gurukul_education_is_frontpage() || ( is_home() && is_front_page() ) ) && ! has_nav_menu( 'top' ) ) : ?>
		<a href="#content" class="menu-scroll-down"><span class="screen-reader-text"><?php esc_html_e( 'Scroll down to content', 'gurukul-education' ); ?></span></a>
	<?php endif; ?>
	</div>
</div>