<?php
/**
 * Enqueue scripts and styles specific to this theme
 * We're also adding the server time at which the
 * file was uploaded so that we can do our own version
 * control for testing/cache-busting purposes
 */

// Fix the jquery version used on the front end of the site
if ( !is_admin() ) {
	add_action( 'wp_enqueue_scripts', function() {
		wp_deregister_script('jquery');

		wp_register_script('jquery', trailingslashit( get_template_directory_uri() ) . 'assets/jquery-3.2.1.min.js', false,
			'', false );

		wp_enqueue_script('jquery');
	});
}

function css_js_enqueue() {

	$js_path = trailingslashit( get_template_directory() ) . 'assets/main.min.js';
	$css_path = trailingslashit( get_template_directory() ) . 'assets/main.min.css';
	$vendor_path = trailingslashit( get_template_directory() ) . 'assets/vendor.min.js';
	$courses_path = trailingslashit( get_template_directory() ) . 'assets/courses.js';

	wp_enqueue_script(

		'vendor_js',
		trailingslashit( get_template_directory_uri() ) . 'assets/vendor.min.js',
		'jquery',
		filemtime($vendor_path),
		true

	);

	wp_enqueue_script(

		'main_js',
		trailingslashit( get_template_directory_uri() ) . 'assets/main.min.js',
		'vendor_js',
		filemtime($js_path),
		true

	);

	wp_enqueue_style(

		'main_css',
		trailingslashit( get_template_directory_uri() ) . 'assets/main.min.css',
		false,
		filemtime($css_path),
		'all'

	);

	if( is_page( 'courses' ) ) {
		wp_enqueue_script(

			'courses_js',
			trailingslashit( get_template_directory_uri() ) . 'assets/courses.js',
			'jquery',
			filemtime($courses_path),
			true

		);

		wp_localize_script(
			'courses_js',
			'courses',
			array(
				'post_id'   => get_the_ID(),
				'theme_uri' => get_stylesheet_directory_uri(),
				'rest_url'  => rest_url( 'wp/v2/' ),
			)
		);

	}

}
add_action( 'wp_enqueue_scripts', 'css_js_enqueue');


// Apply the theme's stylesheet to the visual editor
function editor_styles() {

	add_editor_style( trailingslashit( get_template_directory_uri() ) . 'assets/editor-style.css' );

}
add_action( 'init', 'editor_styles' );

/**
 * This strips the WordPress version number from script and stylesheet
 * source files loaded on the pages. As a security best practice
 * two filters are instantiated to call the function below at runtime:
 * One filter for loading stylesheets, another for loading scripts.
 */
function remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'remove_wp_ver_css_js', 9999 );
