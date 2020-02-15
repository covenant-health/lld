<?php
/**
 * Template Name: Landing Page with Hero Image and Navigation Sidebar
 * Version    : 1.3.0
 * Author     : John Galyon
 * Author URI : http://www.covenanthealth.com
 * @version 2.0.0
 * @package WordPress
 * @subpackage covenant
 */
get_header();
if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'partial/content', 'masthead' ); ?>

	<main class="container">
		<?php get_template_part( 'partial/content', 'breadcrumbs' ); ?>
		<?php get_template_part( 'partial/content', 'lead' ); ?>
		<div class="row post-content">
			<?php get_template_part( 'partial/sidebar', 'nav'); ?>
			<?php get_template_part( 'partial/content', 'article' ); ?>
		</div>
	</main>

<?php endwhile; endif;
get_footer(); ?>
