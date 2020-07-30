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

            <a  class="btn BtnGroup-item"
                href="<?php echo esc_url($lastTask); ?>">
                    <?php _e('< Vorherige Aufgabe', 'prolog'); ?>
            </a>

        <?php
        }
        // conditional output next task
        if (!empty($nextTask)) { ?>

            <a  class="btn BtnGroup-item"
                href="<?php echo esc_url($nextTask); ?>">
                    <?php _e('> Nächster Aufgabe', 'prolog'); ?>
            </a>

        <?php
        } ?>
        
    </div>
</div>