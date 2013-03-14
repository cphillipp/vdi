<?php

$content_fonts = array();
$content_fonts_tmp = ThemeMakersHelperFonts::get_content_fonts();
foreach ($content_fonts_tmp as $key => $value) {
    $content_fonts[$value] = $value;
}

$google_fonts = ThemeMakersHelperFonts::get_google_fonts();
$google_fonts_array = array("" => "none");
foreach ($google_fonts as $key => $value) {
    $index = explode(":", $value);
    $google_fonts_array[$index[0]] = $value;
}


$font_size_array = array();
for ($i = 8; $i <= 72; $i++) {
    $font_size_array[$i] = $i;
}

$post_sort = array('ID', 'date', 'post_date', 'title', 'post_title', 'name', 'post_name', 'modified',
    'post_modified', 'modified_gmt', 'post_modified_gmt', 'menu_order', 'parent', 'post_parent',
    'rand', 'comment_count', 'author', 'post_author',);


$post_categories_objects = get_categories(array(
    'orderby' => 'name',
    'order' => 'ASC',
    'style' => 'list',
    'show_count' => 0,
    'hide_empty' => 0,
    'use_desc_for_title' => 1,
    'child_of' => 0,
    'hierarchical' => true,
    'title_li' => '',
    'show_option_none' => '',
    'number' => NULL,
    'echo' => 0,
    'depth' => 0,
    'current_category' => 0,
    'pad_counts' => 0,
    'taxonomy' => 'category',
    'walker' => 'Walker_Category'));

$post_categories = array();
$post_categories[0] = "";
foreach ($post_categories_objects as $key => $value) {
    $post_categories[$value->term_id] = $value->name;
}


// Buttons shortcode config
$tmk_shortcodes['button'] = array(
    'params' => array(
        'but_color' => array(
            'type' => 'color',
            'label' => __('Button Color', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Select the button style', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => ThemeMakersHelper::get_theme_buttons()
        ),
        'size' => array(
            'type' => 'select',
            'label' => __('Button\'s Size', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Select the button\'s size', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => ThemeMakersHelper::get_theme_buttons_sizes()
        ),
        'url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button URL', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Add the button\'s url eg http://example.com', THEMEMAKERS_THEME_FOLDER_NAME)
        ),
        'content' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button\'s Text', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Add the button\'s text', THEMEMAKERS_THEME_FOLDER_NAME),
        )
    ),
    'shortcode' => '[button url="{{url}}" but_color="{{but_color}}" size="{{size}}"] {{content}} [/button]',
    'popup_title' => __('Insert Button Shortcode', THEMEMAKERS_THEME_FOLDER_NAME)
);

