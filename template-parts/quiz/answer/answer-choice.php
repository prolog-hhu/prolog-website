<?php
/**
 * Template part for displaying a single answer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 2.0.0
 */

# get row content, save data
the_row();

$correct = get_sub_field('correct');
$content = get_sub_field('content');
$return = get_sub_field('return');

?>

<div class="answer form-group form-checkbox">
    <label>

        <input 
            type="checkbox" 
            <?php echo $correct ? "correct" : "incorrect" ?>
        >

        <em class="highlight">
            <?php echo $content ?>
        </em>

        <?php // conditional feedback
        if (!empty($return)) { ?>

            <span class="error position-relative width-fit">
                <?php echo $return ?>
            </span>

        <?php } ?>

    </label>
</div>
