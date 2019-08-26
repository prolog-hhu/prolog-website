 <?php
/**
 * Template part for displaying topbar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0.0
 */

?>

<header id="topbar" class="py-2 bg-gray-light">
    <div class="container-xl px-3">
        <div class="d-flex flex-justify-between flex-items-center">

            <?php get_template_part( 'template-parts/topbar/topbar', 'branding' ); ?>

            <div class="d-flex flex-justify-between flex-items-center">

                <?php
                    get_search_form();

                    get_template_part( 'template-parts/topbar/topbar', 'openNav' );
                ?>

            </div>

        </div>
    </div>
</header>