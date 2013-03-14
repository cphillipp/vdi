<input type="hidden" value="1" name="thememakers_meta_saving" />
<table class="form-table">
    <tbody>
        <tr>
            <th style="width:25%">
                <label for="page_top">
                    <strong><?php _e('Top Content', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>
                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;"><?php _e('Content on the top of the page with light gray background.', THEMEMAKERS_THEME_FOLDER_NAME); ?></span>
                </label>
            </th>
            <td>
                <textarea style="width:95%; margin-right: 20px; float:left; height:200px;" id="page_top" name="page_top"><?php echo $page_top; ?></textarea>
            </td>
        </tr>
        <tr style="border-top:1px solid #eeeeee;">
            <th style="width:25%">
                <label for="page_bottom">
                    <strong><?php _e('Bottom Content', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>
                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;"><?php _e('Content in the bottom of the page with shadow divider.', THEMEMAKERS_THEME_FOLDER_NAME); ?></span>
                </label>
            </th>
            <td>
                <textarea style="width:95%; margin-right: 20px; float:left; height:200px;" id="page_bottom" name="page_bottom"><?php echo $page_bottom; ?></textarea>
            </td>
        </tr>
    </tbody>
</table>
