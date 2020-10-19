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
$programNow = get_field('program_now');

?>

<div class="d-flex flex-justify-center flex-items-center">
    <div class="BtnGroup">

    <?php // conditional output last task
        if (!empty($lastTask)) { ?>

            <a  class="btn BtnGroup-item"
                href="<?php echo esc_url($lastTask); ?>"
                title="<?php _e('Vorherige Aufgabe', 'prolog'); ?>"
                aria-label="<?php _e('Vorherige Aufgabe', 'prolog'); ?>">
                <?php
                    get_template_part('template-parts/octicon/octicon', 'arrowleft');
                    _e(' Zurück', 'prolog');
                ?>
            </a>

        <?php
        }
        // conditional output last task
        if (!empty($programNow)) { ?>

            <a  class="btn BtnGroup-item"
                href="<?php echo esc_url($programNow); ?>"
                target="_blank"
                title="<?php _e('Direkt Programmieren', 'prolog'); ?>"
                aria-label="<?php _e('Direkt Programmieren', 'prolog'); ?>">
                    <?php
                        get_template_part('template-parts/octicon/octicon', 'code');
                        _e(' Programmieren', 'prolog');
                    ?>
            </a>

        <?php
        }
        // conditional output last task
        if (!empty($nextTask)) { ?>

            <a  class="btn BtnGroup-item"
                href="<?php echo esc_url($nextTask); ?>"
                title="<?php _e('Nächste Aufgabe', 'prolog'); ?>"
                aria-label="<?php _e('Nächste Aufgabe', 'prolog'); ?>">
                <?php
                    get_template_part('template-parts/octicon/octicon', 'arrowright');
                    _e(' Weiter', 'prolog');
                ?>
            </a>

        <?php
        } ?>
    </div>
</div>