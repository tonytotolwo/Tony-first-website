<?php
/**
 * The template for displaying search form
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url('/') ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'corporate-education' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search', 'corporate-education' ) ?>" value="<?php echo get_search_query(); ?>" name="s">
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php esc_html_e( 'Search', 'corporate-education' ); ?></span><i class="fa fa-search"></i></button>
</form><!--.search-form-->