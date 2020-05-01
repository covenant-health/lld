<?php
/**
 * Output the course content
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : February 17, 2020
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>
<article <?php post_class( 'col-xs-12  col-md-8' ); ?>>
	<div class="row">
		<div class="col-xs-12 course-taxes">
			<?php
			$programs = get_the_terms( $post->ID, 'program' );
			if ( ! is_wp_error( $programs ) ) : ?>
				<div class="course-tax"><p><span class="tax-name">Programs</span><br>
						<?php foreach ( $programs as $program ) {
							echo $program->name . '<br>';
						} ?>
				</div>
			<?php endif; ?>
			<?php
			$paths = get_the_terms( $post->ID, 'path' );
			if ( ! is_wp_error( $paths ) ) : ?>
				<div class="course-tax"><p><span class="tax-name">Paths</span><br>
						<?php foreach ( $paths as $path ) {
							echo $path->name . '<br>';
						} ?>
				</div>
			<?php endif; ?>
			<?php
			$locations = get_the_terms( $post->ID, 'location' );
			if ( ! is_wp_error( $locations ) ) : ?>
				<div class="course-tax"><p><span class="tax-name">Held at</span><br>
						<?php foreach ( $locations as $location ) {
							echo $location->name . '<br>';
						} ?>
				</div>
			<?php endif; ?>
			<?php
			$instructors = get_the_terms( $post->ID, 'instructor' );
			if ( ! is_wp_error( $instructors ) ) : ?>
				<div class="course-tax"><p><span class="tax-name">Taught by</span><br>
						<?php foreach ( $instructors as $instructor ) {
							echo $instructor->name . '<br>';
						} ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php the_content(); ?>
</article>
<aside class="col-xs-12 col-md-4">
	<?php if ( get_field( 'enrollment_link' ) ) : ?>
		<div class="enroll-cta">
			<a href="<?php the_field( 'enrollment_link' ); ?>" class="btn btn-primary btn-enroll">Enroll
				for <?php the_title(); ?></a>
		</div>
	<?php endif; ?>
	<?php if ( get_field( 'course_duration' ) ) : ?>
		<div class="well course-duration">
			<h3>Course Duration</h3>
			<p><?php the_field( 'course_duration' ); ?></p>
		</div>
	<?php endif; ?>
	<?php

	$args = array(
			'order'          => 'asc',
			'orderby'        => 'date',
			'post_type'      => 'course',
			'posts_per_page' => 3,
			'post__not_in'   => array( $post->ID ),
			'tax_query'      => array(
					array(
							'taxonomy' => 'program',
							'field'    => 'id',
							'terms'    => wp_get_post_terms( $post->ID, 'program', array( 'fields' => 'ids' ) ),
							'operator' => 'IN'
					),
			),
	);

	$lookie_here = new WP_Query( $args );

	if ( $lookie_here->have_posts() ) : ?>
		<h3>Related Courses</h3>
		<ul class="other-courses">
			<?php while ( $lookie_here->have_posts() )  : $lookie_here->the_post() ?>
				<li>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					<?php the_excerpt(); ?>
				</li>
			<?php endwhile; ?>
		</ul>
	<?php endif;
	wp_reset_postdata(); ?>
</aside>
