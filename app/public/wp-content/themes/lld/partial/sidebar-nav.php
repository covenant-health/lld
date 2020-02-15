<?php
/**
 * Output the sidebar navigation
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>
<aside class="col-xs-12 col-md-4 pull-right" role="complementary">
	<?php if( get_field( 'contact_area' ) ) : ?>
		<div class="well">
			<?php the_field( 'contact_area' ); ?>
		</div>
	<?php endif; ?>
	<div class="sidebar nav-sidebar">
		<?php the_field('sidebar_content'); ?>
	</div> <!-- /sidebar -->
</aside>