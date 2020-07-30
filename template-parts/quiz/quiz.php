<?php
/**
 * Template part for displaying a single quiz
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 2.0.0
 */

# get and save quiz content
the_row();
$question = get_sub_field('question');

?>

<form class="quiz mb-4" action="#">

    <?php

    # show question
    echo $question['description'];

    # loop through each answer
    if (have_rows('answer')) {
        while (have_rows('answer')) {
            get_template_part('template-parts/quiz/quiz', 'answer');
        }
    }
    
    ?>

    <button type="submit" class="btn btn-primary">
        <?php _e('Überprüfen', 'prolog') ?>
    </button>

    <div class="return flash mt-2" hidden></div>
   
</form>