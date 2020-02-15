<!DOCTYPE html>
<html class="no-js" lang="<?php echo get_bloginfo( 'language' ); ?>">
<head>
	<meta charset="<?php echo get_bloginfo( 'charset' ); ?>">

	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#00549f">

	<link rel="apple-touch-icon" href="<?php echo trailingslashit( get_stylesheet_directory_uri() ); ?>img/apple-touch-icon.png">

	<link rel="shortcut icon" href="<?php echo trailingslashit( get_stylesheet_directory_uri() ); ?>favicon.png" type="image/x-icon">

	<script src="<?php echo trailingslashit( get_stylesheet_directory_uri() ); ?>modernizr.js"></script>

	<!-- fontawesome -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<?php wp_head(); ?>
	<script type="text/javascript">
		(function( a, e, c, f, g, h, b, d ) {
			var k = { ak: '864529296', cl: 'J0weCIjS_WwQkNeenAM', autoreplace: '(865) 970-9800' };
			a[ c ] = a[ c ] || function() {
				(a[ c ].q = a[ c ].q || []).push( arguments )
			};
			a[ g ] || (a[ g ] = k.ak);
			b = e.createElement( h );
			b.async = 1;
			b.src = '//www.gstatic.com/wcm/loader.js';
			d = e.getElementsByTagName( h )[ 0 ];
			d.parentNode.insertBefore( b, d );
			a[ f ] = function( b, d, e ) {
				a[ c ]( 2, b, k, d, null, new Date, e )
			};
			a[ f ]()
		})( window, document, '_googWcmImpl', '_googWcmGet', '_googWcmAk', 'script' );
	</script>
</head>

<body <?php body_class(); ?> data-scroll-id="page-top" id="page-top">
<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) {
	gtm4wp_the_gtm_tag();
} ?>
<div class="wrapper">
	<div class="content-wrapper">
		<main class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-sm-offset-2">
					<h1 class="error-heading">Under Maintenance</h1>
					<p><?php echo get_option('name'); ?> is currently under maintenance. If you're a registered user, please <a href="<?php echo
						site_url('wp-admin'); ?>">log in</a> to continue.</p>
				</div>
			</div>
		</main>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
