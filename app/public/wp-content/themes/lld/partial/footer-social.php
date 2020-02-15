<?php
/**
 * Output the footer social navigation
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>

<div class="col-xs-12 social-links-col">
	<?php
	$social_links= array(
		'theme_location'  => 'social-links',
		'menu'            => 'social-links',
		'container'       => false,
		'menu_class'      => 'social-links',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'depth'           => 0
	);

	wp_nav_menu( $social_links );
	?>
</div> <!-- /.social-links-col -->