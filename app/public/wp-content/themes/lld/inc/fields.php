<?php
/**
 * Custom Field stuff
 */

// Add ACF options page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' => __('Covenant Health Theme Options'),
		'menu_title' => __('Covenant Options'),
		'menu_slug' => 'covenant-options',
	));

}
