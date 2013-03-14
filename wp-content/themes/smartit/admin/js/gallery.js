jQuery(document).ready(function() {

    jQuery('.image-button').click(function() {
        var button=jQuery(this);
        window.send_to_editor = function(html)
        {
            jQuery("#thememakers_image_buffer").html(html);
            imgurl = jQuery('#thememakers_image_buffer a').eq(0).attr('href');
            button.prev('input').val(imgurl);
            jQuery("#thememakers_image_buffer").html("");
            tb_remove();
        }
        tb_show('', 'media-upload.php?post_id=0&type=image&TB_iframe=true');
        return false;

    });

    //Add button
    jQuery('.repeatable-add').click(function() {
        field = jQuery(this).parent().parent().parent().find('.repeatable-field:last').clone(true);
        fieldLocation = jQuery(this).parent().parent().parent().find('.repeatable-field:last');

        var input=field.find('input');
        field.find('input').val('').attr('name', input.attr('name').replace(/(\d+)/, function(fullMatch, n) {
            return Number(n) + 1;
        }));

        field.insertAfter(fieldLocation, field);
        return false;
    });

    //Remove button
    jQuery('.repeatable-remove').click(function(){
        //if(jQuery('.repeatable-field').length>1) {
        jQuery(this).parent().parent().remove();
        //}
        return false;
    });
});
