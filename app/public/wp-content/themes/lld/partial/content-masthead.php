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

<!-- style="background-image: linear-gradient(to bottom, rgba(0,0,0,0) 50%,rgba(0,84,159,0.5) 100%), url(<?php echo $image; ?>);" -->
<div class="jumbotron <?php echo $page_class; ?>"
	 style="background-image: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,84,159,0.75) 100%), url(<?php echo $image; ?>);">
	<div class="container">
		<div class="row">
		<?php if( is_front_page() ) : ?>
			<?php if( get_field( 'masthead_quick_links' ) ) : ?>
				<div class="col-xs-12 col-sm-4 masthead-quick-links">
					<?php the_field( 'masthead_quick_links' ); ?>
				</div>
				<?php if( get_field( 'masthead_ad_text' ) ) : ?>
					<div class="col-sm-8 col-md-8 masthead-copy-area">
						<?php the_field( 'masthead_ad_text' ) ?>
					</div>
				<?php else : ?>
					<div class="col-xs-12 fallback-title">
						<?php content_heading(); ?>
					</div>
				<?php endif; ?>
			<?php else : ?>
				<?php if( get_field( 'masthead_ad_text' ) ) : ?>
					<div class="col-xs-12 fallback-title">
						<?php the_field( 'masthead_ad_text' ) ?>
					</div>
				<?php else : ?>
					<div class="col-xs-12 fallback-title">
						<?php content_heading(); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>

		<?php else : ?>
			<?php if( get_field( 'masthead_quick_links' ) ) : ?>
				<div class="col-xs-12 col-sm-4 masthead-quick-links">
					<?php the_field( 'masthead_quick_links' ); ?>
				</div>
				<?php if( get_field( 'masthead_ad_text' ) ) : ?>
					<div class="col-sm-8 col-md-8 masthead-copy-area">
						<?php the_field( 'masthead_ad_text' ) ?>
					</div>
				<?php else : ?>
					<div class="col-xs-12 fallback-title">
						<?php content_heading(); ?>
					</div>
				<?php endif; ?>
			<?php else : ?>
				<?php if( get_field( 'masthead_ad_text' ) ) : ?>
					<div class="col-xs-12 fallback-title">
						<?php the_field( 'masthead_ad_text' ) ?>
					</div>
				<?php else : ?>
					<div class="col-xs-12 fallback-title">
						<?php content_heading(); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
		</div>
		<?php if( is_front_page() ) : ?>
			<div class="col-xs-12 col-sm-6 col-sm-offset-3 search-col">
				<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
					<div class="input-group">
						<input name="s" type="search" placeholder="Find your next course" class="masthead-search form-control input-lg" value="<?php echo get_search_query() ?>">
						<input type="hidden" name="post_type" value="course" />
						<span class="input-group-btn">
							<button class="btn btn-primary btn-lg" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
				<p class="front-page-cta">Or <a href="<?php echo home_url( 'courses' ); ?>">browse all courses</a> instead.</p>
			</div>
		<?php endif; ?>
	</div>
</div>
