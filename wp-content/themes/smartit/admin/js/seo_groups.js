jQuery(document).ready(function() {
    jQuery(".add_seo_group").click(function(){
        var group_name=jQuery("#seo_group_name").val();
        jQuery("#seo_group_name").val("");

        if(group_name.length>0){
            var data = {
                group_name:group_name,
                action: "add_seo_group"
            };
            jQuery.post(ajaxurl, data, function(response) {
                response = jQuery.parseJSON(response);
                jQuery(".seo_groups_list .js_no_one_item_else").remove();
                jQuery("#seo_groups").append(response['html']);
                jQuery("#"+response.group_id).find("input, select").uniform();
                jQuery("#group_name").val("");
                //***
                jQuery(".seo_groups_list").eq(0).append('<li style="display:none;"><a href="#'+response.group_id+'">'+group_name+'</a></li>');
                jQuery(".seo_groups_list").eq(1).append('<li><a id-data="'+response.group_id+'" class="delegate_click" href="#">'+group_name+'</a><a href="#" title="'+lang_delete+'" class="remove remove_seo_group" seo-group-id="'+response.group_id+'"></a><a id-data="'+response.group_id+'" href="#" title="'+lang_edit+'" class="edit delegate_click"></a></li>');
                deinit_tabs();
                init_tabs();
                jQuery("[href=#"+response.group_id+"]").trigger('click');
            });
        }

    });


    var stop_add_new_cat=false;
    jQuery(".add_seo_group_category").live('click',function(){
        if(stop_add_new_cat){
            return;
        }
        stop_add_new_cat=true;
        var self=this;
        var group_id = jQuery(self).attr("group-id");
        var data = {
            group_id:group_id,
            cat_id:jQuery("#"+group_id).find(".tmk_row").length+1,
            action: "add_seo_group_category"
        };
        jQuery.post(ajaxurl, data, function(html) {
            jQuery(self).parent().append(html);
            jQuery(self).parent().find(".tmk_row:last-child").find("input, select").uniform();
            stop_add_new_cat=false;
        });
    });



    jQuery(".remove_seo_group").live('click',function(){
        var self=this;
        var id=jQuery(self).attr('seo-group-id');
        jQuery("#"+id).remove();
        jQuery("[href=#"+id+"]").parent().remove();
        jQuery("[seo-group-id="+id+"]").parent().remove();
        jQuery(".seo_groups_nav_link").trigger('click');
    
    });


    //for categories
    jQuery(".remove_seo_group_category").live('click',function(){
        jQuery(this).parents(".tmk_row").hide(hide_delay, function(){
            jQuery(this).remove();
        });
    });

});