<?php
/**
 * Output landing page lead content
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>
<?php if( get_field( 'landing_page_lead' ) ) : ?>
	<div class="row">
		<div class="col-xs-12">
			<div class="lead-copy">
				<?php the_field( 'landing_page_lead' ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
