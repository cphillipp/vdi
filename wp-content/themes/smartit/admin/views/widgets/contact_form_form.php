<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>"><?php _e('Title', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('title'); ?>" name="<?php echo $widget->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('form'); ?>"><?php _e('Form', THEMEMAKERS_THEME_FOLDER_NAME) ?>:</label>
    <select id="<?php echo $widget->get_field_id('form'); ?>" name="<?php echo $widget->get_field_name('form'); ?>" class="widefat">
        <?php
        $contact_forms = get_option(THEMEMAKERS_THEME_PREFIX . 'contact_form');
        $current_form=$instance['form'];
        ?>
        <?php if (!empty($contact_forms)) : ?>
            <?php foreach ($contact_forms as $contact_form) : ?>
                <option <?php echo($current_form==$contact_form['title']?"selected":"") ?> value="<?php echo $contact_form['title'] ?>"><?php echo $contact_form['title'] ?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
</p>

