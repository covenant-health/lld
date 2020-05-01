<?php
/**
 * Output the main navbar
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>

<nav class="navbar navbar-default">
	<div class="container">
		<!-- brand and toggle information -->
		<div class="navbar-header">
			<button class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button">
				<span class="toggle-text">menu</span>
			</button> <!-- /navbar-toggle -->
			<a class="navbar-brand" href="<?php echo home_url(); ?>">
				<img src="<?php the_field( 'site_logo', 'options' ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>"
				     title="<?php echo get_bloginfo( 'name' ); ?>">
				<span class="sr-only"><?php echo get_bloginfo( 'name' ); ?></span>
			</a>
		</div> <!-- /navbar-header -->

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav navbar-right">
				<?php
				$main_nav = array(
					'theme_location' => 'main-links',
					'menu'           => 'main-links',
					'container'      => false,
					'menu_class'     => '',
					'echo'           => true,
					'fallback_cb'    => 'wp_page_menu',
					'depth'          => 0,
					'items_wrap'     => '%3$s'
				);

				wp_nav_menu( $main_nav );
				?>
				<li class="visible-xs">
					<form class="navbar-form" role="search" method="get" id="searchform"
					      action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="input-group">
							<input name="s" id="s" autocomplete="off" type="text" class="search-query form-control"
							       autocomplete="off" placeholder="<?php _e( 'Search', '' ); ?>">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="submit">Go</button>
							</span>
						</div>
					</form>
				</li>
				<li class="hidden-xs dropdown">
					<a href="#" title="Search" class="dropdown-toggle" data-toggle="dropdown" role="button"
					   aria-expanded="false"><i class="fa fa-search"></i></a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<form class="navbar-form" role="search" method="get"
							      action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div class="input-group">
									<input name="s" id="s" type="text" autocomplete="off"
									       class="search-query form-control" autocomplete="off"
									       placeholder="<?php _e( 'Search', '' ); ?>">
									<span class="input-group-btn">
										<button class="btn btn-primary" type="submit">Go</button>
									</span>
								</div>
							</form>
						</li>
					</ul>
				</li>
			</ul> <!-- /navbar-nav -->
		</div> <!--/navbar-collapse -->
	</div> <!-- /container-fluid -->
</nav> <!-- /nav -->
