<?php
/**
 * output masthead content
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 31, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */

if ( has_post_thumbnail() ) {
	$image = get_the_post_thumbnail_url();
} else {
	$image = get_bloginfo( 'stylesheet_directory' ) . '/img/default-masthead.jpg';
}

$page_class = is_front_page() ? 'upper-masthead' : 'landing-masthead';
?>

<div class="jumbotron <?php echo $page_class; ?>" style="background-image: <?php echo $image; ?>">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php content_heading(); ?>
				<?php the_field( 'masthead_text' ); ?>
			</div>
			<?php if ( is_front_page() ) : ?>
				<div class="col-xs-12 courses-search-col">
					<form action="<?php echo esc_url( home_url( '/courses/' ) ); ?>">
						<div class="masthead-search">
							<div class="form-group">
								<label for="search" class="sr-only">Find your next course in…</label>
								<input type="text" class="form-control" name="search" autocomplete="off" id="search"
									   placeholder="Find your next course in…">
							</div>
							<div class="form-group">
								<label for="program" class="sr-only">Select a program</label>
								<select name="program" id="program" name="program" class="form-control">
									<option value="" default>All Programs</option>
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
							<button class="btn btn-default">Show Courses</button>
						</div>
					</form>

					<p class="front-page-cta">Or <a href="<?php echo home_url( 'courses' ); ?>">browse all courses</a>
						now.</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
