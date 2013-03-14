<?php

function tmk_one_fourth($atts, $content = null) {
    $content = '<div class="threecol">' . do_shortcode($content) . '</div>';
    return ($content);
}

add_shortcode('one_fourth', 'tmk_one_fourth');

function tmk_one_fourth_last($atts, $content = null) {
    $content = '<div class="threecol last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    return ($content);
}

add_shortcode('one_fourth_last', 'tmk_one_fourth_last');

function tmk_one_third($atts, $content = null) {
    $content = '<div class="fourcol">' . do_shortcode($content) . '</div>';
    return trim($content);
}

add_shortcode('one_third', 'tmk_one_third');

function tmk_one_third_last($atts, $content = null) {
    $content = '<div class="fourcol last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    return ($content);
}

add_shortcode('one_third_last', 'tmk_one_third_last');

function tmk_two_third($atts, $content = null) {
    $content = '<div class="eightcol">' . do_shortcode($content) . '</div>';
    return ($content);
}

add_shortcode('two_third', 'tmk_two_third');

function tmk_two_third_last($atts, $content = null) {
    $content = '<div class="eightcol last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    return ($content);
}

add_shortcode('two_third_last', 'tmk_two_third_last');

function tmk_three_fourth($atts, $content = null) {
    $content = '<div class="ninecol">' . do_shortcode($content) . '</div>';
    return ($content);
}

add_shortcode('three_fourth', 'tmk_three_fourth');

function tmk_three_fourth_last($atts, $content = null) {
    $content = '<div class="ninecol last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    return ($content);
}

add_shortcode('three_fourth_last', 'tmk_three_fourth_last');

function tmk_one_half($atts, $content = null) {
    $content = '<div class="sixcol">' . do_shortcode($content) . '</div>';
    return ($content);
}

add_shortcode('one_half', 'tmk_one_half');

function tmk_one_half_last($atts, $content = null) {
    $content = '<div class="sixcol last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    return ($content);
}

add_shortcode('one_half_last', 'tmk_one_half_last');

//Dividers

function tmk_divider($atts, $content = null) {
    extract(shortcode_atts(array(
                'style' => 'solid'
                    ), $atts));
    $out = '<div class="blank-separator"></div>';
    if ($style == 'solid') {
        $out = '<div class="border-divider"></div>';
    }
    return $out;
}

add_shortcode('divider', 'tmk_divider');

//Color Circles

function tmk_color_circles($atts, $content = null) {
    extract(shortcode_atts(array(
                'color' => "range-green",
                    ), $atts));

    return '<div class="services-round"><span class="round ' . $color . '">' . do_shortcode($content) . '</span></div>';
}

add_shortcode('circle', 'tmk_color_circles');

//Image Rostislav 29-06-2012
function tmk_image($atts, $content = null) {
    extract(shortcode_atts(array(
                'link' => "#",
                'target' => "_self",
                'open_as' => "none",
                'shadow' => "disable",
                'fancybox_group' => '',
                'width' => 252,
                'height' => 0,
                'alt' => "",
                'link_title' => "",
                'align' => "none",
                'margin_top' => 0,
                'margin_right' => 0,
                'margin_bottom' => 0,
                'margin_left' => 0,
                    ), $atts));

    $html = "";
    if ($open_as == "fancybox") {
        $html.='<a title="' . $link_title . '" class="zoomer picture-icon" href="' . $content . '" rel="' . $fancybox_group . '">';
    }

    if ($open_as == "link") {
        $html.='<a title="' . $link_title . '" class="picture-icon" href="' . $link . '" target="' . $target . '">';
    }

    if ($shadow == "enable") {
        $html.='<figure class="img-shadow">';
    }

    $src = "";
    if ($height != 0) {
        $src = ThemeMakersHelper::resize_image($content, $width, true, $height);
    } else {
        $src = ThemeMakersHelper::resize_image($content, $width);
    }

    $html.= '<img class="align' . $align . '" align="' . $align . '" alt="' . $alt . '"  style="margin:' . (int) $margin_top . 'px ' . (int) $margin_right . 'px ' . (int) $margin_bottom . 'px ' . (int) $margin_left . 'px;" src="' . $src . '" />';

    if ($open_as != "none") {
        $html.='</a>';
    }

    if ($shadow != "none") {
        $html.= '</figure>';
    }

    return $html;
}

