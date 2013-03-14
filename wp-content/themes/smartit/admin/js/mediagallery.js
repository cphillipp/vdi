var THEMEMAKERS_MEDIAGALLERY=function(){
    return {
        init:function(){
            //set in window documet page ready
            var self=this;
            jQuery(".media_gallery_button").live('click',function(){
                self.call_gallery(this);
            });

            jQuery(".audio_gallery_button").live('click',function(){
                self.call_audio_gallery(this);
            });

            
            jQuery(".video_gallery_button").live('click',function(){
                self.call_video_gallery(this);
            });
            
            
            //*****
            
            jQuery(".mediagallery_fancy_shortcode_item").live('click',function(){
                var shortcode_key=jQuery(this).attr("data-src");
                page_builder_object.active_shortcode_title=jQuery(this).text();
                jQuery.fancybox.close();
                var url=template_directory+"/admin/extensions/tinymce";
                tb_show("Insert Shortcode", url + "/popup.php?popup=" + shortcode_key + "&width=" + 800);
            });
            

        },
        call_gallery:function(button_object){
            var text_input=jQuery(button_object).parent().find('input[type=text]').eq(0);
            jQuery("#mediagallery_fancy_container").remove();
            jQuery("body").prepend('<div id="mediagallery_fancy_container" style="display:none; width:800px; height:600px;"><a style="display:none;" href="#mediagallery_fancy_container" id="mediagallery_fancy_container_link">trigger this</a></div>');
            

            jQuery.post(ajaxurl, {
                action: "get_mediagallery"
            }, function(response) {
                var images=jQuery.parseJSON(response);
                jQuery.each(images, function(key,image){
                    jQuery("#mediagallery_fancy_container").append('<img class="mediagallery_fancy_image_item" data-src="'+image.image_url+'" src="'+image.thumb+'" alt="" style="margin:0 5px 5px 0;" />');
                });
                
                
                jQuery("#mediagallery_fancy_container_link").fancybox({
                    'autoScale'   : true
                });
            
                jQuery("#mediagallery_fancy_container_link").trigger('click');

                jQuery(".mediagallery_fancy_image_item").click(function(){
                    jQuery(text_input).val(jQuery(this).attr('data-src'));
                    jQuery(text_input).trigger('change');
                    jQuery.fancybox.close();
                    //jQuery(".mediagallery_fancy_image_item").unbind('click');
                    jQuery("#mediagallery_fancy_container").remove();                    
                });

            });

            return;
        },
        call_audio_gallery:function(button_object){
            var text_input=jQuery(button_object).prev('input').eq(0);
            jQuery("#mediagallery_fancy_container").remove();
            jQuery("body").prepend('<div id="mediagallery_fancy_container" style="display:none; width:800px; height:600px;"><a style="display:none;" href="#mediagallery_fancy_container" id="mediagallery_fancy_container_link">trigger this</a></div>');
            

            jQuery.post(ajaxurl, {
                action: "get_audio_mediagallery"
            }, function(response) {
                var files=jQuery.parseJSON(response);
                jQuery("#mediagallery_fancy_container").append('<ol>');
                jQuery.each(files, function(key,image){
                    jQuery("#mediagallery_fancy_container ol").append('<li style="font-family:Lobster; font-size:16px;"><a href="#" class="mediagallery_fancy_image_item" data-src="'+image.file_url+'" alt="" style="margin:5px;">'+image.file_name+'</a></li>');
                });
                jQuery("#mediagallery_fancy_container").append('</ol>');
                
                
                jQuery("#mediagallery_fancy_container_link").fancybox({
                    'autoScale'   : true
                });
                jQuery("#mediagallery_fancy_container_link").trigger('click');

                jQuery(".mediagallery_fancy_image_item").click(function(){
                    jQuery(text_input).val(jQuery(this).attr('data-src'));
                    jQuery(text_input).trigger('change');
                    jQuery.fancybox.close();
                    //jQuery(".mediagallery_fancy_image_item").unbind('click');
                    jQuery("#mediagallery_fancy_container").remove();
                });

            });
            return;
        },
        call_video_gallery:function(button_object){
            var text_input=jQuery(button_object).prev('input').eq(0);
            jQuery("#mediagallery_fancy_container").remove();
            jQuery("body").prepend('<div id="mediagallery_fancy_container" style="display:none; width:800px; height:600px;"><a style="display:none;" href="#mediagallery_fancy_container" id="mediagallery_fancy_container_link">trigger this</a></div>');
            

            jQuery.post(ajaxurl, {
                action: "get_video_mediagallery"
            }, function(response) {
                var files=jQuery.parseJSON(response);
                jQuery("#mediagallery_fancy_container").append('<ol>');
                jQuery.each(files, function(key,image){
                    jQuery("#mediagallery_fancy_container ol").append('<li style="font-family:Lobster; font-size:16px;"><a href="#" class="mediagallery_fancy_image_item" data-src="'+image.file_url+'" alt="" style="margin:5px;">'+image.file_name+'</a></li>');
                });
                jQuery("#mediagallery_fancy_container").append('</ol>');
                
                jQuery("#mediagallery_fancy_container_link").fancybox({
                    'autoScale'   : true
                });
            
                jQuery("#mediagallery_fancy_container_link").trigger('click');

                jQuery(".mediagallery_fancy_image_item").click(function(){
                    jQuery(text_input).val(jQuery(this).attr('data-src'));
                    jQuery(text_input).trigger('change');
                    jQuery.fancybox.close();
                    //jQuery(".mediagallery_fancy_image_item").unbind('click');
                    jQuery("#mediagallery_fancy_container").remove();
                });

            });
            return;
        },
        call_shortcode_gallery:function(){
            jQuery("#mediagallery_fancy_container").remove();
            jQuery("body").prepend('<div id="mediagallery_fancy_container" style="display:none; width:800px; height:600px;"><a style="display:none;" href="#mediagallery_fancy_container" id="mediagallery_fancy_container_link">trigger this</a></div>');
                        
            jQuery("#mediagallery_fancy_container").append('<ol>');
            jQuery.each(thememakers_shortcodes_array, function(key,shortcode){
                jQuery("#mediagallery_fancy_container ol").append('<li style="font-family:Lobster; font-size:16px;"><a href="#" class="mediagallery_fancy_shortcode_item" data-src="'+shortcode.key+'" alt="" style="margin:5px;">'+shortcode.title+'</a></li>');
            });
            jQuery("#mediagallery_fancy_container").append('</ol>');
                
            //fancy
            jQuery("#mediagallery_fancy_container_link").fancybox({
                'autoScale'   : true
            });            
            jQuery("#mediagallery_fancy_container_link").trigger('click');
            return;   
        }
    }
}
//.media_gallery_buttons, .audio_gallery_button, .video_gallery_button
//add_action('wp_ajax_get_mediagallery', array('ThemeMakersHelper', 'get_mediagallery'));
//add_action('wp_ajax_get_audio_mediagallery', array('ThemeMakersHelper', 'get_audio_mediagallery'));
//add_action('wp_ajax_get_video_mediagallery', array('ThemeMakersHelper', 'get_video_mediagallery'));
var media_gallery_object=new THEMEMAKERS_MEDIAGALLERY();
media_gallery_object.init();