// Dividers shortcode config
$tmk_shortcodes['dividers'] = array(
    'params' => array(
        'style' => array(
            'type' => 'select',
            'label' => __('Divider Style', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                'blank' => __('Blank', THEMEMAKERS_THEME_FOLDER_NAME),
                'solid' => __('Solid', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        )
    ),
    'shortcode' => '[divider style="{{style}}"][/divider]',
    'popup_title' => __('Insert Divider Shortcode', THEMEMAKERS_THEME_FOLDER_NAME)
);

// Color Circles
$tmk_shortcodes['circles'] = array(
    'params' => array(
        'content' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Circle Content', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'color' => array(
            'type' => 'select',
            'label' => __('Color', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                'range-green' => __('Green', THEMEMAKERS_THEME_FOLDER_NAME),
                'range-orange' => __('Orange', THEMEMAKERS_THEME_FOLDER_NAME),
                'range-blue' => __('Blue', THEMEMAKERS_THEME_FOLDER_NAME),
                'range-red' => __('Red', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
    ),
    'shortcode' => '[circle color={{color}}]{{content}}[/circle]',
    'popup_title' => __('Insert Color Circle Shortcode', THEMEMAKERS_THEME_FOLDER_NAME)
);



// Image Rostislav 29-06-2012
$tmk_shortcodes['image'] = array(
    'params' => array(
        'content' => array(
            'std' => 'http://',
            'type' => 'upload',
            'label' => __('Image Location', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'link' => array(
            'std' => 'http://',
            'type' => 'text',
            'label' => __('Image Link', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'target' => array(
            'type' => 'select',
            'label' => __('Link target', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                '_self' => __('self', THEMEMAKERS_THEME_FOLDER_NAME),
                '_blank' => __('blank', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'open_as' => array(
            'type' => 'select',
            'label' => __('Action', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                'none' => __('No link on image', THEMEMAKERS_THEME_FOLDER_NAME),
                'link' => __('Open link', THEMEMAKERS_THEME_FOLDER_NAME),
                'fancybox' => __('Show image in fancybox', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'shadow' => array(
            'type' => 'select',
            'label' => __('Inner Shadow', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                'disable' => __('Disable', THEMEMAKERS_THEME_FOLDER_NAME),
                'enable' => __('Enable', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'fancybox_group' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Fancybox group', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'width' => array(
            'std' => 222,
            'type' => 'text',
            'label' => __('Thumb width', THEMEMAKERS_THEME_FOLDER_NAME),
        )
        ,
        'height' => array(
            'std' => 0,
            'type' => 'text',
            'label' => __('Thumb height', THEMEMAKERS_THEME_FOLDER_NAME),
        )
        ,
        'alt' => array(
            'std' => "",
            'type' => 'text',
            'label' => __('Image alt', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'link_title' => array(
            'std' => "",
            'type' => 'text',
            'label' => __('Link title', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'margin_top' => array(
            'std' => 0,
            'type' => 'text',
            'label' => __('Top indent', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'margin_right' => array(
            'std' => 0,
            'type' => 'text',
            'label' => __('Right indent', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'margin_bottom' => array(
            'std' => 0,
            'type' => 'text',
            'label' => __('Bottom indent', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'margin_left' => array(
            'std' => 0,
            'type' => 'text',
            'label' => __('Left indent', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'align' => array(
            'type' => 'select',
            'label' => __('Align', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                'none' => __('None', THEMEMAKERS_THEME_FOLDER_NAME),
                'right' => __('Right', THEMEMAKERS_THEME_FOLDER_NAME),
                'left' => __('Left', THEMEMAKERS_THEME_FOLDER_NAME),
                'center' => __('Center', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        ),
    ),
    'no_preview' => false,
    'shortcode' => '[image link="{{link}}" link_title="{{link_title}}" target="{{target}}" open_as="{{open_as}}" shadow="{{shadow}}" fancybox_group="{{fancybox_group}}" width="{{width}}" height="{{height}}" alt="{{alt}}" align="{{align}}" margin_top="{{margin_top}}" margin_right="{{margin_right}}" margin_bottom="{{margin_bottom}}" margin_left="{{margin_left}}"]{{content}}[/image]',
    'popup_title' => __('Insert Image', THEMEMAKERS_THEME_FOLDER_NAME)
);

//Column post Rostislav 04-07-2012
$all_posts = get_posts(array('numberposts' => -1));
$post_select_array = array();
foreach ($all_posts as $post) {
    $post_select_array[$post->ID] = $post->post_title;
}

$tmk_shortcodes['columnpost'] = array(
    'params' => array(
        'post_id' => array(
            'type' => 'select',
            'label' => __('Select post', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => $post_select_array
        ),
        'show_exert' => array(
            'type' => 'select',
            'label' => __('Exerpt or content', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                '1' => __('Show exerpt', THEMEMAKERS_THEME_FOLDER_NAME),
                '0' => __('Show content', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'char_count' => array(
            'std' => 140,
            'type' => 'text',
            'label' => __('Char count', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'show_featured_image' => array(
            'type' => 'select',
            'label' => __('Featured image', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                '0' => __('No image', THEMEMAKERS_THEME_FOLDER_NAME),
                '1' => __('Show featured image', THEMEMAKERS_THEME_FOLDER_NAME),
                '2' => __('Use custom image link', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'image_align' => array(
            'type' => 'select',
            'label' => __('Image align', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                'left' => __('left', THEMEMAKERS_THEME_FOLDER_NAME),
                'center' => __('center', THEMEMAKERS_THEME_FOLDER_NAME),
                'right' => __('right', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        ),
        'custom_image_link' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Custom image link', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'thumb_width' => array(
            'std' => 222,
            'type' => 'text',
            'label' => __('Thumb width', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'thumb_height' => array(
            'std' => 100,
            'type' => 'text',
            'label' => __('Thumb height', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'show_readmore' => array(
            'type' => 'select',
            'label' => __('Read more button', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                '0' => __('No readmore button', THEMEMAKERS_THEME_FOLDER_NAME),
                '1' => __('Show readmore button', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'read_more_button_color' => array(
            'type' => 'select',
            'label' => __('Button Color', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Select the button style', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => ThemeMakersHelper::get_theme_buttons()
        ),
        'read_more_button_size' => array(
            'type' => 'select',
            'label' => __('Button\'s Size', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Select the button\'s size', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => ThemeMakersHelper::get_theme_buttons_sizes()
        ),
        'title_align' => array(
            'type' => 'select',
            'label' => __('Title align', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                'left' => __('left', THEMEMAKERS_THEME_FOLDER_NAME),
                'center' => __('center', THEMEMAKERS_THEME_FOLDER_NAME),
                'right' => __('right', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        ),
        'text_align' => array(
            'type' => 'select',
            'label' => __('Text align', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                'left' => __('left', THEMEMAKERS_THEME_FOLDER_NAME),
                'center' => __('center', THEMEMAKERS_THEME_FOLDER_NAME),
                'right' => __('right', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        )
    ),
    'no_preview' => false,
    'shortcode' => '[columnpost post_id="{{post_id}}" show_exert="{{show_exert}}" char_count="{{char_count}}" show_featured_image="{{show_featured_image}}" image_align="{{image_align}}" custom_image_link="{{custom_image_link}}" thumb_width="{{thumb_width}}" thumb_height="{{thumb_height}}" show_readmore="{{show_readmore}}" read_more_button_color="{{read_more_button_color}}" read_more_button_size="{{read_more_button_size}}" text_align="{{text_align}}" title_align="{{title_align}}"][/columnpost]',
    'popup_title' => __('Insert Column Post', THEMEMAKERS_THEME_FOLDER_NAME)
);




// Title Rostislav 29-06-2012
$tmk_shortcodes['title'] = array(
    'params' => array(
        'content' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title text', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'show_border' => array(
            'type' => 'select',
            'label' => __('Border', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                '0' => __('Hide border', THEMEMAKERS_THEME_FOLDER_NAME),
                '1' => __('Show border', THEMEMAKERS_THEME_FOLDER_NAME),
            ),
        ),
        'type' => array(
            'type' => 'select',
            'label' => __('Title heading', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                'h1' => __('h1', THEMEMAKERS_THEME_FOLDER_NAME),
                'h2' => __('h2', THEMEMAKERS_THEME_FOLDER_NAME),
                'h3' => __('h3', THEMEMAKERS_THEME_FOLDER_NAME),
                'h4' => __('h4', THEMEMAKERS_THEME_FOLDER_NAME),
                'h5' => __('h5', THEMEMAKERS_THEME_FOLDER_NAME),
                'h6' => __('h6', THEMEMAKERS_THEME_FOLDER_NAME)
            ),
        ),
        'font_size' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Font size', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'line_height' => array(
            'std' => 'auto',
            'type' => 'text',
            'label' => __('Line height', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'font_family' => array(
            'type' => 'select',
            'label' => __('Font family', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => $google_fonts_array,
        ),
        'color' => array(
            'std' => '',
            'type' => 'color',
            'desc' => __('Example: #ffffff', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Text color', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'margin_bottom' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Bottom indent', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'align' => array(
            'type' => 'select',
            'label' => __('Align', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                'none' => __('None', THEMEMAKERS_THEME_FOLDER_NAME),
                'right' => __('Right', THEMEMAKERS_THEME_FOLDER_NAME),
                'left' => __('Left', THEMEMAKERS_THEME_FOLDER_NAME),
                'center' => __('Center', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        ),
    ),
    'no_preview' => false,
    'shortcode' => '[title font_size="{{font_size}}" line_height="{{line_height}}" show_border="{{show_border}}" type="{{type}}" font_family="{{font_family}}" color="{{color}}" align="{{align}}" margin_bottom="{{margin_bottom}}"]{{content}}[/title]',
    'popup_title' => __('Insert Title', THEMEMAKERS_THEME_FOLDER_NAME)
);


$tmk_shortcodes['list'] = array(
    'params' => array(
        'list_type' => array(
            'type' => 'select',
            'label' => __('List style', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => 'Ordered list has only 3 first types from a list below, Unordered has all 6th list types there.',
            'options' => array(
                'ul' => __('Unordered', THEMEMAKERS_THEME_FOLDER_NAME),
                'ol' => __('Ordered', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'list_class' => array(
            'type' => 'select',
            'label' => __('List type', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                '1' => __('Type 1', THEMEMAKERS_THEME_FOLDER_NAME),
                '2' => __('Type 2', THEMEMAKERS_THEME_FOLDER_NAME),
                '3' => __('Type 3', THEMEMAKERS_THEME_FOLDER_NAME),
                '4' => __('Type 4', THEMEMAKERS_THEME_FOLDER_NAME),
                '5' => __('Type 5', THEMEMAKERS_THEME_FOLDER_NAME),
                '6' => __('Type 6', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        ),
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'desc' => __('Example: option 1`option 2`option 3', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('List items', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
    ),
    'no_preview' => false,
    'shortcode' => '[list list_type="{{list_type}}" list_class="{{list_class}}"]{{content}}[/list]',
    'popup_title' => __('Insert List', THEMEMAKERS_THEME_FOLDER_NAME)
);






//Inlinebox Rostislav 05-07-2012
$tmk_shortcodes['inlinebox'] = array(
    'params' => array(
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title text', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'border' => array(
            'type' => 'select',
            'label' => __('Border', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                'none' => __('None', THEMEMAKERS_THEME_FOLDER_NAME),
                'show' => __('Show', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'title_link' => array(
            'std' => '#',
            'type' => 'text',
            'label' => __('Title link', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Box text', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'title_icon' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title icon', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'inlinebox_icons' => array(
            'std' => '',
            'type' => 'inlinebox_icons',
            'label' => __('Inlinebox icons set', THEMEMAKERS_THEME_FOLDER_NAME),
        )
    ),
    'no_preview' => false,
    'shortcode' => '[inlinebox title="{{title}}" border="{{border}}" title_icon="{{title_icon}}" title_link="{{title_link}}"]{{content}}[/inlinebox]',
    'popup_title' => __('Insert inline box', THEMEMAKERS_THEME_FOLDER_NAME)
);


// Hightlighted
$tmk_shortcodes['highlighted'] = array(
    'params' => array(
        'title' => array(
            'type' => 'text',
            'label' => __('Title', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'std' => ''
        ),
        'content' => array(
            'type' => 'text',
            'label' => __('Content', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'std' => ''
        ),
        'link' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Link', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'image' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Image URL', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'icon' => array(
            'type' => 'select',
            'label' => __('Icon', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                'no' => __('No Icon', THEMEMAKERS_THEME_FOLDER_NAME),
                'icon1' => __('Brush', THEMEMAKERS_THEME_FOLDER_NAME),
                'icon2' => __('Earth', THEMEMAKERS_THEME_FOLDER_NAME),
                'icon3' => __('Folder', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        )
    ),
    'no_preview' => false,
    'shortcode' => '[highlighted title="{{title}}" icon="{{icon}}" image={{image}} link="{{link}}"]{{content}}[/highlighted]',
    'popup_title' => __('Insert Highlighted Content', THEMEMAKERS_THEME_FOLDER_NAME)
);

// Dropcaps shortcode config
$tmk_shortcodes['dropcap'] = array(
    'params' => array(
        'content' => array(
            'type' => 'text',
            'label' => __('Letter', THEMEMAKERS_THEME_FOLDER_NAME),
            'std' => ''
        ),
        'style' => array(
            'type' => 'select',
            'label' => __('Dropcap Style', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Select the dropcap style', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                'circle' => __('Circle', THEMEMAKERS_THEME_FOLDER_NAME),
                'square' => __('Square', THEMEMAKERS_THEME_FOLDER_NAME),
                'square-grey' => __('Square Grey', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'custom_bg' => array(
            'std' => '',
            'type' => 'text',
            'desc' => "Example: http://site.com/images/image.png",
            'label' => __('Custom background', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'font_family' => array(
            'type' => 'select',
            'label' => __('Font family', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => $google_fonts_array,
        ),
        'color' => array(
            'std' => '',
            'type' => 'text',
            'desc' => "Example: #ff0000",
            'label' => __('Letter color', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'font_size' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Letter size', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
    ),
    'shortcode' => '[dropcap style="{{style}}" font_family="{{font_family}}" color="{{color}}" font_size="{{font_size}}" custom_bg={{custom_bg}}]{{content}}[/dropcap]',
    'popup_title' => __('Insert Dropcap Shortcode', THEMEMAKERS_THEME_FOLDER_NAME)
);





// Gallery shortcode config
$tmk_shortcodes['lightbox'] = array(
    'params' => array(
        'method' => array(
            'type' => 'select',
            'label' => __('Resizing Method', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Select the way to resize your image.', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                'crop' => __('Crop', THEMEMAKERS_THEME_FOLDER_NAME),
                'stretch' => __('Stretch', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        ),
        'width' => array(
            'type' => 'text',
            'label' => __('Thumb Width', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Enter the width.', THEMEMAKERS_THEME_FOLDER_NAME),
            'std' => ''
        ),
        'height' => array(
            'type' => 'text',
            'label' => __('Thumb Height', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Enter the height.', THEMEMAKERS_THEME_FOLDER_NAME),
            'std' => ''
        ),
        'content' => array(
            'type' => 'text',
            'label' => __('Image URL', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Enter the image URL.', THEMEMAKERS_THEME_FOLDER_NAME),
            'std' => ''
        ),
        'align' => array(
            'type' => 'select',
            'label' => __('Align', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                'center' => __('Center', THEMEMAKERS_THEME_FOLDER_NAME),
                'left' => __('Left', THEMEMAKERS_THEME_FOLDER_NAME),
                'right' => __('Right', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        ),
    ),
    'shortcode' => '[lightbox method="{{method}}" width="{{width}}" height="{{height}}" align="{{align}}"]{{content}}[/lightbox]',
    'popup_title' => __('Insert Lightbox Image', THEMEMAKERS_THEME_FOLDER_NAME)
);

// Alerts shortcode config
$tmk_shortcodes['alert'] = array(
    'params' => array(
        'type' => array(
            'type' => 'select',
            'label' => __('Notification\'s Type', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Select the notification\'s type.', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                'error' => __('Error', THEMEMAKERS_THEME_FOLDER_NAME),
                'success' => __('Success', THEMEMAKERS_THEME_FOLDER_NAME),
                'info' => __('Info', THEMEMAKERS_THEME_FOLDER_NAME),
                'notice' => __('Notice', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        ),
        'content' => array(
            'std' => 'Your Text!',
            'type' => 'textarea',
            'label' => __('Text', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Add the notification\'s text', THEMEMAKERS_THEME_FOLDER_NAME),
        )
    ),
    'shortcode' => '[alert type="{{type}}"] {{content}} [/alert]',
    'popup_title' => __('Insert Notification Shortcode', THEMEMAKERS_THEME_FOLDER_NAME)
);

// Toggle content shortcode config
$tmk_shortcodes['toggle'] = array(
    'params' => array(
        'title' => array(
            'type' => 'text',
            'label' => __('Toggle Content Title', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Add the title that will go above the toggle content', THEMEMAKERS_THEME_FOLDER_NAME),
            'std' => ''
        ),
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Toggle Content', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Add the toggle content.', THEMEMAKERS_THEME_FOLDER_NAME),
        )
    ),
    'shortcode' => '[toggle title="{{title}}"] {{content}} [/toggle]',
    'popup_title' => __('Insert Toggle Content Shortcode', THEMEMAKERS_THEME_FOLDER_NAME)
);

// Tabs
$tmk_shortcodes['tabs'] = array(
    'params' => array(
        'type' => array(
            'type' => 'select',
            'label' => __('Tabs Style', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                'full' => __('Full', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'titles' => array(
            'type' => 'text',
            'label' => __('Tab Titles', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Please enter the tab titles here, seperating each by a comma. They must match the tabs that are created below.', THEMEMAKERS_THEME_FOLDER_NAME)
        ),
    ),
    'shortcode' => '[tabs type="{{type}}" titles="{{titles}}"]{{child_shortcode}}[/tabs]',
    'popup_title' => __('Insert Tabs Shortcode', THEMEMAKERS_THEME_FOLDER_NAME),
    'no_preview' => true,
    'child_shortcode' => array(
        'params' => array(
            'content' => array(
                'std' => '',
                'type' => 'textarea',
                'label' => __('Tab Content', THEMEMAKERS_THEME_FOLDER_NAME),
                'desc' => __('Add the tabs content', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        ),
        'shortcode' => '[tab] {{content}} [/tab]',
        'clone_button' => __('Add Tab', THEMEMAKERS_THEME_FOLDER_NAME)
    )
);

// Columns
$tmk_shortcodes['columns'] = array(
    'params' => array(),
    'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
    'popup_title' => __('Insert Columns Shortcode', THEMEMAKERS_THEME_FOLDER_NAME),
    'no_preview' => false,
    // child shortcode
    'child_shortcode' => array(
        'params' => array(
            'column' => array(
                'type' => 'select',
                'label' => __('Column Type', THEMEMAKERS_THEME_FOLDER_NAME),
                'desc' => __('Select the type, ie width of the column.', THEMEMAKERS_THEME_FOLDER_NAME),
                'options' => array(
                    'one_third' => __('One Third', THEMEMAKERS_THEME_FOLDER_NAME),
                    'one_third_last' => __('One Third Last', THEMEMAKERS_THEME_FOLDER_NAME),
                    'one_fourth' => __('One Fourth', THEMEMAKERS_THEME_FOLDER_NAME),
                    'one_fourth_last' => __('One Fourth Last', THEMEMAKERS_THEME_FOLDER_NAME),
                    'two_third' => __('Two Third', THEMEMAKERS_THEME_FOLDER_NAME),
                    'two_third_last' => __('Two Third Last', THEMEMAKERS_THEME_FOLDER_NAME),
                    'three_fourth' => __('Three Fourth', THEMEMAKERS_THEME_FOLDER_NAME),
                    'three_fourth_last' => __('Three Fourth Last', THEMEMAKERS_THEME_FOLDER_NAME),
                    'one_half' => __('One Half', THEMEMAKERS_THEME_FOLDER_NAME),
                    'one_half_last' => __('One Half Last', THEMEMAKERS_THEME_FOLDER_NAME)
                )
            ),
            'content' => array(
                'std' => '',
                'type' => 'textarea',
                'label' => __('Column Content', THEMEMAKERS_THEME_FOLDER_NAME),
                'desc' => __('Add the column content.', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'shortcode' => '[{{column}}]{{content}}[/{{column}}] ',
        'clone_button' => __('Add Column', THEMEMAKERS_THEME_FOLDER_NAME)
    )
);


// Pricing tables
$tmk_shortcodes['pricing_tables'] = array(
    'params' => array(
        'column_type' => array(
            'type' => 'select',
            'label' => __('Column Type', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                'table_one_third' => __('One Third', THEMEMAKERS_THEME_FOLDER_NAME),
                'table_one_fourth' => __('One Fourth', THEMEMAKERS_THEME_FOLDER_NAME),
                'table_one_fifth' => __('One Fifth', THEMEMAKERS_THEME_FOLDER_NAME),
                'table_one_sixth' => __('One Sixth', THEMEMAKERS_THEME_FOLDER_NAME),
                'table_one_half' => __('One Half', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'title' => array(
            'std' => '',
            'type' => 'text',
            'desc' => __('Use [span] tag to highlight words.', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Table Title', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'currency' => array(
            'type' => 'select',
            'label' => __('Currency', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                '&#36;' => __('&#36;', THEMEMAKERS_THEME_FOLDER_NAME),
                '&#8364;' => __('&#8364;', THEMEMAKERS_THEME_FOLDER_NAME),
                '&#163;' => __('&#163;', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'integer_price' => array(
            'std' => '',
            'type' => 'text',
            'desc' => __('Max 3 digits', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Integer Price', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'fractional_price' => array(
            'std' => '',
            'type' => 'text',
            'desc' => __('Max 2 digits', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Fractional Price', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'price_description' => array(
            'std' => '',
            'type' => 'text',
            'desc' => __('Example: per/month', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Price description', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'list_content' => array(
            'std' => '',
            'type' => 'textarea',
            'desc' => __('Example: option 1`option 2`option 3`^option 4`^option 5', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('List Content', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'is_featured' => array(
            'type' => 'select',
            'label' => __('Is featured', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                '0' => __('No', THEMEMAKERS_THEME_FOLDER_NAME),
                '1' => __('Yes', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'button_link' => array(
            'std' => '#',
            'type' => 'text',
            'label' => __('Button link', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'button_text' => array(
            'std' => __('Read more', THEMEMAKERS_THEME_FOLDER_NAME),
            'type' => 'text',
            'label' => __('Button text', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'button_type' => array(
            'type' => 'select',
            'label' => __('Button type', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => ThemeMakersHelper::get_theme_buttons()
        )
    ),
    'no_preview' => false,
    'popup_title' => __('Insert Pricing Table Shortcode', THEMEMAKERS_THEME_FOLDER_NAME),
    'shortcode' => '[pricing_table price_description="{{price_description}}" column_type="{{column_type}}" title="{{title}}" currency="{{currency}}" integer_price="{{integer_price}}" fractional_price="{{fractional_price}}" is_featured="{{is_featured}}" button_link="{{button_link}}" button_text="{{button_text}}" button_type="{{button_type}}"]{{list_content}}[/pricing_table]',
);

// Product
$tmk_shortcodes['product'] = array(
    'params' => array(
		
		'title' => array(
            'std' => 'All Products',
            'type' => 'text',
            'desc' => __('Title of products page', THEMEMAKERS_THEME_FOLDER_NAME),
			'label' => __('Title', THEMEMAKERS_THEME_FOLDER_NAME),
           
        ),
             
        'products_per_page' => array(
            'std' => '',
            'type' => 'text',
            'desc' => __('Enter the number of products per page', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Quantity of products', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
		
		'orderby' => array(
            'std' => '',
            'type' => 'select',
            'desc' => __('Sorting of products', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Sorting', THEMEMAKERS_THEME_FOLDER_NAME),
			'options' => array(
                "date" => "Sorting by date",
                "ID" => "Sorting by products ID",
                "modified" => "Sorting by last modified",
                "title" => "Sorting by title",
                
            )
        ),
		'column' => array(
            'std' => '',
            'type' => 'select',
            'desc' => __('Select the number of columns', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Column', THEMEMAKERS_THEME_FOLDER_NAME),
			'options' => array(
                "3" => "Three Columns",
                "4" => "Four Columns",
                "6" => "Six Columns"                    
            )
        ),
          
            
    ),
    'no_preview' => false,
    'popup_title' => __('Insert Product Shortcode', THEMEMAKERS_THEME_FOLDER_NAME),
    'shortcode' => '[product products_per_page="{{products_per_page}}" orderby="{{orderby}}" column="{{column}}" title="{{title}}"][/product]',
);

//HTML Tables
$tmk_shortcodes['table'] = array(
    'params' => array(
//        'template_name' => array(
//            'type' => 'select',
//            'label' => __('Table Style', THEMEMAKERS_THEME_FOLDER_NAME),
//            'options' => array(
//                'table-grey' => __('Grey', THEMEMAKERS_THEME_FOLDER_NAME),
//                'table-dark' => __('Dark', THEMEMAKERS_THEME_FOLDER_NAME),
//                'table-green' => __('Green', THEMEMAKERS_THEME_FOLDER_NAME),
//                'table-orange' => __('Orange', THEMEMAKERS_THEME_FOLDER_NAME),
//                'table-cyan' => __('Cyan', THEMEMAKERS_THEME_FOLDER_NAME),
//                'table-light-blue' => __('Light Blue', THEMEMAKERS_THEME_FOLDER_NAME),
//            )
//        ),
        'heading' => array(
            'std' => '',
            'type' => 'text',
            'desc' => __('Example: string:Name,number:Salary,number:Full Time Employee<br />
                Documentation: https://developers.google.com/chart/interactive/docs/gallery/table', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Heading', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'data' => array(
            'std' => '',
            'type' => 'textarea',
            'desc' => __('Example: \'Mike\',  {v: 10000, f: \'$10,000\'}, 1~\'Jim\',   {v:8000,   f: \'$8,000\'},  1~\'Alice\', {v: 12500, f: \'$12,500\'}, 0~\'Bob\',   {v: 7000,  f: \'$7,000\'},1<br />
                Documentation: https://developers.google.com/chart/interactive/docs/gallery/table', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Data', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'show_row_number' => array(
            'type' => 'select',
            'label' => __('Show row number', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                '0' => __('NO', THEMEMAKERS_THEME_FOLDER_NAME),
                '1' => __('YES', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
    ),
    'no_preview' => false,
    'popup_title' => __('Insert Table', THEMEMAKERS_THEME_FOLDER_NAME),
    'shortcode' => '[table heading="{{heading}}" show_row_number="{{show_row_number}}"]{{data}}[/table]',
);

/* * ***************************** SUPER PUPER NEW SHORTODES *********************************************** */


// Googel map
$tmk_shortcodes['gmap'] = array(
    'params' => array(
        'width' => array(
            'std' => '730',
            'type' => 'text',
            'label' => __('Width', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'height' => array(
            'std' => '370',
            'type' => 'text',
            'label' => __('Height', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'latitude' => array(
            'std' => '40.714623',
            'type' => 'text',
            'desc' => __('Point on which the viewport will be centered. If not given and no markers are defined the viewport defaults to world view.', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Latitude', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'longitude' => array(
            'std' => '-74.006605',
            'type' => 'text',
            'desc' => __('Same as above but for longitude…', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Longitude', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'zoom' => array(
            'type' => 'select',
            'label' => __('Zoom', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Zoom value from 1 to 19 where 19 is the greatest and 1 the smallest.', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                "1" => "1",
                "2" => "2",
                "3" => "3",
                "4" => "4",
                "5" => "5",
                "6" => "6",
                "7" => "7",
                "8" => "8",
                "9" => "9",
                "10" => "10",
                "11" => "11",
                "12" => "12",
                "13" => "13",
                "14" => "14",
                "15" => "15",
                "16" => "16",
                "17" => "17",
                "18" => "18",
                "19" => "19",
            )
        ),
        'controls' => array(
            'std' => '',
            'type' => 'text',
            'desc' => __('A simple array of string values representing the function names (without “()”) to add controls. Please refer to the Google Maps API for possible values https://developers.google.com/maps/documentation/javascript/controls. If empty the default map controls will be applied. Example: panControl,zoomControl,scaleControl', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Controls', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'scrollwheel' => array(
            'type' => 'select',
            'label' => __('Scrollwheel', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Set to false to disable zooming with your mouses scrollwheel. If “controls” is not set this option will be ignored (because default map controls are applied).', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                '0' => __('OFF', THEMEMAKERS_THEME_FOLDER_NAME),
                '1' => __('ON', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        ),
        'maptype' => array(
            'type' => 'select',
            'label' => __('Maptype', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Predefined variable for setting the map type', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                'ROADMAP' => __('ROADMAP', THEMEMAKERS_THEME_FOLDER_NAME),
                'SATELLITE' => __('SATELLITE', THEMEMAKERS_THEME_FOLDER_NAME),
                'HYBRID' => __('HYBRID', THEMEMAKERS_THEME_FOLDER_NAME),
                'TERRAIN' => __('TERRAIN', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'marker' => array(
            'type' => 'select',
            'label' => __('Marker', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Set to false to disable display a marker in the viewport.', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                '0' => __('OFF', THEMEMAKERS_THEME_FOLDER_NAME),
                '1' => __('ON', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        ),
        'popup' => array(
            'type' => 'select',
            'label' => __('Popup', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('If true the info window for this marker will be shown when the map finished loading. If html is empty this option will be ignored.', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                '0' => __('OFF', THEMEMAKERS_THEME_FOLDER_NAME),
                '1' => __('ON', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        ),
        'html' => array(
            'std' => '',
            'type' => 'textarea',
            'desc' => __('Content that will be shown within the info window for this marker.', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Html', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
    ),
    'no_preview' => false,
    'popup_title' => __('Insert Google Map', THEMEMAKERS_THEME_FOLDER_NAME),
    'shortcode' => '[gmap width="{{width}}" height="{{height}}" latitude="{{latitude}}" longitude="{{longitude}}" zoom="{{zoom}}" controls="{{controls}}" scrollwheel="{{scrollwheel}}" maptype="{{maptype}}" marker="{{marker}}" popup="{{popup}}"]{{html}}[/gmap]',
);




// Googel chart
$tmk_shortcodes['chart'] = array(
    'params' => array(
        'type' => array(
            'type' => 'select',
            'label' => __('Chart type', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                'pie' => __('Pie Chart', THEMEMAKERS_THEME_FOLDER_NAME),
                'bar' => __('Bar Chart', THEMEMAKERS_THEME_FOLDER_NAME),
                'column' => __('Column Chart', THEMEMAKERS_THEME_FOLDER_NAME),
                'geochart' => __('Geochart', THEMEMAKERS_THEME_FOLDER_NAME),
                'line' => __('Line chart', THEMEMAKERS_THEME_FOLDER_NAME),
                'area' => __('Area chart', THEMEMAKERS_THEME_FOLDER_NAME),
                'combo' => __('Combo Chart', THEMEMAKERS_THEME_FOLDER_NAME),
            //'table' => __('Table', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'width' => array(
            'std' => '700',
            'type' => 'text',
            'label' => __('Chart width', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'height' => array(
            'std' => '600',
            'type' => 'text',
            'label' => __('Chart height', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'bgcolor' => array(
            'std' => '',
            'type' => 'text',
            'desc' => __('Example: #ff0000', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Background color', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'font_name' => array(
            'type' => 'select',
            'label' => __('Font family', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => $content_fonts,
        ),
        'font_size' => array(
            'type' => 'select',
            'label' => __('Default font size', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('The default font size, in pixels, of all text in the chart', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => $font_size_array
        ),
        'chart_titles' => array(
            'std' => '',
            'type' => 'text',
            'desc' => __('Example:<br />
                Pie => Task,Hours per Day<br />
                Bar, Column, Line, Area => Year, Sales, Expenses<br />
                Combo => Month,Bolivia,Ecuador,Madagascar,Papua New Guinea,Rwanda,Average<br />
                Geochart => Country,Popularity<br />
                ', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Chart titles', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'data' => array(
            'std' => '',
            'type' => 'textarea',
            'desc' => __('Type chart data.<br />
                Examples:<br />
                Pie => sleep:2,eat:2,work:2<br />
                Bar, Column => 2004:1000:400,2005:980:570,2006:800:300<br />
                Line, Area => 2004:1000:400,2005:1170:460,2006:660:1120,2007:1030:540<br />
                Combo => 2004/05:165:938:522:998:450:614.6,2005/06:135:1120:599:1268:288:682,2006/07:157:1167:587:807:397:623,2007/08:139:1110:615:968:215:609.4,2008/09:136:691:629:1026:366:569.6<br />
                Geochart => Germany:200,France:300,United States:400<br />
                ', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Chart data', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
    ),
    'no_preview' => false,
    'popup_title' => __('Insert Google Chart', THEMEMAKERS_THEME_FOLDER_NAME),
    'shortcode' => '[chart type="{{type}}" width="{{width}}" height="{{height}}" title="{{title}}" bgcolor="{{bgcolor}}" font_name="{{font_name}}" font_size="{{font_size}}" chart_titles="{{chart_titles}}"]{{data}}[/chart]',
);




// Audio
$tmk_shortcodes['audio'] = array(
    'params' => array(
        'src' => array(
            'std' => '',
            'type' => 'upload_audio',
            'label' => __('File url', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
    ),
    'no_preview' => false,
    'popup_title' => __('Insert audio file', THEMEMAKERS_THEME_FOLDER_NAME),
    'shortcode' => '[audio]{{src}}[/audio]',
);



// Video
$tmk_shortcodes['video'] = array(
    'params' => array(
        'type' => array(
            'type' => 'select',
            'label' => __('Type', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                'youtube' => __('youtube', THEMEMAKERS_THEME_FOLDER_NAME),
                'vimeo' => __('vimeo', THEMEMAKERS_THEME_FOLDER_NAME),
                'html5' => __('html5', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('youtube or vimeo id', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'src_mp4' => array(
            'std' => '',
            'type' => 'upload_video',
            'label' => __('MP4 html5 file url', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'src_webm' => array(
            'std' => '',
            'type' => 'upload_video',
            'label' => __('WEBM html5 file url', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'src_ogg' => array(
            'std' => '',
            'type' => 'upload_video',
            'label' => __('OGG html5 file url', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'html5_poster' => array(
            'std' => '',
            'type' => 'upload',
            'label' => __('html5 poster', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'width' => array(
            'std' => '1220',
            'type' => 'text',
            'label' => __('Width', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'height' => array(
            'std' => '900',
            'type' => 'text',
            'label' => __('Height', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
    ),
    'no_preview' => false,
    'popup_title' => __('Insert video file', THEMEMAKERS_THEME_FOLDER_NAME),
    'shortcode' => '[video type="{{type}}" html5_poster="{{html5_poster}}" src_mp4="{{src_mp4}}" src_webm="{{src_webm}}" src_ogg="{{src_ogg}}" width="{{width}}" height="{{height}}"]{{id}}[/video]',
);



// Blog
$tmk_shortcodes['blog'] = array(
    'params' => array(
        'cat' => array(
            'type' => 'select',
            'label' => __('Category', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => $post_categories
        ),
        'posts_per_page' => array(
            'std' => '10',
            'type' => 'text',
            'label' => __('Posts per page', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'posts' => array(
            'std' => '',
            'type' => 'text',
            'desc' => __('Example: 56,73,119', THEMEMAKERS_THEME_FOLDER_NAME),
            'label' => __('Posts', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'orderby' => array(
            'type' => 'select',
            'label' => __('Sort', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => $post_sort
        ),
        'order' => array(
            'type' => 'select',
            'label' => __('Order', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                'DESC' => __('DESC', THEMEMAKERS_THEME_FOLDER_NAME),
                'ASC' => __('ASC', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'image' => array(
            'type' => 'select',
            'label' => __('Image', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Whether to display featured image', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                '1' => __('YES', THEMEMAKERS_THEME_FOLDER_NAME),
                '0' => __('NO', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'meta' => array(
            'type' => 'select',
            'label' => __('Meta', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Whether to display meta information', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                '1' => __('YES', THEMEMAKERS_THEME_FOLDER_NAME),
                '0' => __('NO', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'full' => array(
            'type' => 'select',
            'label' => __('Show content of the post', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Whether to display all content of the post', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                '0' => __('NO', THEMEMAKERS_THEME_FOLDER_NAME),
                '1' => __('YES', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'paging' => array(
            'type' => 'select',
            'label' => __('Show pagination', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => __('Whether to disable pagination', THEMEMAKERS_THEME_FOLDER_NAME),
            'options' => array(
                '0' => __('NO', THEMEMAKERS_THEME_FOLDER_NAME),
                '1' => __('YES', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
    ),
    'no_preview' => true,
    'popup_title' => __('Insert blog posts as you want', THEMEMAKERS_THEME_FOLDER_NAME),
    'shortcode' => '[blog cat="{{cat}}" posts_per_page="{{posts_per_page}}" orderby="{{orderby}}" order="{{order}}" image="{{image}}" meta="{{meta}}" full="{{full}}" paging="{{paging}}"]{{posts}}[/blog]',
);


$tmk_shortcodes['hoverbox'] = array(
    'params' => array(
        'type' => array(
            'type' => 'select',
            'label' => __('Type', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                'image' => __('With Image', THEMEMAKERS_THEME_FOLDER_NAME),
                'icon' => __('With Icon', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'icon_sprite' => array(
            'type' => 'select',
            'label' => __('Icon sprites', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                '1' => __('Earth', THEMEMAKERS_THEME_FOLDER_NAME),
                '2' => __('Bulb', THEMEMAKERS_THEME_FOLDER_NAME),
                '3' => __('Umbrella', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'image_src' => array(
            'std' => 'http://',
            'type' => 'upload',
            'label' => __('Image Location', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'image_width' => array(
            'std' => '232',
            'type' => 'text',
            'label' => __('Image width', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'image_height' => array(
            'std' => '130',
            'type' => 'text',
            'label' => __('Image height', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'box_link' => array(
            'std' => '#',
            'type' => 'text',
            'label' => __('Box Link', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'box_link_target' => array(
            'type' => 'select',
            'label' => __('Box Link target', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                '_self' => __('self', THEMEMAKERS_THEME_FOLDER_NAME),
                '_blank' => __('blank', THEMEMAKERS_THEME_FOLDER_NAME),
            )
        ),
        'box_bg_color' => array(
            'std' => '',
            'type' => 'color',
            'label' => __('Box bg color', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'box_hover_bg_color' => array(
            'std' => '',
            'type' => 'color',
            'label' => __('Box hover bg color', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'title_text' => array(
            'std' => "",
            'type' => 'text',
            'label' => __('Title text', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'title_type' => array(
            'type' => 'select',
            'label' => __('Title type', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                'h1' => __('h1', THEMEMAKERS_THEME_FOLDER_NAME),
                'h2' => __('h2', THEMEMAKERS_THEME_FOLDER_NAME),
                'h3' => __('h3', THEMEMAKERS_THEME_FOLDER_NAME),
                'h4' => __('h4', THEMEMAKERS_THEME_FOLDER_NAME),
                'h5' => __('h5', THEMEMAKERS_THEME_FOLDER_NAME),
                'h6' => __('h6', THEMEMAKERS_THEME_FOLDER_NAME)
            ),
        ),
        'title_color' => array(
            'std' => '',
            'type' => 'color',
            'label' => __('Title color', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'title_hover_color' => array(
            'std' => '',
            'type' => 'color',
            'label' => __('Title hover color', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'text' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Text', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'text_color' => array(
            'std' => '',
            'type' => 'color',
            'label' => __('Text color', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'text_hover_color' => array(
            'std' => '',
            'type' => 'color',
            'label' => __('Text hover color', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'text_align' => array(
            'type' => 'select',
            'label' => __('Align', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                'left' => __('Left', THEMEMAKERS_THEME_FOLDER_NAME),
                'right' => __('Right', THEMEMAKERS_THEME_FOLDER_NAME),
                'center' => __('Center', THEMEMAKERS_THEME_FOLDER_NAME)
            )
        ),
    ),
    'no_preview' => false,
    'shortcode' => '[hoverbox type="{{type}}" image_src="{{image_src}}" icon_sprite="{{icon_sprite}}" image_width="{{image_width}}" image_height="{{image_height}}" box_link="{{box_link}}" box_link_target="{{box_link_target}}" box_bg_color="{{box_bg_color}}" box_hover_bg_color="{{box_hover_bg_color}}" title_text="{{title_text}}" title_type="{{title_type}}" title_color="{{title_color}}" title_hover_color="{{title_hover_color}}" text_color="{{text_color}}" text_hover_color="{{text_hover_color}}" text_align="{{text_align}}"]{{text}}[/hoverbox]',
    'popup_title' => __('Insert Hoverbox', THEMEMAKERS_THEME_FOLDER_NAME)
);



// Contact form
$tmk_shortcodes['contactform'] = array(
    'params' => array(
        'name' => array(
            'type' => 'select',
            'label' => __('Title type', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => Thememakers_Entity_Contact_Form::get_forms_names()
        ),
    ),
    'no_preview' => false,
    'popup_title' => __('Insert contact form. One page - one form', THEMEMAKERS_THEME_FOLDER_NAME),
    'shortcode' => '[contactform]{{name}}[/contactform]',
);




// Quotes
$tmk_shortcodes['quotes'] = array(
    'params' => array(
        'text' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Text', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'class' => array(
            'type' => 'select',
            'label' => __('Float', THEMEMAKERS_THEME_FOLDER_NAME),
            'desc' => '',
            'options' => array(
                'none' => __('none', THEMEMAKERS_THEME_FOLDER_NAME),
                'quoteleft' => __('left', THEMEMAKERS_THEME_FOLDER_NAME),
                'quoteright' => __('right', THEMEMAKERS_THEME_FOLDER_NAME),
            ),
        ),
    ),
    'no_preview' => false,
    'popup_title' => __('Blog Quotes', THEMEMAKERS_THEME_FOLDER_NAME),
    'shortcode' => '[quotes class="{{class}}"]{{text}}[/quotes]',
);




// Twitter
$tmk_shortcodes['twitter'] = array(
    'params' => array(
        'twitter' => array(
            'std' => 'thememakers',
            'type' => 'text',
            'label' => __('Twitter username', THEMEMAKERS_THEME_FOLDER_NAME),
        ),
        'count' => array(
            'std' => 1,
            'type' => 'text',
            'label' => __('Count of tweets', THEMEMAKERS_THEME_FOLDER_NAME),
        )
    ),
    'no_preview' => false,
    'popup_title' => __('Twitter', THEMEMAKERS_THEME_FOLDER_NAME),
    'shortcode' => '[twitter count={{count}}]{{twitter}}[/twitter]',
);


// Clients box
$tmk_shortcodes['clientsbox'] = array(
    'params' => array(),
    'no_preview' => false,
    'popup_title' => __('Clients box', THEMEMAKERS_THEME_FOLDER_NAME),
    'shortcode' => '[clientsbox][/clientsbox]',
);