add_shortcode('image', 'tmk_image');

//Title Rostislav 29-06-2012
function tmk_title($atts, $content = null) {
    extract(shortcode_atts(array(
                'show_border' => "",
                'type' => "h3",
                'color' => "",
                'align' => "none",
                'margin_bottom' => 0,
                'font_family' => "",
                'font_size' => 0,
                'line_height' => 'auto'
                    ), $atts));

    $html = "";

    $styles = 'style="';

    if (!empty($align)) {
        $styles.="text-align: " . $align . "; ";
    }

    if (isset($margin_bottom) && $margin_bottom != "") {
        $styles.="margin-bottom: " . $margin_bottom . "px; ";
    }

    if (!empty($font_family)) {
        $styles.="font-family: '" . $font_family . "'; ";
    }

    if ($font_size) {
        $styles.="font-size: " . $font_size . "px; ";
    }

    if (!empty($line_height) AND $line_height != 'auto') {
        $styles.="line-height: " . $line_height . "px; ";
    } else {
        $styles.="line-height: auto;";
    }

    if (!empty($color)) {
        $styles.="color: " . $color . "; ";
    }

    $styles.='"';

    $styles_of_container = 'style="';
    if (!$show_border) {
        $styles_of_container.="border-bottom: none;";
    }
    $styles_of_container.='"';
    if ($show_border) {
        $html.= '<' . $type . ' class="section-title" ' . $styles . '>' . $content . '</' . $type . '>';
    } else {
        $html.= '<' . $type . ' ' . $styles . '>' . $content . '</' . $type . '>';
    }


    return $html;
}

add_shortcode('title', 'tmk_title');

//Columnpost Rostislav 04-07-2012
function tmk_columnpost($atts, $content = null) {
    extract(shortcode_atts(array(
                'post_id' => 1,
                'show_exert' => 1,
                'char_count' => 140,
                'show_featured_image' => 1,
                'image_align' => 'left',
                'custom_image_link' => "",
                'thumb_width' => 222,
                'thumb_height' => 100,
                'show_readmore' => 1,
                'title_align' => "left",
                'text_align' => "left",
                'read_more_button_color' => "light",
                'read_more_button_size' => "large",
                    ), $atts));


    $title_styles = 'style="';
    if (!empty($title_align)) {
        $title_styles.="text-align: " . $title_align . ";";
    }
    $title_styles.='"';

    $text_styles = 'style="';
    if (!empty($text_align)) {
        $text_styles.="text-align: " . $text_align . ";";
    }
    $text_styles.='"';


    $post = get_post($post_id);
    $post_link = get_permalink($post_id);
    $text = "";


    if ($char_count > 0) {
        if ($show_exert) {
            $text = ThemeMakersHelper::cut_text($post->post_excerpt, $char_count);
        } else {
            $text = ThemeMakersHelper::cut_text($post->post_content, $char_count);
        }
    }

    $image_url = "";
    if ($show_featured_image) {

        if ($show_featured_image == 1) {
            if ($thumb_height) {
                $image_url = ThemeMakersHelper::get_post_featured_image($post_id, $thumb_width, true, $thumb_height);
            } else {
                $image_url = ThemeMakersHelper::get_post_featured_image($post_id, $thumb_width);
            }
        } else {
            if (!empty($custom_image_link)) {
                if ($thumb_height) {
                    $image_url = ThemeMakersHelper::resize_image($custom_image_link, $thumb_width, true, $thumb_height);
                } else {
                    $image_url = ThemeMakersHelper::resize_image($custom_image_link, $thumb_width);
                }
            }
        }
    }

    $data = array();
    $data['show_featured_image'] = $show_featured_image;
    $data['image_align'] = $image_align;
    $data['title_styles'] = $title_styles;
    $data['post_title'] = $post->post_title;
    $data['text_styles'] = $text_styles;
    $data['text'] = $text;
    $data['show_readmore'] = $show_readmore;
    $data['post_link'] = $post_link;
    $data['image_url'] = $image_url;
    $data['read_more_button_color'] = $read_more_button_color;
    $data['read_more_button_size'] = $read_more_button_size;

    return ThemeMakersThemeView::draw_html('shortcodes/columnpost', $data);
}

