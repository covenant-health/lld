<?php
/**
 * Template Name: Two Column Page With Content
 * Version    : 1.1.5
 * Author     : John Galyon
 * Author URI : http://www.covenanthealth.com
 * @version 2.0.0
 * @package WordPress
 * @subpackage covenant
 */

get_header();
if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

	<main class="container">
		<?php get_template_part( 'partial/content', 'breadcrumbs' ); ?>
		<?php get_template_part( 'partial/content', 'heading' ); ?>
		<div class="row post-content">
			<?php if ( get_field( 'contact_area' ) ) : ?>
				<aside class="col-xs-12 visible-xs" role="complementary">
					<?php get_template_part( 'partial/content', 'contact' ); ?>
				</aside>
			<?php endif; ?>
			<?php get_template_part( 'partial/sidebar', 'content' ); ?>
		</div>
	</main>

<?php endwhile; endif;
get_footer(); ?>

