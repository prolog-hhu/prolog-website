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

				<h1 class="mb-4"><?php the_title(); ?></h1>

				<div class="gutter d-flex flex-wrap flex-justify-center mb-4">

					<div class="col-12 col-md-8 mb-4 mb-md-0">
						<?php the_content(); ?>
					</div>

					<div class="col-12 col-md-4">
                        
                        <?php get_template_part('template-parts/aufgaben/aufgaben', 'linkbox'); ?>
                            
                        <?php get_template_part('template-parts/aufgaben/aufgaben', 'navigation'); ?>

                    </div>
                    
				</div>

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