add_shortcode('columnpost', 'tmk_columnpost');

//List Rostislav 05-07-2012
function tmk_list($atts, $content = null) {

    extract(shortcode_atts(array(
                'list_type' => 'ul',
                'list_class' => 1,
                    ), $atts));

    $type_clasess = array();
    for ($i = 1; $i <= 15; $i++) {
        $type_clasess[$i] = "type-" . $i;
    }

    //*****

    $list_items = explode("`", $content);

    if (!empty($list_items) AND is_array($list_items)) {
        $html = '<' . $list_type . ' class="list ' . $type_clasess[$list_class] . '">';
        foreach ($list_items as $key => $list_item) {
            $html.="<li>" . $list_item . "</li>";
        }
        $html.='</' . $list_type . '>';
    }

    return $html;
}

add_shortcode('list', 'tmk_list');

//Inlinebox Rostislav 05-07-2012
function tmk_inlinebox($atts, $content = null) {
    extract(shortcode_atts(array(
                'title' => "",
                'border' => "none",
                'title_link' => "#",
                'title_icon' => "",
                    ), $atts));

    $html = '';

    if ($border == 'show') {
        $html .= '<h4 class="block-title">' . $title . '</h4>';
    } else {
        $html .= '<h6>' . $title . '</h6>';
    }

    $html .= '<p><img alt="" src="' . $title_icon . '" class="icon">' . $content . '</p>';

    return $html;
}

add_shortcode('inlinebox', 'tmk_inlinebox');

//Highlighted Content
function tmk_highlighted_content($atts, $content = null) {
    extract(shortcode_atts(array(
                'icon' => 'bulb',
                'link' => '#',
                'title' => '',
                'image' => ''
                    ), $atts));
    if ($icon != 'no') {
        return '<h3>' . $title . '</h3><a href="' . $link . '"><div class="pic-box ' . $icon . '"></div></a><p>' . do_shortcode($content) . '</p>';
    } else {
        return '<div class="item-with-image"><a href="' . $link . '"><img src="' . $image . '" alt="" /><div class="content-item"><h5>' . $title . '</h5><span>' . do_shortcode($content) . '</span></div></a></div>';
    }
}

add_shortcode('highlighted', 'tmk_highlighted_content');

//Dropcaps

function tmk_dropcap($atts, $content = null) {
    extract(shortcode_atts(array(
                'style' => 'circle',
                'font_family' => '',
                'color' => '',
                'font_size' => '',
                'custom_bg' => ''
                    ), $atts));
    $class = 'dropcapcircle';

    if (empty($custom_bg)) {
        if ($style == 'circle') {
            $class = 'dropcapcircle';
        } elseif ($style == 'square') {
            $class = 'dropcapsquare';
        } elseif ($style == 'square-grey') {
            $class = 'dropcapsquare-invert';
        }
    }

    $dropcap_styles = 'style="';
    if (!empty($font_family)) {
        $dropcap_styles.="font-family: " . $font_family . ";";
    }
    if (!empty($color)) {
        $dropcap_styles.="color: " . $color . ";";
    }
    if (!empty($font_size)) {
        $dropcap_styles.="font-size: " . $font_size . "px;";
    }
    if (!empty($custom_bg)) {
        $dropcap_styles.="background: url(" . $custom_bg . ") no-repeat scroll 50% 50% transparent";
    }
    $dropcap_styles.='"';

    return '<p ' . $dropcap_styles . ' class="' . $class . '">' . $content . '</p>';
}

