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

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'partial/content', 'masthead' ); ?>

	<div class="container welcome-container">
		<main class="row">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-xs-12' ); ?>>
				<?php the_content(); ?>
				<hr>
			</article>
		</main>
	</div>

	<div class="container resources-container">

		<div class="resource-row">
			<div class="resource-col">
				<div>
					<?php $services = get_field( 'services' );
					if ( $services ) : ?>
						<h3><?php echo $services['services_headline']; ?></h3>
						<?php
						$args = array(
							'order'          => 'rand',
							'post_type'      => 'course',
							'post_status'    => 'publish',
							'posts_per_page' => 4,
							'meta_key'       => 'featured_course',
							'meta_value'     => 1

						);

						$feat_courses = new WP_Query( $args );

						if ( $feat_courses->have_posts() ) : while ( $feat_courses->have_posts() ) : $feat_courses->the_post(); ?>
							<h4><a href="<?php the_permalink(); ?>"
							       title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
							<?php show_thumbnail(); ?>
							<?php the_excerpt(); ?>
						<?php endwhile; else : ?>
							<p>No posts.</p>
						<?php endif;
						wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>
			</div> <!-- /services-col -->

			<div class="resource-col">
				<div>
					<?php $patients = get_field( 'patients' );
					if ( $patients ) : ?>
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

					if ( $update_query->have_posts() ) : while ( $update_query->have_posts() ) : $update_query->the_post(); ?>

						<h4><a href="<?php the_permalink(); ?>"
						       title="Read <?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<?php show_thumbnail(); ?>
						<p class="small">Posted on
							<time
								datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date( 'F j, Y' ); ?></time>
						</p>
						<?php the_excerpt(); ?>

					<?php endwhile; else : ?>

						<p>No posts were found.</p>

					<?php endif;
					wp_reset_postdata(); ?>
				</div>
			</div> <!-- /account-col -->

			<div class="resource-col">
				<div>
					<?php $updates = get_field( 'updates' );
					if ( $updates ) : ?>
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

					if ( $update_query->have_posts() ) : while ( $update_query->have_posts() ) : $update_query->the_post(); ?>

						<h4><a href="<?php the_permalink(); ?>"
						       title="Read <?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php show_thumbnail(); ?>
						</a>
						<p class="small">Posted on <time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date( 'F j, Y' ); ?></time></p>
						<?php the_excerpt(); ?>

					<?php endwhile; else : ?>

						<p>No posts were found.</p>

					<?php endif;
					wp_reset_postdata(); ?>
				</div>
			</div> <!-- /account-col -->
		</div> <!-- /resources-row -->

	</div> <!-- /container.resources-container -->

	<?php if( get_field( 'call_to_action' ) ) :
		$image = get_field( 'cta_background' ) ? get_field( 'cta_background' ) : get_bloginfo( 'stylesheet_directory' ) . '/img/default-masthead.jpg';
	?>
		<div class="jumbotron call-to-action" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.5) 100%), url(<?php echo $image; ?>);">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-6 col-md-offset-6">
						<?php the_field( 'call_to_action' ); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<!--<div class="jumbotron call-to-action" style="background-image: url(<?php /*the_field( 'lower_hero_image' ) */ ?>)">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-md-6">
					<div class="well translucent-well">
						<?php /*the_field( 'call_to_action' ) */ ?>
					</div>
				</div>
			</div>
		</div>
	</div>--> <!-- /jumbotron.lower-masthead -->

<?php endwhile; endif; ?>

<?php get_template_part( 'partial/content', 'loop' ); ?>

<?php get_footer(); ?>
