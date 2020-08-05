<?php
/**
 * Template part for displaying a single answer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 2.0.0
 */


?>

<div class="answer form-group mb-2">

    <select class="form-select input-block" aria-label="DropDown Aufgabe">
        <option 
            incorrect
            data-return="Bitte wähle eine Antwort aus!"
        >
            Wähle aus:
        </option>

        <?php
            while (have_rows('answer')) {
                the_row();
                
                $correct = get_sub_field('correct');
                $content = get_sub_field('content');
                $return = get_sub_field('return'); ?>

                <option
                    <?php echo $correct ? "correct" : "incorrect" ?>
                    data-return="<?php echo $return ?>"
                >
                    <?php echo $content; ?>
                </option>
            
        <?php
            } ?>
    </select>

    <span class="response error position-relative width-fit"></span>

</div>

