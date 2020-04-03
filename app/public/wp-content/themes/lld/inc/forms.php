<?php
// Change default notification details
function change_from_email( $notification, $form, $entry ) {
	$notification['fromName'] = str_replace( '', 'Covenant Health', $notification[ 'fromName' ]);
	$notification['from'] = str_replace( '{admin_email}', 'noreply@covenanthealth.com', $notification[ 'from' ]);
	$notification['replyTo'] = str_replace( '', 'noreply@covenanthealth.com', $notification[ 'replyTo' ]);
	return $notification;
}

add_filter( 'gform_notification', 'change_from_email', 10, 3 );
