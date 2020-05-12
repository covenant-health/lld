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

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-scroll-id="page-top" id="page-top">
	<?php wp_body_open(); ?>
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
