<?php

/**
 * The template for displaying page/post (default)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
 *
 * @package WordPress
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<main class="container-xl px-3 py-6">

	<?php
    if (have_posts()) {

        // Load posts loop.
        while (have_posts()) {
            the_post(); ?>

			<article id="post-<?php the_ID(); ?>">

				<h1><?php the_title(); ?></h1>

				<div class="gutter d-flex flex-wrap flex-justify-center flex-items-baseline mb-4">

					<div class="position-md-sticky top-0 col-12 col-md-6 col-lg-7 py-4 mb-md-0">
						<?php the_content(); ?>
					</div>

					<div class="col-12 col-md-6 col-lg-5 py-4">
						<?php // Check quizzes exists and loop through
                            if (have_rows('quiz')) {
                                while (have_rows('quiz')) {
                                    get_template_part('template-parts/quiz/quiz');
                                }
                            } ?>
					</div>
				</div>

				<?php get_template_part('template-parts/quiz/quiz', 'navigation'); ?>

			</article>
	<?php
        }
    } else {

        // If no content, include the "No posts found" template.
        get_template_part('template-parts/content/content', 'none');
    }
    ?>

</main>
<?php get_footer(); ?>