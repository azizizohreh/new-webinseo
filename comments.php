<?php
/**
 * The template for displaying Comments
 *
 */
if (post_password_required()) {
    return;
}
global $commenter,$html_req,$html5,$withcomments;
$fields = array(
    'author' => sprintf(
        '<div class="row"><div class="comment-form-author col-sm-6 form-group">%s</div>',
        sprintf(
            '<input id="author" placeholder="نامت را بنویس" class="form-control" name="author" type="text" value="%s" size="30" maxlength="245"%s />',
            esc_attr( $commenter['comment_author'] ),
            $html_req
        )
    ),
    'email'  => sprintf(
        '<div class="comment-form-email col-sm-6 form-group">%s</div></div>',
        sprintf(
            '<input id="email" placeholder="ایمیلت را بنویس" class="form-control" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes"%s />',
            ( $html5 ? 'type="email"' : 'type="text"' ),
            esc_attr( $commenter['comment_author_email'] ),
            $html_req
        )
    ),
);
$fields = apply_filters( 'comment_form_default_fields', $fields );
$fields['cookies'] = '';
$title = 'حرف دل کاربران ('.get_comments_number().')';
$args = array(
    'fields'               => $fields,
    'comment_field'        => sprintf(
        '<div class="comment-form-comment">%s</div>',
        '<textarea id="comment" name="comment" class="form-control" cols="45" rows="5" placeholder="حرف دل خودت را بنویس" maxlength="65525" required="required"></textarea>'
    ),
    'logged_in_as'  => '',
    'comment_notes_before'  => '',
    'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title">',
    'title_reply_after'    => '</h4><p class="comment-reply-subtitle">از فرم زیر میتوانید حرف دل خودتان را در مورد این پست ثبت کنید </p>',
    'title_reply' => $title,
    'title_reply_to' => __('پاسخ به'),
    'submit_button'        => '<button type="submit" class="btn btn-gradient3 comment-btn">ثبت حرف دل من</button>',

);

if (is_single() || is_singular('download') || is_page() || $withcomments) :

    ?>
    <div id="comments" class="post-comments-area">
        <div class="comments-area">
            <div class="post-new-comment">
                <?php comment_form($args); ?>
            </div>
            <?php if (have_comments()) : ?>

                <ul class="commentlist" itemscope itemtype="http://schema.org/UserComments">
                    <?php
                    wp_list_comments(array('callback' => 'webin_comment'));
                    ?>
                </ul>

                <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
                    <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
                        <h6 class="assistive-text"><?php _e('Comment navigation', 'web2feel'); ?></h6>
                        <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'web2feel')); ?></div>
                        <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'web2feel')); ?></div>
                    </nav>
                <?php endif; // check for comment navigation ?>

            <?php endif; // have_comments()
            // If comments are closed and there are comments, let's leave a little note, shall we?
            if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
                ?>
                <p class="nocomments"><?php _e('Comments are closed.'); ?></p>
            <?php endif; ?>
        </div>
    </div>

<?php endif;
// comment call back
function webin_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>

    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? 'comment-item' : 'comment-item parent' ); ?> id="comment-<?php comment_ID() ?>">
    <?php
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-item-box">
     <?php } ?>

    <div class="comment-thumb">
        <div class="meta">
            <?= get_avatar($comment, '38'); ?>
            <h5 itemprop="name" class="comment-author"><?php echo comment_author_link() ?></h5>
            <div class="comment-date">
                <?php echo get_comment_date(); ?>
            </div>
        </div>
        <?php echo comment_reply_link(array_merge($args, array('reply_text' => '', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>

    <?php
    if ( $comment->comment_approved == '0' ) { ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php
    } ?>

    <div class="comment-body">
        <?php if ($comment->comment_approved == '0') : ?>
            <em><?php _e('Your comment is awaiting moderation.') ?></em>
            <br/>
        <?php endif; ?>
        <div itemprop="commentText" class="comment-text">
            <?php comment_text() ?>
        </div>
    </div>
    <?php
    if ( 'div' != $args['style'] ) : ?>
        </div><?php
    endif;
}