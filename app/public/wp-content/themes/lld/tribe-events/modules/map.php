<?php
/**
 * Template used for maps embedded within single events and venues.
 * Override this template in your own theme by creating a file at:
 *
 *     [your-theme]/tribe-events/modules/map.php
 *
 * @var $index
 * @var $width
 * @var $height
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$style = apply_filters( 'tribe_events_embedded_map_style', "height: $height; width: $width", $index );
?>
<div id="tribe-events-gmap-<?php esc_attr_e( $index ) ?>" class="embed-responsive embed-responsive-16by9"></div><!-- #tribe-events-gmap-<?php esc_attr_e(
	$index ) ?> -->
