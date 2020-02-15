<?php
/**
 * Master events template
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : April 22, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage covnet
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header(); ?>

<main class="container content-container" role="main">
	<?php get_template_part( 'partial/content', 'breadcrumbs' ); ?>
	<?php tribe_events_before_html(); ?>
	<?php tribe_get_view(); ?>
	<?php tribe_events_after_html(); ?>
</main>
<?php get_footer(); ?>

