<?php
/**
 * Automate the copyright year output.
 * @param string $year
 */
function copyright( $year = 'auto') {
	if( intval( $year ) == 'auto' ) $year = date( 'Y' );

	if( intval( $year ) != date( 'Y' ) ) {
		if( intval( $year ) > date( 'Y' ) ) {
			echo date( 'Y' );
		} else {
			echo intval( $year ) . ' – ' . date( 'Y' );
		}
	} else {
		echo intval( $year );
	}
}