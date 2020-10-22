 <?php
/**
 * Template part for displaying offcanvas navigation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0.0
 */

?>

 <header id="navigation"
     class="col-10 col-md-7 col-lg-6 col-xl-4 position-absolute position-md-fixed top-0 right-0 bg-gray box-shadow-large">

     <div class="d-flex flex-justify-between flex-items-center mb-4">
        <span class="f2 text-bold px-3">Navigation</span>

        <button id="close-navigation" class="btn-link p-3" type="button" aria-label="close navigation">
            <?php get_template_part('template-parts/octicon/octicon', 'close32'); ?>
        </button>

     </div>

     <?php
        wp_nav_menu(
    array(
                'menu_class' => 'f2 list-style-none',
                'submenu_class' => 'f4 mt-2 d-flex flex-items-center flex-wrap width-fit',
                'item_class' => 'd-block p-3 border-bottom border-white-black-50',
                'submenu_item_class' => 'btn btn-outline-white m-2 d-flex',
                'theme_location' => 'primary_navigation',
            )
);
    ?>

 </header>