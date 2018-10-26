<?php
/**
 * Template for displaying search forms in gurukul-education
 *
 * @package WordPress
 * @subpackage gurukul-education
 * @since 1.0
 * @version 1.4
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label >
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'gurukul-education' ); ?></span>
	</label>
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'gurukul-education' ); ?>" value="<?php echo esc_attr(get_search_query() ); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo esc_attr_x( 'Search', 'submit button', 'gurukul-education' ); ?></button>
</form>