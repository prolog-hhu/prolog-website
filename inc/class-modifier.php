<?php
/**
 * Menu modifying functions for custom class editing
 *
 * @package WordPress
 * @since 1.0.0
 */ 

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes) {
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }
    return $classes;
}
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)


# Adds custom classes to li element in menu (depth = 0)
# https://stackoverflow.com/questions/14464505/how-to-add-class-in-li-using-wp-nav-menu-in-wordpress
function add_additional_menu_item_class($classes, $item, $args, $depth) {
    if($args->item_class && $depth == 0) {
        $classes[] = $args->item_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_menu_item_class', 1, 4);


# Adds custom classes to li element in menu
# https://stackoverflow.com/questions/14464505/how-to-add-class-in-li-using-wp-nav-menu-in-wordpress
function add_additional_submenu_item_class($classes, $item, $args, $depth) {
    if($args->submenu_item_class && $depth == 1) {
        $classes[] = $args->submenu_item_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_submenu_item_class', 1, 4);


# Adds custom classes to submenu in menu
# https://stackoverflow.com/questions/14464505/how-to-add-class-in-li-using-wp-nav-menu-in-wordpress
function add_additional_submenu_class($classes, $args) {
    if($args->submenu_class) {
        $classes[] = $args->submenu_class;
    }
    return $classes;
}
add_filter('nav_menu_submenu_css_class', 'add_additional_submenu_class', 1, 2);

?>