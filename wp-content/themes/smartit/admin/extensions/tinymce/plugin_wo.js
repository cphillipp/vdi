var thememakers_shortcodes_array=[
{
   "key":"product",
   "title":"Product"
},
{
    "key":"alert",
    "title":"Alerts"
},
{
    "key":"audio",
    "title":"Audio"
},
{
    "key":"blog",
    "title":"Blog"
},
{
    "key":"button",
    "title":"Button"
},
{
    "key":"chart",
    "title":"Charts"
},

{
    "key":"columns",
    "title":"Columns"
},
{
    "key":"columnpost",
    "title":"Column post"
},
{
    "key":"contactform",
    "title":"Contact form"
},

{
    "key":"dividers",
    "title":"Dividers"
},
{
    "key":"dropcap",
    "title":"Dropcap"
},
{
    "key":"gmap",
    "title":"Google map"
},

{
    "key":"image",
    "title":"Image"
},
{
    "key":"inlinebox",
    "title":"Inline box"
},
{
    "key":"list",
    "title":"List"
},
{
    "key":"pricing_tables",
    "title":"Pricing tables"
},

{
    "key":"quotes",
    "title":"Quotes"
},
{
    "key":"table",
    "title":"Table"
},
{
    "key":"twitter",
    "title":"Twitter"
},
{
    "key":"tabs",
    "title":"Tabbed Content"
},
{
    "key":"title",
    "title":"Title"
},
{
    "key":"toggle",
    "title":"Toggle Content"
},
{
    "key":"video",
    "title":"Video"
}
];

(function ()
{
    // create tmkShortcodes plugin
    tinymce.create("tinymce.plugins.tmkShortcodes",
    {
        init: function ( ed, url )
        {
            ed.addCommand("tmkPopup", function ( a, params )
            {
                var popup = params.identifier;
                // load thickbox
                tb_show("Insert Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
            });
        },
        createControl: function ( btn, e )
        {
            //for there where its doesn needs
            if(jQuery("body").find("#no_shortcode_button").length>0){
                return null;
            }


            if ( btn == "tmk_button" )
            {
                var a = this;

                // adds the tinymce button
                btn = e.createMenuButton("tmk_button",
                {
                    title: "Insert Shortcode",
                    image: template_directory+"/admin/extensions/tinymce/images/add_icon.png",
                    icons: false
                });

                // adds the dropdown to the button
                btn.onRenderMenu.add(function (c, b)
                {
                    jQuery.each(thememakers_shortcodes_array, function(key,shortcode){
                        a.addWithPopup( b, shortcode.title, shortcode.key );
                    });
                });

                return btn;
            }

            return null;
        },
        addWithPopup: function ( ed, title, id ) {
            ed.add({
                title: title,
                onclick: function () {
                    tinyMCE.activeEditor.execCommand("tmkPopup", false, {
                        title: title,
                        identifier: id
                    })
                }
            })
        },
        addImmediate: function ( ed, title, sc) {
            ed.add({
                title: title,
                onclick: function () {
                    tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc );
                }
            })
        },
        getInfo: function () {
            return {
                longname: 'Thememakers Shortcodes',
                version: "1.0"
            }
        }
    });

    //add tmkShortcodes plugin
    tinymce.PluginManager.add("tmkShortcodes", tinymce.plugins.tmkShortcodes);
})();
