<?php
/**
 * The template for displaying search forms in Foodie Review Blog
 *
 * @package Foodie Review Blog
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'foodie-review-blog' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'foodie-review-blog' ); ?>">
</form>