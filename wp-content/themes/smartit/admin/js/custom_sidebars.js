jQuery(document).ready(function() {
    jQuery(".add_sidebar").click(function(){
        var sidebar_name=jQuery("#sidebar_name").val();

        if(sidebar_name.length>0){
            var data = {
                sidebar_name:sidebar_name,
                action: "add_sidebar"
            };
            jQuery.post(ajaxurl, data, function(response) {
                response = jQuery.parseJSON(response);
                jQuery(".custom_sidebars_list .js_no_one_item_else").remove();
                jQuery("#custom_sidebars").append(response['html']);
                jQuery("#"+response.sidebar_id).find("input, select").uniform();
                jQuery("#sidebar_name").val("");
                //***
                jQuery(".custom_sidebars_list").eq(0).append('<li style="display:none;"><a href="#'+response.sidebar_id+'">'+sidebar_name+'</a></li>');
                jQuery(".custom_sidebars_list").eq(1).append('<li><a id-data="'+response.sidebar_id+'" class="delegate_click" href="#">'+sidebar_name+'</a><input type="hidden" name="sidebars['+response.sidebar_id+'][name]" value="'+sidebar_name+'" /><a href="#" title="'+lang_delete+'" class="remove remove_sidebar" sidebar-id="'+response.sidebar_id+'"></a><a id-data="'+response.sidebar_id+'" href="#" title="'+lang_edit+'" class="edit delegate_click"></a></li>');
                deinit_tabs();
                init_tabs();
                jQuery("[href=#"+response.sidebar_id+"]").trigger('click');
            });
        }

    });

    jQuery(".remove_sidebar").live('click',function(){
        var self=this;
        jQuery(".custom_sidebars_list_nav_link").trigger('click');
        var id=jQuery(self).attr('sidebar-id');
        jQuery("[href=#"+id+"]").parent().remove();
        jQuery("#"+id).remove();
        jQuery("[sidebar-id="+id+"]").parent().remove();            
      
    });

    //***



    var stop_add_new_page=false;
    jQuery(".add_page").live('click',function(){
        if(stop_add_new_page){
            return;
        }
        stop_add_new_page=true;
        
        var self=this;
        var data = {
            sidebar_id:jQuery(self).attr("sidebar-id"),
            page_id:jQuery(self).parent().find(".tmk_row").length,
            action: "add_sidebar_page"
        };
        jQuery.post(ajaxurl, data, function(html) {
            jQuery(self).parent().append(html);
            jQuery(self).parent().find(".tmk_row:last-child").find("input, select").uniform();
            stop_add_new_page=false;
        });

    });

    var stop_add_new_cat=false;
    jQuery(".add_category").live('click',function(){
        if(stop_add_new_cat){
            return;
        }
        stop_add_new_cat=true;
        
        var self=this;
        var data = {
            sidebar_id:jQuery(self).attr("sidebar-id"),
            cat_id:jQuery(this).parent().find(".tmk_row").length,
            action: "add_sidebar_category"
        };
        jQuery.post(ajaxurl, data, function(html) {
            jQuery(self).parent().append(html);
            jQuery(self).parent().find(".tmk_row:last-child").find("input, select").uniform();
            stop_add_new_cat=false;
        });

    });
	
	    var stop_add_new_prod=false;
    jQuery(".add_product").live('click',function(){
        if(stop_add_new_prod){
            return;
        }
        stop_add_new_prod=true;
        
        var self=this;
        var data = {
            sidebar_id:jQuery(self).attr("sidebar-id"),
            product_id:jQuery(self).parent().find(".tmk_row").length,
            action: "add_sidebar_product"
        };
        jQuery.post(ajaxurl, data, function(html) {
            jQuery(self).parent().append(html);
            jQuery(self).parent().find(".tmk_row:last-child").find("input, select").uniform();
            stop_add_new_prod=false;
        });

    });
	

    //for pages and categories
    jQuery(".remove_page").live('click',function(){
        jQuery(this).parent().hide(hide_delay, function(){
            jQuery(this).remove();
        });
    });

});