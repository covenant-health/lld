<?php
/**
 * Do not write code directly to this file. Place function-specific files
 * in the /inc directory in this theme directory and they will be loaded automatically
 */

$files = glob( get_template_directory() . '/inc/*.php' );

foreach( $files as $file ) {
	include_once( $file );
}