add_shortcode('dropcap', 'tmk_dropcap');

//Lightbox

function tmk_lightbox($atts, $content = null) {
    extract(shortcode_atts(array(
                'method' => 'crop',
                'align' => 'center'
                    ), $atts));
    if ($content != '' && (int) $atts['width'] == $atts['width'] && (int) $atts['height'] == $atts['height']) {
        $thumb = ThemeMakersHelper::resize_image($content, $atts['width']);
        if ($atts['method'] == 'crop') {
            $thumb.='&h=' . $atts['height'] . '&a=t';
        }
        $out = '<div class="magichover align' . $align . '"><a href="' . $content . '" class="zoomer picture-icon"><img class="add-border" src="' . $thumb . '" /></a></div>';
    } else {
        return;
    }
    return $out;
}

add_shortcode('lightbox', 'tmk_lightbox');

//Buttons

function tmk_button($atts, $content = null) {

    extract(shortcode_atts(array(
                'url' => '#',
                'target' => '_self',
                'but_color' => 'default',
                'size' => 'medium'
                    ), $atts));

    return '<a style="background-color:'.$but_color.'!important" href="' . $url . '" data-arrow="' . ($size == 'more' ? ' →' : '') . '"  class="' . ($size == 'more' ? '' : 'button ') . $size . ' ' . $color . '">' . do_shortcode($content) . '</a>';
}

add_shortcode('button', 'tmk_button');

//Notifications

function tmk_notification($atts, $content = null) {

    extract(shortcode_atts(array(
                'type' => 'info'
                    ), $atts));

    return '<p class="' . $type . '">' . do_shortcode($content) . '</p>';
}

add_shortcode('alert', 'tmk_notification');

//Toggle

function tmk_toggle($atts, $content = null) {

    extract(shortcode_atts(array(
                    ), $atts));

    $out = '<div class="box-toggle"><span class="trigger">' . $atts['title'] . '</span><div class="toggle-container">' . do_shortcode($content) . '</div></div>';
    return $out;
}

add_shortcode('toggle', 'tmk_toggle');

//Tabs

function tmk_tabs($atts, $content = null) {
    extract(shortcode_atts(array(
                'titles' => 'notabtitles'
                    ), $atts));

    if ($titles == 'notabtitles') {
        return;
    }

    $class = 'tabs-style-1';
    if ($atts['type'] == 'vertical') {
        $class = 'tabs-style-3';
    } else if ($atts['type'] == 'separated') {
        $class = 'tabs-style-2';
    }

    $output = '<div class="content-tabs ' . $class . '">';
    $output .= '<ul class="tabs-nav">';

    global $tabbed_count;
    global $tabs_count;
    $tabs_count = 0;
    if (!isset($tabbed_count)) {
        $tabbed_count = 0;
    }
    $myTabs = explode(',', $titles);
    foreach ($myTabs as $tab) {
        $output .= '<li><a title="' . $tab . '" href="#tabs-' . $tabs_count . $tabbed_count . '">' . $tab . '</a></li>';
        $tabs_count++;
    }
    $tabs_count = 0;
    $output .= '</ul><div class="tabs-container">';
    $output .= do_shortcode($content);
    $output .= '</div></div>';
    $tabbed_count++;
    wp_enqueue_script('tabs_js', THEMEMAKERS_THEME_URI . '/js/tabs.js');
    return $output;
}

add_shortcode('tabs', 'tmk_tabs');

//Tabs panes

function tmk_tabs_panes($atts, $content = null) {
    extract(shortcode_atts(array(
                    ), $atts));
    if (isset($title) && $title == 'notabtitle') {
        return;
    }
    global $tabs_count;
    global $tabbed_count;
    $output = '<div id="tabs-' . $tabs_count . $tabbed_count . '" class="tab-content"><p>' . do_shortcode($content) . '</p></div>';
    $tabs_count++;
    return $output;
}

