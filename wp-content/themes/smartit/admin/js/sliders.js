jQuery(document).ready(function() {


    jQuery(".slide_additional_features_link").fancybox({
        'autoScale': true
    });



    jQuery(".sliders_list").sortable();

    jQuery(".slide_preview_link").live('change', function() {
        jQuery(this).parent().parent().find(".slide_preview").eq(0).attr("src", jQuery(this).val());
    });



    jQuery(".button_delete_slide").live('click', function() {
        var deleted_objects = jQuery("." + jQuery(this).attr('list-item'));
        jQuery(deleted_objects).hide(hide_delay, function() {
            jQuery(deleted_objects).remove();
        });

        return false;
    });



    jQuery(".edit_slider_item").live('click', function() {
        var self = this;
        jQuery(this).parent().animate({
            height: '0'
        }, hide_delay, function() {
            jQuery(self).parent().hide();
            jQuery(self).parent().parent().find(".slide_edit_container").show();
            jQuery(self).parent().parent().find(".slide_edit_container").animate({
                height: '430px'
            }, show_delay, function() {
                //jQuery(self).parent().parent().find(".slide_edit_container").css('height','auto')
            });
        });

        return false;

    });


    jQuery(".stop_edit_slider_item").live('click', function() {
        var self = this;
        var new_title = jQuery(self).parent().find("p.slider_title input[type=text]").eq(0).val();
        var new_description = jQuery(self).parent().find("p.slider_description textarea").eq(0).val();
        var img_src = jQuery(self).parent().find("img.slide_preview").eq(0).attr("src");

        jQuery(self).parent().parent().find(".slide_view_container h3").text(new_title);
        jQuery(self).parent().parent().find(".slide_view_container p").text(new_description);
        jQuery(self).parent().parent().find(".slide_preview").attr("src", img_src);


        jQuery(this).parent().animate({
            height: '0'
        }, hide_delay, function() {
            jQuery(self).parent().hide();
            jQuery(self).parent().parent().find(".slide_view_container").show();
            jQuery(self).parent().parent().find(".slide_view_container").animate({
                height: '108px'
            }, show_delay, function() {
                //jQuery(self).parent().parent().find(".slide_view_container").height("auto");
            });
        });

        return false;

    });

    jQuery(".shortcut-slider-item").live('click', function() {
        var slider_id = jQuery(this).attr("slider-id");
        jQuery("[href=#slider_group_" + slider_id + "]").trigger('click');
    });



    jQuery(".add-slider-group").live('click', function() {
        var group_index = parseInt(jQuery(this).attr("group-index"), 10);
        var html = jQuery("#slide_template").html();
        html = html.replace(/__GROUP_INDEX__/gi, group_index);
        var sliders_list = jQuery(this).parent().find(".sliders_list").eq(0);
        var slide_index = jQuery(sliders_list).find("li").size();
        html = html.replace(/__SLIDE_INDEX__/gi, slide_index);
        jQuery(sliders_list).prepend(html);
        jQuery(sliders_list).find("li:first-child").show(show_delay);
        //*** additional options

        html = jQuery("#slide_additional_features_template").html();
        html = html.replace(/__GROUP_INDEX__/gi, group_index);
        html = html.replace(/__SLIDE_INDEX__/gi, slide_index);
        jQuery("#slide_additional_features_list_" + group_index).prepend(html);
        items_colorizator("#slide_additional_features_" + group_index + "_" + slide_index);
        jQuery("#slide_additional_features_" + group_index + "_" + slide_index).find("input, select").uniform();
        jQuery(".sliders_list").sortable();
        return false;
    });





    jQuery(".create-slider-group").live('click', function() {
        var group_name = jQuery(this).prev("input").val();
        if (group_name) {
            jQuery(".slider_groups_list .js_no_one_item_else").remove();
            jQuery(this).prev("input").val("");
            var groups_count = jQuery(".admin-nav").find("li").length;
            jQuery(".slider_groups_list").eq(0).append('<li style="display:none;"><a href="#slider_group_' + groups_count + '" class="shortcut-portfolio">' + group_name + '</a></li>');
            jQuery(".slider_groups_list").eq(1).append('<li><a class="delegate_click" id-data="slider_group_' + groups_count + '" href="#">' + group_name + '</a><input type="hidden" name="sliders[' + groups_count + '][name]" value="' + group_name + '" /><a href="#" title="' + lang_delete + '" class="remove remove-slider-group" group-index="' + groups_count + '"></a><a id-data="slider_group_' + groups_count + '" href="#" title="' + lang_edit + '" class="edit delegate_click"></a></li>');

            var html = jQuery("#group_template").html();
            html = html.replace(/__NAME__/gi, group_name);
            html = html.replace(/__INDEX__/gi, groups_count);
            html = html.replace(/__GROUP_INDEX__/gi, groups_count);
            html = html.replace(/__EMPTY__/gi, "");
            jQuery("#slider_groups_content").append(html);
            deinit_tabs();
            init_tabs();
            jQuery("[href=#slider_group_" + groups_count + "]").trigger('click');
        }
        return false;
    });


    jQuery(".remove-slider-group").live('click', function() {
        jQuery(this).parent().remove();
        var group_index = parseInt(jQuery(this).attr("group-index"), 10);
        jQuery("#slider_group_" + group_index).hide(hide_delay, function() {
            jQuery("#slider_group_" + group_index).remove();
            jQuery("[href=#slider_group_" + group_index + "]").parent().remove();
            jQuery("[group-index=" + group_index + "]").parent().remove();
            jQuery(".slider_groups_list_nav_link").trigger('click');
        });
    });


    jQuery(".button_save_slides").click(function() {

        var save_data = jQuery("#theme_slides").serialize();
        if (save_data == "") {
            save_data = "sliders=0";
        }

        var data = {
            type: "save",
            action: "change_options",
            values: save_data
        };
        jQuery.post(ajaxurl, data, function(response) {
            show_info_popup(response);
        });
    });

    jQuery(".slide_option_bg").live('click', function() {
        var value = jQuery(this).val();
        jQuery(this).parents(".slide_info_box_bg").find("li").hide();
        jQuery(this).parents(".slide_info_box_bg").find(".slide_" + value + "_option").show();
        //*****
        var data_id = jQuery(this).attr("data-id");
        jQuery("#" + data_id).val(value);
    });


    jQuery(".slide_info_box_background_color").live('change', function() {
        var value = jQuery(this).val();
        var data_id = jQuery(this).attr("data-id");
        jQuery("#" + data_id).val(value);
    });

    jQuery(".slide_info_box_background_image").live('change', function() {
        var value = jQuery(this).val();
        var data_id = jQuery(this).attr("data-id");
        jQuery("#" + data_id).val(value);
        jQuery(this).parent().find("img").attr("src", value)
    });

    //************************************************************
    jQuery(".js_slider_options_select").live('change', function() {
        jQuery(".slider_options").hide();
        var slider = jQuery(this).val();
        var slider_id = jQuery(this).attr('slider-id');
        jQuery("#" + slider + "_options_" + slider_id).show(show_delay);
    });


});

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

