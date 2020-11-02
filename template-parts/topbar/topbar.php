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

<header id="topbar" class="py-2 bg-gray-dark text-white">
    <div class="container-xl px-3">
        <div class="d-flex flex-justify-between flex-items-center">

            <?php get_template_part('template-parts/topbar/topbar', 'branding'); ?>

            <div class="d-flex flex-justify-between flex-items-center">

                <?php get_search_form(); ?>

                <a  class="text-white border border-gray-dark rounded-2 px-2 py-1 ml-2 ml-md-3 hide-sm" 
                    href="https://prolog.cl.phil.hhu.de/tutorial/" 
                    title="Zum Tutorial">
                        Tutorial
                </a>

                <button id="open-navigation" class="btn-link text-white ml-2 ml-md-4" aria-label="open navigation">
                    <?php get_template_part('template-parts/octicon/octicon', 'nav32'); ?>
                </button>

            </div>

        </div>
    </div>
</header>