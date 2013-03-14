
// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {


    var tzs = {
        loadVals: function()
        {
            var shortcode = $('#_tmk_shortcode').text(),
                    uShortcode = shortcode;

            // fill in the gaps eg {{param}}
            $('.tmk-input').each(function() {
                var input = $(this),
                        id = input.attr('id'),
                        id = id.replace('tmk_', ''), // gets rid of the tmk_ prefix
                        re = new RegExp("{{" + id + "}}", "g");

                uShortcode = uShortcode.replace(re, input.val());
            });

            // adds the filled-in shortcode as hidden input
            $('#_tmk_ushortcode').remove();
            $('#tmk-sc-form-table').prepend('<div id="_tmk_ushortcode" class="hidden">' + uShortcode + '</div>');


            // updates preview
            tzs.updatePreview();
        },
        cLoadVals: function()
        {
            var shortcode = $('#_tmk_cshortcode').text(),
                    pShortcode = '';
            shortcodes = '';

            // fill in the gaps eg {{param}}
            $('.child-clone-row').each(function() {
                var row = $(this),
                        rShortcode = shortcode;

                $('.tmk-cinput', this).each(function() {
                    var input = $(this),
                            id = input.attr('id'),
                            id = id.replace('tmk_', '')		// gets rid of the tmk_ prefix
                    re = new RegExp("{{" + id + "}}", "g");

                    rShortcode = rShortcode.replace(re, input.val());
                });

                shortcodes = shortcodes + rShortcode + "\n";
            });

            // adds the filled-in shortcode as hidden input
            $('#_tmk_cshortcodes').remove();
            $('.child-clone-rows').prepend('<div id="_tmk_cshortcodes" class="hidden">' + shortcodes + '</div>');

            // add to parent shortcode
            this.loadVals();
            pShortcode = $('#_tmk_ushortcode').text().replace('{{child_shortcode}}', shortcodes);

            // add updated parent shortcode
            $('#_tmk_ushortcode').remove();
            $('#tmk-sc-form-table').prepend('<div id="_tmk_ushortcode" class="hidden">' + pShortcode + '</div>');

            // updates preview
            tzs.updatePreview();
        },
        children: function()
        {
            // assign the cloning plugin
            $('.child-clone-rows').appendo({
                subSelect: '> div.child-clone-row:last-child',
                allowDelete: false,
                focusFirst: false
            });

            // remove button
            $('.child-clone-row-remove').live('click', function() {
                var btn = $(this),
                        row = btn.parent();

                if ($('.child-clone-row').size() > 1)
                {
                    row.remove();
                }
                else
                {
                    alert('You need a minimum of one row');
                }

                return false;
            });

            // assign jUI sortable
            $(".child-clone-rows").sortable({
                placeholder: "sortable-placeholder",
                items: '.child-clone-row'

            });
        },
        updatePreview: function()
        {
            if ($('#tmk-sc-preview').size() > 0)
            {
                var shortcode = $('#_tmk_ushortcode').html(),
                        iframe = $('#tmk-sc-preview'),
                        iframeSrc = iframe.attr('src'),
                        iframeSrc = iframeSrc.split('preview.php'),
                        iframeSrc = iframeSrc[0] + 'preview.php';

                // updates the src value
                iframe.attr('src', iframeSrc + '?sc=' + base64_encode(shortcode));

                // update the height
                $('#tmk-sc-preview').height($('#tmk-popup').outerHeight() - 42);
            }
        },
        resizeTB: function()
        {
            var ajaxCont = $('#TB_ajaxContent'),
                    tbWindow = $('#TB_window'),
                    tzPopup = $('#tmk-popup'),
                    no_preview = ($('#_tmk_preview').text() == 'false') ? true : false;

            if (no_preview)
            {
                ajaxCont.css({
                    paddingTop: 0,
                    paddingLeft: 0,
                    height: (tbWindow.outerHeight() - 47),
                    overflow: 'scroll', // IMPORTANT
                    width: 560
                });

                tbWindow.css({
                    width: ajaxCont.outerWidth(),
                    marginLeft: -(ajaxCont.outerWidth() / 2)
                });

                $('#tmk-popup').addClass('no_preview');
            }
            else
            {
                ajaxCont.css({
                    padding: 0,
                    // height: (tbWindow.outerHeight()-47),
                    height: tzPopup.outerHeight() - 15,
                    overflow: 'hidden' // IMPORTANT
                });

                tbWindow.css({
                    width: ajaxCont.outerWidth(),
                    height: (ajaxCont.outerHeight() + 30),
                    marginLeft: -(ajaxCont.outerWidth() / 2),
                    marginTop: -((ajaxCont.outerHeight() + 47) / 2),
                    top: '50%'
                });
            }
        },
        load: function()
        {
            var tzs = this,
                    popup = $('#tmk-popup'),
                    form = $('#tmk-sc-form', popup),
                    shortcode = $('#_tmk_shortcode', form).text(),
                    popupType = $('#_tmk_popup', form).text(),
                    uShortcode = '';

            // resize TB
            tzs.resizeTB();
            $(window).resize(function() {
                tzs.resizeTB()
            });

            // initialise
            tzs.loadVals();
            tzs.children();
            tzs.cLoadVals();

            // update on children value change
            $('.tmk-cinput', form).live('change', function() {
                tzs.cLoadVals();
            });

            // update on value change
            $('.tmk-input', form).change(function() {
                tzs.loadVals();
            });

            // when insert is clicked
            $('.tmk-insert', form).click(function() {
                try {
                    if (page_builder_object.active_shortcode_value == null) {
                        if (window.tinyMCE)
                        {
                            //window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_tmk_ushortcode', form).html());
                            tinyMCE.activeEditor.execCommand("mceInsertContent", false, $('#_tmk_ushortcode', form).html());
                            tb_remove();
                        }
                    } else {
                        jQuery("#" + page_builder_object.active_shortcode_value).val($('#_tmk_ushortcode', form).html());
                        jQuery("#hidden_shortcode_title_" + page_builder_object.active_shortcode_index).val(page_builder_object.active_shortcode_title);
                        var title = "Text";
                        if (page_builder_object.active_shortcode_title.length > 0) {
                            title = page_builder_object.active_shortcode_title;
                        }
                        jQuery("#showed_shortcode_title_" + page_builder_object.active_shortcode_index).html(title);
                        page_builder_object.active_shortcode_value = null;
                        tb_remove();
                    }

                    page_builder_object.active_shortcode_value = null;
                } catch (err) {
                    if (window.tinyMCE)
                    {
                        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_tmk_ushortcode', form).html());
                        tb_remove();
                    }
                }





            });
        }
    }
    
    
    //*****
    $(".colorpicker_input").live('onchange', function() {
        tzs.cLoadVals();
    });

    // run
	
    $('#tmk-popup').livequery(function() {
        tzs.load();
    });
	
});