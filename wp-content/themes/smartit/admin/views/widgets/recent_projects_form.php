<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>"><?php _e('Title', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('title'); ?>" name="<?php echo $widget->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
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
    if ($instance['show_date'] == 'true') {
        $checked = 'checked="checked"';
    }
    ?>
    <input type="checkbox" id="<?php echo $widget->get_field_id('show_date'); ?>" name="<?php echo $widget->get_field_name('show_date'); ?>" value="true" <?php echo $checked; ?> />
    <label for="<?php echo $widget->get_field_id('show_date'); ?>"><?php _e('Show Date', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
</p>