add_shortcode('tab', 'tmk_tabs_panes');

//Pricing tables
function tmk_pricing_table($atts, $content = null) {

    extract(shortcode_atts(array(
				'column_type' => 'table_one_third',
                'title' => '',
                'currency' => '&#36;',
                'integer_price' => 0,
                'fractional_price' => 0,
                'is_featured' => '0',
                'list_content' => '',
                'button_link' => '#',
                'button_text' => __('Read more', THEMEMAKERS_THEME_FOLDER_NAME),
                'button_type' => 'orange',
                'price_description' => "p/m",
                    ), $atts));

    $atts['content'] = $content;
    return ThemeMakersThemeView::draw_html('shortcodes/pricing_tables', $atts);
}

add_shortcode('pricing_table', 'tmk_pricing_table');

function tmk_product($atts, $content = null) {
	

    extract(shortcode_atts(array(
		'title'	=> 'All Products',
		'post_type'	=> 'product',
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
		'orderby' => 'date',
		'column' => '4',
		'order' => $order,
		'products_per_page'=>'12'
                    ), $atts));

	
		
    return ThemeMakersThemeView::draw_html('shortcodes/product', $atts);
}

add_shortcode('product', 'tmk_product');

//Tables
function tmk_table($atts, $content = null) {
    remove_filter('the_content', 'content_formatter', 101);
    extract(shortcode_atts(array(
                'template_name' => 'table-gray',
                'heading' => '',
                'show_row_number' => 0
                    ), $atts));

    $google_chart_id = rand(1, 99999);
    $heading = explode(',', $heading);
    $content = explode('~', $content);

    $atts['google_chart_id'] = $google_chart_id;
    $atts['heading'] = $heading;
    $atts['content'] = $content;

    remove_filter('the_content', 'content_formatter');
    return ThemeMakersThemeView::draw_html('shortcodes/table', $atts);
}

add_shortcode('table', 'tmk_table');


/* * ***************************** SUPER PUPER NEW SHORTODES *********************************************** */

//Google maps
function tmk_gmap($atts, $content = null) {

    extract(shortcode_atts(array(
                'width' => 730,
                'height' => 370,
                'latitude' => "40.714623",
                'longitude' => "-74.006605",
                'zoom' => 12,
                'controls' => '',
                'scrollwheel' => 0,
                'maptype' => 'ROADMAP',
                'marker' => 0,
                'popup' => 0,
                    ), $atts));


    $google_map_id = md5(time()) . rand(1, 9999);
    wp_enqueue_script('thememakers_theme_map_api_js', 'http://maps.google.com/maps/api/js?sensor=false');
    wp_enqueue_script('thememakers_theme_markerwithlabel_js', THEMEMAKERS_THEME_URI . '/js/markerwithlabel.js');

    $js_controls = '{';
    if (!empty($controls)) {
        $controls = explode(',', $controls);
        if (!empty($controls)) {
            foreach ($controls as $key => $value) {
                if ($key > 0) {
                    $js_controls.=',';
                }
                $js_controls.=$value . ': true';
            }
        }
    }
    $js_controls.='}';
    //$content = htmlspecialchars($content, ENT_QUOTES | ENT_NOQUOTES);
    $atts['google_map_id'] = $google_map_id;
    $atts['js_controls'] = $js_controls;
    $atts['content'] = $content;
    return ThemeMakersThemeView::draw_html('shortcodes/gmap', $atts);
}

add_shortcode('gmap', 'tmk_gmap');

