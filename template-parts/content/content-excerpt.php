<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" class="p-4 mb-4 border border-gray-light">

    <h1 class="mb-2"><?php the_title(); ?></h1>

    <?php the_excerpt(); ?>

    <a class="btn" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">> Weiterlesen</a>

</article>
