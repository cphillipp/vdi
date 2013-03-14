<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>"><?php _e('Title', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('title'); ?>" name="<?php echo $widget->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('category'); ?>"><?php _e('Posts Category', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
    <?php
    $args = array(
        'hide_empty' => 0,
        'show_option_all' => __('All Categories', THEMEMAKERS_THEME_FOLDER_NAME),
        'echo' => 0,
        'selected' => $instance['category'],
        'hierarchical' => 0,
        'id' => $widget->get_field_id('category'),
        'name' => $widget->get_field_name('category'),
        'class' => 'widefat',
        'depth' => 0,
        'tab_index' => 0,
        'taxonomy' => 'category',
        'hide_if_empty' => false
    );
    echo wp_dropdown_categories($args);
    ?>
</p>

<p>
    <label for="<?php echo $widget->get_field_id('post_number'); ?>"><?php _e('Post Number', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('post_number'); ?>" name="<?php echo $widget->get_field_name('post_number'); ?>" value="<?php echo $instance['post_number']; ?>" />
</p>

<p>
    <?php
    $checked = "";
    if ($instance['show_thumbnail'] == 'true') {
        $checked = 'checked="checked"';
    }
    ?>
    <input type="checkbox" id="<?php echo $widget->get_field_id('show_thumbnail'); ?>" name="<?php echo $widget->get_field_name('show_thumbnail'); ?>" value="true" <?php echo $checked; ?> />
    <label for="<?php echo $widget->get_field_id('show_thumbnail'); ?>"><?php _e('Show thumbnail', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
</p>

<p>
    <?php
    $checked = "";
    if ($instance['show_exerpt'] == 'true') {
        $checked = 'checked="checked"';
    }
    ?>
    <input type="checkbox" id="<?php echo $widget->get_field_id('show_exerpt'); ?>" name="<?php echo $widget->get_field_name('show_exerpt'); ?>" value="true" <?php echo $checked; ?> />
    <label for="<?php echo $widget->get_field_id('show_exerpt'); ?>"><?php _e('Show Exerpt', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
</p>

<p>
    <?php
    $checked = "";
    if ($instance['show_see_all_button'] == 'true') {
        $checked = 'checked="checked"';
    }
    ?>
    <input type="checkbox" id="<?php echo $widget->get_field_id('show_see_all_button'); ?>" name="<?php echo $widget->get_field_name('show_see_all_button'); ?>" value="true" <?php echo $checked; ?> />
    <label for="<?php echo $widget->get_field_id('show_see_all_button'); ?>"><?php _e('Show see all button', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
</p>

