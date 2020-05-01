<?php
/**
 * Output the post thumbnail where necessary, using the default_featured_img field
 * as a fallback in the event that no post thumbnail has been selected.
 */

function show_thumbnail() {
	global $post;

	$t_id = get_post_thumbnail_id( $post->ID );
	$thumbnail = wp_get_attachment_image_url( $t_id, 'full' );
	$alt = get_post_meta( $t_id, '_wp_attachment_image_alt', true );
	$fallback  = get_field( 'default_featured_img', 'options' );

	if ( ! empty( $thumbnail ) ) {
		echo '<img src="' . $thumbnail . '" alt="' . $alt . '" class="img-responsive">';
	} else {
		echo '<img src="' . esc_url( $fallback['url'] ) . '" alt="' . esc_attr( $fallback['alt'] ) . '" class="img-responsive">';
	}
}
