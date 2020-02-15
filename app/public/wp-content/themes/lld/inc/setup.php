<?php
/**
 * This file contains all the functions that are required for basic functional
 * changes for the theme.
 */

function theme_features() {
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'comment-form', 'comment-list' ) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_post_type_support( 'page', 'excerpt' );
}

add_action( 'after_setup_theme', 'theme_features' );

// Filter the default text displayed in the footer of the WordPress dashboard.
function admin_footer_update() {

	echo 'This tool is for authorized <a href="https://www.covenanthealth.com/">Covenant Health</a> employees only. Your IP address has been recorded.';
}

add_filter( 'admin_footer_text', 'admin_footer_update' );

// remove junk from head
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'start_post_rel_link', 10 );
remove_action( 'wp_head', 'parent_post_rel_link', 10 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10 );

// Put the image title back where it belongs.
function restore_image_title( $html, $id ) {

	$attachment = get_post( $id );
	$mytitle    = $attachment -> post_title;

	return str_replace( '<img', '<img title="' . $mytitle . '" ', $html );

}

add_filter( 'media_send_to_editor', 'restore_image_title', 15, 2 );

// emojis are stupid and we hate them
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Register Sidebars
function covenant_sidebar() {

	$args = array(
		'id'            => 'covenant-sidebar',
		'class'         => 'covenant-sidebar',
		'name'          => 'Covenant Health Sidebar',
		'description'   => 'Sidebar for use on blog index and post pages',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
	);
	register_sidebar( $args );

}

add_action( 'widgets_init', 'covenant_sidebar' );

function tune_robots( $output, $path ) {
	$output .= "Disallow: $path/wp-content/uploads/";

	return $output;
}

add_filter( 'robots_txt', 'tune_robots' );

/**
 * Add setting that administrators can check to set the site to maintenance
 * mode which only allows logged-in users to view the site
 */
/*function cov_maintenance_init() {

	// Create a new section on the general settings page
	// where we can stick some things specific to our implementation
	// that will make our lives easier.
	add_settings_section(
		'cov_settings_section',
		'Covenant Health Setup Options',
		'cov_settings_section_callback',
		'general'
	);

	// Add a field that contains a checkbox that, when checked
	// denotes that the administrator wishes to set the site in
	// maintenance mode.
	add_settings_field(
		'cov_set_maintenance',
		'Maintenance Mode',
		'cov_settings_maintenance_field_callback',
		'general',
		'cov_settings_section'
	);

	// Register the new setting
	register_setting(
		'general',
		'cov_set_maintenance'
	);
}

add_action( 'admin_init', 'cov_maintenance_init' );

function cov_settings_section_callback() {
	echo '<p>This section contains options specific to the Covenant Health implementation of WordPress.</p>';
}

function cov_settings_maintenance_field_callback() {

	echo '<label for="cov_set_maintenance">';
	echo '<input type="checkbox" id="cov_set_maintenance" name="cov_set_maintenance" value="1" class="code" ' . checked( 1, get_option( 'cov_set_maintenance' ), false ) . '>';
	echo ' Check this box to enable maintenance mode. When maintenance mode is enabled, only logged-in users may be able to view the site.</label>';
}

/**
 * Protect the site during setup by forcing users to log in
 * before they can view the site.
 *
 * @return string
 */
/*function restrict_login() {
	$maintenance_check = get_option( 'cov_set_maintenance' );

	$url = sprintf(
		"%s://%s%s",
		isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		$_SERVER['SERVER_NAME'],
		$_SERVER['REQUEST_URI']
	);

	if( $url == 'https://www.tnheartburnclinic.com/' && !is_user_logged_in() ) {

		auth_redirect();

	}
}
add_action( 'init', 'restrict_login' );*/

/*function restrict_login( $content ) {
	$maintenance_check = get_option( 'cov_set_maintenance' );

	if ( ! is_user_logged_in() && $maintenance_check === '1' ) {
		//auth_redirect();

		$content .= '<p>User is not logged in.</p>';
		$content .= '<p>Maintenance is switched on.</p>';
	}

	return $content;
}

add_action( 'the_content', 'restrict_login' );*/
