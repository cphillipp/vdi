jQuery(document).ready(function($) {
	
    /* ---------------------------------------------------------------------- */
    /*	Main Navigation
     /* ---------------------------------------------------------------------- */

    (function() {

        var arrowimages = {
            down: 'downarrowclass',
            right: 'rightarrowclass'
        };
        var $mainNav = $('#navigation').find('ul:first'),
             optionsList = '<option value="" selected>Navigation</option>';

        var $submenu = $mainNav.find("ul").parent();
        $submenu.each(function(i) {
            var $curobj = $(this);
            this.istopheader = $curobj.parents("ul").length == 1 ? true : false;
            $curobj.children("a").append('<span class="' + (this.istopheader ? arrowimages.down : arrowimages.right) + '"></span>');
        });

        $mainNav.on('mouseenter', 'li', function() {
            var $this = $(this),
                    $subMenu = $this.children('ul');
            if ($subMenu.length)
                $this.addClass('hover');
            $subMenu.hide().stop(true, true).fadeIn(200);
        }).on('mouseleave', 'li', function() {
            $(this).removeClass('hover').children('ul').stop(true, true).fadeOut(50);
        });

        // Navigation Responsive

        $mainNav.find('li').each(function() {
            var $this = $(this),
                    $anchor = $this.children('a'),
                    depth = $this.parents('ul').length - 1,
                    dash = '';

            if (depth) {
                while (depth > 0) {
                    dash += '--';
                    depth--;
                }
            }

            optionsList += '<option value="' + $anchor.attr('href') + '">' + dash + ' ' + $anchor.text() + '</option>';

        });

        $mainNav.after('<select class="nav-responsive">' + optionsList + '</select>');

        $('.nav-responsive').on('change', function() {
            window.location = $(this).val();
        });

    })();

    /* end Main Navigation */
	

    /* ---------------------------------------------------------------------- */
    /*	Preload Images
     /* ---------------------------------------------------------------------- */
	
	(function() {
		
		jQuery(window).bind("load", function () {
			var attachment = jQuery('.attachment');
			var t = attachment.length,
				i = 0;
			var init = setInterval(function () {
				attachment.eq(i).find('img').fadeIn(500).css({opacity: 1});
				i++;
				if (i == t) {
					clearInterval(init);
					delete init
				}
			}, 200)
		})
	})();
	

    /* ---------------------------------------------------------------------- */
    /*	Media
     /* ---------------------------------------------------------------------- */

    var $player = jQuery('audio');
    if ($player.length) {
        $player.mediaelementplayer({
            audioWidth: '98%',
            audioHeight: '34px',
            videoWidth: '100%',
            videoHeight: '100%'
        });
    }

    /* end Media */

    /* ---------------------------------------------------------------------- */
    /*	Placeholder
     /* ---------------------------------------------------------------------- */

    $.fn.placeholder = function() {

        if (typeof document.createElement("input").placeholder == 'undefined') {
            $('[placeholder]').focus(function() {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                    input.removeClass('placeholder');
                }
            }).blur(function() {
                var input = $(this);
                if (input.val() == '' || input.val() == input.attr('placeholder')) {
                    input.addClass('placeholder');
                    input.val(input.attr('placeholder'));
                }
            }).blur().parents('form').submit(function() {
                $(this).find('[placeholder]').each(function() {
                    var input = $(this);
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                })
            });
        }
    }

    $.fn.placeholder();

    /* end Placeholder */

    /* ---------------------------------------------------------------------- */
    /*	Fancybox
     /* ---------------------------------------------------------------------- */

    if ($('.fancy-image').length || $('a.video').length) {
        (function() {
            $('.fancy-image, a.video').fancybox({
                'titlePosition': 'over',
                'transitionIn': 'fade',
                'transitionOut': 'fade'
            }).each(function() {
                $(this).append('<span class="curtain">&nbsp;</span>');
            });
        })();

        (function() {
            $('a.video').on('click', function() {
                $.fancybox({
                    'type': 'iframe',
                    'href': this.href.replace(new RegExp('watch\\?v=', 'i'), 'embed/') + '&autoplay=1',
                    'overlayShow': true,
                    'centerOnScroll': true,
                    'speedIn': 100,
                    'speedOut': 50,
                    'width': 640,
                    'height': 480
                });
                return false;
            });
        })();
    }

    /* end fancybox --> End */

    /* ---------------------------------------------------------------------- */
    /*	Toggle
     /* ---------------------------------------------------------------------- */

    (function() {

        if ($('.toggle-container').length) {
            $(".toggle-container").hide(); //Hide (Collapse) the toggle containers on load
            $(".trigger").click(function() {
                $(this).toggleClass("active").next().slideToggle("slow");
                return false; //Prevent the browser jump to the link anchor
            });
        }

    })();

    /* end Toggle */

    /* Portfolio Single --> Begin */

    if (jQuery('.single-pics').length && jQuery('.single-pics img').length > 1) {
        jQuery('.single-pics').cycle({
            fx: 'scrollHorz',
            timeout: 0,
            next: '.next',
            prev: '.prev',
            easing: 'easeOutQuint'
        });
    }

    /* Portfolio Single --> End */


    /* Recent Projects --> Begin */
	
	var $projects = jQuery('ul.recent-projects');

    if ($projects.length) {
		
       $projects.after('<div class="recent-projects-nav clearfix"><a class="prevBtn">Prev</a><a class="nextBtn">Next</a></div>')
         .cycle({
            fx: 'fade',
            timeout: 0,
            next: '.nextBtn',
            prev: '.prevBtn',
            easing: 'easeOutQuint'
        });
		
		
			if( Modernizr.touch ) {
				
				function swipeFunc( e, dir ) {
				
					var $projects = jQuery( e.currentTarget );
					
					// Enable swipes if more than one slide
											
					$projects.data('dir', '');
						
						if( dir === 'left' ) {
							$projects.cycle('next');
						}
						
						if( dir === 'right' ) {
							$projects.data('dir', 'prev')
							$projects.cycle('prev');
						}
						
				}

				$projects.swipe({
					swipeLeft       : swipeFunc,
					swipeRight      : swipeFunc,
					allowPageScroll : 'auto'
				});

			}
		
    }

    /* Recent Projects --> End */


    /* Prepare loading fancybox --> Begin */

    if (jQuery('.zoomer').length) {
        jQuery('.zoomer').fancybox({
            'overlayShow': false,
            'transitionIn': 'elastic',
            'transitionOut': 'elastic'
        });
    }

    /* Prepare loading fancybox --> End */

    /* ---------------------------------------------------------------------- */
    /*	Back to Top
     /* ---------------------------------------------------------------------- */

    var extend = {
        button: '#back-top',
        backToTop: '.divider-to-top a',
        text: 'Back to Top',
        min: 200,
        fadeIn: 400,
        fadeOut: 400,
        speed: 800,
        easing: 'easeOutQuint'
    },

		oldiOS     = false,
		oldAndroid = false;

	// Detect if older iOS device, which doesn't support fixed position
	if( /(iPhone|iPod|iPad)\sOS\s[0-4][_\d]+/i.test(navigator.userAgent) )
		oldiOS = true;

	// Detect if older Android device, which doesn't support fixed position
	if( /Android\s+([0-2][\.\d]+)/i.test(navigator.userAgent) )
		oldAndroid = true;
	
    jQuery('body').append('<a href="#" id="' + extend.button.substring(1) + '" title="' + extend.text + '">' + extend.text + '</a>');

    jQuery(window).scroll(function() {
		
        var pos = $(window).scrollTop();
		
		if( oldiOS || oldAndroid ) {
				jQuery(extend.button ).css({
					'position' : 'absolute',
					'top'      : pos + jQuery(window).height()
				});
			}

        if (pos > extend.min) {
            jQuery(extend.button).fadeIn(extend.fadeIn);
        }
        else {
            jQuery(extend.button).fadeOut(extend.fadeOut);
        }

    });

    jQuery(extend.button).add(extend.backToTop).click(function(e) {
        $('html, body').animate({
            scrollTop: 0
        }, extend.speed, extend.easing);
        e.preventDefault();
    });

    /* end Back to Top */

	/* ---------------------------------------------------------------------- */
	/*	Sudo Slider
	/* ---------------------------------------------------------------------- */
	
	(function(){

		var $sudo = jQuery('.sudo-slider');

		if ($sudo.length) {

			$sudo.sudoSlider({
				continuous: false,
				responsive: true,
				fade: true,
				afterAniFunc: function() {
					var self = $(this), size;
					size = self.siblings("li").size();
					if (size < 1) {
						self.closest(".image-gallery-slider").find("#controls").fadeOut();
					}					
				}
			});							

		}
		
	})();

   /* end Sudo Slider */	

	/* ---------------------------------------------------------------------- */
	/*	WorkPanel
	/* ---------------------------------------------------------------------- */
	
	(function(){

		jQuery('.js_gallery_album_cover').live('click', function() {
			var panel = jQuery('#workPanel');
			var data = {
				sidebar_position: template_gallery_sidebar_position,
				action: "render_gall",
				id: jQuery(this).attr('album_id')
			};

				  jQuery.post(ajaxurl, data, function(response) {
					  
							panel.show();
						  jQuery('.responsed_content').html("").addClass('loader').fadeOut(300, function(){
								$(this).fadeIn(800).html(response).queue(function(){
									$(this).removeClass('loader').dequeue();
								});
							});

					  var panelHeight = panel.attr('data-height');

					  panel.stop().animate({
						  opacity: 1,
						  minHeight: panelHeight
					  }, 500, function() {

						var $slider = jQuery('.sudo-slider');

						if ($slider.length) {

							$slider.sudoSlider({
								continuous: false,
								responsive: true,
								fade: true,
								afterAniFunc: function() {
									var self = $(this), size;
									size = self.siblings("li").size();
									if (size < 1) {
										self.closest(".image-gallery-slider").find("#controls").fadeOut();
									}
								}
							});							

						}
						  jQuery('body, html').animate({
							  scrollTop : panel.offset().top-50
						  }, 1000);
					  });
				  });
				  return false;
			  });

			  jQuery(".close").click(function(){
				  jQuery("#workPanel").animate({
					  opacity: 0,
					  minHeight: 0
				  },700,function(){
					  jQuery("#workPanel").hide(700);
				  });
				  return false;
			  });	

	})();

   /* end WorkPanel */	

    /* ---------------------------------------------------- */
    /*	Fancybox
     /* ---------------------------------------------------- */

    (function() {

        if ($('a.single-image').length || $('a.video').length || $('a.picture-icon').length) {

            $('a.single-image').fancybox({
                'titlePosition': 'over',
                'transitionIn': 'fade',
                'transitionOut': 'fade'
            });

            $('a.picture-icon').each(function() {
                $(this).append('<span class="curtain">&nbsp;</span>');
            });

        }

        if ($('a.video').length) {

            $('a.video').on('click', function() {
                $.fancybox({
                    'type': 'iframe',
                    'href': this.href.replace(new RegExp('watch\\?v=', 'i'), 'embed/') + '&autoplay=1',
                    'overlayShow': true,
                    'centerOnScroll': true,
                    'speedIn': 100,
                    'speedOut': 50,
                    'width': 640,
                    'height': 480
                });
                return false;
            });
        }

    })();

    /* end fancybox --> End */

    /* ---------------------------------------------------------------------- */
    /*	FitVids
     /* ---------------------------------------------------------------------- */

    (function() {

        function adjustVideos() {

            var $videos = $('.fluid-width-video-wrapper');


            $videos.each(function() {

                var $this = $(this)
                playerWidth = $this.parent().width(),
                        playerHeight = playerWidth / $this.data('aspectRatio');

                $this.css({
                    'height': playerHeight,
                    'width': playerWidth
                })

            });

        }

        $('.row').each(function() {

            var selectors = [
                "iframe[src^='http://player.vimeo.com']",
                "iframe[src^='http://www.youtube.com']",
                "iframe[src^='http://blip.tv']",
                "iframe[src^='http://www.kickstarter.com']",
                "object",
                "embed"
                    ],
                    $allVideos = $(this).find(selectors.join(','));

            $allVideos.each(function() {

                var $this = $(this);

                if (this.tagName.toLowerCase() == 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length)
                    return;

                var videoHeight = $this.attr('height') || $this.height(),
                        videoWidth = $this.attr('width') || $this.width();

                $this.css({
                    'height': '100%',
                    'width': '100%'
                }).removeAttr('height').removeAttr('width')
                        .wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css({
                    'height': videoHeight,
                    'width': videoWidth
                }).data('aspectRatio', videoWidth / videoHeight);

                adjustVideos();

            });

        });

        $(window).on('resize', function() {

            var timer = window.setTimeout(function() {
                window.clearTimeout(timer);
                adjustVideos();
            }, 30);

        });

    })();

    /* end FitVids */

    /* ---------------------------------------------------- */
    /*	Portfolio
     /* ---------------------------------------------------- */

    (function() {

        var $cont = $('#portfolio-items');

        if ($cont.length) {

            var $itemsFilter = $('#portfolio-filter'),
                    mouseOver;

            // Copy categories to item classes
            $('article', $cont).each(function(i) {
                var $this = $(this);
                $this.addClass($this.attr('data-categories'));
            });

            // Run Isotope when all images are fully loaded
            $(window).on('load', function() {

                $cont.isotope({
                    itemSelector: 'article',
                    layoutMode: 'fitRows'
                });

            });

            // Filter projects
            $itemsFilter.on('click', 'a', function(e) {
                var $this = $(this),
                        currentOption = $this.attr('data-categories');

                $itemsFilter.find('a').removeClass('active');
                $this.addClass('active');

                if (currentOption) {
                    if (currentOption !== '*')
                        currentOption = currentOption.replace(currentOption, '.' + currentOption)

                    $cont.isotope({filter: currentOption});
                }

                e.preventDefault();
            });

            $itemsFilter.find('a').first().addClass('active');
        }

    })();

    /* end Portfolio */

    /* ---------------------------------------------------- */
    /*	Gallery
     /* ---------------------------------------------------- */

    (function() {

        var $cont = $('#gallery-items');

        if ($cont.length) {

            var $itemsFilter = $('#gallery-filter'),
                    mouseOver;

            // Copy categories to item classes
            $('article', $cont).each(function(i) {
                var $this = $(this);
                $this.addClass($this.attr('data-categories'));
            });

            // Run Isotope when all images are fully loaded
            $(window).on('load', function() {

                $cont.isotope({
                    itemSelector: 'article',
                    layoutMode: 'fitRows'
                });

            });

            // Filter projects
            $itemsFilter.on('click', 'a', function(e) {
                var $this = $(this),
                        currentOption = $this.attr('data-categories');

                $itemsFilter.find('a').removeClass('active');
                $this.addClass('active');

                if (currentOption) {
                    if (currentOption !== '*')
                        currentOption = currentOption.replace(currentOption, '.' + currentOption)

                    $cont.isotope({filter: currentOption});
                }

                e.preventDefault();
            });

            $itemsFilter.find('a').first().addClass('active');
        }

    })();

    /* end Gallery */


    //**** functions for comments

    if (parseInt(jQuery("[name=is_user_logged_in]").val(), 10)) {

        var comments = jQuery(".comment-reply-link");

        jQuery.each(comments, function(index, value) {
            jQuery(value).removeAttr("onclick");
            jQuery(value).live('click', function() {

                if (jQuery(value).parents(".comment-body").find(".add-comment").length > 0) {
                    return false;
                }

                var comment_id = jQuery(value).closest("li").attr("comment-id");
                var html = jQuery("#addcomments_template").html();
                html = html.replace(/__INDEX__/gi, comment_id);
                jQuery("#commentform .add-comment").hide(300);
                jQuery(value).parent().after(html);
                return false;
            });

        });

        jQuery(".reset").live('click', function() {
            var form = jQuery(this).closest(".add-comment");
            jQuery(form).hide(300, function() {
                jQuery(form).remove();
            });
        });

        jQuery(".reply").live('click', function() {
            jQuery(this).closest(".add-comment").hide(300, function() {
                var comment_parent = jQuery(this).closest(".add-comment").attr("id-reply");
                var comment_content = jQuery(this).parent().find("textarea").eq(0).val();
                if (!comment_content.length) {
                    jQuery(this).closest(".add-comment").show();
                    return false;
                }
                var data = {
                    action: "add_comment",
                    comment_parent: comment_parent,
                    comment_post_ID: jQuery("[name=current_post_id]").val(),
                    comment_content: comment_content
                };
                //send data to server
                jQuery.post(ajaxurl, data, function(response) {
                    window.location.href = jQuery("[name=current_post_url]").val() + "?new_comment=" + response;
                });

            });
        });
    }

//***************************
//update_capcha();

});

