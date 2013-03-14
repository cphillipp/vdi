<?php
session_start();
//error_reporting(E_ALL);
error_reporting(0);
//Contstants
define('THEMEMAKERS_THEME_URI', get_template_directory_uri());
define('THEMEMAKERS_THEME_PATH', get_template_directory());

//Theme data
define('THEMEMAKERS_THEME_NAME', 'Smart IT');
define('THEMEMAKERS_THEME_FOLDER_NAME', 'smartit');
define('THEMEMAKERS_THEME_PREFIX', 'thememakers_');
define('THEMEMAKERS_FRAMEWORK_VERSION', '1.0.3');
define('THEMEMAKERS_THEME_LINK', 'http://smartit.webtemplatemasters.com/help/');
define('THEMEMAKERS_THEME_FORUM_LINK', 'http://forums.webtemplatemasters.com/');


include_once THEMEMAKERS_THEME_PATH . '/admin/classes/view.php';
include_once THEMEMAKERS_THEME_PATH . '/admin/classes/model.php';


//*****
//AJAX callback to save or reset options
add_action('wp_ajax_change_options', array('ThemeMakersThemeModel', 'change_options'));
add_action('wp_ajax_render_gall', array('Thememakers_Entity_Gallery', 'render_gallery'));
add_action('wp_ajax_add_sidebar', array('Thememakers_Entity_Custom_Sidebars', 'add_sidebar'));
add_action('wp_ajax_add_sidebar_page', array('Thememakers_Entity_Custom_Sidebars', 'add_sidebar_page'));
add_action('wp_ajax_add_sidebar_category', array('Thememakers_Entity_Custom_Sidebars', 'add_sidebar_category'));
add_action('wp_ajax_add_sidebar_product', array('Thememakers_Entity_Custom_Sidebars', 'add_sidebar_product'));
add_action('wp_ajax_contact_form_request', array('Thememakers_Entity_Contact_Form', 'contact_form_request'));
add_action('wp_ajax_add_comment', array('ThemeMakersHelper', 'add_comment'));
add_action('wp_ajax_get_google_fonts', array('ThemeMakersHelperFonts', 'get_google_fonts_ajax'));
add_action('wp_ajax_get_new_google_fonts', array('ThemeMakersHelperFonts', 'get_new_google_fonts'));
add_action('wp_ajax_save_google_fonts', array('ThemeMakersHelperFonts', 'save_google_fonts'));
add_action('wp_ajax_get_mediagallery', array('ThemeMakersHelper', 'get_mediagallery'));
add_action('wp_ajax_get_audio_mediagallery', array('ThemeMakersHelper', 'get_audio_mediagallery'));
add_action('wp_ajax_get_video_mediagallery', array('ThemeMakersHelper', 'get_video_mediagallery'));
add_action('wp_ajax_add_seo_group', array('Thememakers_Entity_SEO_Group', 'add_seo_group'));
add_action('wp_ajax_add_seo_group_category', array('Thememakers_Entity_SEO_Group', 'add_seo_group_category'));
add_action('wp_ajax_get_unique_ids', array('ThemeMakersHelper', 'get_unique_ids'));

if (!is_user_logged_in()) {
    add_action('wp_ajax_nopriv_render_gall', array('Thememakers_Entity_Gallery', 'render_gallery'));
    add_action('wp_ajax_nopriv_contact_form_request', array('Thememakers_Entity_Contact_Form', 'contact_form_request'));
    add_action('wp_ajax_nopriv_add_comment', array('ThemeMakersHelper', 'add_comment'));
    add_action('wp_ajax_nopriv_get_google_fonts', array('ThemeMakersHelperFonts', 'get_google_fonts_ajax'));
    add_action('wp_ajax_nopriv_get_new_google_fonts', array('ThemeMakersHelperFonts', 'get_new_google_fonts'));
    add_action('wp_ajax_nopriv_get_mediagallery', array('ThemeMakersHelper', 'get_mediagallery'));
    add_action('wp_ajax_nopriv_get_audio_mediagallery', array('ThemeMakersHelper', 'get_audio_mediagallery'));
    add_action('wp_ajax_nopriv_get_video_mediagallery', array('ThemeMakersHelper', 'get_video_mediagallery'));
}

//*****


add_action('admin_menu', 'thememakers_theme_add_admin');
add_action('admin_head', 'thememakers_theme_admin_head');
add_action('admin_bar_menu', 'thememakers_theme_admin_bar_menu', 99);

add_action('wp_head', 'thememakers_theme_wp_head');
add_action('wp_footer', 'thememakers_theme_wp_footer');

//*****

