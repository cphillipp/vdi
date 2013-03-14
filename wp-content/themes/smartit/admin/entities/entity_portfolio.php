<?php

class Thememakers_Entity_Portfolio {

    public function register() {

        $args = array(
            'labels' => array(
                'name' => __('Portfolios', THEMEMAKERS_THEME_FOLDER_NAME),
                'singular_name' => __('Portfolio', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new' => __('Add New', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new_item' => __('Add New Portfolio', THEMEMAKERS_THEME_FOLDER_NAME),
                'edit_item' => __('Edit Portfolio', THEMEMAKERS_THEME_FOLDER_NAME),
                'new_item' => __('New Portfolio', THEMEMAKERS_THEME_FOLDER_NAME),
                'view_item' => __('View Portfolio', THEMEMAKERS_THEME_FOLDER_NAME),
                'search_items' => __('Search Portfolios', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found' => __('No Portfolios found', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found_in_trash' => __('No Portfolios found in Trash', THEMEMAKERS_THEME_FOLDER_NAME),
                'parent_item_colon' => ''
            ),
            'public' => false,
            //'menu_icon' => THEMEMAKERS_THEME_URI . '/images/icons/icon_portfolio.png',
            'archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => true,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'tags', 'comments'),
            'rewrite' => array('slug' => 'folio'),
            'show_in_admin_bar' => true,
            'taxonomies' => array('clients', 'skills','portfolio_categories') // this is IMPORTANT
        );
        register_post_type('folio', $args);
        flush_rewrite_rules(false);
        //*** taxonomies ****
        register_taxonomy("clients", array("folio","gall"), array(
            "hierarchical" => true,
            "labels" => array(
                'name' => __('Clients', THEMEMAKERS_THEME_FOLDER_NAME),
                'singular_name' => __('Client', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new' => __('Add New', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new_item' => __('Add New Client', THEMEMAKERS_THEME_FOLDER_NAME),
                'edit_item' => __('Edit Client', THEMEMAKERS_THEME_FOLDER_NAME),
                'new_item' => __('New Client', THEMEMAKERS_THEME_FOLDER_NAME),
                'view_item' => __('View Client', THEMEMAKERS_THEME_FOLDER_NAME),
                'search_items' => __('Search Clients', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found' => __('No Clients found', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found_in_trash' => __('No Clients found in Trash', THEMEMAKERS_THEME_FOLDER_NAME),
                'parent_item_colon' => ''
            ),
            "singular_label" => __("client", THEMEMAKERS_THEME_FOLDER_NAME),
            "rewrite" => true,
            'show_in_nav_menus' => false,
            'capabilities' => array('manage_terms'),
            'show_ui' => true
        ));
		
        register_taxonomy("portfolio_categories", array("folio"), array(
            "hierarchical" => true,
            "labels" => array(
                'name' => __('Portfolio Categories', THEMEMAKERS_THEME_FOLDER_NAME),
                'singular_name' => __('Portfolio Category', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new' => __('Add New', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new_item' => __('Add New Portfolio Category', THEMEMAKERS_THEME_FOLDER_NAME),
                'edit_item' => __('Edit Portfolio Category', THEMEMAKERS_THEME_FOLDER_NAME),
                'new_item' => __('New Portfolio Category', THEMEMAKERS_THEME_FOLDER_NAME),
                'view_item' => __('View Portfolio Category', THEMEMAKERS_THEME_FOLDER_NAME),
                'search_items' => __('Search Portfolio Categories', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found' => __('No Portfolio Categories found', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found_in_trash' => __('No Categories found in Trash', THEMEMAKERS_THEME_FOLDER_NAME),
                'parent_item_colon' => ''
            ),
            "singular_label" => __("Portfolio Category", THEMEMAKERS_THEME_FOLDER_NAME),
            "rewrite" => true,
            'show_in_nav_menus' => false,
        ));	

        register_taxonomy("skills", array("folio","gall"), array(
            "hierarchical" => true,
            "labels" => array(
                'name' => __('Skills', THEMEMAKERS_THEME_FOLDER_NAME),
                'singular_name' => __('Skill', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new' => __('Add New', THEMEMAKERS_THEME_FOLDER_NAME),
                'add_new_item' => __('Add New Skill', THEMEMAKERS_THEME_FOLDER_NAME),
                'edit_item' => __('Edit Skill', THEMEMAKERS_THEME_FOLDER_NAME),
                'new_item' => __('New Skill', THEMEMAKERS_THEME_FOLDER_NAME),
                'view_item' => __('View Skill', THEMEMAKERS_THEME_FOLDER_NAME),
                'search_items' => __('Search Skills', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found' => __('No Skills found', THEMEMAKERS_THEME_FOLDER_NAME),
                'not_found_in_trash' => __('No Skills found in Trash', THEMEMAKERS_THEME_FOLDER_NAME),
                'parent_item_colon' => ''
            ),
            "singular_label" => __("skill", THEMEMAKERS_THEME_FOLDER_NAME),
            "show_tagcloud" => true,
            'query_var' => true,
            'rewrite' => true,
            'show_in_nav_menus' => false,
            'capabilities' => array('manage_terms'),
            'show_ui' => true
        ));


        //***

        add_filter("manage_folio_posts_columns", array("Thememakers_Entity_Portfolio", "show_edit_columns"));
        add_action("manage_folio_posts_custom_column", array("Thememakers_Entity_Portfolio", "show_edit_columns_content"));
    }

    public function credits_meta() {
        global $post;
        $data = array();
        $custom = get_post_custom($post->ID);
        $data['portfolio_date'] = @$custom["portfolio_date"][0];
        $data['portfolio_url'] = @$custom["portfolio_url"][0];
        $data['portfolio_url_title'] = @$custom["portfolio_url_title"][0];
        $data['portfolio_client'] = @$custom["portfolio_client"][0];
        $data['portfolio_tools'] = @$custom["portfolio_tools"][0];
        $data['portfolio_clients'] = @$custom["portfolio_clients"][0];
        $data['thememakers_portfolio'] = unserialize(@$custom["thememakers_portfolio"][0]);
        echo ThemeMakersThemeView::draw_html('portfolio/credits_meta', $data);
    }

    public static function save($post_id) {
        if (isset($_POST)) {
            update_post_meta($post_id, "portfolio_url", @$_POST["portfolio_url"]);
            update_post_meta($post_id, "portfolio_date", @$_POST["portfolio_date"]);
            update_post_meta($post_id, "portfolio_url_title", @$_POST["portfolio_url_title"]);
            update_post_meta($post_id, "portfolio_client", @$_POST["portfolio_client"]);
            update_post_meta($post_id, "portfolio_tools", @$_POST["portfolio_tools"]);
            update_post_meta($post_id, "thememakers_portfolio", @$_POST["thememakers_portfolio"]);
            update_post_meta($post_id, "portfolio_clients", @$_POST["portfolio_clients"]);
        }
    }

    public static function init_meta_boxes() {
        add_meta_box("credits_meta", __("Portfolio attributes", THEMEMAKERS_THEME_FOLDER_NAME), array('Thememakers_Entity_Portfolio', 'credits_meta'), "folio", "normal", "low");
    }

    public function show_edit_columns_content($column) {
        global $post;

        switch ($column) {
            case "image":
                if (has_post_thumbnail($post->ID)) {
                    echo '<img alt="" src="' . ThemeMakersHelper::get_post_featured_image($post->ID, 200) . '"/>';
                }
                break;
            case "description":
                the_excerpt();
                break;
            case "clients":
                echo get_the_term_list($post->ID, 'clients', '', ', ', '');
                break;
            case "skills":
                echo get_the_term_list($post->ID, 'skills', '', ', ', '');
                break;
        }
    }

    public function show_edit_columns($columns) {
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => __("Title", THEMEMAKERS_THEME_FOLDER_NAME),
            "image" => __("Cover", THEMEMAKERS_THEME_FOLDER_NAME),
            "description" => __("Description", THEMEMAKERS_THEME_FOLDER_NAME),
            "clients" => __("Clients", THEMEMAKERS_THEME_FOLDER_NAME),
            "skills" => __("Skills", THEMEMAKERS_THEME_FOLDER_NAME),
        );

        return $columns;
    }

}

