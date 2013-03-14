<input type="hidden" value="1" name="thememakers_meta_saving" />
<div id="thememakers_image_buffer"></div>
<table class="form-table">
    <tbody>

        <tr style="border-top:1px solid #eeeeee;" >
            <th style="width:25%">
                <label for="thememakers_gallery">
                    <strong><?php _e('Media Gallery', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>
                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">
                        <?php _e('images, video (youtube and vimeo only).', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                    </span>
                </label>
            </th>
            <td>
                <a href="#" style="float:left;" class="repeatable-add button"><?php _e('Add Field', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
            </td>
        </tr>

        <?php if (!empty($thememakers_gallery) AND is_array($thememakers_gallery)): ?>
            <?php foreach ($thememakers_gallery as $key => $value) : ?>
                <tr style="border-top:1px solid #eeeeee;" class="repeatable-field">
                    <th style="width:25%"></th>
                    <td>
                        <input type="text" style="width:75%; margin-right: 20px; float:left;" size="30" value="<?php echo $value; ?>" class="" name="thememakers_gallery[]">
                        <a class="button image-button" href="#" style="float: left;"><?php _e('Browse', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                        <a href="#" class="repeatable-remove button" style="float:left;margin-left:10px;"><?php _e('Remove', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr style="border-top:1px solid #eeeeee;" class="repeatable-field">
                <th style="width:25%"></th>
                <td>
                    <input type="text" style="width:75%; margin-right: 20px; float:left;" size="30" value="" class="" name="thememakers_gallery[]">
                    <a class="button image-button" href="#" style="float: left;"><?php _e('Browse', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                    <a href="#" class="repeatable-remove button" style="float:left;margin-left:10px;"><?php _e('Remove', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                </td>
            </tr>
        <?php endif; ?>





    </tbody>
</table>
<script type="text/javascript" src="<?php echo THEMEMAKERS_THEME_URI; ?>/admin/js/gallery.js"></script>
