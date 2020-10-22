<?php
/**
 * This is the template that displays all of the <head>, <topbar> and <navigation>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @since 1.0.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/media/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/media/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/media/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/media/site.webmanifest">
		<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/media/safari-pinned-tab.svg" color="#0366d6">
		<meta name="msapplication-TileColor" content="#0366d6">
		<meta name="theme-color" content="#ffffff">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page">

		<?php get_template_part('template-parts/topbar/topbar'); ?>
		<?php get_template_part('template-parts/navigation'); ?>