global $pagenow;
if (is_admin() AND 'themes.php' == $pagenow AND isset($_GET['activated'])) {
    //***** set default options
    $theme_was_activated = get_option(THEMEMAKERS_THEME_PREFIX . 'theme_was_activated');
    @chmod(THEMEMAKERS_THEME_PATH . "/timthumb_cache", 0777);
    if (!$theme_was_activated) {
        wp_update_nav_menu_object(0, array('menu-name' => 'Primary Menu'));
        update_option(THEMEMAKERS_THEME_PREFIX . 'theme_was_activated', 1);
        //*****
        update_option(THEMEMAKERS_THEME_PREFIX . 'slider_nivo_enable_caption', 1);
        update_option(THEMEMAKERS_THEME_PREFIX . 'slider_nivo_control_nav', 1);
        update_option(THEMEMAKERS_THEME_PREFIX . 'slider_accordion_enable_caption', 1);
        update_option(THEMEMAKERS_THEME_PREFIX . 'slider_rama_enable_caption', 1);
        update_option(THEMEMAKERS_THEME_PREFIX . 'show_full_content', 0);
        update_option(THEMEMAKERS_THEME_PREFIX . 'excerpt_symbols_count', 140);
        update_option(THEMEMAKERS_THEME_PREFIX . 'gallery_height', 320);
        update_option(THEMEMAKERS_THEME_PREFIX . 'gallery_slider_width', 434);
        update_option(THEMEMAKERS_THEME_PREFIX . 'portfolio_slider_width', 434);
        update_option(THEMEMAKERS_THEME_PREFIX . 'slider_height_option', 320);
        update_option(THEMEMAKERS_THEME_PREFIX . 'sidebar_position', 'sbr');
        update_option(THEMEMAKERS_THEME_PREFIX . 'hide_wp_image_sizes', 1);
        update_option(THEMEMAKERS_THEME_PREFIX . 'logo_font', 'Marck Script');
        update_option(THEMEMAKERS_THEME_PREFIX . 'slider_flexslider_enable_caption', 1);
        update_option(THEMEMAKERS_THEME_PREFIX . 'contact_info', 'For Immediate Onsite or Remote Support <span class="tcolor">Call: +2 (589) 1285-965</span>');
        update_option(THEMEMAKERS_THEME_PREFIX . 'copyright_text', 'Copyright &copy; 2012. <a target="_blank" href="http://webtemplatemasters.com">ThemeMakers</a>. All rights reserved');
        update_option(THEMEMAKERS_THEME_PREFIX . 'h3_font_size', 'Oswald');
    }
}

//********************
add_action('admin_notices', 'thememakes_print_admin_notice');

function thememakes_print_admin_notice() {
    $notices = "";

    if (!is_writable(THEMEMAKERS_THEME_PATH . "/timthumb_cache")) {
        $notices.='<div class="error"><p>To make your theme work correctly you need to set the permissions 777 for <b>' . THEMEMAKERS_THEME_PATH . '/timthumb_cache</b> folder. Follow <a href="http://webtemplatemasters.com/tutorials/permissions/" target="_blank">the link</a> to read the instructions how to do it properly.</p></div>';
    }

    if (!is_writable(THEMEMAKERS_THEME_PATH . "/css/custom1.css")) {
        $notices.='<div class="error"><p>To make your theme work correctly you need to set the permissions 777 for <b>' . THEMEMAKERS_THEME_PATH . '/css/custom1.css</b> folder. Follow <a href="http://webtemplatemasters.com/tutorials/permissions/" target="_blank">the link</a> to read the instructions how to do it properly.</p></div>';
    }

    if (!is_writable(THEMEMAKERS_THEME_PATH . "/css/custom2.css")) {
        $notices.='<div class="error"><p>To make your theme work correctly you need to set the permissions 777 for <b>' . THEMEMAKERS_THEME_PATH . '/css/custom2.css</b> folder. Follow <a href="http://webtemplatemasters.com/tutorials/permissions/" target="_blank">the link</a> to read the instructions how to do it properly.</p></div>';
    }

    echo $notices;
}

/* * ****************** functions *********************** */

function thememakers_theme_admin_bar_menu($wp_admin_bar) {
    if (!is_super_admin() || !is_admin_bar_showing())
        return;
    $wp_admin_bar->add_menu(array(
        'id' => 'thememakers_link',
        'title' => __("Theme Options", THEMEMAKERS_THEME_FOLDER_NAME),
        'href' => site_url() . '/wp-admin/themes.php?page=thememakers_path_theme_options',
        'meta' => array(
        //'title' => __('Edit User')
        )
    ));
}

function thememakers_theme_add_admin() {
    add_theme_page(__("Theme Options", THEMEMAKERS_THEME_FOLDER_NAME), __("Theme Options", THEMEMAKERS_THEME_FOLDER_NAME), 'edit_themes', 'thememakers_path_theme_options', 'thememakers_theme_admin');
}

