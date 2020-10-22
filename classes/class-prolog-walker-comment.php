<?php
/**
 * Custom comment walker for this theme.
 *
 * @package WordPress
 * @subpackage Prolog
 * @since Prolog since 2.0
*/


# remove p tag from comment
# src: https://wordpress.stackexchange.com/questions/17248/how-to-disable-empty-p-tags-in-comment-text
remove_filter('comment_text', 'wpautop', 30);

class Prolog_Walker_Comment extends Walker_Comment
{

        /**
         * Outputs a comment in the HTML5 format.
         *
         * @see wp_list_comments()
         * @see https://developer.wordpress.org/reference/functions/get_comment_author_url/
         * @see https://developer.wordpress.org/reference/functions/get_comment_author/
         * @see https://developer.wordpress.org/reference/functions/get_avatar/
         * @see https://developer.wordpress.org/reference/functions/get_comment_reply_link/
         * @see https://developer.wordpress.org/reference/functions/get_edit_comment_link/
         *
         * @param WP_Comment $comment Comment to display.
         * @param int        $depth   Depth of the current comment.
         * @param array      $args    An array of arguments.
         */

    protected function html5_comment($comment, $depth, $args)
    {
        ?>
			<li 
                class="Box-row text-italic"
                id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent' : '', $comment); ?>
            >
				"<?php comment_text(); ?>"
			</li>

			<?php
    }
}
