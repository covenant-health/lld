<?php
/**
 * Output content header
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>
<header class="row">
	<div class="col-xs-12">
		<?php content_heading(); ?>
		<?php if( tribe_is_event() && is_single() ) {
			echo tribe_events_event_schedule_details( $event_id, '<h2>', '</h2>' );
		} ?>
	</div>
</header>