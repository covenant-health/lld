<?php
/**
 * Template Name: Front Page
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 24, 2017
 * @version 2.0.0
 * @package WordPress
 * @subpackage covenant
 */

get_header(); ?>

<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'partial/content', 'masthead' ); ?>

	<div class="container welcome-container">
		<main class="row">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-xs-12' ); ?>>
				<?php echo get_option('notification_message'); ?>
				<?php the_content(); ?>
				<hr>
			</article>
		</main>
	</div>

	<div class="container resources-container">

		<div class="row">
			<div class="col-md-4">
				<div class="well">
					<?php $services = get_field( 'services' ); if( $services ) : ?>
					<h3><?php echo $services['services_headline']; ?></h3>
						<?php dynamic_sidebar( 'lld-events-display' ); ?>
					<?php endif; ?>
				</div>
			</div> <!-- /services-col -->

			<div class="col-md-4">
				<div class="well">
					<?php $patients = get_field( 'patients' ); if( $patients ) : ?>
						<h3><?php echo $patients['patients_headline']; ?></h3>
						<?php echo $patients['patients_content']; ?>
					<?php endif; ?>

					<!-- Update loop -->
					<?php
					$update_args = array(
						'posts_per_page' => 3,
						'post_type'      => 'post',
						'category_name'  => 'quick-tips'
					);

					$update_query = new WP_Query( $update_args );

					if( $update_query->have_posts() ) : while( $update_query->have_posts() ) : $update_query->the_post(); ?>

						<h4><a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<p class="small">Posted on <time datetime="<?php echo get_the_date( 'c'); ?>"><?php echo get_the_date( 'F j, Y'); ?></time></p>
						<?php the_excerpt(); ?>

					<?php endwhile; else : ?>

						<p>No posts were found.</p>

					<?php endif; wp_reset_postdata(); ?>
				</div>
			</div> <!-- /account-col -->

			<div class="col-md-4">
				<div class="well">
					<?php $updates = get_field( 'updates' ); if( $updates ) : ?>
						<h3><?php echo $updates['update_headline']; ?></h3>
						<?php echo $updates['update_content']; ?>
					<?php endif; ?>

					<!-- Update loop -->
					<?php
					$update_args = array(
						'posts_per_page' => 1,
						'post_type'      => 'post',
						'category_name'  => 'director-update'
					);

					$update_query = new WP_Query( $update_args );

					if( $update_query->have_posts() ) : while( $update_query->have_posts() ) : $update_query->the_post(); ?>

						<h4><a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<p class="small">Posted on <time datetime="<?php echo get_the_date( 'c'); ?>"><?php echo get_the_date( 'F j, Y'); ?></time></p>
						<p class="small">Posted on <time datetime="<?php echo get_the_date( 'c'); ?>"><?php echo get_the_date( 'F j, Y'); ?></time></p>
						<?php the_excerpt(); ?>

					<?php endwhile; else : ?>

						<p>No posts were found.</p>

					<?php endif; wp_reset_postdata(); ?>
				</div>
			</div> <!-- /account-col -->
		</div> <!-- /resources-row -->

	</div> <!-- /container.resources-container -->

	<!--<div class="jumbotron lower-masthead" style="background-image: url(<?php /*the_field( 'lower_hero_image' ) */?>)">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-md-6">
					<div class="well translucent-well">
						<?php /*the_field( 'call_to_action' ) */?>
					</div>
				</div>
			</div>
		</div>
	</div>--> <!-- /jumbotron.lower-masthead -->

<?php endwhile; endif; ?>

<?php get_template_part( 'partial/content', 'loop' ); ?>

<?php get_footer(); ?>
