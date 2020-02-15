<?php
/**
 * Fix the default read more functionality to
 * prevent doubling in the event of stupid crap
 */
function remove_default_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'remove_default_excerpt_more', 21 );

/**
 * Automate output read-more link after the excerpt
 * on the index page as well as category and tag
 * archive pages
 *
 * @param $excerpt
 *
 * @return string
 */
function manual_excerpt_more( $excerpt ) {
	$post = get_post();
	$icon = '<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>';

	if( !is_single() ) {
		$excerpt .= '&ensp;<a href="' . get_permalink( $post->ID ) . '" title="' . get_the_title() . '">' . $icon . '</a>';
	}

	return $excerpt;
}
add_filter( 'get_the_excerpt', 'manual_excerpt_more' );