<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Foodie Review Blog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<?php the_post_thumbnail(); ?>
	<div class="entry-content mt-3">
		<?php the_content(); ?>
	</div>
	<div class="clearfix"></div>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'foodie-review-blog' ),
			'after'  => '</div>',
		) );
	?>
	<?php edit_post_link( __( 'Edit', 'foodie-review-blog' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article>