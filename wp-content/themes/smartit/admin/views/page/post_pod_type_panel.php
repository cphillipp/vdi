<input type="hidden" name="thememakers_meta_saving" value="1" />

<ul>
    <?php foreach ($post_pod_types as $post_pod_type => $post_type_name): ?>


        <li style="display: <?php echo ($current_post_pod_type == $post_pod_type ? 'block' : 'none') ?>"  class="post_type_<?php echo $post_pod_type ?>_conrainer post_type_conrainer">

            <?php
            switch ($post_pod_type) {
                case 'default':
                    ?>
                    <table class="form-table">
                        <tr>
                            <th style="width:25%">
                                <label for="post_type_conrainer">
                                    <strong><?php echo $post_type_name ?></strong>
                                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">
                                        <?php _e('', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                                    </span>
                                </label>
                            </th>
                            <td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                    <?php
                    break;
                case 'video':
                    ?>
                    <table class="form-table">
                        <tr>
                            <th style="width:25%">
                                <label for="post_type_conrainer">
                                    <strong><?php echo $post_type_name ?></strong>
                                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">
                                        <?php _e('Choose video of this post', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                                    </span>
                                </label>
                            </th>
                            <td>
                                <input type="text" style="width:90%; margin-right: 0; float:left;" size="30" value="<?php echo @$post_type_values[$post_pod_type] ?>" class="" name="post_type_values[<?php echo $post_pod_type ?>]">
                                <a class="button button_upload image-button" href="#" style="float: left; margin-left: 9px;"><?php _e('Browse', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                            </td>
                        </tr>
                    </table>
                    <?php
                    break;
                case 'audio':
                    ?>
                    <table class="form-table">
                        <tr>
                            <th style="width:25%">
                                <label for="post_type_conrainer">
                                    <strong><?php echo $post_type_name ?></strong>
                                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">
                                        <?php _e('Choose audio of this post', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                                    </span>
                                </label>
                            </th>
                            <td>
                                <input type="text" style="width:90%; margin-right: 0; float:left;" size="30" value="<?php echo @$post_type_values[$post_pod_type] ?>" class="" name="post_type_values[<?php echo $post_pod_type ?>]">
                                &nbsp;<a class="button button_upload image-button" href="#" style="float: left; margin-left: 9px;"><?php _e('Browse', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                            </td>
                        </tr>
                    </table>
                    <?php
                    break;

                case 'link':
                    ?>
                    <table class="form-table">
                        <tr>
                            <th style="width:25%">
                                <label for="post_type_conrainer">
                                    <strong><?php echo $post_type_name ?></strong>
                                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">
                                        <?php _e('Choose link of this post like http://site.com/', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                                    </span>
                                </label>
                            </th>
                            <td>
                                <input type="text" style="width:90%; margin-right: 0; float:left;" size="30" value="<?php echo @$post_type_values[$post_pod_type] ?>" class="" name="post_type_values[<?php echo $post_pod_type ?>]">
                            </td>
                        </tr>
                    </table>
                    <?php
                    break;

                case 'quote':
                    ?>
                    <table class="form-table">
                        <tr>
                            <th style="width:25%">
                                <label for="post_type_conrainer">
                                    <strong><?php echo $post_type_name ?></strong>
                                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">
                                        <?php _e('Choose quote of this post', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                                    </span>
                                </label>
                            </th>
                            <td>
                                <textarea name="post_type_values[<?php echo $post_pod_type ?>]" style="width:95%; margin-right: 20px; height:200px;"><?php echo @$post_type_values[$post_pod_type] ?></textarea>
                            </td>
                        </tr>
                    </table>
                    <?php
                    break;

                case 'gallery':
                    ?>
                    <table class="form-table">
                        <tr>
                            <th style="width:25%">
                                <label for="post_type_conrainer">
                                    <strong><?php echo $post_type_name ?></strong>
                                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">
                                        <?php _e('Use featured image', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                                    </span>
                                </label>
                            </th>                            
                            <td>
                                <a href="#" style="float:left;" class="repeatable-add button"><?php _e('Add Field', THEMEMAKERS_THEME_FOLDER_NAME); ?></a><br />
                                <br />
                                <ul id="post_pod_gallery">
                                    <?php if (!empty($post_type_values[$post_pod_type]) AND is_array($post_type_values[$post_pod_type])): ?>
                                        <?php foreach ($post_type_values[$post_pod_type] as $key => $value) : ?>
                                            <li>
                                                <input type="text" style="width:75%; margin-right: 0; float:left;" size="30" value="<?php echo $value ?>" class="post_pod_gallery_item" name="post_type_values[<?php echo $post_pod_type ?>][]">
                                                <a class="button button_upload image-button" href="#" style="float: left;margin-left:10px;"><?php _e('Browse', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                                                <a href="#" class="repeatable-remove button" style="float:left;margin-left:10px;"><?php _e('Remove', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li>
                                            <input type="text" style="width:75%; margin-right: 0; float:left;" size="30" value="" class="post_pod_gallery_item" name="post_type_values[<?php echo $post_pod_type ?>][]">
                                            <a class="button button_upload image-button" href="#" style="float: left;margin-left:10px;"><?php _e('Browse', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                                            <a href="#" class="repeatable-remove button" style="float:left;margin-left:10px;"><?php _e('Remove', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                                        </li>
                                    <?php endif; ?>




                                </ul>


                            </td>
                        </tr>
                    </table>
                    <?php
                    break;

                default:
                    break;
            }
            ?>

        </li>



    <?php endforeach; ?>
</ul>



<script type="text/javascript">

    jQuery(document).ready(function() {
        //Add button
        jQuery('.repeatable-add').live('click', function() {
            var new_li = jQuery('#post_pod_gallery li').eq(0).html();
            jQuery('#post_pod_gallery').prepend('<li>' + new_li + '</li>');
            jQuery('#post_pod_gallery .post_pod_gallery_item').eq(0).val("");
            return false;
        });

        //Remove button
        jQuery('.repeatable-remove').live('click', function() {
            if (jQuery('#post_pod_gallery li').length > 1) {
                jQuery(this).parent().remove();
            }
            return false;
        });
    });

</script>
