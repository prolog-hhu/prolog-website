 <?php
/**
 * Template part for footer colophon
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0.0
 */

?>

<footer id="colophon" class="py-3 bg-gray-dark">
    <div class="container-xl px-3">
        <div class="d-flex flex-justify-between flex-items-center">

            <?php 
                wp_nav_menu(
                    array(
                        'container_class' => 'text-white',
                        'menu_class' => 'f5 text-underline d-flex list-style-none',
                        'item_class' => 'd-flex mr-4',
                        'theme_location' => 'footer_navigation',
                    )
                );
            ?>

            <span class="text-white f5">
                &copy; <?php echo date("Y") ?> <?php _e('Heinrich-Heine-Universität Düsseldorf') ?>
            </span>

        </div>
    </div>
</footer>