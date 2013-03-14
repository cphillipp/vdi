<?php

include_once THEMEMAKERS_THEME_PATH . '/admin/extensions/helper.php';
include_once THEMEMAKERS_THEME_PATH . '/admin/extensions/helper_fonts.php';
//***
include_once THEMEMAKERS_THEME_PATH . '/admin/entities/entity_portfolio.php';
include_once THEMEMAKERS_THEME_PATH . '/admin/entities/entity_testimonials.php';
include_once THEMEMAKERS_THEME_PATH . '/admin/entities/entity_gallery.php';
include_once THEMEMAKERS_THEME_PATH . '/admin/entities/entity_page.php';
//---
include_once THEMEMAKERS_THEME_PATH . '/admin/entities/entity_slider.php';
include_once THEMEMAKERS_THEME_PATH . '/admin/entities/entity_contact_form.php';
include_once THEMEMAKERS_THEME_PATH . '/admin/entities/entity_custom_sidebars.php';
include_once THEMEMAKERS_THEME_PATH . '/admin/entities/entity_page_constructor.php';
include_once THEMEMAKERS_THEME_PATH . '/admin/entities/entity_seo_group.php';
//***
include_once THEMEMAKERS_THEME_PATH . '/admin/theme_widgets.php';
//*****
//POST TYPES REGISTRATION
add_action('init', array('Thememakers_Entity_Portfolio', 'register'));
add_action('init', array('Thememakers_Entity_Testimonials', 'register'));
add_action('init', array('Thememakers_Entity_Gallery', 'register'));
//*****
add_action('init', array('Thememakers_Entity_Page', 'register'));
add_action("admin_init", "thememakers_admin_init");
add_action('save_post', 'thememakers_save_details');

//Register shortcodes and load tinymce plugin
require_once(THEMEMAKERS_THEME_PATH . '/admin/extensions/shortcodes.php' ); //register shortcodes
require_once (THEMEMAKERS_THEME_PATH . '/admin/extensions/tinymce/tinymce.loader.php'); //load tinymce shortcodes plugin

function thememakers_admin_init() {
    Thememakers_Entity_Portfolio::init_meta_boxes();
    Thememakers_Entity_Gallery::init_meta_boxes();
    Thememakers_Entity_Page::init_meta_boxes();
    Thememakers_Entity_Page_Constructor::init_meta_boxes();
}

function thememakers_save_details() {
    if (!empty($_POST)) {
        if (isset($_POST['thememakers_meta_saving'])) {
            global $post;
            $post_type = get_post_type($post->ID);
            switch ($post_type) {
                case 'testimonials':
                    Thememakers_Entity_Testimonials::save($post->ID);
                    break;
                case 'page':case 'post':case 'folio':case 'gall':
                    Thememakers_Entity_Gallery::save($post->ID);
                    Thememakers_Entity_Portfolio::save($post->ID);
                    Thememakers_Entity_Page::save($post->ID); //for all types
                    break;
                default:
                    break;
            }

            Thememakers_Entity_Page_Constructor::save($post->ID);
        }
    }
}

//*****
//Remove standard image sizes so that these sizes are not created during the Media Upload process
function thememakers_filter_image_sizes($sizes) {

    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['large']);

    return $sizes;
}

if (get_option(THEMEMAKERS_THEME_PREFIX . "hide_wp_image_sizes")) {
    add_filter('intermediate_image_sizes_advanced', 'thememakers_filter_image_sizes');
}

