<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<main class="container-md px-3 py-6">

	<?php if ( have_posts() ) : ?>

		<header class="mb-4">
			<h1>
				<?php _e( 'Suchergebnisse für:', 'twentynineteen' ); ?>
				<span class="text-italic">'<?php echo get_search_query(); ?>'</span>
			</h1>
		</header><!-- .page-header -->

		<?php
		// Start the Loop.
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content/content', 'excerpt' );

			// End the loop.
		endwhile;

		// If no content, include the "No posts found" template.
	else :
		get_template_part( 'template-parts/content/content', 'none' );

	endif;
	?>
	</main><!-- #main -->

<?php get_footer(); ?>
