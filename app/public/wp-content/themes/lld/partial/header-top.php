<?php
/**
 * Output the top links
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php
			$top_nav = array(
				'theme_location'  => 'top-links',
				'menu'            => 'top-links',
				'container'       => false,
				'menu_class'      => 'top-links',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'depth'           => 0,
				'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
			);

			wp_nav_menu( $top_nav );
			?>
		</div> <!-- /col-xs-12 -->
	</div> <!-- /row -->
</div> <!-- /top-links-container -->