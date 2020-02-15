<?php
/**
 * Output the contact section
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 31, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>
<?php if ( get_field( 'contact_area' ) ) : ?>
	<div class="well">
		<?php the_field( 'contact_area' ); ?>
	</div>
<?php endif; ?>