<?php
/**
 * Backend related functions for customization
 *
 * @package WordPress
 * @since 1.0.0
 */

/**
* removes unwanted menu pages in the backend
*/
function remove_menus()
{

    // remove_menu_page( 'index.php' );                   //Dashboard
    // remove_menu_page( 'jetpack' );                     //Jetpack*
    
    remove_menu_page('edit.php');                       //Posts
    remove_menu_page('edit-comments.php');              //Comments

    // remove_menu_page( 'upload.php' );                  //Media
    // remove_menu_page( 'edit.php?post_type=page' );     //Pages
    
    remove_menu_page('themes.php');                     //Appearance
    // remove_menu_page( 'plugins.php' );                 //Plugins
    // remove_menu_page( 'users.php' );                   //Users
    // remove_menu_page( 'tools.php' );                   //Tools
    
    //
    // Settings
    //
    // remove_menu_page( 'options-general.php' );
    // remove_submenu_page('options-general.php', 'options-writing.php');
    remove_submenu_page('options-general.php', 'options-discussion.php');
    // remove_submenu_page('options-general.php', 'options-permalink.php');

    //
    // Plugin Menu Removal
    //
    remove_menu_page('admin.php?page=sensei');
}
add_action('admin_menu', 'remove_menus');


/**
* adds custom menu pages in the dashboard
*/
function register_menus()
{

  // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page('Menüs', 'Menüs', 'manage_options', 'nav-menus.php', '', 'dashicons-screenoptions', 60);
    // add_menu_page( 'Widgets', 'Widgets', 'manage_options', 'widgets.php', '', 'dashicons-move', 20 );
}
add_action('admin_menu', 'register_menus');


/**
 * Hide admin bar from certain user roles (show only for admins)
 */
function hide_admin_bar($show)
{
    if (! current_user_can('administrator')) {
        return false;
    };

    return $show;
}
add_filter('show_admin_bar', 'hide_admin_bar');


/**
 * Changes the Login Logo
 * src: https://codex.wordpress.org/Customizing_the_Login_Form
 */
function change_login_logo() { ?>

    <style type="text/css">

        #login h1 a, .login h1 a {
          background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/media/branding.svg);
          height: 320px;
          width: 320px;
          background-size: 320px 320px;
          background-repeat: no-repeat;
        }
        
    </style>
<?php }
add_action('login_enqueue_scripts', 'change_login_logo');


/**
 * Changes the Login Logo Link
 * src: https://codex.wordpress.org/Customizing_the_Login_Form
 */
function change_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'change_login_logo_url');


// FIXME
add_filter('sensei_question_show_answers', '__return_true');
add_filter('sensei_question_answer_message_text', '__return_empty_string');

?>