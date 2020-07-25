<?php

# get row content, save data
the_row();

$correct = get_sub_field('correct');
$content = get_sub_field('content');
$return = get_sub_field('return');

?>

<div class="form-checkbox">
    <label>
        <input 
            class="answer"
            type="checkbox" 
            <?php echo $correct ? "correct" : "incorrect" ?>
        >
        <em class="highlight">
            <?php echo $content ?>
        </em>
        <span class="error" id="form-error-text">
            <?php echo $return ?>
        </span>
    </label>
</div>
