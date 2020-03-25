<?php
/**
 * Register navbars for use in the theme.
 */

function nav_menus() {
	$locations = array(
		'footer-links' => 'Footer Navigation',
		'main-links'   => 'Main Navigation',
		'social-links' => 'Social Navigation',
		'top-links'    => 'Top Navigation'
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'nav_menus' );
