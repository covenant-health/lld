<?php
/**
 * Output the content sidebar
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 31, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>
<aside class="col-xs-12 col-md-4" role="complementary">
	<?php get_template_part( 'partial/content', 'contact' ); ?>
	<div class="well">
		<?php the_field( 'sidebar_content' ); ?>
	</div>
</aside>
