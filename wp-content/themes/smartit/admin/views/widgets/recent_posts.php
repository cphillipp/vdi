<?php
$query = new WP_Query(array(
            'post_type' => 'post',
            'showposts' => $instance['post_number'],
            'cat' => $instance['category']
        ));

global $post;

$excerpt_symbols_count = get_option(THEMEMAKERS_THEME_PREFIX . "excerpt_symbols_count");

if (!$excerpt_symbols_count) {
    $excerpt_symbols_count = 140;
}
?>

<div class="widget widget_custom_recent_entries">

    <?php if ($instance['title'] != '') { ?>
        <h3 class="widget-title"><?php echo $instance['title']; ?></h3>
    <?php } ?>

    <ul>

        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <li>
                    <?php if (has_post_thumbnail() AND $instance['show_thumbnail']) { ?>
                        <a href="<?php the_permalink(); ?>"><img class="alignleft" src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, 50, true, 50); ?>" alt="<?php the_title(); ?>" /></a>
                    <?php } ?>
                    <h6><a href="<?php the_permalink(); ?>" class="link"><?php the_title(); ?></a></h6>
                    <span class="date"><?php _e('Posted on', THEMEMAKERS_THEME_FOLDER_NAME); ?> <?php the_time('M d, Y'); ?></span>
                    <div class="clear"></div>
                    <?php if ($instance['show_exerpt']) : ?>
                        <p>
                            <?php
                            if ($excerpt_symbols_count) {
                                echo substr(get_the_excerpt(), 0, $excerpt_symbols_count) . " ...";
                            } else {
                                the_excerpt();
                            }
                            ?>
                        </p>
                    <?php endif; ?>
                </li>
                <?php
            endwhile;
        endif;
        ?>

    </ul>

    <?php if ($instance['show_see_all_button'] == "true"): ?>
        <?php if ($instance['category'] > 0): ?>
            <a class="button default small" href="<?php echo get_category_link((int) $instance['category']); ?>"><?php _e('See all posts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
        <?php else: ?>
            <a class="button default small" href="<?php echo home_url() . '/' . date('Y') ?>"><?php _e('See all posts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
        <?php endif; ?>
    <?php endif; ?>


</div><!--/ .widget-container-->

