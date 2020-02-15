<?php
/**
 * Set default thumbnail for new posts
 */

function default_post_thumbnail( $post_id ) {
	// get the thumbnail
	$post_thumbnail = get_post_meta( $post_id, $key = '_thumbnail_id', $single = true );
	/*  // verify that it is actually a post and not a page
		if (!is_page()) {
			echo('This is a post.');
		}*/
	// verify the post is not a revision
	if ( ! wp_is_post_revision( $post_id ) ) {
		//check if the thumbnail exists
		if ( empty( $post_thumbnail ) ) {
			// add the default thumbnail to the post
			update_post_meta( $post_id, $meta_key = '_thumbnail_id', $meta_value = '1006' );
		}
	}
}
add_action( 'save_post', 'default_post_thumbnail' );