function set_additional_data(obj, input_id) {
    var target = jQuery("#" + input_id).eq(0);
    var value = jQuery(obj).val();

    if (jQuery(target).is("textarea")) {
        jQuery(target).text(value);
    } else {
        jQuery(target).val(value);
    }
}


//REVOLUTION SLIDER OPTIONS
//js_slider_revolution_add_option
function revolution_slide_add_option(group_key, slide_key) {
    var list = jQuery("#revolution_elements_list_" + group_key + '_' + slide_key);
    var list_options = jQuery("#revolution_elements_list_options_" + group_key + '_' + slide_key);
    var list_options_dialog = jQuery("#revolution_dialog_elements_" + group_key + '_' + slide_key);
    //*****
    var type = jQuery("#js_slider_revolution_add_option_" + group_key + '_' + slide_key).val();
    var text = jQuery("#js_slider_revolution_add_option_" + group_key + '_' + slide_key + " option:selected").html();
    var key = parseInt((new Date()).getTime(), 10);
    jQuery(list).prepend('<li type="' + type + '" class="revolution_type_' + type + ' revolution_item_' + group_key + '_' + slide_key + '_' + key + '"><a href="javascript:open_revolution_slide_options(\'' + group_key + '\',\'' + slide_key + '\',\'' + key + '\');void(0);">' + text + '</a>&nbsp;<a href="javascript: revolution_slide_delete_option(\'' + group_key + '\',\'' + slide_key + '\',\'' + key + '\');void(0);" class="admin-button button-gray button-small">X</a><input type="hidden" name="sliders[' + group_key + '][options][' + slide_key + '][additional][revolution][items][' + key + '][type][' + type + ']" /></li>');
    //*****
    var html = jQuery("#revolution_slider_options").html();
    html = html.replace(/__TYPE__/gi, type);
    html = html.replace(/__GROUP_INDEX__/gi, group_key);
    html = html.replace(/__SLIDE_INDEX__/gi, slide_key);
    html = html.replace(/__KEY__/gi, key);
    jQuery(list_options).prepend(html);
    if (type == 'text') {
        jQuery(list_options).find("li").eq(0).find('.button_upload').remove();
    }
    //*****
    html = jQuery("#revolution_dialog_elements_template").html();
    html = html.replace(/__TYPE__/gi, type);
    html = html.replace(/__GROUP_INDEX__/gi, group_key);
    html = html.replace(/__SLIDE_INDEX__/gi, slide_key);
    html = html.replace(/__KEY__/gi, key);
    jQuery(list_options_dialog).prepend(html);
}

function revolution_slide_delete_option(group_key, slide_key, key) {
    jQuery(".revolution_item_" + group_key + '_' + slide_key + '_' + key).remove();
    jQuery(".revolution_item_" + group_key + '_' + slide_key + '_' + key).remove();
}

function open_revolution_slide_options(group_key, slide_key, key) {
    var dialog = jQuery('.revolution_item_options_' + group_key + '_' + slide_key + '_' + key);
    //*****
    jQuery(dialog).dialog({
        autoOpen: false,
        width: 500,
        height: 600,
        position: ['50%', '50%'],
        zIndex: 999,
        stack: true,
        title: "Element options ",
        buttons: {
            "Close": function() {
                jQuery(this).dialog("close");
            }
        },
        close: function(event, ui) {
            jQuery(this).dialog("destroy");
        }
    });

    jQuery(dialog).dialog('open');
}

