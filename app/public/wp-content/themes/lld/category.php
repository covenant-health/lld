<?php
/**
 * Category archive template
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 31, 2017
 * @version 2.0.0
 * @package WordPress
 * @subpackage covenant
 */

get_header();?>

<main class="container">
	<?php get_template_part( 'partial/content', 'breadcrumbs' ); ?>
	<?php get_template_part( 'partial/content', 'headings' ); ?>
	<div class="row post-content">
		<article <?php post_class('col-md-8'); ?>>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h3 id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
				<small class="posted-on">Posted on <?php echo get_the_date( get_option('date_format') ); ?></small>
				<?php the_excerpt(); ?>
				<hr>

			<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>

			<?php
			the_posts_pagination( array(
				'mid_size'  => 6,
				'prev_text' => __( '<i class="fa fa-chevron-left" aria-hidden="true"></i>' , 'covenant' ),
				'next_text' => __( '<i class="fa fa-chevron-right" aria-hidden="true"></i>', 'covenant' )
			) );
			?>

		</article>

		<?php get_sidebar(); ?>
	</div>
</main>

<?php get_footer(); ?>
