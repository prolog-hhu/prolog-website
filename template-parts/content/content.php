<?php
/**
 * Template part for displaying content (default)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <h1 class="mb-4"><?php the_title(); ?></h1>

    <?php the_content(); ?>

</article>
