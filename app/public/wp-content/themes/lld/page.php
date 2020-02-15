<?php
/**
 * Default page template
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 31, 2017
 * @version 2.0.0
 * @package WordPress
 * @subpackage covenant
 */

get_header(); if( have_posts() ) : while( have_posts() ) : the_post(); ?>

	<main class="container">
		<?php get_template_part( 'partial/content', 'breadcrumbs' ); ?>
		<?php get_template_part( 'partial/content', 'headings' ); ?>
		<div class="row post-content">
			<?php
			if ( is_page( 'courses' ) ) {
				get_template_part('partial/content', 'courses' );
			} else {
				if( get_field( 'contact_area' ) ) {
					echo '<aside class="col-xs-12 col-md-4 pull-right" role="complementary">';
						echo '<div class="well">';
							the_field( 'contact_area' );
						echo '</div>';
					echo '</aside>';
				}
				get_template_part( 'partial/content', 'article');
			}
			?>
		</div>
	</main>

<?php endwhile; endif; get_footer(); ?>
