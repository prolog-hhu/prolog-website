<?php

/**
 * Template part for displaying the quiz navigation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 2.0.0
 */

$lastTask = get_field('last_task');
$nextTask = get_field('next_task');
$programNow = get_field('program_now');

?>

<div class="gutter d-flex flex-wrap flex-justify-center flex-items-center">


    <a  class="btn-link mr-2"
        href="/aufgaben/">
            <?php _e('<< Zur Übersicht', 'prolog'); ?>
    </a>

    <?php // conditional output last task
    if (!empty($lastTask)) { ?>

        <a  class="btn btn-blue mr-2"
            href="<?php echo esc_url($lastTask); ?>">
                <?php _e('< Vorheriger Schritt', 'prolog'); ?>
        </a>

    <?php
    }
    // conditional output last task
    if (!empty($nextTask)) { ?>

        <a  class="btn btn-blue mr-2"
            href="<?php echo esc_url($nextTask); ?>">
                <?php _e('> Nächster Schritt', 'prolog'); ?>
        </a>

    <?php
    }
    // conditional output last task
    if (!empty($programNow)) { ?>

        <a  class="btn btn-grey"
            href="<?php echo esc_url($programNow); ?>"
            target="_blank">
                <?php _e('>> Direkt Programmieren', 'prolog'); ?>
        </a>

    <?php
    } ?>

</div>