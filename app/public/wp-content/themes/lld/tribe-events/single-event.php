<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * @version  1.0.0
 * @package cov_careerrs
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>
<?php get_template_part( 'partial/content', 'headings' ); ?>
<div class="row event-content">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-xs-12 col-md-8' ); ?>>

		<?php while( have_posts() ) : the_post(); ?>

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content">
				<?php the_content(); ?>
			</div>

			<!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php tribe_get_template_part( 'modules/meta' ); ?>
			<?php //do_action( 'tribe_events_single_event_after_the_meta' ) ?>
		<?php endwhile; ?>

	</article>
</div>