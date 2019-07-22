<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0.0
 */

?>

<article>

	<h1 class="mb-2">
		<?php _e( 'Sorry! Hier gibt es nichts zu finden.', 'prlg' ); ?>
	</h1>

	<p>
		<?php _e( 'Versuch es doch einmal mit der Suchfunktion.', 'prlg' ); ?>
	</p>

	<?php get_search_form(); ?>

</article>