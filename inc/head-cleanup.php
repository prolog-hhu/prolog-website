<?php
/**
 * WordPress head removal hooks and action
 *
 * @package WordPress
 * @since 1.0.0
 */

// Clean up wordpress <head>

// Remove really simple discovery link
remove_action('wp_head', 'rsd_link');

// Remove wordpress version
remove_action('wp_head', 'wp_generator');

// Remove RSS feed links and extras
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

// Rremove link to index page
remove_action('wp_head', 'index_rel_link');

// Remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'wlwmanifest_link');

// Remove random post link
remove_action('wp_head', 'start_post_rel_link', 10, 0);

// Remove parent post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0);

// Remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Remove wordpress shortlink
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Remove Emoji Functions
// remove_action('wp_head', 'print_emoji_detection_script', 7);
// remove_action('wp_print_styles', 'print_emoji_styles');
// remove_action('admin_print_scripts', 'print_emoji_detection_script');
// remove_action('admin_print_styles', 'print_emoji_styles');
