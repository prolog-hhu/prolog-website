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

				<?php get_template_part('template-parts/kapitel/kapitel', 'navigation'); ?>

				<?php the_content(); ?>

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