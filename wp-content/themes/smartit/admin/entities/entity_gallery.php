<?php

class Thememakers_Entity_Gallery {

    public function register() {

        $args = array(
            'labels' => array(
                'name' => __('Galleries', THEMEMAKERS_THEME_FOLDER_NAME),
                'singular_name' => __('Gallery', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new' => __('Add New', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new_item' => __('Add New Gallery', THEMEMAKERS_THEME_FOLDER_NAME),
                'edit_item' => __('Edit Gallery', THEMEMAKERS_THEME_FOLDER_NAME),
                'new_item' => __('New Gallery', THEMEMAKERS_THEME_FOLDER_NAME),
                'view_item' => __('View Gallery', THEMEMAKERS_THEME_FOLDER_NAME),
                'search_items' => __('Search Gallery', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found' => __('No Galleries found', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found_in_trash' => __('No Galleries found in Trash', THEMEMAKERS_THEME_FOLDER_NAME),
                'parent_item_colon' => ''
            ),
            'public' => false,
            //'menu_icon' => THEMEMAKERS_THEME_URI . '/images/icons/icon_gallery.png',
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => true,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'rewrite' => array('slug' => 'gall'),
            'show_in_admin_bar' => true
        );
        register_post_type('gall', $args);
        flush_rewrite_rules(false);
        //*** taxonomies ****
        register_taxonomy("gallery_categories", array("gall"), array(
            "hierarchical" => true,
            "labels" => array(
                'name' => __('Gallery Categories', THEMEMAKERS_THEME_FOLDER_NAME),
                'singular_name' => __('Gallery Category', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new' => __('Add New', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new_item' => __('Add New Gallery Category', THEMEMAKERS_THEME_FOLDER_NAME),
                'edit_item' => __('Edit Gallery Category', THEMEMAKERS_THEME_FOLDER_NAME),
                'new_item' => __('New Gallery Category', THEMEMAKERS_THEME_FOLDER_NAME),
                'view_item' => __('View Gallery Category', THEMEMAKERS_THEME_FOLDER_NAME),
                'search_items' => __('Search Gallery Categories', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found' => __('No Gallery Categories found', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found_in_trash' => __('No Gallery Categories found in Trash', THEMEMAKERS_THEME_FOLDER_NAME),
                'parent_item_colon' => ''
            ),
            "singular_label" => __("Gallery Category", THEMEMAKERS_THEME_FOLDER_NAME),
            "rewrite" => true,
            'show_in_nav_menus' => false,
        ));
        //***
        add_filter("manage_gall_posts_columns", array("Thememakers_Entity_Gallery", "show_edit_columns"));
        add_action("manage_gall_posts_custom_column", array("Thememakers_Entity_Gallery", "show_edit_columns_content"));
    }

    public function gallery_meta() {
        global $post;
        $data = array();
        $custom = get_post_custom($post->ID);
        $data['thememakers_gallery'] = unserialize(@$custom["thememakers_gallery"][0]);
        echo ThemeMakersThemeView::draw_html('gallery/metabox', $data);
    }

    public static function save($post_id) {
        update_post_meta($post_id, "thememakers_gallery", @$_POST["thememakers_gallery"]);
    }

    public static function init_meta_boxes() {
        add_meta_box("gallery_meta", __("Gallery metabox", THEMEMAKERS_THEME_FOLDER_NAME), array('Thememakers_Entity_Gallery', 'gallery_meta'), "gall", "normal", "low");
        add_meta_box("gallery_credits_meta", __("Portfolio attributes", THEMEMAKERS_THEME_FOLDER_NAME), array('Thememakers_Entity_Portfolio', 'credits_meta'), "gall", "normal", "low");
    }

    public function show_edit_columns_content($column) {
        global $post;

        switch ($column) {
            case "image":
                if (has_post_thumbnail($post->ID)) {
                    echo '<img alt="" src="' . ThemeMakersHelper::get_post_featured_image($post->ID, 200) . '"/>';
                }
                break;
            case "gallery_categories":
                echo get_the_term_list($post->ID, 'gallery_categories', '', ', ', '');
                break;
            case "date":
                $date = get_post_modified_time("U", false, $post->ID);
                echo $date;
                break;
            case "image_count":
                $custom = get_post_custom($post->ID);
                $thememakers_gallery = unserialize(@$custom["thememakers_gallery"][0]);
                echo count($thememakers_gallery);
                break;
        }
    }

    public function show_edit_columns($columns) {
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => __("Title", THEMEMAKERS_THEME_FOLDER_NAME),
            "gallery_categories" => __("Categories", THEMEMAKERS_THEME_FOLDER_NAME),
            "image" => __("Cover", THEMEMAKERS_THEME_FOLDER_NAME),
            "image_count" => __("Image count", THEMEMAKERS_THEME_FOLDER_NAME),
            "date" => __("Date", THEMEMAKERS_THEME_FOLDER_NAME)
        );

        return $columns;
    }

    //for ajax
    public static function render_gallery() {
        $data = array();
        $data['post_id'] = $_REQUEST['id'];
        $data['sidebar_position'] = $_REQUEST['sidebar_position'];
        echo ThemeMakersThemeView::draw_html('gallery/render_gallery', $data);
        exit;
    }

}

