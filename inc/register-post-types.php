<?php
/**
 * Register custom post types
 *
 * @package WordPress
 * @since 1.0.0
 */

/**
 *
 * Register: Kapitel
 *
 */
add_action('init', 'kapitel_init');

/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function kapitel_init()
{
    $labels = array(
        'name'               => _x('Kapitel', 'prlg'),
        'singular_name'      => _x('Kapitel', 'prlg'),
        'menu_name'          => _x('Kapitel', 'prlg'),
        'name_admin_bar'     => _x('Kapitel', 'prlg'),
        'add_new'            => _x('Neues Kapitel', 'prlg'),
        'add_new_item'       => __('Neues Kapitel hinzufügen', 'prlg'),
        'new_item'           => __('Neues Kapitel', 'prlg'),
        'edit_item'          => __('Kapitel bearbeiten', 'prlg'),
        'view_item'          => __('Kapitel anzeigen', 'prlg'),
        'all_items'          => __('Alle Kapitel', 'prlg'),
        'search_items'       => __('Suche Kapitel', 'prlg'),
        'parent_item_colon'  => __('Elterneintrag:', 'prlg'),
        'not_found'          => __('Kein Eintrag gefunden.', 'prlg'),
        'not_found_in_trash' => __('Kein Eintrag im Papierkorb gefunden.', 'prlg')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Beschreibung.', 'prlg'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'kapitel' ),
        'capability_type'    => 'page',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'show_in_rest' 	     => true,
        'supports'           => array( 'title', 'editor', 'author', 'excerpt' )
    );

    register_post_type('kapitel', $args);
}

/******************************************************************************/

/**
 *
 * Register: Aufgaben
 *
 */
add_action('init', 'aufgaben_init');

/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function aufgaben_init()
{
    $labels = array(
        'name'               => _x('Aufgaben', 'prlg'),
        'singular_name'      => _x('Aufgabe', 'prlg'),
        'menu_name'          => _x('Aufgaben', 'prlg'),
        'name_admin_bar'     => _x('Aufgaben', 'prlg'),
        'add_new'            => _x('Neue Aufgabe', 'prlg'),
        'add_new_item'       => __('Neue Aufgabe hinzufügen', 'prlg'),
        'new_item'           => __('Neue Aufgabe', 'prlg'),
        'edit_item'          => __('Aufgabe bearbeiten', 'prlg'),
        'view_item'          => __('Aufgaben anzeigen', 'prlg'),
        'all_items'          => __('Alle Aufgaben', 'prlg'),
        'search_items'       => __('Suche Aufgabe', 'prlg'),
        'parent_item_colon'  => __('Elterneintrag:', 'prlg'),
        'not_found'          => __('Kein Eintrag gefunden.', 'prlg'),
        'not_found_in_trash' => __('Kein Eintrag im Papierkorb gefunden.', 'prlg')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Beschreibung.', 'prlg'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'aufgabe' ),
        'capability_type'    => 'page',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-paperclip',
        'show_in_rest' 	     => true,
        'supports'           => array( 'title', 'editor', 'author', 'page-attributes' )
    );

    register_post_type('aufgaben', $args);
}

/******************************************************************************/

/**
 *
 * Register: Quizzes
 *
 */
add_action('init', 'quizzes_init');

/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function quizzes_init()
{
    $labels = array(
        'name'               => _x('Quizzes', 'prlg'),
        'singular_name'      => _x('Quizseite', 'prlg'),
        'menu_name'          => _x('Quizzes', 'prlg'),
        'name_admin_bar'     => _x('Quizzes', 'prlg'),
        'add_new'            => _x('Neue Quizseite', 'prlg'),
        'add_new_item'       => __('Neue Quizseite hinzufügen', 'prlg'),
        'new_item'           => __('Neue Quizseite', 'prlg'),
        'edit_item'          => __('Quizseite bearbeiten', 'prlg'),
        'view_item'          => __('Einträge anzeigen', 'prlg'),
        'all_items'          => __('Alle Einträge', 'prlg'),
        'search_items'       => __('Suche Einträge', 'prlg'),
        'parent_item_colon'  => __('Elterneintrag:', 'prlg'),
        'not_found'          => __('Kein Eintrag gefunden.', 'prlg'),
        'not_found_in_trash' => __('Kein Eintrag im Papierkorb gefunden.', 'prlg')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Beschreibung.', 'prlg'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'quiz' ),
        'capability_type'    => 'page',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-lightbulb',
        'show_in_rest' 	     => true,
        'supports'           => array( 'title', 'editor', 'author' )
    );

    register_post_type('quizzes', $args);
}

/******************************************************************************/

/**
 *
 * Register: Testsuites
 *
 */
add_action('init', 'testsuites_init');

/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function testsuites_init()
{
    $labels = array(
        'name'               => _x('Testsuites', 'prlg'),
        'singular_name'      => _x('Testsuite', 'prlg'),
        'menu_name'          => _x('Testsuites', 'prlg'),
        'name_admin_bar'     => _x('Testsuites', 'prlg'),
        'add_new'            => _x('Neue Testsuite', 'prlg'),
        'add_new_item'       => __('Neue Testsuite hinzufügen', 'prlg'),
        'new_item'           => __('Neue Testsuite', 'prlg'),
        'edit_item'          => __('Testsuite bearbeiten', 'prlg'),
        'view_item'          => __('Testsuites anzeigen', 'prlg'),
        'all_items'          => __('Alle Testsuites', 'prlg'),
        'search_items'       => __('Suche Testsuites', 'prlg'),
        'parent_item_colon'  => __('Testsuite:', 'prlg'),
        'not_found'          => __('Keine Testsuite gefunden.', 'prlg'),
        'not_found_in_trash' => __('Keine Testsuite im Papierkorb gefunden.', 'prlg')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Beschreibung.', 'prlg'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testsuite' ),
        'capability_type'    => 'page',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-editor-code',
        'show_in_rest' 	     => true,
        'supports'           => array( 'title', 'author' )
    );

    register_post_type('testsuites', $args);
}
