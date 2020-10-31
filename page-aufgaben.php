<?php
/**
 * Template Name: Aufgaben Übersicht
 * The template for displaying task overview page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package WordPress
 * @since 2.0.0
 */

?>

<?php get_header(); ?>

<main class="container-lg px-3 py-6">

    <div class="d-flex flex-wrap flex-justify-center flex-items-center text-center">
        <article class="col-12 col-md-9 mt-6">

            <?php // get backend content
            if (have_posts()) {

                // get title
                the_title('<h1 class="h0-mktg">', '</h1>');

                // Load posts loop.
                while (have_posts()) {
                    the_post();
                
                    the_content();
                }
            } ?>

        </article>
    </div>

    <div class="gutter d-flex flex-wrap flex-justify-between">

        <?php

            $chapters = new WP_Query(
                array(
                    'post_type' =>          'kapitel',
                    'order' =>              'ASC',
                    'orderby' =>            'name',
                    'posts_per_page'=>      -1
                )
            );

            if ($chapters->have_posts()) {
                while ($chapters->have_posts()) {
                    $chapters->the_post();
                    $tasks = new WP_Query(
                        array(
                            'post_type'         => 'aufgaben',
                            'order'             => 'ASC',
                            'orderby'           => 'name',
                            'posts_per_page'    => -1,
                            'meta_key'		    => 'kapitel',
                            'meta_value'	    => get_the_ID(),
                        )
                    ); ?>

                    <div class="col-12 my-4">

                        <a  href="<?php the_permalink(); ?>" 
                            title="<?php the_title_attribute(); ?>"
                        >
                            <h2 class="h1-mktg text-gray-dark border-bottom">
                                <?php the_title(); ?>
                            </h2>
                        </a>

                    </div>

        <?php
                    if ($tasks->have_posts()) {
                        while ($tasks->have_posts()) {
                            $tasks->the_post(); ?>

                            <div class="col-12 col-md-6 mb-2">
                            
                                <?php get_template_part('template-parts/aufgaben/aufgaben', 'linkbox'); ?>

                            </div>

            <?php
                        }
                    } else { ?>

                        <div class="col-12">

                            <div class="flash flash-warn">
                                <?php _e('Es sind noch keine Aufgaben diesem Kapitel zugeordnet.', 'prolog'); ?>
                            </div>

                        </div>

            <?php
                    }
                    wp_reset_postdata(); ?>

            <?php
                }
            }
                wp_reset_postdata();
        ?>

    </div>

</main>

<?php get_footer(); ?>
