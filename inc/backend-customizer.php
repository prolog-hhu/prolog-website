<?php 

/**
* removes unwanted menu pages in the backend
*/
function remove_menus() {

	// remove_menu_page( 'index.php' );                  //Dashboard
  // remove_menu_page( 'jetpack' );                    //Jetpack* 
    
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit-comments.php' );          //Comments

	// remove_menu_page( 'upload.php' );                 //Media
	// remove_menu_page( 'edit.php?post_type=page' );    //Pages
	
	remove_menu_page( 'themes.php' );                 //Appearance
	// remove_menu_page( 'plugins.php' );                //Plugins
  // remove_menu_page( 'users.php' );                  //Users
  // remove_menu_page( 'tools.php' );                  //Tools
    
  // remove_menu_page( 'options-general.php' );        //Settings 
  remove_submenu_page('options-general.php', 'options-writing.php');
  remove_submenu_page('options-general.php', 'options-discussion.php');
  remove_submenu_page('options-general.php', 'options-permalink.php');
}
add_action( 'admin_menu', 'remove_menus' );


/**
* adds custom menu pages in the dashboard
*/
function register_menus() {

  // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
  add_menu_page( 'Menüs', 'Menüs', 'manage_options', 'nav-menus.php', '', 'dashicons-screenoptions', 60 );
  // add_menu_page( 'Widgets', 'Widgets', 'manage_options', 'widgets.php', '', 'dashicons-move', 20 );

}
add_action( 'admin_menu', 'register_menus' );

?>