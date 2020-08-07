
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

<div class="col-12 col-md-6 mb-5">
    <article class="collapse py-3 px-4 border border-gray-light">

        <div class="header">
            <h3 class="h2">
                <?php the_title(); ?>
            </h3>
        </div>

        <div class="content mt-3">

            <?php the_excerpt(); ?>

            <a  class="btn btn-primary btn-sm mt-2" 
                href="<?php the_permalink(); ?>" 
                title="<?php the_title_attribute(); ?>">
                    <?php _e('Weiterlesen', 'prolog'); ?>
            </a>

            <?php
            // conditional output PDF Folien
            if (!empty($pdfFolien)) { ?>

                <a  class="btn btn-outline btn-sm mt-2"
                    href="<?php echo esc_url($pdfFolien); ?>"
                    target="_blank">
                        <?php _e('Folien ansehen', 'prolog'); ?>
                </a>

            <?php
            }
            // conditional output Musterlösung
            if (!empty($musterloesung) && $musterloesungAnzeigen == true) { ?>

                <a  class="btn btn-invisible btn-sm mt-2"
                    href="<?php echo esc_url($musterloesung); ?>"
                    target="_blank">
                        <?php _e('Musterlösungen herunterladen', 'prolog'); ?>
                </a>

            <?php
            } ?>

        </div>

    </article>
</div>