//Google chart
function tmk_chart($atts, $content = null) {

    extract(shortcode_atts(array(
                'type' => 'pie',
                'title' => '',
                'data' => '',
                'chart_titles' => '',
                'width' => 1220,
                'height' => 600,
                'bgcolor' => '',
                'font_name' => 'Arial',
                'font_size' => 14
                    ), $atts));

    $google_chart_id = rand(1, 99999);

    $chart_titles_js = "";
    $chart_titles = explode(',', $chart_titles);
    if (!empty($chart_titles)) {
        foreach ($chart_titles as $key => $value) {
            if ($key > 0) {
                $chart_titles_js.=',';
            }
            $chart_titles_js.="'" . $value . "'";
        }
    }

    $atts['google_chart_id'] = $google_chart_id;
    $atts['chart_titles_js'] = $chart_titles_js;
    $atts['content'] = $content;

    return ThemeMakersThemeView::draw_html('shortcodes/chart', $atts);
}

add_shortcode('chart', 'tmk_chart');

//Audio
function tmk_audio($atts, $content = null) {
    extract(shortcode_atts(array(), $atts));
    $atts['src'] = $content;
    return ThemeMakersThemeView::draw_html('shortcodes/audio', $atts);
}

add_shortcode('audio', 'tmk_audio');

//Video
function tmk_video($atts, $content = null) {

    extract(shortcode_atts(array(
                'src_mp4' => '',
                'src_webm' => '',
                'src_ogg' => '',
                'type' => 'youtube',
                'html5_poster' => '',
                'width' => '1220',
                'height' => '500',
                    ), $atts));



    $atts['content'] = $content;
    $content = ThemeMakersThemeView::draw_html('shortcodes/video', $atts);
    return $content;
}

add_shortcode('video', 'tmk_video');

//Blog
function tmk_blog($atts, $content = null) {
    extract(shortcode_atts(array(
                'cat' => 0,
                'posts_per_page' => "10",
                'posts' => "",
                'orderby' => "ID",
                'order' => "DESC",
                'image' => 1,
                'meta' => 1,
                'full' => 0,
                'paging' => 1,
                    ), $atts));

    $atts['posts'] = $content;

    return ThemeMakersThemeView::draw_html('shortcodes/blog', $atts);
}

add_shortcode('blog', 'tmk_blog');

//Hoverbox
function tmk_hoverbox($atts, $content = null) {
    extract(shortcode_atts(array(
                'type' => 'image',
                'image_src' => '',
                'icon_sprite' => 1,
                'image_width' => 232,
                'image_height' => 130,
                'box_link' => '#',
                'box_link_target' => '_self',
                'box_bg_color' => '',
                'box_hover_bg_color' => '',
                'title_text' => '',
                'title_type' => '',
                'title_color' => '',
                'title_hover_color' => '',
                'text' => '',
                'text_color' => '',
                'text_hover_color' => '',
                'text_align' => 'left',
                    ), $atts));

    $atts['text'] = $content;

    return ThemeMakersThemeView::draw_html('shortcodes/hoverbox', $atts);
}

//add_shortcode('hoverbox', 'tmk_hoverbox');
//Contact form
function tmk_contactform($atts, $content = null) {
    $atts['form_name'] = $content;
    $content = ThemeMakersThemeView::draw_html('shortcodes/contactform', $atts);
    return ($content);
}

add_shortcode('contactform', 'tmk_contactform');

//Quotes
function tmk_quotes($atts, $content = null) {
    extract(shortcode_atts(array(
                'class' => 'none',
                    ), $atts));


    $html = '<blockquote ' . ($class != 'none' ? 'class="' . $class . '"' : '') . '>' . $content . '</blockquote>';
    return $html;
}

add_shortcode('quotes', 'tmk_quotes');

//Twitter
function tmk_twitter($atts, $content = null) {
    extract(shortcode_atts(array(
                'count' => 1,
                    ), $atts));

    $atts['twitter'] = $content;
    $atts['count'] = $count;
    return ThemeMakersThemeView::draw_html('shortcodes/twitter', $atts);
}

add_shortcode('twitter', 'tmk_twitter');

//Clients box
function tmk_clientsbox($atts, $content = null) {
    return '<section class="client-box clearfix">' . do_shortcode($content) . '</section>';
}

//add_shortcode('clientsbox', 'tmk_clientsbox');
