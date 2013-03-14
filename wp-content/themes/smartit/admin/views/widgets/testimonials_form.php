<input type="hidden" value="1" name="thememakers_meta_saving" />
<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>"><?php _e('Title', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('title'); ?>" name="<?php echo $widget->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('pause'); ?>"><?php _e('Pause', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('pause'); ?>" name="<?php echo $widget->get_field_name('pause'); ?>" value="<?php echo $instance['pause']; ?>" />
</p>



