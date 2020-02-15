<?php
/**
 * Output the article content
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 31, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>
<article <?php post_class('col-xs-12  col-md-8'); ?>>
	<?php the_content(); ?>
	<?php if( is_single() && has_tag() ) : ?>
		<footer class="post-footer">
			<h2>Topics covered in this post:</h2>
			<?php the_tags( '<p>', ', ', '</p>' ); ?>
		</footer>
	<?php endif; ?>
</article>