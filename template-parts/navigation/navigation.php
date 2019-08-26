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
     class="col-10 col-md-7 col-lg-6 col-xl-4 position-fixed top-0 right-0 height-stretch bg-gray box-shadow-large">

     <div class="d-flex flex-justify-between flex-items-center bg-gray-dark border-bottom border-white-fade-50">
        <span class="f2 text-white text-bold px-3">Navigation</span>
        <?php get_template_part( 'template-parts/navigation/navigation', 'close' ); ?>
     </div>

     <?php 
        wp_nav_menu(
            array(
                'container_class' => 'text-white',
                'menu_class' => 'f3 list-style-none',
                'submenu_class' => 'f4 mt-2 d-flex flex-items-center flex-wrap width-fit',
                'item_class' => 'd-block p-3 border-bottom border-white-fade-50',
                'submenu_item_class' => 'btn btn-outline-white m-2 d-flex',
                'theme_location' => 'primary_navigation',
            )
        );
    ?>

 </header>