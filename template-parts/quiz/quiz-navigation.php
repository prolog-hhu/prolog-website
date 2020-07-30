<?php

/**
 * Template part for displaying the quiz navigation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 2.0.0
 */

$nextTask = get_field('next_task');
$nextChapter = get_field('next_chapter');

?>

<div class="gutter d-flex flex-wrap flex-justify-center flex-items-center">
    <a href="#" class="btn btn-blue mr-2">
        < Zum letzten Schritt
    </a>
    <a href="<?php echo esc_url($nextTask['url']); ?>" class="btn btn-blue mr-2">
        > Nächster Schritt
    </a>
    <a href="<?php echo esc_url($nextChapter['url']); ?>" class="btn btn-grey">
        >> Direkt Programmieren
    </a>
</div>