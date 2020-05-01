<?php
/**
 * Output the article content for the courses page
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : January 24, 2020
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>
<article <?php post_class( 'col-xs-12' ); ?>>
	<div class="row page-content">
		<div class="col-xs-12">
			<?php the_content(); ?>
		</div>
	</div>
	<div class="course-search">
		<div class="form-group search-input">
			<label for="search" class="sr-only">Search for a course</label>
			<input type="text" name="search" id="search" autocomplete="off" class="form-control course-search"
			       placeholder="Search for a course">
		</div>
		<div class="form-group location-select">
			<label for="location" class="sr-only">Choose a location</label>
			<select name="location" id="location" class="form-control location-select">
				<option value="" default>All locations</option>
				<?php
				$locations = get_terms(
					array(
						'fields'     => 'all',
						'order'      => 'ASC',
						'orderby'    => 'name',
						'post_type'  => 'course',
						'taxonomy'   => 'location',
						'hide_empty' => true,
					)
				);

				if ( ! empty( $locations ) && ! is_wp_error( $locations ) ) {
					foreach ( $locations as $location ) {
						echo '<option value="' . $location->term_id . '">' . $location->name . '</option>';
					}
				}
				?>
			</select>
		</div>
		<div class="form-group program-select">
			<label for="program" class="sr-only">Choose a Program</label>
			<select name="program" id="program" class="form-control program-select">
				<option value="" default>All programs</option>
				<?php
				$programs = get_terms(
					array(
						'fields'     => 'all',
						'order'      => 'ASC',
						'orderby'    => 'name',
						'post_type'  => 'course',
						'taxonomy'   => 'program',
						'hide_empty' => true,
					)
				);

				if ( ! empty( $programs ) && ! is_wp_error( $programs ) ) {
					foreach ( $programs as $program ) {
						echo '<option value="' . $program->term_id . '">' . $program->name . '</option>';
					}
				}
				?>
			</select>
		</div>
		<div class="form-group path-select">
			<label for="path" class="sr-only">Choose a Path</label>
			<select name="path" id="path" class="form-control program-select">
				<option value="" default>All paths</option>
				<?php
				$paths = get_terms(
					array(
						'fields'     => 'all',
						'order'      => 'ASC',
						'orderby'    => 'name',
						'post_type'  => 'course',
						'taxonomy'   => 'path',
						'hide_empty' => true,
					)
				);

				if ( ! empty( $paths ) && ! is_wp_error( $paths ) ) {
					foreach ( $paths as $path ) {
						echo '<option value="' . $path->term_id . '">' . $path->name . '</option>';
					}
				}
				?>
			</select>
		</div>
		<div class="buttons">
			<button id="filter" type="submit" class="btn btn-primary btn-submit">Filter</button>
			<button id="reset" type="reset" href="javascript:void(0);" class="btn btn-clear btn-default">Reset</button>
		</div>
		<div class="row user-msg">
			<div class="col-xs-12">
				<p></p>
			</div>
		</div>
	</div>

	<?php
	$args = array(
		'post_status' => 'publish',
		'post_type'   => 'course'
	);

	$courses = new WP_Query( $args );

	if ( $courses->have_posts() ) : ?>
		<div class="courses-container">
			<div class="courses-results">
				<!-- population handled by courses.js -->
				<ul class="three-column full-width courses-results-list">
				</ul>
			</div>
		</div> <!-- courses container -->
		<div class="row courses-loading">
			<div class="col-xs-12">
				<i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i>
				<span class="sr-only">Results are loading</span>
			</div>
		</div>
	<?php else : ?>
		<div class="opportunities-container">
			<div class="row opportunities-error">
				<div class="col-xs-12">
					<p>No results were found. Please try another search query.</p>
				</div>
			</div> <!-- opportunities-error -->
		</div>
	<?php endif; ?>
</article>
