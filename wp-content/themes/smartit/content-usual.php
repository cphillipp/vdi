
<!-- - - - - - - - - - - - Blog - - - - - - - - - - - - - - -->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


        <article id="post-<?php the_ID(); ?>" <?php post_class("entry clearfix"); ?>>

            <?php
            $post_pod_type = get_post_meta($post->ID, 'post_pod_type', true);
            $post_type_values = get_post_meta($post->ID, 'post_type_values', true);
            ?>

            <div class="entry-meta">


                <a href="<?php the_permalink(); ?>"><span class="post-format bcolor <?php echo $post_pod_type ?>">Permalink</span></a>
                <a href="<?php echo home_url() ?>/?m=<?php the_time('Ym'); ?>"><span class="post-date tcolor"><?php echo ThemeMakersHelper::format_post_date() ?></span></a>

            </div><!--/ .entry-meta-->

            <div class="entry-title">

                <?php if ($post_pod_type == 'link'): ?>
                    <h5 class="title"><a href="<?php echo $post_type_values[$post_pod_type] ?>" target="_blank"><?php the_title(); ?></a></h5>
                <?php else: ?>
                    <h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <?php endif; ?>

				<?php if (!$_REQUEST['hide_post_categories']){ ?>
                <span class="category"><b><?php _e('Category', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b>
                    <?php the_category(', ') ?>
                </span>
				<?php } ?>
					
				<?php if (!$_REQUEST['hide_post_tag']){ ?>
                <span class="tags">
                    <?php the_tags('<b>' . __('Tags', THEMEMAKERS_THEME_FOLDER_NAME) . ':</b>&nbsp;') ?>
                </span>
				<?php } ?>

                <?php if (!$_REQUEST['disable_blog_comments']): ?>
                    <span class="comments">
                        <b><?php _e('Comments', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b>&nbsp;<a href="<?php the_permalink(); ?>/#comments"><?php comments_number('0', '1', '%'); ?></a>
                    </span>
                <?php endif; ?>

            </div><!--/ .entry-title-->

            <div class="clear"></div>

            <div class="entry-body">

                <?php
                switch ($post_pod_type) {
                    case 'audio':
                        echo do_shortcode('[audio]' . $post_type_values[$post_pod_type] . '[/audio]');
                        break;
                    case 'video':
                        ?>

                        <div class="video-holder fivecol">

                            <?php
                            $video_width = 300;
                            $video_height = 220;

                            $source_url = $post_type_values[$post_pod_type];
                            if (!empty($source_url)) {

                                $video_type = 'youtube.com';
                                $allows_array = array('youtube.com', 'player.vimeo.com', '.mp4');

                                foreach ($allows_array as $key => $needle) {
                                    $count = strpos($source_url, $needle);
                                    if ($count !== FALSE) {
                                        $video_type = $allows_array[$key];
                                    }
                                }

                                switch ($video_type) {
                                    case $allows_array[0]:
                                        $source_url = explode("?v=", $source_url);
                                        $source_url = explode("&", $source_url[1]);
                                        if (is_array($source_url)) {
                                            $source_url = $source_url[0];
                                        }
                                        echo do_shortcode('[video type="youtube" html5_poster="" src_mp4="" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/video]');
                                        break;
                                    case $allows_array[1]:
                                        $source_url = explode("/", $source_url);
                                        if (is_array($source_url)) {
                                            $source_url = $source_url[count($source_url) - 1];
                                        }
                                        echo do_shortcode('[video type="vimeo" html5_poster="" src_mp4="" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/video]');
                                        break;
                                    case $allows_array[2]:
                                        $html5_poster = THEMEMAKERS_THEME_URI . "/images/video_poster.jpg";
                                        if (has_post_thumbnail($post->ID)) {
                                            $html5_poster = ThemeMakersHelper::get_post_featured_image($post->ID, $video_width, true, $video_height);
                                        }
                                        echo do_shortcode('[video type="html5" html5_poster="' . $html5_poster . '" src_mp4="' . $source_url . '" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"][/video]');
                                        break;

                                    default:
                                        break;
                                }
                            }
                            ?>

                        </div>

                        <?php
                        break;

                    case 'quote':
                        echo do_shortcode('[quotes]' . $post_type_values[$post_pod_type] . '[/quotes]');
                        break;

                    case 'gallery':
                        $gall = $post_type_values[$post_pod_type];
                        ?>


                        <?php if (!empty($gall)) : ?>

                            <div class="sudo-holder fivecol">

                                <div class="sudo-slider" >

                                    <ul>

                                        <?php
                                        $video_width = 351;
                                        $video_height = 278;
                                        $slider_width = 351;

                                        foreach ($gall as $source_url) {
                                            if (!empty($source_url)) {

                                                $video_type = 'youtube.com';
                                                $allows_array = array('youtube.com', 'player.vimeo.com', '.mp4', '.jpg', '.png', '.gif', '.bmp');

                                                foreach ($allows_array as $key => $needle) {
                                                    $count = strpos($source_url, $needle);
                                                    if ($count !== FALSE) {
                                                        $video_type = $allows_array[$key];
                                                    }
                                                }

                                                switch ($video_type) {
                                                    case $allows_array[0]:
                                                        $source_url = explode("?v=", $source_url);
                                                        $source_url = explode("&", $source_url[1]);
                                                        if (is_array($source_url)) {
                                                            $source_url = $source_url[0];
                                                        }
                                                        echo "<li>" . do_shortcode('[video type="youtube" html5_poster="" src_mp4="" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/video]') . "</li>";
                                                        break;
                                                    case $allows_array[1]:
                                                        $source_url = explode("/", $source_url);
                                                        if (is_array($source_url)) {
                                                            $source_url = $source_url[count($source_url) - 1];
                                                        }
                                                        echo "<li>" . do_shortcode('[video type="vimeo" html5_poster="" src_mp4="" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/video]') . "</li>";
                                                        break;
                                                    case $allows_array[2]:
                                                        $html5_poster = THEMEMAKERS_THEME_URI . "/images/video_poster.jpg";
                                                        if (has_post_thumbnail($post->ID)) {
                                                            $html5_poster = ThemeMakersHelper::get_post_featured_image($post->ID, $video_width, true, $video_height);
                                                        }
                                                        echo "<li>" . do_shortcode('[video type="html5" html5_poster="' . $html5_poster . '" src_mp4="' . $source_url . '" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"][/video]') . "</li>";
                                                        break;

                                                    default:
                                                        ?>
                                                        <li><img src="<?php echo ThemeMakersHelper::resize_image($source_url, $slider_width) ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></li>
                                                        <?php
                                                        break;
                                                }
                                            }
                                        }
                                        ?>

                                    </ul>

                                </div><!--/ .sudo-slider-->						

                            </div><!--/ .sudo-holder-->

                        <?php endif; ?>


                        <?php
                        break;

                    default:
                        ?>
                        <?php if (has_post_thumbnail($post->ID)): ?>
                            <?php
                            $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                            $url = $src[0];
                            ?>
                            <div class="entry-image fivecol">
                                <a href="<?php echo $url ?>" class="single-image picture-icon">
                                    <img src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, 351, true, 220); ?>" alt="" class="alignleft">
                                </a>
                            </div><!--/ post-thumb-->

                        <?php endif; ?>
                        <?php
                        break;
                }
                ?>

                <div class="post-entry">

                    <?php if ($_REQUEST['show_full_content']) : ?>
                        <?php the_content(); ?>
                    <?php else: ?>

                        <?php
                        if ($_REQUEST['excerpt_symbols_count']) {
                            echo substr($post->post_content, 0, $_REQUEST['excerpt_symbols_count']) . " ...";
                        } else {
                            echo $post->post_content;
                        }
                        ?>
						

                    <?php endif; ?>					

                </div><!--/ .post-entry-->

            </div><!--/ .entry-body -->

            <a href="<?php the_permalink(); ?>" data-arrow="&nbsp;&rarr;" class="more"><?php _e('Read more', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>

        </article><!--/ .entry-->

    <?php endwhile; ?>
<?php else: ?>
    <?php get_template_part('content', 'nothingfound'); ?>
<?php endif; ?>

<!-- - - - - - - - - - - - end Blog - - - - - - - - - - - - - - -->
