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
?>

	</div>
</div>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-3 brand-section pull-right">
				<p>
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo trailingslashit( get_stylesheet_directory_uri() ); ?>img/logo.png"
						     alt="<?php echo get_bloginfo( 'name' ); ?>"
						     title="<?php echo get_bloginfo( 'name' ); ?>"></a><br>
					<a href="<?php echo site_url( '/wp-admin/' ); ?>">&copy;</a> <?php copyright( 'auto' ); ?> <?php echo get_bloginfo( 'name' );
					?><br>
					1400 Centerpoint Blvd., Suite 101<br>
					Knoxville, TN 37932<br>
				</p>
			</div> <!-- /.brand-section -->
			<div class="col-xs-12 col-sm-8 col-md-9 link-section pull-left">
				<div class="row">
					<?php get_template_part( 'partial/footer', 'social' ); ?>
					<?php get_template_part( 'partial/footer', 'nav' ); ?>
				</div> <!-- /.row -->
			</div> <!-- /.link-section -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
	<div class="footer-disclaimer">
		<div class="container ">
			<div class="row">
				<div class="col-xs-12">
					<p>This facility complies with applicable Federal civil rights laws and does not discriminate on the basis of race, color, national origin, age, disability, or sex. <a href="http://www.covenanthealth.com/civil-rights-notice/">Learn more about civil rights</a> at Covenant Health.</p>
				</div>
			</div>
		</div>
	</div>
</footer> <!-- /.footer -->
<?php wp_footer(); ?>
</body>
</html>
