<?php
/**
 * The template file for displaying the comments and comment form for the
 * Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
?>

<div class="container-md px-3 py-6 border-top border-gray-darker">
    <div class="gutter d-flex flex-wrap flex-justify-center flex-items-top mb-4">

	    <div id="comments" class="comments col-12 col-md-6">

            <?php if (! have_comments()) { ?>
                <div class="flash flash-warn text-bold">
                    <?php _e('Noch keine Kommentare eingereicht. Bitte hilf uns diese Aufgabe zu verbessern.', 'prolog'); ?>
                </div>

            <?php } else { ?>
                <div class="Box">
                    <div class="Box-header f3 text-bold">
                        <?php _e('Kommentare:', 'prolog'); ?>
                    </div>
                    <ol>
                    <?php
                        wp_list_comments(array(
                            'walker' =>   new Prolog_Walker_Comment(),
                            'style'       => 'ol',
                            'short_ping'  => false,
                            'avatar_size' => 74,
                        )); ?>
                    </ol>
                </div>
            <?php } ?>
        </div>

    <?php if (comments_open() || pings_open()) { ?>

        <div class="col-12 col-md-6">

            <?php
            comment_form(
                            array(
            'fields' => '',
            'comment_notes_before' => 'Deine personenbezogenen Daten werden nicht gespeichert!',
            'comment_field' => '
                <div class="form-group">
                    <div class="form-group-body">
                        <textarea id="comment" name="comment" class="form-control"></textarea>
                    </div>
                </div>',
            'class_form' => 'section-inner thin max-percentage',
            'class_submit' => 'btn btn-primary',
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
            'title_reply_after'  => '</h2>',
        )
                        );

        } elseif (is_single()) { ?>

            <div class="comment-respond" id="respond">
                <p class="comments-closed"><?php _e('Comments are closed.', 'twentytwenty'); ?></p>
            </div>

	    <?php } ?>

        </div>

    </div>
</div>