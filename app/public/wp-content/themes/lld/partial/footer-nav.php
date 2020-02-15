<?php
/**
 * Output the footer navigation
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>

<div class="col-xs-12 footer-links-col">
	<?php
	$footer_nav_links = array(
		'theme_location'  => 'footer-links',
		'menu'            => 'footer-links',
		'container'       => false,
		'menu_class'      => 'footer-links',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'depth'           => 0
	);

	wp_nav_menu( $footer_nav_links );
	?>
</div> <!-- /.footer-links-col -->