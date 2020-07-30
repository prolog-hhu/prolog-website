<?php

/**
 * Template part for displaying the quiz navigation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 2.0.0
 */

$aufgabenAnfang = get_field('quiz_anfang');
$pdfFolien = get_field('pdf_folien');
$musterloesung = get_field('musterlosung');
$musterloesungAnzeigen = get_field('musterlosung_anzeigen');

?>

<div class="container mb-4">

    <?php // conditional output aufgaben anfang
    if (!empty($aufgabenAnfang)) { ?>

        <a  class="btn btn-primary mb-3 mr-3"
            href="<?php echo esc_url($aufgabenAnfang); ?>"
            target="_blank">
                <?php _e('Zu den Aufgaben', 'prolog'); ?>
        </a>
        
    <?php
    }
    // conditional output PDF Folien
    if (!empty($pdfFolien)) { ?>

        <a  class="btn btn-outline mb-3 mr-3"
            href="<?php echo esc_url($pdfFolien); ?>"
            target="_blank">
                <?php _e('Folien ansehen', 'prolog'); ?>
        </a>

    <?php
    }
    // conditional output Musterlösung
    if (!empty($musterloesung) && $musterloesungAnzeigen == true) { ?>

        <a  class="btn btn-invisible mb-3 mr-3"
            href="<?php echo esc_url($musterloesung); ?>"
            target="_blank">
                <?php _e('Musterlösungen herunterladen', 'prolog'); ?>
        </a>

    <?php
    } ?>

</div>