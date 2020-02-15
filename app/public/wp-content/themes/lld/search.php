<?php
/**
 * Search results template
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 31, 2017
 * @version 2.0.0
 * @package WordPress
 * @subpackage covenant
 */

get_header(); ?>

	<main class="container">
		<?php get_template_part( 'partial/content', 'breadcrumbs' ); ?>
		<?php get_template_part( 'partial/content', 'headings' ); ?>
		<div class="row post-content">
			<article <?php post_class('col-md-8'); ?>>
				<?php

				global $wp_query;

				$results = $wp_query->found_posts;

				if( have_posts() ) : while( have_posts() ) : the_post(); ?>
					<h2>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
					<?php if( get_post_type() === 'course' ) : ?>
						<p class="small"></p>
					<?php endif; ?>
					<?php the_excerpt(); ?>
				<?php endwhile; else : ?>
					<p class="lead"><?php printf( __( 'Sorry. No items were found while searching for &ldquo;%s&rdquo;.', 'covenant' ), get_search_query() ); ?></p>
				<?php endif; ?>

				<?php
				the_posts_pagination( array(
					'mid_size'  => 6,
					'prev_text' => __( '<i class="fa fa-chevron-left" aria-hidden="true"></i>' , 'covenant' ),
					'next_text' => __( '<i class="fa fa-chevron-right" aria-hidden="true"></i>', 'covenant' )
				) );
				?>
			</article>
		</div>
	</main>

<?php get_footer(); ?>
