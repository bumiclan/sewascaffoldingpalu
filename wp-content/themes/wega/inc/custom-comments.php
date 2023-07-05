<?php
/**
 * Custom comment walker for this theme.
 *
 */

if ( ! class_exists( 'wega_Walker_Comment' ) ) {
    /**
     * CUSTOM COMMENT WALKER
     * A custom walker for comments, based on the walker in Twenty Nineteen.
     */
    class wega_Walker_Comment extends Walker_Comment {

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
        protected function html5_comment( $comment, $depth, $args ) {

            $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

            ?>
            <<?php echo esc_attr($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
                <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                    <div class="comment-meta">
                        <div class="comment-author vcard comment_author col-avatar">
                            <?php
                            $comment_author_url = get_comment_author_url( $comment );
                            $comment_author     = get_comment_author( $comment );
                            $avatar             = get_avatar( $comment, $args['avatar_size'] ); ?>

                            <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, 130 ); ?>

                        </div><!-- .comment-author -->

                        <div class="comment-meta commentmetadata col-comment-body comment_body relative">

                                <?php printf(
                                    '<div class="author_name vc_col-md-5">%1$s</div><span class="screen-reader-text says">%2$s</span>',
                                    esc_html( $comment_author ),
                                    ''
                                );

                                if ( ! empty( $comment_author_url ) ) {
                                    echo '</a>';
                                }

                            
                                ?>
                                <div class="reply_button col-md-7 text-right">
                                    <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                                        <?php
                                        /* Translators: 1 = comment date, 2 = comment time */
                                        $comment_timestamp = sprintf( esc_html__( '%1$s at %2$s', 'wega' ), get_comment_date( '', $comment ), get_comment_time() );
                                        ?>
                                        <time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo esc_attr( $comment_timestamp ); ?>">
                                            <?php echo esc_html( $comment_timestamp ); ?>
                                        </time>
                                    </a>
                                </div>
                                <div class="comment-content entry-content">
                            <?php
                            comment_text();

                            if ( '0' === $comment->comment_approved ) {
                                ?>
                                <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'wega' ); ?></p>
                                <?php
                            }

                            ?>

                        </div><!-- .comment-content -->

                        <div class="comment-links">
                            <?php if ( get_edit_comment_link() ) {
                                    echo ' <a class="comment-edit-link" href="' . esc_url( get_edit_comment_link() ) . '">' . esc_html__( 'Edit', 'wega' ) . '</a>';
                            } ?>
                            <?php

                                $comment_reply_link = get_comment_reply_link(
                                    array_merge(
                                        $args,
                                        array(
                                            'add_below' => 'div-comment',
                                            'depth'     => $depth,
                                            'max_depth' => $args['max_depth'],
                                            'before'    => '<span class="comment-reply">',
                                            'after'     => '</span>',
                                        )
                                    )
                                );

                                $by_post_author = wega_is_comment_by_post_author( $comment );

                                if ( $comment_reply_link || $by_post_author ) {
                                    ?>

                                        <?php
                                        if ( $comment_reply_link ) {
                                             echo wp_kses($comment_reply_link, 'link');
                                        }
                                        ?>

                                    <?php
                                }
                                ?>
                            </div>
                        </div><!-- .comment-metadata -->
                    </div><!-- .comment-meta -->
                                    
                </article><!-- .comment-body -->

            <?php
        }
    }
}


/**
 * Comments
 */
/**
 * Check if the specified comment is written by the author of the post commented on.
 *
 * @param object $comment Comment data.
 *
 * @return bool
 */
function wega_is_comment_by_post_author( $comment = null ) {

    if ( is_object( $comment ) && $comment->user_id > 0 ) {

        $user = get_userdata( $comment->user_id );
        $post = get_post( $comment->comment_post_ID );

        if ( ! empty( $user ) && ! empty( $post ) ) {

            return $comment->user_id === $post->post_author;

        }
    }
    return false;

}