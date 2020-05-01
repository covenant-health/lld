<?php
/**
 * Output the news roll for the front page.
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : November 5, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */
$news_args = array(
		'posts_per_page' => 8,
		'post_type'      => 'post'
);

$news_query = new WP_Query( $news_args );

if ( $news_query->have_posts() ) : ?>

	<article class="container system-news">
		<div class="row">
			<div class="col-xs-12">
				<h2><?php echo get_bloginfo( 'name' ); ?> News</h2>
				<ul class="four-column full-width blog-loop">
					<?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>

						<li class="inset">
							<h3>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
								<?php show_thumbnail(); ?>
							</a>
							<p class="small">Posted on <time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date( 'F j, Y' ); ?></time></p>
							<?php the_excerpt(); ?>
						</li>

					<?php endwhile; ?>
				</ul>
				<p>Read more stories on the
					<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" rel="bookmark">
						<?php echo get_bloginfo( 'name' ); ?> blog
					</a>.
				</p>
			</div>
		</div>
	</article>

<?php endif;
rewind_posts(); ?>
