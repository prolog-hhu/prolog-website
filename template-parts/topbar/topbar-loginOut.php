 <?php
/**
 * Template part for displaying topbar open navigation button
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0.0
 */


$classes = "text-white border border-gray-dark rounded-2 px-2 py-1 ml-2 ml-md-3 hide-sm"

?>

<?php if (is_user_logged_in()) { ?>

    <a  class="<?php echo $classes ?>" 
        href="<?php echo wp_logout_url(); ?>" 
        title="<?php _e('Logout', 'prolog') ?>">
            <?php _e('Logout', 'prolog') ?>
    </a>

<?php } else { ?>

    <a  class="<?php echo $classes ?>" 
        href="<?php echo wp_login_url(); ?>" 
        title="<?php _e('Login', 'prolog') ?>">
            <?php _e('Login', 'prolog') ?>
    </a>

<?php } ?>