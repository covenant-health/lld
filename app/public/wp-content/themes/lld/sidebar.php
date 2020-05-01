<?php
/**
 * Blog sidebar template
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : November 4, 2017
 * @version 2.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>

<aside class="col-xs-12 col-md-4" role="complementary">
	<?php if ( get_field( 'blog_sidebar_content' ) ) : ?>
		<div class="well">
			<?php the_field( 'blog_sidebar_content' ); ?>
		</div>
	<?php endif; ?>

	<div class="widget-sidebar well">
		<?php if ( is_active_sidebar( 'covenant-sidebar' ) ) : ?>
			<?php if ( is_single() ) :
				$categories = get_the_category();
				$args = array(
						'posts_per_page' => 3,
						'order'          => 'DESC',
						'orderby'        => 'date',
						'category__in'   => array( $categories[0]->term_id ),
						'post__not_in'   => get_the_ID()
			);

				$read_more = new WP_Query( $args );

				if ( $read_more->have_posts() ): ?>
					<li class="widget more-like-this">
						<h3 class="widget-title">More from <?php echo $categories[0]->name; ?></h3>
						<ul class="widget-list">
							<?php while ( $read_more->have_posts() ) : $read_more->the_post(); ?>
								<li>
									<a href="<?php the_permalink(); ?>"
									   title="Read <?php the_title(); ?>"><?php the_title(); ?></a>
									<span class="post-date">Posted on <time
												datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date( 'F j, Y' ); ?></span>
									<p><?php the_excerpt(); ?></p>
								</li>

							<?php endwhile; ?>
						</ul>
					</li>

				<?php endif;
				wp_reset_postdata(); endif; ?>
			<?php dynamic_sidebar( 'covenant-sidebar' ); ?>
		<?php else : ?>
			<!-- This content shows up if there are no widgets defined in the backend. -->
			<div class="alert alert-message">
				<p><?php _e( "Please activate some widgets" ); ?>.</p>
			</div>
		<?php endif; ?>
	</div> <!-- /sidebar -->
</aside> <!-- /aside -->
