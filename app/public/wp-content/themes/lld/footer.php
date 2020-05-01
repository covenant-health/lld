<?php
/**
 * Footer template
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 30, 2017
 * @version 2.0.0
 * @package WordPress
 * @subpackage covenant
 */

$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo_img       = wp_get_attachment_image_src( $custom_logo_id, 'full' );
?>

</div>
</div>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-3 brand-section pull-right">
				<p>
					<a href="<?php echo home_url(); ?>">
						<img src="<?php the_field( 'site_logo', 'options' ); ?>"
						     alt="<?php echo get_bloginfo( 'name' ); ?>"
						     title="<?php echo get_bloginfo( 'name' ); ?>"></a><br>
					<a href="<?php echo site_url( '/wp-admin/' ); ?>">&copy;</a> <?php copyright( 'auto' ); ?> <?php echo get_bloginfo( 'name' );
					?><br>
					<?php if ( $physical_address = get_field('physical_address', 'options') ): ?>
						<?php echo $physical_address; ?>
					<?php endif; ?>
				</p>
			</div> <!-- /.brand-section -->
			<div class="col-xs-12 col-sm-8 col-md-9 link-section pull-left">
				<div class="row">
					<div class="col-xs-12 social-links-col">
						<?php if( have_rows('social_media_accounts', 'options') ): ?>
						<ul class="social-links">
							<?php while( have_rows('social_media_accounts', 'options') ): the_row(); ?>
								<li><a href="<?php the_sub_field('social_media_url', 'options'); ?>">
								<?php if ( $social_media_icon = get_sub_field('social_media_icon', 'options') ): ?>
									<?php echo $social_media_icon; ?>
								<?php endif; ?>
								</a></li>
							<?php endwhile; ?>
						</ul>
						<?php endif; ?>
					</div> <!-- /.social-links-col -->
					<div class="col-xs-12 footer-links-col">
						<ul id="menu-footer-links" class="footer-links">
							<li id="menu-item-29"
							    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-29"><a
									href="http://www.covenanthealth.com/physician-resources/"><strong>Physician
										Resources</strong></a></li>
							<li id="menu-item-30"
							    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-30"><a
									href="http://www.covenanthealth.com/employees/"><strong>Employee Resources</strong></a>
							</li>
							<li id="menu-item-31"
							    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-31"><a
									href="http://www.covenanthealth.com/vendor-resources/"><strong>Vendor
										Resources</strong></a></li>
							<li id="menu-item-32"
							    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-32"><a
									href="https://www.covenanthealth.com/mycovenanthealth/">Secure Patient Portal</a>
							</li>
							<li id="menu-item-33"
							    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-33"><a
									href="http://www.covenanthealth.com/press-room/">Press Room</a></li>
							<li id="menu-item-34"
							    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-34"><a
									href="http://www.covenanthealth.com/terms-of-use/">Terms of Use &#038;
									Disclaimer</a></li>
							<li id="menu-item-35"
							    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-35"><a
									href="http://www.covenanthealth.com/privacy-notice/">Privacy Notice</a></li>
							<li id="menu-item-36"
							    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-36"><a
									href="http://library.covenanthealth.com/">Health Library</a></li>
							<li id="menu-item-37"
							    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-37"><a
									href="https://www.covenanthealth.com/civil-rights-notice/">Civil Rights Notice</a>
							</li>
							<li id="menu-item-38"
							    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-38"><a
									href="https://www.covenanthealth.com/">Covenant Health</a></li>
						</ul>
					</div> <!-- /.footer-links-col -->
				</div> <!-- /.row -->
			</div> <!-- /.link-section -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
	<div class="footer-disclaimer">
		<div class="container ">
			<div class="row">
				<div class="col-xs-12">
					<p>This facility complies with applicable Federal civil rights laws and does not discriminate on the
						basis of race, color, national origin, age, disability, or sex. <a
							href="http://www.covenanthealth.com/civil-rights-notice/">Learn more about civil rights</a>
						at Covenant Health.</p>
				</div>
			</div>
		</div>
	</div>
</footer> <!-- /.footer -->
<?php wp_footer(); ?>
</body>
</html>
