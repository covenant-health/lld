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
<article <?php post_class('col-xs-12'); ?>>
	<form action="" id="course-search">
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<label for="search" class="sr-only">Search for a course</label>
					<input type="text" name="search" id="search" class="form-control course-search" placeholder="Search for a course">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="location" class="sr-only">Choose a location</label>
					<select name="location" id="location" class="form-control location-select">
						<option value="" default>Choose a location</option>
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

						if( !empty( $locations) && !is_wp_error( $locations ) ) {
							foreach( $locations as $location ) {
								echo '<option value="' . $location->term_id . '">' . $location->name . '</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="instructor" class="sr-only">Choose an Instructor</label>
					<select name="instructor" id="instructor" class="form-control instructor-select">
						<option value="" default>Choose an Instructor</option>
						<?php
						$instructors = get_terms(
							array(
								'fields'     => 'all',
								'order'      => 'ASC',
								'orderby'    => 'name',
								'post_type'  => 'course',
								'taxonomy'   => 'instructor',
								'hide_empty' => true,
							)
						);

						if( !empty( $instructors) && !is_wp_error( $instructors ) ) {
							foreach( $instructors as $instructor ) {
								echo '<option value="' . $instructor->term_id . '">' . $instructor->name . '</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="track" class="sr-only">Choose a Program</label>
					<select name="track" id="program" class="form-control program-select">
						<option value="" default>Choose a Program</option>
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

						if( !empty( $programs) && !is_wp_error( $programs ) ) {
							foreach( $programs as $program ) {
								echo '<option value="' . $program->term_id . '">' . $program->name . '</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="track" class="sr-only">Choose a Category</label>
					<select name="track" id="category" class="form-control category-select">
						<option value="" default>Choose a Category</option>
						<?php
						$categories = get_terms(
							array(
								'fields'     => 'all',
								'order'      => 'ASC',
								'orderby'    => 'name',
								'post_type'  => 'course',
								'taxonomy'   => 'category',
								'hide_empty' => true,
							)
						);

						if( !empty( $categories) && !is_wp_error( $categories ) ) {
							foreach( $categories as $category ) {
								echo '<option value="' . $category->term_id . '">' . $category->name . '</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-2 col-sm-offset-4">
					<button id="filter-results" type="submit" class="btn btn-primary btn-block btn-submit">Filter Results</button>
				</div>
				<div class="col-xs-6 col-sm-2">
					<button id="reset-form" type="reset" href="javascript:void(0);" class="btn btn-clear btn-block">Reset Search</button>
				</div>
			</div>
			<div class="row user-msg">
				<div class="col-xs-12">
					<p></p>
				</div>
			</div>
		</div>
	</form>

	<?php
	$args = array(
		'post_status' => 'publish',
		'post_type'   => 'course'
	);

	$courses = new WP_Query( $args );

	if( $courses->have_posts() ) :	?>
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
