<?php
/**
 * Template part for displaying a single answer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 2.0.0
 */


$answers = array();

# get row content, save data
while (have_rows('answer')) {
    the_row();

    array_push(
        $answers,
        array(
            'correct'  => get_sub_field('correct'),
            'content'  => get_sub_field('content'),
            'return'  => get_sub_field('return')
        )
    );
}

?>

<input  
    class="form-control input-block mb-2 input-answer" 
    type="text" 
    placeholder="Gib hier deine Antwort ein." 
    aria-label="Gib hier deine Antwort ein."
    data-answers="<?php echo htmlspecialchars(json_encode($answers), ENT_QUOTES, 'UTF-8') ?>"
>
