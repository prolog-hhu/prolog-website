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
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
			?>
				
				<article id="post-<?php the_ID(); ?>">

					<h1 class="mb-4"><?php the_title(); ?></h1>

					<div class="container mb-4">

					    <a class="btn btn-primary mb-3 mr-3" href="<?php the_field('quiz_anfang') ?>" target="_blank">Zu den Aufgaben</a>

						<a class="btn btn-outline mb-3 mr-3" href="<?php the_field('pdf_folien') ?>" target="_blank">Folien ansehen</a>

						<?php if(get_field('musterlosung') != ''): ?>
							<a class="btn btn-invisible mb-3 mr-3" href="<?php the_field('musterlosung') ?>">Musterlösungen herunterladen</a>
						<?php endif; ?>
					</div>

					<?php the_content(); ?>

				</article>
			<?php
			}

		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
		?>

	</main>
<?php get_footer(); ?>