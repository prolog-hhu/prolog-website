<?php
/**
 * The template for displaying non blog front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package WordPress
 * @since 1.0.0
 */

?>

<?php get_header(); ?>

<main class="container-lg px-3 py-6">

    <div class="d-flex flex-wrap flex-justify-center flex-items-center text-center">
        <article class="col-12 col-md-9 mt-6">

            <?php // get backend content
            if (have_posts()) { ?>

                <?php
                // Load posts loop.
                while (have_posts()) {
                    the_post();
                
                    the_content();
                }
            } ?>

        </article>
    </div>

    <hr class="my-6" />

    <div class="gutter d-flex flex-wrap flex-justify-between">

        <?php
            $loop = new WP_Query(array( 'post_type' => 'kapitel', 'order' => 'ASC', 'orderby' => 'name', 'posts_per_page'=>-1));

            if ($loop->have_posts()) {
                while ($loop->have_posts()) {
                    $loop->the_post();

                    get_template_part('template-parts/kapitel/kapitel', 'excerpt');
                }
            }
            wp_reset_postdata();
        ?>

    </div>

</main>

<?php get_footer(); ?>
