<?php
require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function foodie_review_blog_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Posts Like Dislike', 'foodie-review-blog' ),
			'slug'             => 'posts-like-dislike',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'foodie_review_blog_register_recommended_plugins' );