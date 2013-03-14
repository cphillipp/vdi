<?php

class Thememakers_Entity_Testimonials {

    public function register() {

        $args = array(
            'labels' => array(
                'name' => __('Testimonials', THEMEMAKERS_THEME_FOLDER_NAME),
                'singular_name' => __('Testimonials', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new' => __('Add New', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new_item' => __('Add New Testimonial', THEMEMAKERS_THEME_FOLDER_NAME),
                'edit_item' => __('Edit Testimonial', THEMEMAKERS_THEME_FOLDER_NAME),
                'new_item' => __('New Testimonial', THEMEMAKERS_THEME_FOLDER_NAME),
                'view_item' => __('View Testimonial', THEMEMAKERS_THEME_FOLDER_NAME),
                'search_items' => __('Search Testimonials', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found' => __('No Testimonials found', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found_in_trash' => __('No Testimonials found in Trash', THEMEMAKERS_THEME_FOLDER_NAME),
                'parent_item_colon' => ''
            ),
            'public' => false,
            //'menu_icon' => THEMEMAKERS_THEME_URI . '/images/icons/icon_testi.png',
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => true,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'excerpt'),
            'rewrite' => array('slug' => 'testimonials'),
            'show_in_admin_bar' => true
        );
        register_post_type('testimonials', $args);
        flush_rewrite_rules(false);
    }

    public static function save($post_id) {
        //TODO
    }

    public static function init_meta_boxes() {
        //TODO
    }

}
