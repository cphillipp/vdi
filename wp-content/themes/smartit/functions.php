<?php

//THEMEMAKERS - theme framework
include_once 'admin/options.php';
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_filter('widget_text', 'do_shortcode');
//*****
register_nav_menu('primary', 'Primary Menu');

load_theme_textdomain(THEMEMAKERS_THEME_FOLDER_NAME, THEMEMAKERS_THEME_PATH . '/languages');
/* * ****************** post types registry ********************************** */
include_once THEMEMAKERS_THEME_PATH . '/admin/types_registration.php';
/* * ****************** post types registry ********************************** */

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'add_sidebar') {
        $_REQUEST = ThemeMakersHelper::db_quotes_shield($_REQUEST);
    }
}

//static attributes
$before_widget = '<div id="%1$s" class="widget %2$s">';
$after_widget = '</div>';
$before_title = '<h3 class="widget-title">';
$after_title = '</h3>';

//default widget areas
register_sidebar(array(
    'name' => __('Thememakers Default Sidebar', THEMEMAKERS_THEME_FOLDER_NAME),
    'id' => 'thememakers_default_sidebar',
    'before_widget' => $before_widget,
    'after_widget' => $after_widget,
    'before_title' => $before_title,
    'after_title' => $after_title
));

register_sidebar(array(
    'name' => __('Footer Sidebar 1', THEMEMAKERS_THEME_FOLDER_NAME),
    'id' => 'footer_sidebar_1',
    'before_widget' => $before_widget,
    'after_widget' => $after_widget,
    'before_title' => $before_title,
    'after_title' => $after_title
));

register_sidebar(array(
    'name' => __('Footer Sidebar 2', THEMEMAKERS_THEME_FOLDER_NAME),
    'id' => 'footer_sidebar_2',
    'before_widget' => $before_widget,
    'after_widget' => $after_widget,
    'before_title' => $before_title,
    'after_title' => $after_title
));

register_sidebar(array(
    'name' => __('Footer Sidebar 3', THEMEMAKERS_THEME_FOLDER_NAME),
    'id' => 'footer_sidebar_3',
    'before_widget' => $before_widget,
    'after_widget' => $after_widget,
    'before_title' => $before_title,
    'after_title' => $after_title
));


register_sidebar(array(
    'name' => __('Footer Sidebar 4', THEMEMAKERS_THEME_FOLDER_NAME),
    'id' => 'footer_sidebar_4',
    'before_widget' => $before_widget,
    'after_widget' => $after_widget,
    'before_title' => $before_title,
    'after_title' => $after_title
));


register_sidebar(array(
    'name' => __('Primary Menu Place', THEMEMAKERS_THEME_FOLDER_NAME),
    'id' => 'primary_menu_place',
    'before_widget' => $before_widget,
    'after_widget' => $after_widget,
    'before_title' => $before_title,
    'after_title' => $after_title
));


//custom widget areas
$widget_areas = Thememakers_Entity_Custom_Sidebars::register_custom_sidebars($before_widget, $after_widget, $before_title, $after_title);


if ( ! function_exists( 'woocommerce_get_sidebar' ) ) {

	/**
	 * Get the shop sidebar template.
	 *
	 * @access public
	 * @return void
	 */
	function woocommerce_get_sidebar() {
		
	}
}

add_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );