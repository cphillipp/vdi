<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly.');

global $post;

if (get_comments_number() != 0) :
    ?>

    <!-- - - - - - - - - - - - Post Comments - - - - - - - - - - - - - - -->

    <div id="comments">

        <h6><?php echo get_comments_number() . " " . __('Comments', THEMEMAKERS_THEME_FOLDER_NAME); ?></h6> 

        <?php paginate_comments_links() ?>
        
        <ol class="comments-list"> 
            <?php wp_list_comments('avatar_size=60&callback=tmk_comment'); ?>
        </ol>
        
        <?php paginate_comments_links() ?>

    </div><!--/ #comments-->

    <!-- - - - - - - - - - - end Post Comments - - - - - - - - - - - - - -->

    <?php
endif;

if (comments_open()) :
    ?>

    <!-- - - - - - - - - - - Add Comment - - - - - - - - - - - - - -->

    <section id="respond">

        <div class="comment-form">

            <form id="commentform" class="comments-form" action="<?php echo home_url(); ?>/wp-comments-post.php" method="post">

                <?php if (is_user_logged_in()) { ?>

                    <?php comment_form(); ?>

                <?php } else { ?>

                    <?php comment_form(); ?>

                <?php } ?>

                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>

            </form><!--/ .comment-form-->			

        </div><!--/ .comment-form-->

    </section><!--/ .add-comment-->

    <!-- - - - - - - - - - end Add Comment - - - - - - - - - - - - -->

<?php endif; ?>
<script type="text/javascript" src="<?php echo home_url() ?>/wp-includes/js/comment-reply.js"></script>   
<input type="hidden" name="current_post_id" value="<?php echo $post->ID ?>" />
<input type="hidden" name="current_post_url" value="<?php echo get_permalink($post->ID) ?>" />
<input type="hidden" name="is_user_logged_in" value="<?php echo (is_user_logged_in() ? 1 : 0) ?>" />


<script type="text/javascript">
<?php if (isset($_GET['new_comment'])): ?>
        jQuery(document).ready(function() {
            jQuery('html,body').animate({scrollTop: jQuery('#comment-<?php echo $_GET['new_comment']; ?>').offset().top - 50}, 'slow');
            jQuery('#comment-<?php echo $_GET['new_comment']; ?>').addClass("new_comment");
        });
<?php endif; ?>

</script>


<div style="display: none;" id="addcomments_template">

    <div class="add-comment" id-reply="__INDEX__">

        <h6><?php _e('Leave a Reply', THEMEMAKERS_THEME_FOLDER_NAME); ?></h6>

        <p class="textarea-block" id="respond">
            <textarea name="comment" id="comment" cols="30" rows="10" class="textarea"></textarea>
        </p><!--/ .row-textfield-->

        <p class="input-block">
            <button type="button" class="button orange reset"><?php _e('Reset', THEMEMAKERS_THEME_FOLDER_NAME); ?></button>
            <button type="submit" class="button orange reply"><?php _e('Reply', THEMEMAKERS_THEME_FOLDER_NAME); ?></button>
        </p><!--/ .row-->

        <div class="clear"></div>

    </div><!--/ .add-comment-->

</div>

<!-- - - - - - - - - - Comments Item  - - - - - - - - - - - - -->

<?php

function tmk_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>

    <li class="comment" id="comment-<?php echo comment_ID() ?>" comment-id="<?php echo comment_ID() ?>">

        <article>

            <?php echo get_avatar($comment, $size = '60', THEMEMAKERS_THEME_URI . '/images/gravatar.png'); ?>

            <div class="comment-body">

                <div class="comment-meta">

                    <div class="date"><b>Date:</b>&nbsp;<?php comment_date('F j, Y'); ?></div>
                    <div class="author"><b>Author:</b>&nbsp;<?php echo get_comment_author_link(); ?></div>

                </div><!--/ .comment-meta -->

                <p>
                    <?php comment_text_rss(); ?>
                    <?php echo get_comment_reply_link(array_merge(array('reply_text' => '<span class="comment-reply-link comment-reply">' . __('[Reply]', THEMEMAKERS_THEME_FOLDER_NAME) . '</span>'), array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </p> 

            </div><!--/ .comment-text -->

            <div class="clear"></div>

        </article><!--/ .comment-body-->

    </li>

<?php } ?>

<!-- - - - - - - - - - end Comments Item  - - - - - - - - - - - - -->