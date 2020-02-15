<?php
// change the logo on the login page
// so that it uses the theme logo instead
// of the WordPress logo
function change_login_logo() {

	if ( file_exists( trailingslashit( get_template_directory() ) . 'img/logo.png' ) ) {

		echo '<style type="text/css">
		    .login h1 a {
                background-image: url(' . trailingslashit( get_template_directory_uri() ) . 'img/logo.png) !important;
                background-size: contain !important;
                background-position: center center;
                background-repeat: no-repeat;
                width: 80%;
            }
            </style>';

	}
}
add_action( 'login_head', 'change_login_logo' );

// link the logo to the front page of the website
// to which the user is logging in
function change_login_logo_url() {

	return get_bloginfo( 'url' );

}
add_filter( 'login_headerurl', 'change_login_logo_url' );

// set the blog name as title
// text for the login image
function change_login_logo_title() {

	return get_bloginfo( 'name' );

}
add_filter( 'login_headertitle', 'change_login_logo_title' );

// Add custom message to WordPress login page
function alter_login_message( $message ) {
	if ( empty($message) ){
		return '<p style="text-align: center;">This tool is intended for authorized users only.</p>';
	} else {
		return $message;
	}
}
add_filter( 'login_message', 'alter_login_message' );
