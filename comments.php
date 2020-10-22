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
if ($comments) {
    ?>

<div class="container-sm px-3 py-6">
	<div id="comments" class="comments">

        <?php if (! have_comments()) { ?>
            <h2 class="comment-reply-title"> <?php _e('Sag uns deine Meinung.', 'prolog'); ?></h2>

        <?php } else { ?>
            <ol class="comment-list">
            <?php
                wp_list_comments(array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 74,
                )); ?>
            </ol><!-- .comment-list -->
        <?php
        } ?>

	</div>

	<?php
}

if (comments_open() || pings_open()) {
    if ($comments) {
        echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
    }

    comment_form(
        array(
            'fields' => '',
            'comment_notes_before' => '',
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
} elseif (is_single()) {
    if ($comments) {
        echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
    } ?>

	<div class="comment-respond" id="respond">

		<p class="comments-closed"><?php _e('Comments are closed.', 'twentytwenty'); ?></p>

	</div>

	<?php
} ?>

</div>