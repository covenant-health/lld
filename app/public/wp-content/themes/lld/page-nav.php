<?php
/**
 * Template Name: Two Column Page With Navigation
 * Version    : 1.0.1
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
		<?php get_template_part( 'partial/content', 'headings' ); ?>
		<div class="row post-content">
			<?php get_template_part( 'partial/sidebar', 'nav'); ?>
			<?php get_template_part( 'partial/content', 'article' ); ?>
		</div>
	</main>

<?php endwhile; endif;
get_footer(); ?>