function thememakers_theme_admin() {
    echo ThemeMakersThemeView::draw_page('theme_options');
}

//*** sliders
function thememakers_theme_sliders_groups() {
    $slides = Thememakers_Entity_Slider::get_slides();
    echo ThemeMakersThemeView::draw_page('slider/sliders_groups', array('slides' => $slides));
}

function thememakers_theme_admin_head() {
    wp_enqueue_style("thememakers_theme_styles_css", THEMEMAKERS_THEME_URI . '/admin/css/styles.css');
    wp_enqueue_style('thickbox');

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-tabs');
    wp_enqueue_script('jquery.ui.sortable');

    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');


    //*****
    wp_enqueue_style("thememakers_theme_fancybox_css", THEMEMAKERS_THEME_URI . '/js/fancybox/jquery.fancybox.css');
    wp_enqueue_style("thememakers_theme_colorpicker_css", THEMEMAKERS_THEME_URI . '/admin/js/colorpicker/colorpicker.css');

    wp_enqueue_script('thememakers_theme_fancybox_js', THEMEMAKERS_THEME_URI . '/js/fancybox/jquery.fancybox.pack.js');
    wp_enqueue_script('thememakers_theme_colorpicker_js', THEMEMAKERS_THEME_URI . '/admin/js/colorpicker/colorpicker.js');
    wp_enqueue_script('thememakers_theme_mediagallery_js', THEMEMAKERS_THEME_URI . '/admin/js/mediagallery.js');

    wp_enqueue_script('thememakers_theme_admin_js', THEMEMAKERS_THEME_URI . '/admin/js/general.js');
    ?>

    <!--[if IE]>
            <script>
            document.createElement('header');
            document.createElement('footer');
            document.createElement('section');
            document.createElement('aside');
            document.createElement('nav');
            document.createElement('article');
            </script>
    <![endif]-->

    <script type="text/javascript">

        var template_directory = "<?php echo THEMEMAKERS_THEME_URI; ?>/";
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        //translations
        var lang_edit = "<?php _e('Edit', THEMEMAKERS_THEME_FOLDER_NAME); ?>";
        var lang_delete = "<?php _e('Delete', THEMEMAKERS_THEME_FOLDER_NAME); ?>";
        var lang_one_moment = "<?php _e("One moment", THEMEMAKERS_THEME_FOLDER_NAME) ?>";
        var lang_sure = "<?php _e("Sure?", THEMEMAKERS_THEME_FOLDER_NAME) ?>";

    </script>

    <?php
    echo ThemeMakersHelperFonts::get_google_fonts_link();
}

function thememakers_theme_wp_head() {

    wp_enqueue_style("thememakers_theme_fancybox_css", THEMEMAKERS_THEME_URI . '/js/fancybox/jquery.fancybox.css');
    wp_enqueue_script('thememakers_theme_fancybox_js', THEMEMAKERS_THEME_URI . '/js/fancybox/jquery.fancybox.pack.js', array('jquery'));

    wp_enqueue_script('thememakers_theme_jquery_easing_js', THEMEMAKERS_THEME_URI . '/js/jquery.easing.1.3.js', array('jquery'));
    wp_enqueue_script('thememakers_theme_jquery_easingcomp_js', THEMEMAKERS_THEME_URI . '/js/jquery.easing.compatibility.js', array('jquery'));

    wp_enqueue_script('thememakers_theme_jquery_isotope_js', THEMEMAKERS_THEME_URI . '/js/jquery.isotope.min.js', array('jquery'));
    wp_enqueue_script('thememakers_theme_jquery_cycle_js', THEMEMAKERS_THEME_URI . '/js/jquery.cycle.all.min.js', array('jquery'));
    wp_enqueue_script('thememakers_theme_touchSwipe', THEMEMAKERS_THEME_URI . '/js/jquery.touchSwipe.min.js', array('jquery'));
    wp_enqueue_script('thememakers_theme_respond_js', THEMEMAKERS_THEME_URI . '/js/respond.min.js', array('jquery'));
    wp_enqueue_script('thememakers_theme_sudoslider_js', THEMEMAKERS_THEME_URI . '/js/jquery.sudoSlider.min.js');
    wp_enqueue_script('thememakers_theme_mediaelement_js', THEMEMAKERS_THEME_URI . '/js/mediaelement/mediaelement-and-player.min.js');
    wp_enqueue_script('thememakers_theme_general_js', THEMEMAKERS_THEME_URI . '/js/general.js', array('jquery'));
}

function thememakers_theme_wp_footer() {
    
}

//*********************************************************************************************
add_action('init', 'thememakers_do_filter');

function thememakers_do_filter() {
    remove_filter('the_content', 'wptexturize');
}

