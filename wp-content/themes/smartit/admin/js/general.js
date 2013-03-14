var show_delay = 777;
var hide_delay = 333;
show_static_info_popup("Loading ...");

jQuery(document).ready(function() {

       jQuery('body').append('<div id="html_buffer"></div>');
       jQuery('body').append('<div class="info_popup"></div>');

       jQuery("#theme_options").show(hide_delay, function() {
               hide_static_info_popup();
       });

    //loader
    jQuery("#fancy_loader_link").fancybox({
        'autoScale': false,
        'closeClick': false,
        'showCloseButton': false,
        'enableEscapeButton': false,
        'hideOnOverlayClick': false,
        'hideOnContentClick': false
    });
    //***

    jQuery.each(jQuery('.colorpicker_input'), function(i, val) {
        init_color_input(this);
    });


	jQuery(".admin-choice-sidebar").on("click","a", function(e){
		var self = jQuery(this), hidden, data_val;
			hidden = jQuery("[name=sidebar_position]");
			data_val = self.attr('data-val');
			hidden.val(data_val);
		
		self.parent().siblings().removeClass("current-item");
		self.parent().addClass("current-item");
		
		e.preventDefault();
	})

	jQuery(".admin-page-choice-sidebar").on("click","a", function(e){
		var self = jQuery(this), hidden, data_val;
			hidden = jQuery("[name=page_sidebar_position]");
			data_val = self.attr('data-val');
			hidden.val(data_val);
			
		self.parent().siblings().removeClass("current-item");
		self.parent().addClass("current-item");
		
		e.preventDefault();
	})


    //*****

    jQuery('.button_upload').live('click', function()
    {
        get_tb_editor_image_link(jQuery(this).prev('input, textarea'));
        return false;
    });
    
    
    colorizator();
	
	


});


function init_color_input(object) {
    var item = jQuery(object);
    //item.children('div').css('background-color', item.prev('input').val());
    jQuery(item).ColorPicker({
        color: item.val(),
        onShow: function(cpicker) {
            jQuery(cpicker).fadeIn(500);
            return false;
        },
        onHide: function(cpicker) {
            jQuery(cpicker).fadeOut(500);
            return false;
        },
        onChange: function(hsb, hex, rgb) {
            //item.children('div').css('background-color', '#' + hex);
            //item.prev('input').val('#' + hex);
            jQuery(object).trigger('onchange');
            item.val('#' + hex);
        }
    });
}


function show_info_popup(text) {
    jQuery(".info_popup").text(text);
    jQuery(".info_popup").fadeTo(400, 0.9);
    window.setTimeout(function() {
        jQuery(".info_popup").fadeOut(400);
    }, 1000);
}


function show_static_info_popup(text) {
    jQuery(".info_popup").text(text);
    jQuery(".info_popup").fadeTo(400, 0.9);
}

function hide_static_info_popup() {
    window.setTimeout(function() {
        jQuery(".info_popup").fadeOut(400);
    }, hide_delay);
}

function get_tb_editor_image_link(input_object, input_object2) {
    window.send_to_editor = function(html)
    {
        jQuery("#html_buffer").html(html);
        var imgurl = jQuery('#html_buffer').find('a').eq(0).attr('href');
        jQuery("#html_buffer").html("");
        jQuery(input_object).val(imgurl);
        jQuery(input_object).trigger('change');
        if (input_object2 != undefined) {
            jQuery(input_object2).val(imgurl);
        }
        tb_remove();
    }
    tb_show('', 'media-upload.php?post_id=0&type=image&TB_iframe=true');
}


function add_google_font() {
    show_loader();
    var data = {
        action: "get_new_google_fonts"
    };
    jQuery.post(ajaxurl, data, function(response) {
        var response = jQuery.parseJSON(response);
        //***
        var fonts = jQuery.parseJSON(response.new_fonts);
        var saved_fonts = jQuery.parseJSON(response.saved_fonts);
        //***
        var list = jQuery("#google_font_set ul");
        jQuery(list).empty();
        var html = "";
        jQuery.each(fonts.items, function(index, value) {
            html = "<li><table><tr>";
            html = html + '<td width=300><strong>' + value.family + '</strong>:</td><td>';

            jQuery.each(value.variants, function(index2, variant) {
                var checked = "";
                if (is_font_checked(value.family, variant)) {
                    checked = 'checked=""';
                }
                html = html + '<input ' + checked + ' type="checkbox" class="option_checkbox" name="saved_google_fonts[' + value.family + '][' + variant + ']" value="1" />&nbsp;' + variant + '&nbsp;&nbsp;'
            });

            html = html + "</td></tr></table></li>";
            jQuery(list).append(html);
        });

        //just need only here
        function is_font_checked(font_name, variant) {
            var is_checked = false;
            if (saved_fonts != null) {
                jQuery.each(saved_fonts, function(font, types) {
                    if (font == font_name) {
                        jQuery.each(types, function(type, val) {
                            if (type == variant) {
                                is_checked = true;
                            }
                        });
                    }

                });
            }
            return is_checked;
        }
        //****
        jQuery(".button_save_google_fonts").live('click', function() {
            var data = {
                action: "save_google_fonts",
                values: jQuery("#google_font_set input:checked").serialize()
            };
            jQuery.post(ajaxurl, data, function(response) {
                jQuery.fancybox.close();
                var data = {
                    action: "get_google_fonts"
                };
                //refresh selects with google fonts
                jQuery.post(ajaxurl, data, function(response) {
                    var google_fonts = jQuery.parseJSON(response);
                    var selects = jQuery(".google_font_select");
                    jQuery.each(selects, function(index, select) {
                        var current_select_font = jQuery(this).find("option:selected").eq(0).val();
                        jQuery(this).empty();
                        for (var i = 0; i < google_fonts.length; i++) {
                            var val = google_fonts[i].split(':');
                            val = val[0];
                            jQuery(this).append(new Option(google_fonts[i], val));
                        }
                        jQuery(this).val(current_select_font);
                    });

                    show_info_popup(response);
                });
            });
        });
        hide_loader();
        jQuery("#google_font_set_link").fancybox({
            'titleShow': false,
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'easingIn': 'easeOutBack',
            'easingOut': 'easeInBack',
            'autoScale': true

        });
        jQuery("#google_font_set_link").trigger('click');

    });



}


function colorizator() {
    var pickers = jQuery('.bgpicker');

    jQuery.each(pickers, function(key, picker) {

        var bg_hex_color = jQuery(picker).prev('.bg_hex_color');

        if (!jQuery(bg_hex_color).val()) {
            jQuery(bg_hex_color).val();
        }

        jQuery(picker).css('background-color', jQuery(bg_hex_color).val()).ColorPicker({
            color: jQuery(bg_hex_color).val(),
            onChange: function(hsb, hex, rgb) {
                jQuery(picker).css('backgroundColor', '#' + hex);
                jQuery(bg_hex_color).val('#' + hex);
                jQuery(bg_hex_color).trigger('change');
            }
        });

    });
}


//******************
function show_loader() {
    jQuery("#fancy_loader_link").trigger('click');
}

function hide_loader() {
    jQuery.fancybox.close();
}
//*******************

function goToByIdScroll(id) {
    jQuery('html,body').animate({
        scrollTop: jQuery("#" + id).offset().top
    }, 'slow');
}