function submit_widget_contact_form(form_object) {
    jQuery(form_object).next(".contact_form_responce").find("ul").eq(0).html("");
    jQuery(form_object).next(".contact_form_responce").find("ul").eq(0).removeClass();

    var data = {
        action: "contact_form_request",
        values: jQuery(form_object).serialize()
    };
    //send data to server
    jQuery.post(ajaxurl, data, function(response) {
        response = jQuery.parseJSON(response);
        jQuery(form_object).find(".wrong_data").removeClass("wrong_data");
        if (response.is_errors) {
            jQuery(form_object).closest(".contact_form_responce").addClass("contact_form_responce_error");
            jQuery.each(response.info, function(input_name, input_label) {
                jQuery(form_object).find("[name=" + input_name + "]").eq(0).addClass("wrong_data");
                jQuery(form_object).next(".contact_form_responce").find("ul").eq(0).append('<li>' + lang_enter_correctly + ' "' + input_label + '"!</li>');
            });
        } else {
            jQuery(form_object).next(".contact_form_responce").find("ul").eq(0).addClass("contact_form_responce_succsess");
            if (response.info == 'succsess') {
                jQuery(form_object).next(".contact_form_responce").find("ul").eq(0).append('<li>' + lang_sended_succsessfully + '!</li>');
            }

            if (response.info == 'server_fail') {
                jQuery(form_object).next(".contact_form_responce").find("ul").eq(0).append('<li>' + lang_server_failed + '!</li>');
            }

            jQuery(form_object).find("[type=text],textarea").val("");

        }
        //*****
        update_capcha();
        jQuery(form_object).next(".contact_form_responce").show(300);
    });


    return false;
}

