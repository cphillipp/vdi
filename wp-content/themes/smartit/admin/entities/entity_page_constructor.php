<?php

class Thememakers_Entity_Page_Constructor {

    public static function save($post_id) {
        update_post_meta($post_id, "pagebg_type", @$_POST["pagebg_type"]);
        update_post_meta($post_id, "pagebg_color", @$_POST["pagebg_color"]);
        update_post_meta($post_id, "pagebg_image", @$_POST["pagebg_image"]);
        update_post_meta($post_id, "pagebg_type_image_option", @$_POST["pagebg_type_image_option"]);
        update_post_meta($post_id, "page_sidebar_position", @$_POST["page_sidebar_position"]);
        //*****
        update_post_meta($post_id, "page_slider", @$_POST["page_slider"]);
        update_post_meta($post_id, "page_slider_type", @$_POST["page_slider_type"]);
        update_post_meta($post_id, "revolution_slide_group", @$_POST["revolution_slide_group"]);
    }

    public static function init_meta_boxes() {
        add_meta_box("page_constructor_bg", __("Custom Page Options", THEMEMAKERS_THEME_FOLDER_NAME), array('Thememakers_Entity_Page_Constructor', 'page_constructor'), "post", "side", "low");
        add_meta_box("page_constructor_bg", __("Custom Page Options", THEMEMAKERS_THEME_FOLDER_NAME), array('Thememakers_Entity_Page_Constructor', 'page_constructor'), "page", "side", "low");
        add_meta_box("page_constructor_bg", __("Custom Page Options", THEMEMAKERS_THEME_FOLDER_NAME), array('Thememakers_Entity_Page_Constructor', 'page_constructor'), "folio", "side", "low");
        add_meta_box("page_constructor_bg", __("Custom Page Options", THEMEMAKERS_THEME_FOLDER_NAME), array('Thememakers_Entity_Page_Constructor', 'page_constructor'), "gall", "side", "low");
		add_meta_box("page_constructor_bg", __("Custom Page Options", THEMEMAKERS_THEME_FOLDER_NAME), array('Thememakers_Entity_Page_Constructor', 'page_constructor'), "product", "side", "low");
        //*****
        add_meta_box("page_constructor_slider", __("Page slider", THEMEMAKERS_THEME_FOLDER_NAME), array('Thememakers_Entity_Page_Constructor', 'page_slider'), "post", "side", "low");
        add_meta_box("page_constructor_slider", __("Page slider", THEMEMAKERS_THEME_FOLDER_NAME), array('Thememakers_Entity_Page_Constructor', 'page_slider'), "page", "side", "low");
    }

    public function page_constructor() {
        global $post;
        echo ThemeMakersThemeView::draw_html('page_constructor/constructor', self::get_page_settings($post->ID));
    }

    public function page_slider() {
        global $post;
        echo ThemeMakersThemeView::draw_html('page_constructor/slider', self::get_page_settings($post->ID));
    }

    public static function get_page_settings($post_id) {
        $custom = get_post_custom($post_id);
		
		
        $data = array();
        $data['pagebg_type'] = @$custom["pagebg_type"][0];
        $data['pagebg_color'] = @$custom["pagebg_color"][0];
        $data['pagebg_image'] = @$custom["pagebg_image"][0];
        $data['pagebg_type_image_option'] = @$custom["pagebg_type_image_option"][0];
        //*****
        $data['page_sidebar_position'] = @$custom["page_sidebar_position"][0];
        //*****
        $data['page_slider'] = @$custom["page_slider"][0];
        $data['page_slider_type'] = @$custom["page_slider_type"][0];
        $data['revolution_slide_group'] = @$custom["revolution_slide_group"][0];
        return $data;
    }

}

