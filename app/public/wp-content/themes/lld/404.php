<?php
/**
 * 404 page template
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 31, 2017
 * @version 2.0.0
 * @package WordPress
 * @subpackage covenant
 */

get_header(); ?>

<main class="container">
	<?php get_template_part( 'partial/content', 'breadcrumbs' ); ?>
	<?php get_template_part( 'partial/content', 'headings' ); ?>
	<div class="row post-content">
		<article class="col-md-8">

			<p class="lead">We were unable find the page you&rsquo;re trying to reach. It&rsquo;s possible that the link you followed is out of date
				.</p>
			<hr>
			<p>If you typed the link manually, please check to make sure that you&rsquo;ve typed it correctly. You can also use the form below to
				search <?php echo get_bloginfo( 'name' ); ?>, or you can go back to the <a href="<?php echo home_url(); ?>">home page</a>.</p>

			<form action="<?php echo home_url( '/' ); ?>" role="search" method="get" class="error-page-search">
				<div class="input-group">
					<input name="s" id="s" type="text" class="search-query form-control input-lg" autocomplete="on"
					       placeholder="<?php _e( 'Search ' . get_bloginfo( 'name' ), '' ); ?>">
					<span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search fa-2x" aria-hidden="true"></i></button>
                    </span>
				</div>
			</form>

			<?php
			// set up the argument list for the loop
			$args = array(
				'posts_per_page' => 6,
				'post_type'      => 'post'
			);

			// initialize the query
			$the_query = new WP_Query( $args );

			if ( $the_query -> have_posts() ) : ?>

				<hr>

				<ul class="two-column">

					<?php while( $the_query -> have_posts() ) : $the_query -> the_post(); ?>

						<li class="inset">
							<p>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
									<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php the_title(); ?>"
									     title="<?php the_title(); ?>">
								</a>
							</p>
							<?php the_excerpt(); ?>
						</li>

					<?php endwhile; ?>

				</ul>

			<?php endif;
			rewind_posts(); ?>

		</article>
	</div>
</main>

<?php get_footer(); ?>
