 <?php
/**
 * Template part for displaying topbar open navigation button
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0.0
 */

?>

<?php if ( is_user_logged_in() ) { ?>

    <a class="muted-link border border-gray-dark rounded-1 px-2 py-1 ml-2 ml-md-3" href="<?php echo wp_logout_url(); ?>">Logout</a>

<?php } else { ?>

    <a class="muted-link border border-gray-dark rounded-1 px-2 py-1 ml-2 ml-md-3" href="<?php echo wp_login_url(); ?>" title="Login">Login</a>
<?php } ?>