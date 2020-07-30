<?php

/**
 * Template part for displaying the task navigation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 2.0.0
 */

$lastTask = get_field('last_task');
$nextTask = get_field('next_task');

?>

<div class="d-flex flex-justify-center flex-items-center">
    <div class="BtnGroup">
        <?php // conditional output last task
        if (!empty($lastTask)) { ?>
            <a href="<?php echo esc_url($lastTask); ?>" class="btn BtnGroup-item">
                <?php _e('< Vorherige Aufgabe', 'prolog'); ?>
            </a>
        <?php
        }
        // conditional output next task
        if (!empty($nextTask)) { ?>
            <a href="<?php echo esc_url($nextTask); ?>" class="btn BtnGroup-item">
                <?php _e('> Nächster Aufgabe', 'prolog'); ?>
            </a>
        <?php
        } ?>
    </div>
</div>