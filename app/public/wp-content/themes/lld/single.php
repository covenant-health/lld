<?php
/**
 * Single blog post template
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
			<?php get_template_part( 'partial/content', 'article' ); ?>
			<?php get_sidebar(); ?>
		</div>
	</main>

<?php endwhile; endif; get_footer(); ?>
