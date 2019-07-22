<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<main class="container-md px-3 py-6">

        <div class="error-404">

                <h1 class="mb-2">
                        <?php _e( 'Sorry! Hier gibt es nichts zu finden.', 'prlg' ); ?>
                </h1>

                <p>
                        <?php _e( 'Versuch es doch einmal mit der Suchfunktion.', 'prlg' ); ?>
                </p>

                <?php get_search_form(); ?>
        </div><!-- .error-404 -->

</main><!-- #main -->

<?php get_footer(); ?>