<?php

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

    <button type="submit" class="btn btn-primary">Überprüfen</button>

</form>