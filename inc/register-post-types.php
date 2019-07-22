<?php
/**
 * Register custom post types
 *
 * @package WordPress
 * @since 1.0.0
 */ 

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
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
	);

	register_post_type( 'wiki', $args );
}

?>