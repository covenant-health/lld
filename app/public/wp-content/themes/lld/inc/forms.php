<?php
// Remove form entry after submission
add_action( 'gform_after_submission', 'remove_form_entry' );
function remove_form_entry( $entry ) {
	GFAPI::delete_entry( $entry['id'] );
}