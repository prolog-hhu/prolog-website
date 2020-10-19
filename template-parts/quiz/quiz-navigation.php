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
    <div class="BtnGroup">

        <a  class="btn BtnGroup-item"
            href="/aufgaben/"
            title="<?php _e('Zur Übersicht', 'prolog'); ?>"
            aria-label="<?php _e('Zur Übersicht', 'prolog'); ?>">
                <?php
                    get_template_part('template-parts/octicon/octicon', 'list');
                    _e(' Übersicht', 'prolog');
                ?>
        </a>

        <?php // conditional output last task
        if (!empty($lastTask)) { ?>

            <a  class="btn BtnGroup-item"
                href="<?php echo esc_url($lastTask); ?>"
                title="<?php _e('Vorheriger Schritt', 'prolog'); ?>"
                aria-label="<?php _e('Vorheriger Schritt', 'prolog'); ?>">
                <?php
                    get_template_part('template-parts/octicon/octicon', 'arrowleft');
                    _e(' Zurück', 'prolog');
                ?>
            </a>

        <?php
        }
        // conditional output last task
        if (!empty($nextTask)) { ?>

            <a  class="btn BtnGroup-item"
                href="<?php echo esc_url($nextTask); ?>"
                title="<?php _e('Nächster Schritt', 'prolog'); ?>"
                aria-label="<?php _e('Nächster Schritt', 'prolog'); ?>">
                <?php
                    get_template_part('template-parts/octicon/octicon', 'arrowright');
                    _e(' Weiter', 'prolog');
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
        } ?>
    </div>
</div>