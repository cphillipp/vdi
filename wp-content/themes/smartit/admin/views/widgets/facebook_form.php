<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>"><?php _e('Title', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('title'); ?>" name="<?php echo $widget->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
</p>
<p>
    <label for="<?php echo $widget->get_field_id('pageID'); ?>"><?php _e('Facebook Page ID', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('pageID'); ?>" name="<?php echo $widget->get_field_name('pageID'); ?>" value="<?php echo $instance['pageID']; ?>" />
</p>
<p>
    <label for="<?php echo $widget->get_field_id('connection'); ?>"><?php _e('Connection', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('connection'); ?>" name="<?php echo $widget->get_field_name('connection'); ?>" value="<?php echo $instance['connection']; ?>" />
</p>
<p>
    <label for="<?php echo $widget->get_field_id('height'); ?>"><?php _e('Height', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('height'); ?>" name="<?php echo $widget->get_field_name('height'); ?>" value="<?php echo $instance['height']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('header'); ?>"><?php _e('Header', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
           
    <select id="<?php echo $widget->get_field_id('header'); ?>" name="<?php echo $widget->get_field_name('header'); ?>" class="widefat">
        <?php
        $headers = array(
            'Yes' => __('Yes', THEMEMAKERS_THEME_FOLDER_NAME),
            'No' => __('No', THEMEMAKERS_THEME_FOLDER_NAME),
            
        );
        ?>
        <?php foreach ($headers as $type) : ?>
            <option <?php echo($type == $instance['header'] ? "selected" : "") ?> value="<?php echo $type ?>"><?php echo $type ?></option>
        <?php endforeach; ?>
    </select> 
       
</p>
