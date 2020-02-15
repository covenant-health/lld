<?php
/**
 * Blog sidebar template
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : November 4, 2017
 * @version 2.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>

<aside class="col-xs-12 col-md-4" role="complementary">
	<?php if ( get_field( 'blog_sidebar_content' ) ) : ?>
		<div class="well">
			<?php the_field( 'blog_sidebar_content' ); ?>
		</div>
	<?php endif; ?>

	<div class="widget-sidebar well">
		<?php if ( is_active_sidebar( 'covenant-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'covenant-sidebar' ); ?>
		<?php else : ?>
			<!-- This content shows up if there are no widgets defined in the backend. -->
			<div class="alert alert-message">
				<p><?php _e("Please activate some widgets"); ?>.</p>
			</div>
		<?php endif; ?>
	</div> <!-- /sidebar -->
</aside> <!-- /aside -->