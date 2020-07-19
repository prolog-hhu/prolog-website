<?php
/**
 * Register custom post types
 *
 * @package WordPress
 * @since 1.0.0
 */ 


#
#
# Register: Wiki
#
add_action( 'init', 'wiki_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function wiki_init() {
	$labels = array(
		'name'               => _x( 'Wiki', 'prlg' ),
		'singular_name'      => _x( 'Wikieintrag', 'prlg' ),
		'menu_name'          => _x( 'Wiki', 'prlg' ),
		'name_admin_bar'     => _x( 'Wiki', 'prlg' ),
		'add_new'            => _x( 'Neuer Eintrag', 'prlg' ),
		'add_new_item'       => __( 'Neuen Eintrag hinzufügen', 'prlg' ),
		'new_item'           => __( 'Neuer Eintrag', 'prlg' ),
		'edit_item'          => __( 'Eintrag bearbeiten', 'prlg' ),
		'view_item'          => __( 'Einträge anzeigen', 'prlg' ),
		'all_items'          => __( 'Alle Einträge', 'prlg' ),
		'search_items'       => __( 'Suche Einträge', 'prlg' ),
		'parent_item_colon'  => __( 'Elterneintrag:', 'prlg' ),
		'not_found'          => __( 'Kein Eintrag gefunden.', 'prlg' ),
		'not_found_in_trash' => __( 'Kein Eintrag im Papierkorb gefunden.', 'prlg' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Beschreibung.', 'prlg' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'wiki' ),
		'capability_type'    => 'page',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          => 'dashicons-welcome-learn-more',
		'show_in_rest' 	     => true,
		'supports'           => array( 'title', 'editor', 'author', 'excerpt' )
	);

	register_post_type( 'wiki', $args );
}

#
#
# Register: Quizzes
#
add_action( 'init', 'quizzes_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function quizzes_init() {
	$labels = array(
		'name'               => _x( 'Quizzes', 'prlg' ),
		'singular_name'      => _x( 'Quizseite', 'prlg' ),
		'menu_name'          => _x( 'Quizzes', 'prlg' ),
		'name_admin_bar'     => _x( 'Quizzes', 'prlg' ),
		'add_new'            => _x( 'Neue Quizseite', 'prlg' ),
		'add_new_item'       => __( 'Neue Quizseite hinzufügen', 'prlg' ),
		'new_item'           => __( 'Neue Quizseite', 'prlg' ),
		'edit_item'          => __( 'Quizseite bearbeiten', 'prlg' ),
		'view_item'          => __( 'Einträge anzeigen', 'prlg' ),
		'all_items'          => __( 'Alle Einträge', 'prlg' ),
		'search_items'       => __( 'Suche Einträge', 'prlg' ),
		'parent_item_colon'  => __( 'Elterneintrag:', 'prlg' ),
		'not_found'          => __( 'Kein Eintrag gefunden.', 'prlg' ),
		'not_found_in_trash' => __( 'Kein Eintrag im Papierkorb gefunden.', 'prlg' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Beschreibung.', 'prlg' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'quiz' ),
		'capability_type'    => 'page',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          => 'dashicons-lightbulb',
		'show_in_rest' 	     => true,
		'supports'           => array( 'title', 'editor', 'author' )
	);

	register_post_type( 'quizzes', $args );
}

#
#
# Register: Testsuites
#
add_action( 'init', 'testsuites_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function testsuites_init() {
	$labels = array(
		'name'               => _x( 'Testsuites', 'prlg' ),
		'singular_name'      => _x( 'Testsuite', 'prlg' ),
		'menu_name'          => _x( 'Testsuites', 'prlg' ),
		'name_admin_bar'     => _x( 'Testsuites', 'prlg' ),
		'add_new'            => _x( 'Neue Testsuite', 'prlg' ),
		'add_new_item'       => __( 'Neue Testsuite hinzufügen', 'prlg' ),
		'new_item'           => __( 'Neue Testsuite', 'prlg' ),
		'edit_item'          => __( 'Testsuite bearbeiten', 'prlg' ),
		'view_item'          => __( 'Testsuites anzeigen', 'prlg' ),
		'all_items'          => __( 'Alle Testsuites', 'prlg' ),
		'search_items'       => __( 'Suche Testsuites', 'prlg' ),
		'parent_item_colon'  => __( 'Testsuite:', 'prlg' ),
		'not_found'          => __( 'Keine Testsuite gefunden.', 'prlg' ),
		'not_found_in_trash' => __( 'Keine Testsuite im Papierkorb gefunden.', 'prlg' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Beschreibung.', 'prlg' ),
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

	register_post_type( 'testsuites', $args );
}

?>