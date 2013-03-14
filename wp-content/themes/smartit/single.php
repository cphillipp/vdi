<?php get_header(); ?>

<!-- - - - - - - - - - - - Entry - - - - - - - - - - - - - - -->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


        <?php
        $post_pod_type = get_post_meta($post->ID, 'post_pod_type', true);
        $post_type_values = get_post_meta($post->ID, 'post_type_values', true);
        ?>


        <?php if ($post_pod_type == 'link'): ?>
            <h3 class="section-title"><a href="<?php echo $post_type_values[$post_pod_type] ?>" target="_blank"><?php the_title(); ?></a></h3>
        <?php else: ?>
            <h3 class="section-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php endif; ?>


        <article class="entry single clearfix">


            <div class="entry-meta">
                <a href="<?php the_permalink(); ?>"><span class="post-format bcolor <?php echo $post_pod_type ?>"></span></a>
                <a href="<?php echo home_url() ?>/?m=<?php the_time('Ym'); ?>"><span class="post-date tcolor"><?php echo ThemeMakersHelper::format_post_date() ?></span></a>
            </div><!--/ .entry-meta-->


            <div class="entry-title">                    

                <?php if (!$_REQUEST['hide_post_metadata']) { ?>
				
						<?php if (!$_REQUEST['hide_post_date']) { ?> 
							<span class="category">
								<b><?php _e('Date', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b>&nbsp;<a class="link" href="<?php echo home_url() ?>/?m=<?php the_time('Ym'); ?>"><?php the_time('F j, Y'); ?></a>
							</span>
						<?php } ?>

						<?php if (!$_REQUEST['hide_post_author']) { ?> 
							<span class="category">
								<b><?php _e('Author', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b>&nbsp;<?php the_author_link(); ?>
							</span>
						<?php } ?>

						<?php if (!$_REQUEST['hide_post_categories']) { ?> 
							<span class="category">
								<b><?php _e('Category', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b>&nbsp;<?php the_category(' ') ?>
							</span>
						<?php } ?>

						<?php if (!$_REQUEST['hide_post_tag']) { ?> 
							<span class="tags">
								<?php the_tags('<b>' . __('Tags', THEMEMAKERS_THEME_FOLDER_NAME) . ': </b>') ?>
							</span>
						<?php } ?>

                <?php }; ?>

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
                        $video_width = 815;
                        $video_height = 600;
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

                        break;

                    case 'quote':
                        echo do_shortcode('[quotes]' . $post_type_values[$post_pod_type] . '[/quotes]');
                        break;

                    case 'gallery':
                        $gall = $post_type_values[$post_pod_type];
                        ?>


                        <?php if (!empty($gall)) : ?>

                            <div class="sudo-holder">

                                <div class="sudo-slider" >

                                    <ul>

                                        <?php
                                        $video_width = 845;
                                        $video_height = 700;
                                        $slider_width = 845;

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

                                </div><!--/ #sudo-slider-->						

                            </div><!--/ .sudo-holder-->

                        <?php endif; ?>


                        <?php
                        break;

                    default:
                        ?>

                        <?php if (has_post_thumbnail($post->ID)): ?>

                            <div class="entry-image clearfix">
                                <img src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, 845); ?>" alt="" class="alignleft">
                            </div><!--/ post-thumb-->

                        <?php endif; ?>
                        <?php
                        break;
                }
                ?>

                <div class="post-entry">

                    <?php the_content(); ?>

                </div><!--/ .post-entry-->

            </div>

        </article><!--/ .entry-->

        <!-- - - - - - - - - - - - end Entry - - - - - - - - - - - - - - -->


        <!-- - - - - - - - - - - - About Author - - - - - - - - - - - - - - -->

        <?php
        if (get_option(THEMEMAKERS_THEME_PREFIX . 'show_author_info')) {
            $user = get_userdata($post->post_author);
            ?>

            <div class="bio clearfix">

                <h5><?php _e('About the Author', THEMEMAKERS_THEME_FOLDER_NAME); ?></h5>

                <?php echo get_avatar($user->ID, 64, THEMEMAKERS_THEME_URI . '/images/avatar.png'); ?>

                <div class="bio-info">

                    <p><?php echo stripslashes($user->description); ?></p>

                </div><!--/ .bio-info-->

            </div><!--/ .bio-->

        <?php } ?>

        <!-- - - - - - - - - - - end About Author - - - - - - - - - - - - - -->


        <div class="sep-content"></div>


        <!-- - - - - - - - - - - Related Posts - - - - - - - - - - - - - -->

        <?php wp_reset_query(); ?>
        <?php
        if (get_option(THEMEMAKERS_THEME_PREFIX . 'enable_related_posts')) {

            $tags = wp_get_post_tags($post->ID);
            $tag_ids = array();

            if ($tags) {
                foreach ($tags as $tag_item)
                    $tag_ids[] = $tag_item->term_id;
            }

            $query = new WP_Query(array(
                'tag__in' => $tag_ids,
                'post_type' => 'post',
                'post__not_in' => array($post->ID),
                'showposts' => 4
                    )
            );
            ?>

            <?php if ($query->have_posts()): ?>

                <div class="related clearfix">

                    <h6><?php _e('Related Post', THEMEMAKERS_THEME_FOLDER_NAME) ?></h6>

                    <ul>
                        <?php
                        $i = 0;
                        while ($query->have_posts()) : $query->the_post();
                            ?>

                            <li class="threecol <?php if ($i == 3) echo 'last'; ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">

                                        <img alt="" src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, 180, true, 120); ?>">
                                    </a>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img alt="" src="<?php echo ThemeMakersHelper::resize_image(THEMEMAKERS_THEME_URI . '/images/no-image.jpg', 180, true, 120); ?>">
                                    </a>
                                <?php endif; ?>
                                <div class="excerpt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/ .excerpt-->
                            </li>

                            <?php
                            $i++;
                        endwhile;
                        ?>

                    </ul>

                </div><!--/ .related-->
            <?php endif; ?>
            <!-- - - - - - - - - - end Related Posts - - - - - - - - - - - - -->

        <?php } ?>

        <?php wp_reset_query(); ?>

        <?php
        if (!$_REQUEST['disable_blog_comments']) {
            comments_template();
        }
        ?>

        <?php
    endwhile;
endif;
?>


<?php get_footer(); ?>