function update_capcha() {
    if (jQuery("[name=capcha_image_frame]").length > 0) {
        window.frames["capcha_image_frame"].location.reload();
    }
    if (jQuery("[name=capcha_image_frame_widget]").length > 0) {
        window.frames["capcha_image_frame_widget"].location.reload();
    }
}

function getElementsByClass(searchClass, node, tag) {
    var classElements = new Array();
    if (node == null)
        node = document;
    if (tag == null)
        tag = '*';
    var els = node.getElementsByTagName(tag);
    var elsLen = els.length;
    var pattern = new RegExp("(^|\\s)" + searchClass + "(\\s|$)");
    for (i = 0, j = 0; i < elsLen; i++) {
        if (pattern.test(els[i].className)) {
            classElements[j] = els[i];
            j++;
        }
    }
    return classElements;
}

function gmt_init_map(Lat, Lng, map_canvas_id, zoom, maptype, info, show_marker, show_popup, scrollwheel, custom_controls) {
    var latLng = new google.maps.LatLng(Lat, Lng);
    var homeLatLng = new google.maps.LatLng(Lat, Lng);

    switch (maptype) {
        case "SATELLITE":
            maptype = google.maps.MapTypeId.SATELLITE;
            break;

        case "HYBRID":
            maptype = google.maps.MapTypeId.HYBRID;
            break;

        case "TERRAIN":
            maptype = google.maps.MapTypeId.TERRAIN;
            break;

        default:
            maptype = google.maps.MapTypeId.ROADMAP;
            break;

    }

    scrollwheel = parseInt(scrollwheel, 10);
    var map;
    if (custom_controls.length > 0) {

        var options = merge_objects_options({
            zoom: zoom,
            center: latLng,
            mapTypeId: maptype,
            scrollwheel: scrollwheel,
            disableDefaultUI: true
        }, custom_controls);

        map = new google.maps.Map(document.getElementById(map_canvas_id), options);
    } else {
        map = new google.maps.Map(document.getElementById(map_canvas_id), {
            zoom: zoom,
            center: latLng,
            mapTypeId: maptype,
            scrollwheel: scrollwheel
        });
    }


    show_marker = parseInt(show_marker, 10);
    if (show_marker) {
        var marker = new MarkerWithLabel({
            position: homeLatLng,
            draggable: false,
            map: map
        });


        if (show_popup && info != "") {
            google.maps.event.addListener(marker, "click", function(e) {
                iw.open(map, marker);
            });
            var iw = new google.maps.InfoWindow({
                content: '<span>' + info + '</span>'
            });
        }
    }

}

function merge_objects_options(obj1, obj2) {
    var obj3 = {};
    for (var attrname in obj1) {
        obj3[attrname] = obj1[attrname];
    }
    for (var attrname in obj2) {
        obj3[attrname] = obj2[attrname];
    }
    return obj3;
}

function init_video(video_id, width, height) {
    jQuery(video_id).mediaelementplayer(
            {
                defaultVideoWidth: width,
                defaultVideoHeight: height
            });
}

