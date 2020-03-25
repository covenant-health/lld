<?php
/**
 * This file contains all the functions that are required for basic functional
 * changes for the theme.
 */

function theme_features() {
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'comment-form', 'comment-list' ) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 102,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
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

// Careers event front page display
function lld_events_display_init() {

	$args = array(
		'id'            => 'lld-events-display',
		'class'         => 'lld-events-display',
		'name'          => __( 'Display LLD Events', 'covenant' ),
		'description'   => __( 'This widget area is only for displaying events listing on the front page of the site', 'covenant' ),
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'lld_events_display_init' );
