<?php
/**
 * Header template
 * Author     : John Galyon
 * Author URI : https://www.covenanthealth.com
 * Created    : October 30, 2017
 * @version 2.0.0
 * @package WordPress
 * @subpackage covenant
 */
?>

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
</head>

<body <?php body_class(); ?> data-scroll-id="page-top" id="page-top">
<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) {
	gtm4wp_the_gtm_tag();
} ?>
<div class="wrapper">
	<a href="#" data-scroll class="scroll-top">
		<i class="fa fa-chevron-up"></i>
		<span class="sr-only">scroll to the top of page</span>
	</a>
	<header role="banner">
		<?php get_template_part( 'partial/header', 'top' ); ?>
		<?php get_template_part( 'partial/header', 'nav' ); ?>
	</header>
	<div class="content-wrapper">
