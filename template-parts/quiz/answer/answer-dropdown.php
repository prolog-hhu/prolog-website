<?php
/**
 * Template part for displaying a single answer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 2.0.0
 */


?>

<select class="form-select input-block mb-2" aria-label="Preference">
    <option>Wähle aus:</option>

    <?php
        while (have_rows('answer')) {
            the_row(); ?>

            <option><?php echo get_sub_field('content') ?></option>
        
    <?php
        } ?>
  </select>
