<?php
wp_enqueue_style("thememakers_theme_uniform_css", THEMEMAKERS_THEME_URI . '/admin/css/uniform.default.css');
wp_enqueue_style("thememakers_theme_admin_css", THEMEMAKERS_THEME_URI . '/admin/css/options_styles.css');


//***
wp_enqueue_style("thememakers_theme_jquery_ui_css1", THEMEMAKERS_THEME_URI . '/admin/css/ui-lightness/jquery-ui-1.8.23.custom.css');
wp_enqueue_style("thememakers_theme_jquery_ui_css2", THEMEMAKERS_THEME_URI . '/admin/css/jquery-ui.css');
wp_enqueue_script('thememakers_theme_jquery_ui_js', THEMEMAKERS_THEME_URI . '/admin/js/jquery-ui-1.8.23.custom.min.js');

wp_enqueue_script('thememakers_theme_options_js', THEMEMAKERS_THEME_URI . '/admin/js/options.js');
wp_enqueue_script('thememakers_theme_uniform_js', THEMEMAKERS_THEME_URI . '/admin/js/jquery.uniform.min.js');
wp_enqueue_script('thememakers_theme_uniform_js', THEMEMAKERS_THEME_URI . '/admin/js/selectivizr-and-extra-selectors.min.js');

wp_enqueue_script('thememakers_theme_custom_sidebars_js', THEMEMAKERS_THEME_URI . '/admin/js/custom_sidebars.js');
wp_enqueue_script('thememakers_theme_seo_groups_js', THEMEMAKERS_THEME_URI . '/admin/js/seo_groups.js');
wp_enqueue_script('thememakers_theme_sliders_js', THEMEMAKERS_THEME_URI . '/admin/js/sliders.js');
wp_enqueue_script('thememakers_theme_form_constructor_js', THEMEMAKERS_THEME_URI . '/admin/js/form_constructor.js');

//*********---------------------------------------------------------------------------------------------------------------

$form_constructor = new Thememakers_Entity_Contact_Form('contacts_form');
$form_constructor->options_description = array(
    "form_title" => array(__("Form Title", THEMEMAKERS_THEME_FOLDER_NAME), "input"),
    "field_type" => array(__("Field Type", THEMEMAKERS_THEME_FOLDER_NAME), "select"),
    "form_label" => array(__("Field Label", THEMEMAKERS_THEME_FOLDER_NAME), "input"),
    "enable_captcha" => array(__("Enable Captcha Protection", THEMEMAKERS_THEME_FOLDER_NAME), "checkbox")
);

//*****

$google_fonts = ThemeMakersHelperFonts::get_google_fonts();
$content_fonts = ThemeMakersHelperFonts::get_content_fonts();
$fonts = array_merge($content_fonts, $google_fonts);
$fonts = array_merge(array("" => ""), $fonts);
//*****
$slides = Thememakers_Entity_Slider::get_slides();
//*****
$sidebars = get_option(THEMEMAKERS_THEME_PREFIX . "thememakers_sidebars");
//*****
$contact_forms = get_option(THEMEMAKERS_THEME_PREFIX . 'contact_form');
//******
$seo_groups = get_option(THEMEMAKERS_THEME_PREFIX . "thememakers_seo_groups");

//*********---------------------------------------------------------------------------------------------------------------
//*********---------------------------------------------------------------------------------------------------------------
//Default colorizing array
function set_theme_options_defaults($option, $value) {

    $theme_options_defaults = array(
        'header_color' => '',
        'logo_text_color' => '#FE5214',
        'links_color' => '#7B7B7B',
        'body_bg_color' => '#ECECEC',
        'main_nav_bg_color' => '#333',
        'main_nav_def_text_color' => '#F9F9F9',
        'main_nav_curr_text_color' => '#FE5214',
        'main_nav_hover_text_color' => '#FE5214',
        'main_nav_curr_item_bg_color' => '',
        'content_text_color' => '#7d7d7d',
        'content_link_hover_color' => '#fe5214',
        'widget_def_title_color' => '#404040',
        'widget_def_text_color' => '#7d7d7d',
        'widget_def_link_color' => '#7B7B7B',
        'widget_def_link_hover_color' => '#FE5214',
        'widget_colored_testimonials_text_color' => '#fafafa',
        'widget_colored_testimonials_author_text_color' => '#fafafa',
        'footer_bg_color' => '#232222',
        'footer_color' => '#7d7d7d',
        'footer_widget_title_color' => '#FAFAFA',
        'footer_widget_link_color' => '#7B7B7B',
        'footer_widget_link_hover_color' => '#FFFFFF',
    );

    //*******
    if (empty($value)) {
        $value = $theme_options_defaults[$option];
    }

    return $value;
}
?>

<form id="theme_options" name="theme_options" method="post" style="display: none;">
    <div id="tm">

        <section class="admin-container clearfix">

            <header id="title-bar" class="clearfix">

                <a href="#" class="admin-logo"></a>
                <span class="fw-version">framework v.<?php echo THEMEMAKERS_FRAMEWORK_VERSION ?></span>

                <div class="clear"></div>

            </header><!--/ #title-bar-->

            <section class="set-holder clearfix">

                <ul class="support-links">
                    <li><a class="support-docs" href="<?php echo THEMEMAKERS_THEME_LINK ?>" target="_blank"><?php _e('View Theme Docs', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                    <li><a class="support-forum" href="<?php echo THEMEMAKERS_THEME_FORUM_LINK ?>" target="_blank"><?php _e('Visit Forum', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                </ul><!--/ .support-links-->

                <div class="button-options">
                    <a href="#" class="admin-button button-small button-yellow button_reset_options"><?php _e('Reset All Options', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                    <a href="#" class="admin-button button-small button-yellow button_save_options"><?php _e('Save All Changes', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                </div><!--/ .button-options-->

            </section><!--/ .set-holder-->

            <aside id="admin-aside">

                <ul class="admin-nav">
                    <li>
                        <a class="shortcut-options" href="#tab1"><?php _e('General', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                    </li>
                    <li>
                        <a class="shortcut-styling" href="#tab2-0"><?php _e('Styling', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                        <ul>
                            <li><a href="#tab2-0"><?php _e('General', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                            <li><a href="#tab2-1"><?php _e('Headings', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                            <li><a href="#tab2-2"><?php _e('Main Navigation', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                            <li><a href="#tab2-3"><?php _e('Content', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                            <li><a href="#tab2-4"><?php _e('Buttons', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                            <li><a href="#tab2-5"><?php _e('Sidebar Widgets', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                            <!-- <li><a href="#tab2-6"><?php _e('Images', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li> -->
                            <li><a href="#tab2-7"><?php _e('Footer Area', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                        </ul>
                    </li>


                    <li><a class="shortcut-slider" href="#tab4-0"><?php _e('Slider Settings', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                        <ul>
                            <li><a href="#tab4-0"><?php _e('General', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                            <li><a href="#tab4-1">Nivo Slider</a></li>
                            <li><a href="#tab4-5">Flex Slider</a></li>
                        </ul>
                    </li>


                    <li><a class="shortcut-slider" href="#tab41-0"><?php _e('Sliders Groups', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                        <ul class="slider_groups_list">
                            <li><a href="#tab41-0" class="slider_groups_list_nav_link"><?php _e('General', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                            <?php
                            if (is_string($slides) AND !empty($slides)) {
                                $slides = unserialize($slides);
                            }
                            ?>
                            <?php if (!empty($slides) AND is_array($slides)): ?>
                                <?php foreach ($slides as $key => $slide) : ?>
                                    <?php if (isset($slide['name'])): ?>
                                        <?php if ($slide['name']): ?>
                                            <li style="display: none;"><a href="#slider_group_<?php echo $key ?>"><?php echo $slide['name'] ?></a></li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>


                    <li><a class="shortcut-blog" href="#tab5"><?php _e('Blog', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                    <li><a class="shortcut-portfolio" href="#tab6"><?php _e('Portfolio', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                    <li><a class="shortcut-gallery" href="#tab7"><?php _e('Gallery', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                    <li>
                        <a class="shortcut-contact" href="#tab8-0"><?php _e('Contact Forms', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                        <ul class="contact_forms_groups_list">
                            <li><a href="#tab8-0" class="contact_page_nav_link"><?php _e('Add Form', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                            <?php
                            if (is_string($contact_forms) AND !empty($contact_forms)) {
                                $contact_forms = unserialize($contact_forms);
                            }
                            ?>
                            <?php if (!empty($contact_forms) AND is_array($contact_forms)): ?>
                                <?php $counter = 0; ?>
                                <?php foreach ($contact_forms as $contact_form_id => $contact_form) : ?>
                                    <li style="display: none"><a href="#contact_form_<?php echo $counter; ?>"><?php echo $contact_form['title']; ?></a></li>
                                    <?php $counter++; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <li><a class="shortcut-sidebar" href="#tab9-0"><?php _e('Custom Sidebars', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                        <ul class="custom_sidebars_list">
                            <li><a href="#tab9-0" class="custom_sidebars_list_nav_link"><?php _e('General', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>

                            <?php
                            if (is_string($sidebars) AND !empty($sidebars)) {
                                $sidebars = unserialize($sidebars);
                            }
                            ?>
                            <?php if (!empty($sidebars) AND is_array($sidebars)): ?>
                                <?php foreach ($sidebars as $sidebar_id => $sidebar) : ?>
                                    <li style="display: none"><a href="#<?php echo $sidebar_id; ?>"><?php echo $sidebar['name']; ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>


                        </ul>

                    </li>

                    <li><a class="shortcut-seo" href="#tab10">
                            <?php _e('SEO Tools', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                        <ul class="seo_groups_list">
                            <li><a class="shortcut-footer" href="#tab10"><?php _e('General', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                            <li><a class="shortcut-footer seo_groups_nav_link" href="#tab10-0"><?php _e('SEO Groups', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>


                            <?php
                            if (is_string($seo_groups) AND !empty($seo_groups)) {
                                $seo_groups = unserialize($seo_groups);
                            }
                            ?>

                            <?php if (!empty($seo_groups) AND is_array($seo_groups)): ?>
                                <?php foreach ($seo_groups as $group_id => $seo_group) : ?>
                                    <?php if ($group_id): ?>
                                        <li style="display: none;"><a href="#<?php echo $group_id; ?>"><?php echo $seo_group['name']; ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>


                        </ul>
                    </li>
                    <li><a class="shortcut-footer" href="#tab11"><?php _e('Footer', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
                </ul><!--/ .admin-nav-->

            </aside><!--/ #admin-aside-->

            <section id="admin-content" class="clearfix">

                <div class="tab-content" id="tab1">
                    <h1><?php _e('General settings', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>

                    <h4><?php _e('Custom Favicon', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="admin-file clearfix">
                        <?php $favicon = get_option(THEMEMAKERS_THEME_PREFIX . "favicon_img") ?>
                        <input type="text" name="favicon_img" value="<?php echo $favicon ?>">
                        <a class="admin-button button-gray button-medium button_upload" href="#"><?php _e('Upload', THEMEMAKERS_THEME_FOLDER_NAME); ?></a><br />

                        <div class="clear"></div>

                        <img id="favicon_preview_image" style="display: <?php if ($favicon): ?>block<?php else: ?>none<?php endif; ?>" src="<?php echo $favicon ?>" alt="favicon" />

                    </div>

                    <hr class="admin-divider" />


                    <h2><?php _e('Site Logo', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>
                    <ul>
                        <li><input type="radio" name="logo_type" value="1" <?php echo(get_option(THEMEMAKERS_THEME_PREFIX . "logo_type") ? "checked" : "") ?> /><?php _e('Image', THEMEMAKERS_THEME_FOLDER_NAME); ?>&nbsp;&nbsp;<input type="radio" name="logo_type" value="0" <?php echo(!get_option(THEMEMAKERS_THEME_PREFIX . "logo_type") ? "checked" : "") ?> /> <?php _e('Text', THEMEMAKERS_THEME_FOLDER_NAME); ?><br /></li>
                        <li class="logo_img" <?php echo(get_option(THEMEMAKERS_THEME_PREFIX . "logo_type") ? "" : 'style="display:none;"') ?>>
                            <?php $logo_img = get_option(THEMEMAKERS_THEME_PREFIX . "logo_img") ?>
                            <input type="text" name="logo_img" value="<?php echo $logo_img ?>">&nbsp;<a title="" class="button_upload admin-button button-gray button-medium" href="#"><?php _e('Upload', THEMEMAKERS_THEME_FOLDER_NAME); ?></a><br />
                            <img id="logo_preview_image" style="display: <?php if ($logo_img): ?>inline<?php else: ?>none<?php endif; ?>; max-width:150px;" src="<?php echo $logo_img ?>" alt="logo" />
                        </li>
                        <li class="logo_text" <?php echo(!get_option(THEMEMAKERS_THEME_PREFIX . "logo_type") ? "" : 'style="display:none;"') ?>>
                            <input type="text" name="logo_text" value="<?php echo get_option(THEMEMAKERS_THEME_PREFIX . "logo_text") ?>"><br />
                        </li>
                    </ul>
                    <h4><?php _e('Logo font family', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <?php $logo_font = get_option(THEMEMAKERS_THEME_PREFIX . "logo_font"); ?>
                    <select name="logo_font" class="google_font_select">
                        <?php foreach ($fonts as $font_name) : ?>
                            <?php
                            $font_clean_name = explode(":", $font_name);
                            $font_clean_name = $font_clean_name[0];
                            ?>
                            <option <?php echo ($font_clean_name == $logo_font ? "selected" : "") ?> value="<?php echo $font_clean_name; ?>"><?php echo $font_name; ?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;<a title="" class="admin-button button-gray button-medium" href="javascript:add_google_font();"><?php _e('Manage google fonts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>

                    <h4><?php _e('Logo Text Color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php $logo_text_color = get_option(THEMEMAKERS_THEME_PREFIX . "logo_text_color"); ?>
                            <input type="text" name="logo_text_color" value="<?php echo set_theme_options_defaults('logo_text_color', $logo_text_color) ?>" class="bg_hex_color text">
                            <div style="background-color: <?php echo set_theme_options_defaults('logo_text_color', $logo_text_color) ?>;" class="bgpicker"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>
                    <div class="clear"></div>

                    <hr class="admin-divider" />                    
                     

                    <h4><?php _e('Header content', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <select name="header_content" class="header_content">
                        <?php
                        $header_content = array(
                            'none' => __("None", THEMEMAKERS_THEME_FOLDER_NAME),
                            'search' => __("Show Search", THEMEMAKERS_THEME_FOLDER_NAME),
                            'code' => __("Code", THEMEMAKERS_THEME_FOLDER_NAME),
                        );
                        $header_content_selected = get_option(THEMEMAKERS_THEME_PREFIX . "header_content");
                        ?>
                        <?php foreach ($header_content as $key => $value) : ?>
                            <option <?php echo($key == $header_content_selected ? "selected" : "") ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select><br />
                    <br />
                    <textarea name="header_content_textarea" class="header_content_textarea fullwidth" style="display: <?php echo($header_content_selected == 'code' ? 'block' : 'none') ?>; height: 200px;"><?php echo get_option(THEMEMAKERS_THEME_PREFIX . "header_content_textarea") ?></textarea>


                    <hr class="admin-divider" />

                   
                    <h4><?php _e('Default Sidebar position', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
					
					<?php 
					 $sidebar_position_selected = get_option(THEMEMAKERS_THEME_PREFIX . "sidebar_position");
					?>
					<input type="hidden" value="<?php echo (!$sidebar_position_selected ? "sbr" : $sidebar_position_selected)?>" name="sidebar_position" />
					<ul class="admin-choice-sidebar clearfix">
						<li class="lside <?php echo ($sidebar_position_selected == "sbl" ? "current-item" : "")?>"><a href="#" data-val="sbl"><?php _e('Left Sidebar', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
						<li class="wside <?php echo ($sidebar_position_selected == "no_sidebar" ? "current-item" : "")?>"><a href="#" data-val="no_sidebar"><?php _e('Without Sidebar', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
						<li class="rside <?php echo ($sidebar_position_selected == "sbr" ? "current-item" : "")?>"><a data-val="sbr" href="#"><?php _e('Right Sidebar', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></li>
					</ul>
					
					<hr class="admin-divider" />
 

                    <?php $hide_breadcrumb = get_option(THEMEMAKERS_THEME_PREFIX . "hide_breadcrumb"); ?>
                    <input type="checkbox" value="true" name="hide_breadcrumb" class="option_checkbox" <?php echo($hide_breadcrumb ? "checked" : "") ?> />
                    <input type="hidden" value="<?php echo($hide_breadcrumb ? "1" : "0") ?>" name="hide_breadcrumb">
                    &nbsp;<strong><?php _e('Disable breadcrumbs', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>


                    <hr class="admin-divider" />


                    <?php $hide_footer = get_option(THEMEMAKERS_THEME_PREFIX . "hide_footer"); ?>
                    <input type="checkbox" value="true" name="hide_footer" class="option_checkbox" <?php echo($hide_footer ? "checked" : "") ?> />
                    <input type="hidden" value="<?php echo($hide_footer ? "1" : "0") ?>" name="hide_footer">
                    &nbsp;<strong><?php _e('Disable footer sidebars', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>


                    <hr class="admin-divider" />

                    <?php $hide_wp_image_sizes = get_option(THEMEMAKERS_THEME_PREFIX . "hide_wp_image_sizes"); ?>
                    <input type="checkbox" value="true" name="hide_wp_image_sizes" class="option_checkbox" <?php echo($hide_wp_image_sizes ? "checked" : "") ?> />
                    <input type="hidden" value="<?php echo($hide_wp_image_sizes ? "1" : "0") ?>" name="hide_wp_image_sizes">
                    &nbsp;<strong><?php _e('Disable default image media settings', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>


                    <hr class="admin-divider" />


                    <h4><?php _e('Custom CSS', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <textarea name="custom_css" class="fullwidth" style="height: 300px !important ;"><?php echo get_option(THEMEMAKERS_THEME_PREFIX . "custom_css") ?></textarea>


                    <hr class="admin-divider" />


                    <h4><?php _e('Contact Information', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <p>
                                <textarea name="contact_info"><?php echo get_option(THEMEMAKERS_THEME_PREFIX . "contact_info") ?></textarea>
                            </p>
                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Type the contact information to display it above your navigation menu in right corner, use &lt;span&gt;tag to highlight the text&lt;/span&gt;. Example:<br />
                                    For additional information call: &lt;span&gt;+00 123456789&lt;/span&gt;', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div><!--/ .admin-one-half-->
                    </div>


                    <hr class="admin-divider" />

                    <h4><?php _e('Tracking Code', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <p>
                                <textarea name="tracking_code"><?php echo get_option(THEMEMAKERS_THEME_PREFIX . "tracking_code") ?></textarea>
                            </p>
                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag of your theme.', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div><!--/ .admin-one-half-->
                    </div>



                    <hr class="admin-divider" />

                    <h4><?php _e('FeedBurner URL', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <p>
                                <input type="text" name="feedburner" value="<?php echo get_option(THEMEMAKERS_THEME_PREFIX . "feedburner") ?>">
                            </p>
                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Enter your full FeedBurner URL (or any other preferred feed URL) if you wish to use FeedBurner over the standard WordPress Feed', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div><!--/ .admin-one-half-->
                    </div>


                </div><!--/ .tab-content-->




                <div class="tab-content" id="tab2-0">
                    <h1><?php _e('Theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>
                    <h2><?php _e('General', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>

                    <h4><?php _e('Default website font family', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <?php
                    $content_font = get_option(THEMEMAKERS_THEME_PREFIX . "content_fonts");
                    ?>
                    <select name="content_fonts" class="google_font_select">
                        <?php foreach ($fonts as $font_name) : ?>
                            <?php
                            $font_clean_name = explode(":", $font_name);
                            $font_clean_name = $font_clean_name[0];
                            ?>
                            <option <?php echo ($font_clean_name == $content_font ? "selected" : "") ?> value="<?php echo $font_clean_name; ?>"><?php echo $font_name; ?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;<a title="" class="admin-button button-gray button-medium" href="javascript:add_google_font();"><?php _e('Manage google fonts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>


                    <hr class="admin-divider" />


                    <h4><?php _e('Header Text Color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">

                            <?php
                            $header_color = get_option(THEMEMAKERS_THEME_PREFIX . "header_color");
                            ?>

                            <input type="text" name="header_color" value="<?php echo set_theme_options_defaults('header_color', $header_color) ?>" class="bg_hex_color text">
                            <div style="background-color: <?php echo set_theme_options_defaults('header_color', $header_color) ?>;" class="bgpicker"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>
                    <div class="clear"></div>


                    <hr class="admin-divider" />


                    <h4><?php _e('Default links Color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $links_color = get_option(THEMEMAKERS_THEME_PREFIX . "links_color");
                            ?>
                            <input type="text" name="links_color" value="<?php echo set_theme_options_defaults('links_color', $links_color) ?>" class="bg_hex_color text">
                            <div style="background-color: <?php echo set_theme_options_defaults('links_color', $links_color) ?>;" class="bgpicker"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>


                    <hr class="admin-divider" />


                    <div class="tmk_option select ">
                        <div class="options_custom_body_pattern">
                            <?php
                            $body_pattern_selected = get_option(THEMEMAKERS_THEME_PREFIX . "body_pattern_selected");
                            $body_pattern = get_option(THEMEMAKERS_THEME_PREFIX . "body_pattern");
                            ?>

                            <h4><?php _e('Default website background', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                            <select name="body_pattern_selected">
                                <option value="0" <?php echo($body_pattern_selected == 0 ? 'selected=""' : "") ?>><?php _e('Patterns', THEMEMAKERS_THEME_FOLDER_NAME); ?></option>
                                <option value="1" <?php echo($body_pattern_selected == 1 ? 'selected=""' : "") ?>><?php _e('Custom background image', THEMEMAKERS_THEME_FOLDER_NAME); ?></option>
                                <option value="2" <?php echo($body_pattern_selected == 2 ? 'selected=""' : "") ?>><?php _e('Background color', THEMEMAKERS_THEME_FOLDER_NAME); ?></option>
                            </select>

                            <ul>
                                <li class="body_pattern_default_image" <?php echo($body_pattern_selected == 0 ? "" : 'style="display:none;"') ?>>
                                    <div class="thumb_pattern">
                                        <?php for ($i = 1; $i <= 10; $i++): ?>
                                            <?php $img_path = THEMEMAKERS_THEME_URI . "/admin/images/patterns/pattern_" . $i . ".png"; ?>
                                            <a class="thumb_thumb_<?php echo $i ?> <?php if ($img_path == $body_pattern) echo "current"; ?>" href="<?php echo $img_path ?>"></a>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="clear"></div>

                                    <br />

                                    <h4><?php _e('Pattern Background Color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>

                                    <div class="clearfix ">
                                        <div class="admin-one-half">
                                            <?php
                                            $body_bg_color = get_option(THEMEMAKERS_THEME_PREFIX . "body_bg_color");
                                            ?>
                                            <input type="text" name="body_bg_color" value="<?php echo set_theme_options_defaults('body_bg_color', $body_bg_color) ?>" class="bg_hex_color text">
                                            <div style="background-color: <?php echo set_theme_options_defaults('body_bg_color', $body_bg_color) ?>;" class="bgpicker"></div>
                                        </div>
                                        <div class="admin-one-half last">
                                            <p class="admin-info">
                                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                                            </p>
                                        </div>
                                    </div>

                                </li>
                                <li class="body_pattern_custom_image"<?php echo($body_pattern_selected == 1 ? "" : 'style="display:none;"') ?>>
                                    <input type="text" id="body_pattern_upload" name="body_pattern" value="<?php
                                                if ($body_pattern AND $body_pattern_selected == 1) {
                                                    echo $body_pattern;
                                                }
                                                ?>">&nbsp;<a title="" class="button_upload admin-button button-gray button-medium" href="#"><?php _e('Upload', THEMEMAKERS_THEME_FOLDER_NAME); ?></a><br />
                                    <div id="body_pattern_custom_image_preview" <?php if (!$body_pattern OR $body_pattern_selected == 0): ?>style="display: none;"<?php endif; ?>>
                                        <img src="<?php echo ThemeMakersHelper::resize_image($body_pattern, 100) ?>" alt="" width="100" />
                                    </div>
                                </li>

                                <li class="body_pattern_custom_color"<?php echo($body_pattern_selected == 2 ? "" : 'style="display:none;"') ?>>
                                    <div class="clearfix ">
                                        <div class="admin-one-half">
                                            <input type="text" name="body_pattern_custom_color" value="<?php echo(get_option(THEMEMAKERS_THEME_PREFIX . "body_pattern_custom_color")) ?>" class="bg_hex_color text">
                                            <div style="background-color: <?php echo(get_option(THEMEMAKERS_THEME_PREFIX . "body_pattern_custom_color")) ?>;" class="bgpicker"></div>
                                        </div>
                                        <div class="admin-one-half last">
                                            <p class="admin-info">
                                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>



                        </div>

                    </div>
                    <div class="clear"></div>
                    <br />

                    <?php $disable_body_bg = get_option(THEMEMAKERS_THEME_PREFIX . "disable_body_bg"); ?>
                    <input type="checkbox" class="option_checkbox" <?php echo($disable_body_bg ? "checked" : "") ?> />
                    <input type="hidden" name="disable_body_bg" value="<?php echo($disable_body_bg ? 1 : 0) ?>" />
                    <strong><?php _e('Reverse to default website background', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>


                </div><!--/ #tab2-->


                <div class="tab-content" id="tab2-1">

                    <h1><?php _e('Theme Styling', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>
                    <h2><?php _e('Headings', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>

                    <h4><?php _e('Default Heading Font Family', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <?php
                    $heading_font = get_option(THEMEMAKERS_THEME_PREFIX . "heading_font");
                    ?>
                    <select name="heading_font" class="google_font_select">
                        <?php foreach ($fonts as $font_name) : ?>
                            <?php
                            $font_clean_name = explode(":", $font_name);
                            $font_clean_name = $font_clean_name[0];
                            ?>
                            <option <?php echo ($font_clean_name == $heading_font ? "selected" : "") ?> value="<?php echo $font_clean_name; ?>"><?php echo $font_name; ?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;<a title="" class="admin-button button-gray button-medium" href="javascript:add_google_font();"><?php _e('Manage google fonts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>


                    <hr class="admin-divider" />



                    <h4><?php _e('H1 heading font family', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <?php
                    $h1_font_family = get_option(THEMEMAKERS_THEME_PREFIX . "h1_font_family");
                    ?>
                    <select name="h1_font_family" class="google_font_select">
                        <?php foreach ($fonts as $font_name) : ?>
                            <?php
                            $font_clean_name = explode(":", $font_name);
                            $font_clean_name = $font_clean_name[0];
                            ?>
                            <option <?php echo ($font_clean_name == $h1_font_family ? "selected" : "") ?> value="<?php echo $font_clean_name; ?>"><?php echo $font_name; ?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;<a title="" class="admin-button button-gray button-medium" href="javascript:add_google_font();"><?php _e('Manage google fonts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>

                    <h4><?php _e('H1 heading font size', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" name="h1_font_size" value="<?php echo(get_option(THEMEMAKERS_THEME_PREFIX . "h1_font_size")) ?>" min-value="12" max-value="42" class="ui_slider_item" />

                    <hr class="admin-divider" />



                    <h4><?php _e('H2 heading font family', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <?php
                    $h2_font_family = get_option(THEMEMAKERS_THEME_PREFIX . "h2_font_family");
                    ?>
                    <select name="h2_font_family" class="google_font_select">
                        <?php foreach ($fonts as $font_name) : ?>
                            <?php
                            $font_clean_name = explode(":", $font_name);
                            $font_clean_name = $font_clean_name[0];
                            ?>
                            <option <?php echo ($font_clean_name == $h2_font_family ? "selected" : "") ?> value="<?php echo $font_clean_name; ?>"><?php echo $font_name; ?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;<a title="" class="admin-button button-gray button-medium" href="javascript:add_google_font();"><?php _e('Manage google fonts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>


                    <h4><?php _e('H2 heading font size', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" name="h2_font_size" value="<?php echo(get_option(THEMEMAKERS_THEME_PREFIX . "h2_font_size")) ?>" min-value="12" max-value="42" class="ui_slider_item" />


                    <hr class="admin-divider" />


                    <h4><?php _e('H3 heading font family', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <?php
                    $h3_font_family = get_option(THEMEMAKERS_THEME_PREFIX . "h3_font_family");
                    ?>
                    <select name="h3_font_family" class="google_font_select">
                        <?php foreach ($fonts as $font_name) : ?>
                            <?php
                            $font_clean_name = explode(":", $font_name);
                            $font_clean_name = $font_clean_name[0];
                            ?>
                            <option <?php echo ($font_clean_name == $h3_font_family ? "selected" : "") ?> value="<?php echo $font_clean_name; ?>"><?php echo $font_name; ?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;<a title="" class="admin-button button-gray button-medium" href="javascript:add_google_font();"><?php _e('Manage google fonts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>


                    <h4><?php _e('H3 heading font size', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" name="h3_font_size" value="<?php echo(get_option(THEMEMAKERS_THEME_PREFIX . "h3_font_size")) ?>" min-value="12" max-value="42" class="ui_slider_item" />


                    <hr class="admin-divider" />


                    <h4><?php _e('H4 heading font family', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <?php
                    $h4_font_family = get_option(THEMEMAKERS_THEME_PREFIX . "h4_font_family");
                    ?>
                    <select name="h4_font_family" class="google_font_select">
                        <?php foreach ($fonts as $font_name) : ?>
                            <?php
                            $font_clean_name = explode(":", $font_name);
                            $font_clean_name = $font_clean_name[0];
                            ?>
                            <option <?php echo ($font_clean_name == $h4_font_family ? "selected" : "") ?> value="<?php echo $font_clean_name; ?>"><?php echo $font_name; ?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;<a title="" class="admin-button button-gray button-medium" href="javascript:add_google_font();"><?php _e('Manage google fonts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>



                    <h4><?php _e('H4 heading font size', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" name="h4_font_size" value="<?php echo(get_option(THEMEMAKERS_THEME_PREFIX . "h4_font_size")) ?>" min-value="12" max-value="42" class="ui_slider_item" />

                    <hr class="admin-divider" />


                    <h4><?php _e('H5 heading font family', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <?php
                    $h5_font_family = get_option(THEMEMAKERS_THEME_PREFIX . "h5_font_family");
                    ?>
                    <select name="h5_font_family" class="google_font_select">
                        <?php foreach ($fonts as $font_name) : ?>
                            <?php
                            $font_clean_name = explode(":", $font_name);
                            $font_clean_name = $font_clean_name[0];
                            ?>
                            <option <?php echo ($font_clean_name == $h5_font_family ? "selected" : "") ?> value="<?php echo $font_clean_name; ?>"><?php echo $font_name; ?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;<a title="" class="admin-button button-gray button-medium" href="javascript:add_google_font();"><?php _e('Manage google fonts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>


                    <h4><?php _e('H5 heading font size', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" name="h5_font_size" value="<?php echo(get_option(THEMEMAKERS_THEME_PREFIX . "h5_font_size")) ?>" min-value="12" max-value="42" class="ui_slider_item" />


                    <hr class="admin-divider" />



                    <h4><?php _e('H6 heading font family', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <?php
                    $h6_font_family = get_option(THEMEMAKERS_THEME_PREFIX . "h6_font_family");
                    ?>
                    <select name="h6_font_family" class="google_font_select">
                        <?php foreach ($fonts as $font_name) : ?>
                            <?php
                            $font_clean_name = explode(":", $font_name);
                            $font_clean_name = $font_clean_name[0];
                            ?>
                            <option <?php echo ($font_clean_name == $h6_font_family ? "selected" : "") ?> value="<?php echo $font_clean_name; ?>"><?php echo $font_name; ?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;<a title="" class="admin-button button-gray button-medium" href="javascript:add_google_font();"><?php _e('Manage google fonts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>


                    <h4><?php _e('H6 heading font size', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" name="h6_font_size" value="<?php echo(get_option(THEMEMAKERS_THEME_PREFIX . "h6_font_size")) ?>" min-value="12" max-value="42" class="ui_slider_item" />


                </div>


                <div class="tab-content" id="tab2-2">

                    <h1><?php _e('Theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>
                    <h2><?php _e('Main navigation', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>

                    <h4><?php _e('Font Family', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <?php
                    $main_nav_font = get_option(THEMEMAKERS_THEME_PREFIX . "main_nav_font");
                    ?>
                    <select name="main_nav_font" class="google_font_select">
                        <?php foreach ($fonts as $font_name) : ?>
                            <?php
                            $font_clean_name = explode(":", $font_name);
                            $font_clean_name = $font_clean_name[0];
                            ?>
                            <option <?php echo ($font_clean_name == $main_nav_font ? "selected" : "") ?> value="<?php echo $font_clean_name; ?>"><?php echo $font_name; ?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;<a title="" class="admin-button button-gray button-medium" href="javascript:add_google_font();"><?php _e('Manage google fonts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>


                    <hr class="admin-divider" />


                    <h2><?php _e('Text color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>


                    <h4><?php _e('Default', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>

                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $main_nav_def_text_color = get_option(THEMEMAKERS_THEME_PREFIX . "main_nav_def_text_color");
                            ?>
                            <input type="text" class="bg_hex_color text" value="<?php echo set_theme_options_defaults('main_nav_def_text_color', $main_nav_def_text_color) ?>" name="main_nav_def_text_color"><div class="bgpicker" style="background-color: <?php echo set_theme_options_defaults('main_nav_def_text_color', $main_nav_def_text_color) ?>;"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>


                    <br />
                    <h4><?php _e('Current', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $main_nav_curr_text_color = get_option(THEMEMAKERS_THEME_PREFIX . "main_nav_curr_text_color");
                            ?>
                            <input type="text" class="bg_hex_color text" value="<?php echo set_theme_options_defaults('main_nav_curr_text_color', $main_nav_curr_text_color) ?>" name="main_nav_curr_text_color"><div class="bgpicker" style="background-color: <?php echo set_theme_options_defaults('main_nav_curr_text_color', $main_nav_curr_text_color) ?>;"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>

                    <br />

                    <h4><?php _e('Hover', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $main_nav_hover_text_color = get_option(THEMEMAKERS_THEME_PREFIX . "main_nav_hover_text_color");
                            ?>
                            <input type="text" class="bg_hex_color text" value="<?php echo set_theme_options_defaults('main_nav_hover_text_color', $main_nav_hover_text_color) ?>" name="main_nav_hover_text_color"><div class="bgpicker" style="background-color: <?php echo set_theme_options_defaults('main_nav_hover_text_color', $main_nav_hover_text_color) ?>;"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>

                    <hr class="admin-divider" />

                    <h2><?php _e('Background colors', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>

                    <h4><?php _e('Main Menu Background', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $main_nav_bg_color = get_option(THEMEMAKERS_THEME_PREFIX . "main_nav_bg_color");
                            ?>
                            <input type="text" class="bg_hex_color text" value="<?php echo set_theme_options_defaults('main_nav_bg_color', $main_nav_bg_color) ?>" name="main_nav_bg_color"><div class="bgpicker" style="background-color: <?php echo set_theme_options_defaults('main_nav_bg_color', $main_nav_bg_color) ?>;"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>

                    <h4><?php _e('Current', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $main_nav_curr_item_bg_color = get_option(THEMEMAKERS_THEME_PREFIX . "main_nav_curr_item_bg_color");
                            ?>
                            <input type="text" class="bg_hex_color text" value="<?php echo set_theme_options_defaults('main_nav_curr_item_bg_color', $main_nav_curr_item_bg_color) ?>" name="main_nav_curr_item_bg_color"><div class="bgpicker" style="background-color: <?php echo set_theme_options_defaults('main_nav_curr_item_bg_color', $main_nav_curr_item_bg_color) ?>;"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>



                </div>


                <div class="tab-content" id="tab2-3">

                    <h1><?php _e('Theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>
                    <h2><?php _e('Content', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>

                    <h4><?php _e('Font family', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <?php
                    $content_font_family = get_option(THEMEMAKERS_THEME_PREFIX . "content_font_family");
                    ?>
                    <select name="content_font_family" class="google_font_select">
                        <?php foreach ($fonts as $font_name) : ?>
                            <?php
                            $font_clean_name = explode(":", $font_name);
                            $font_clean_name = $font_clean_name[0];
                            ?>
                            <option <?php echo ($font_clean_name == $content_font_family ? "selected" : "") ?> value="<?php echo $font_clean_name; ?>"><?php echo $font_name; ?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;<a title="" class="admin-button button-gray button-medium" href="javascript:add_google_font();"><?php _e('Manage google fonts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>


                    <h4><?php _e('Font size', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" name="content_font_size" value="<?php echo(get_option(THEMEMAKERS_THEME_PREFIX . "content_font_size")) ?>" min-value="12" max-value="42" class="ui_slider_item" />

                    <hr class="admin-divider" />

                    <h4><?php _e('Text Color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">

                        <div class="admin-one-half">
                            <?php
                            $content_text_color = get_option(THEMEMAKERS_THEME_PREFIX . "content_text_color");
                            ?>
                            <input type="text" class="bg_hex_color text" value="<?php echo set_theme_options_defaults('content_text_color', $content_text_color) ?>" name="content_text_color"><div class="bgpicker" style="background-color: <?php echo set_theme_options_defaults('content_text_color', $content_text_color) ?>;"></div>
                        </div>

                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>

                    </div>

                    <hr class="admin-divider" />

                    <h4><?php _e('Hover Link Color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>

                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $content_link_hover_color = get_option(THEMEMAKERS_THEME_PREFIX . "content_link_hover_color");
                            ?>
                            <input type="text" class="bg_hex_color text" value="<?php echo set_theme_options_defaults('content_link_hover_color', $content_link_hover_color) ?>" name="content_link_hover_color"><div class="bgpicker" style="background-color: <?php echo set_theme_options_defaults('content_link_hover_color', $content_link_hover_color) ?>;"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>

                </div>

                <div class="tab-content" id="tab2-4">

                    <h1><?php _e('Theme Styling', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>
                    <h2><?php _e('Buttons', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>


                    <h4><?php _e('Font Family', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>

                    <?php $content_font_family = get_option(THEMEMAKERS_THEME_PREFIX . "buttons_font_family"); ?>

                    <select name="buttons_font_family" class="google_font_select">
                        <?php foreach ($fonts as $font_name) : ?>
                            <?php
                            $font_clean_name = explode(":", $font_name);
                            $font_clean_name = $font_clean_name[0];
                            ?>
                            <option <?php echo ($font_clean_name == $content_font_family ? "selected" : "") ?> value="<?php echo $font_clean_name; ?>"><?php echo $font_name; ?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;<a title="" class="admin-button button-gray button-medium" href="javascript:add_google_font();"><?php _e('Manage google fonts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>

                    <h4><?php _e('Font Size', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" name="buttons_font_size" value="<?php echo(get_option(THEMEMAKERS_THEME_PREFIX . "buttons_font_size")) ?>" min-value="12" max-value="42" class="ui_slider_item" />

                </div>


                <div class="tab-content" id="tab2-5">

                    <h1><?php _e('Theme Styling', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>
                    <h2><?php _e('Sidebar Widgets', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>

                    <h4><?php _e('Font family', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <?php
                    $widgets_heading_font_family = get_option(THEMEMAKERS_THEME_PREFIX . "widgets_heading_font_family");
                    ?>
                    <select name="widgets_heading_font_family" class="google_font_select">
                        <?php foreach ($fonts as $font_name) : ?>
                            <?php
                            $font_clean_name = explode(":", $font_name);
                            $font_clean_name = $font_clean_name[0];
                            ?>
                            <option <?php echo ($font_clean_name == $widgets_heading_font_family ? "selected" : "") ?> value="<?php echo $font_clean_name; ?>"><?php echo $font_name; ?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;<a title="" class="admin-button button-gray button-medium" href="javascript:add_google_font();"><?php _e('Manage google fonts', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>

                    <h4><?php _e('Heading font size', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <input type="text" name="widgets_heading_font_size" value="<?php echo(get_option(THEMEMAKERS_THEME_PREFIX . "widgets_heading_font_size")) ?>" min-value="12" max-value="42" class="ui_slider_item" />
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Set this field 0 to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?><br />
                            </p>
                        </div>
                    </div>



                    <hr class="admin-divider" />

                    <h2><?php _e('Text', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>

                    <h4><?php _e('Title color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $widget_def_title_color = get_option(THEMEMAKERS_THEME_PREFIX . "widget_def_title_color");
                            ?>
                            <input type="text" class="bg_hex_color text" value="<?php echo set_theme_options_defaults('widget_def_title_color', $widget_def_title_color) ?>" name="widget_def_title_color"><div class="bgpicker" style="background-color: <?php echo set_theme_options_defaults('widget_def_title_color', $widget_def_title_color) ?>;"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>


                    <br />

                    <h4><?php _e('Text color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $widget_def_text_color = get_option(THEMEMAKERS_THEME_PREFIX . "widget_def_text_color");
                            ?>
                            <input type="text" class="bg_hex_color text" value="<?php echo set_theme_options_defaults('widget_def_text_color', $widget_def_text_color) ?>" name="widget_def_text_color"><div class="bgpicker" style="background-color: <?php echo set_theme_options_defaults('widget_def_text_color', $widget_def_text_color) ?>;"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>

                    <br />

                    <h4><?php _e('Links color active', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $widget_def_link_color = get_option(THEMEMAKERS_THEME_PREFIX . "widget_def_link_color");
                            ?>
                            <input type="text" class="bg_hex_color text" value="<?php echo set_theme_options_defaults('widget_def_link_color', $widget_def_link_color) ?>" name="widget_def_link_color"><div class="bgpicker" style="background-color: <?php echo set_theme_options_defaults('widget_def_link_color', $widget_def_link_color) ?>;"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>

                    <br />

                    <h4><?php _e('Links color hover', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $widget_def_link_hover_color = get_option(THEMEMAKERS_THEME_PREFIX . "widget_def_link_hover_color");
                            ?>
                            <input type="text" class="bg_hex_color text" value="<?php echo set_theme_options_defaults('widget_def_link_hover_color', $widget_def_link_hover_color) ?>" name="widget_def_link_hover_color"><div class="bgpicker" style="background-color: <?php echo set_theme_options_defaults('widget_def_link_hover_color', $widget_def_link_hover_color) ?>;"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>





                    <hr class="admin-divider" />


                    <h2><?php _e('Testimonials', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>
                    <h4><?php _e('Testimonials text color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix">
                        <div class="admin-one-half">
                            <?php
                            $widget_colored_testimonials_text_color = get_option(THEMEMAKERS_THEME_PREFIX . "widget_colored_testimonials_text_color");
                            ?>
                            <input type="text" class="bg_hex_color text" value="<?php echo set_theme_options_defaults('widget_colored_testimonials_text_color', $widget_colored_testimonials_text_color) ?>" name="widget_colored_testimonials_text_color"><div class="bgpicker" style="background-color: <?php echo set_theme_options_defaults('widget_colored_testimonials_text_color', $widget_colored_testimonials_text_color) ?>;"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>

                    <h4><?php _e('Testimonials author text color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix">
                        <div class="admin-one-half">
                            <?php
                            $widget_colored_testimonials_author_text_color = get_option(THEMEMAKERS_THEME_PREFIX . "widget_colored_testimonials_author_text_color");
                            ?>
                            <input type="text" class="bg_hex_color text" value="<?php echo set_theme_options_defaults('widget_colored_testimonials_author_text_color', $widget_colored_testimonials_author_text_color) ?>" name="widget_colored_testimonials_author_text_color"><div class="bgpicker" style="background-color: <?php echo set_theme_options_defaults('widget_colored_testimonials_author_text_color', $widget_colored_testimonials_author_text_color) ?>;"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>


                </div>


                <div class="tab-content" id="tab2-6">

                    <h1><?php _e('Theme Styling', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>
                    <h2><?php _e('Images', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>

                </div>


                <div class="tab-content" id="tab2-7">

                    <h1><?php _e('Theme Styling', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>
                    <h2><?php _e('Footer Area', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>

                    <h4><?php _e('Footer background color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $footer_bg_color = get_option(THEMEMAKERS_THEME_PREFIX . "footer_bg_color");
                            ?>
                            <input type="text" name="footer_bg_color" value="<?php echo set_theme_options_defaults('footer_bg_color', $footer_bg_color) ?>" class="bg_hex_color text">
                            <div style="background-color: <?php echo set_theme_options_defaults('footer_bg_color', $footer_bg_color) ?>;" class="bgpicker"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>
                    <div class="clear"></div>




                    <hr class="admin-divider" />



                    <h2><?php _e('Footer Widgets', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>
                    <h4><?php _e('Title Color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $footer_widget_title_color = get_option(THEMEMAKERS_THEME_PREFIX . "footer_widget_title_color");
                            ?>
                            <input type="text" name="footer_widget_title_color" value="<?php echo set_theme_options_defaults('footer_widget_title_color', $footer_widget_title_color) ?>" class="bg_hex_color text">
                            <div style="background-color: <?php echo set_theme_options_defaults('footer_widget_title_color', $footer_widget_title_color) ?>;" class="bgpicker"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <br />

                    <h4><?php _e('Text Color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $footer_color = get_option(THEMEMAKERS_THEME_PREFIX . "footer_color");
                            ?>
                            <input type="text" name="footer_color" value="<?php echo set_theme_options_defaults('footer_color', $footer_color) ?>" class="bg_hex_color text">
                            <div style="background-color: <?php echo set_theme_options_defaults('footer_color', $footer_color) ?>;" class="bgpicker"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <br />

                    <h4><?php _e('Link Color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $footer_widget_link_color = get_option(THEMEMAKERS_THEME_PREFIX . "footer_widget_link_color");
                            ?>
                            <input type="text" name="footer_widget_link_color" value="<?php echo set_theme_options_defaults('footer_widget_link_color', $footer_widget_link_color) ?>" class="bg_hex_color text">
                            <div style="background-color: <?php echo set_theme_options_defaults('footer_widget_link_color', $footer_widget_link_color) ?>;" class="bgpicker"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <br />


                    <h4><?php _e('Link hover Color', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <div class="clearfix ">
                        <div class="admin-one-half">
                            <?php
                            $footer_widget_link_hover_color = get_option(THEMEMAKERS_THEME_PREFIX . "footer_widget_link_hover_color");
                            ?>
                            <input type="text" name="footer_widget_link_hover_color" value="<?php echo set_theme_options_defaults('footer_widget_link_hover_color', $footer_widget_link_hover_color) ?>" class="bg_hex_color text">
                            <div style="background-color: <?php echo set_theme_options_defaults('footer_widget_link_hover_color', $footer_widget_link_hover_color) ?>;" class="bgpicker"></div>
                        </div>
                        <div class="admin-one-half last">
                            <p class="admin-info">
                                <?php _e('Leave this field blank to use default theme styling', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <br />



                </div>



                <?php $slider = new Thememakers_Entity_Slider(); ?>
                <div class="tab-content" id="tab4-0">

                    <h1><?php _e('Slider Settings', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>
                    <h2><?php _e('General', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>

                    <div class="options_slider_settings">
                        <?php echo $slider->draw_sliders_options(); ?>
                    </div>
                </div>

                <div class="tab-content" id="tab4-1">1</div>
                <div class="tab-content" id="tab4-2">2</div>
                <div class="tab-content" id="tab4-3">3</div>
                <div class="tab-content" id="tab4-4">4</div>
                <div class="tab-content" id="tab4-5">5</div>
                <div class="tab-content" id="tab4-6">6</div>
                <div class="tab-content" id="tab4-7">7</div>
                <div class="tab-content" id="tab41"></div>
                <div class="tab-content" id="tab41-0">

                    <h1><?php _e('Sliders Groups General', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>

                    <div class="add-input clearfix">
                        <input type="text" value="" placeholder="<?php _e('type title here', THEMEMAKERS_THEME_FOLDER_NAME); ?>" />
                        <a class="add-input-button create-slider-group" href="#"></a>
                    </div>


                    <hr class="admin-divider" />
                    <h4><?php _e("Sliders Groups", THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <ul class="groups slider_groups_list">
                        <?php if (!empty($slides) AND is_array($slides)): ?>
                            <?php foreach ($slides as $key => $slide) : ?>
                                <?php if (isset($slide['name'])): ?>
                                    <?php if ($slide['name']): ?>
                                        <li>
                                            <a class="delegate_click" id-data="slider_group_<?php echo $key ?>" href="#"><?php echo $slide['name'] ?></a>
                                            <input type="hidden" name="sliders[<?php echo $key ?>][name]" value="<?php echo $slide['name'] ?>" />
                                            <a href="#" title="Delete" class="remove remove-slider-group" group-index="<?php echo $key ?>"></a>
                                            <a id-data="slider_group_<?php echo $key ?>" href="#" title="Edit" class="edit delegate_click"></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="js_no_one_item_else"><span><?php _e('You have not created any slider group yet. Please create one using the form above.', THEMEMAKERS_THEME_FOLDER_NAME); ?></span></li>
                        <?php endif; ?>
                    </ul>

                </div>

                <div id="slider_groups_content">
                    <?php echo ThemeMakersThemeView::draw_page('slider/sliders_groups', array('slides' => $slides)); ?>
                </div>


                <div class="tab-content" id="tab5">

                    <h1><?php _e('Blog', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>

                    <h4><?php _e('Blog Layout', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <select name="blog_layout">
                        <?php
                        $blog_layout = array(
                            'default' => __("Default", THEMEMAKERS_THEME_FOLDER_NAME),
                            'alternate' => __("Alternate", THEMEMAKERS_THEME_FOLDER_NAME),
                        );
                        $blog_layout_selected = get_option(THEMEMAKERS_THEME_PREFIX . "blog_layout");
                        ?>
                        <?php foreach ($blog_layout as $key => $value) : ?>
                            <option <?php echo($key == $blog_layout_selected ? "selected" : "") ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>


                    <hr class="admin-divider" />

                    <div class="options_blog_settings">
                        <?php
                        $enable_related_posts = get_option(THEMEMAKERS_THEME_PREFIX . "enable_related_posts");
                        $show_author_info = get_option(THEMEMAKERS_THEME_PREFIX . "show_author_info");
                        $hide_post_metadata = get_option(THEMEMAKERS_THEME_PREFIX . "hide_post_metadata");
                        $show_full_content = get_option(THEMEMAKERS_THEME_PREFIX . "show_full_content");
                        $disable_blog_comments = get_option(THEMEMAKERS_THEME_PREFIX . "disable_blog_comments");
						$hide_post_date = get_option(THEMEMAKERS_THEME_PREFIX . "hide_post_date");
						$hide_post_author = get_option(THEMEMAKERS_THEME_PREFIX . "hide_post_author");
						$hide_post_categories = get_option(THEMEMAKERS_THEME_PREFIX . "hide_post_categories");
						$hide_post_tag = get_option(THEMEMAKERS_THEME_PREFIX . "hide_post_tag");
						
						
						
                        ?>

                        <input type="checkbox" class="option_checkbox" <?php if ($disable_blog_comments): ?>checked=""<?php endif; ?>  /><input type="hidden" value="<?php if ($disable_blog_comments): ?>1<?php else: ?>0<?php endif; ?>" name="disable_blog_comments" /> <strong><?php _e('Disable blog comments', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br />

                        <hr class="admin-divider" />

                        <input type="checkbox" class="option_checkbox" <?php if ($enable_related_posts): ?>checked=""<?php endif; ?>  /><input type="hidden" value="<?php if ($enable_related_posts): ?>1<?php else: ?>0<?php endif; ?>" name="enable_related_posts" /> <strong><?php _e('Enable related posts', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br />

                        <hr class="admin-divider" />

                        <input type="checkbox" class="option_checkbox" <?php if ($show_author_info): ?>checked=""<?php endif; ?> /><input type="hidden" value="<?php if ($show_author_info): ?>1<?php else: ?>0<?php endif; ?>" name="show_author_info" /> <strong><?php _e('Show author info', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br />

                        <hr class="admin-divider" />

                        <input type="checkbox" class="option_checkbox" <?php if ($hide_post_metadata): ?>checked=""<?php endif; ?> /><input type="hidden" value="<?php if ($hide_post_metadata): ?>1<?php else: ?>0<?php endif; ?>" name="hide_post_metadata" /> <strong><?php _e('Hide posts metadata', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br />

                        <hr class="admin-divider" />
						
						<input type="checkbox" class="option_checkbox" <?php if ($hide_post_date): ?>checked=""<?php endif; ?> /><input type="hidden" value="<?php if ($hide_post_date): ?>1<?php else: ?>0<?php endif; ?>" name="hide_post_date" /> <strong><?php _e('Hide posts date', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br />

                        <hr class="admin-divider" />
						
						<input type="checkbox" class="option_checkbox" <?php if ($hide_post_author): ?>checked=""<?php endif; ?> /><input type="hidden" value="<?php if ($hide_post_author): ?>1<?php else: ?>0<?php endif; ?>" name="hide_post_author" /> <strong><?php _e('Hide posts author', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br />

                        <hr class="admin-divider" />
						
						<input type="checkbox" class="option_checkbox" <?php if ($hide_post_categories): ?>checked=""<?php endif; ?> /><input type="hidden" value="<?php if ($hide_post_categories): ?>1<?php else: ?>0<?php endif; ?>" name="hide_post_categories" /> <strong><?php _e('Hide posts category', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br />

                        <hr class="admin-divider" />
						
						<input type="checkbox" class="option_checkbox" <?php if ($hide_post_tag): ?>checked=""<?php endif; ?> /><input type="hidden" value="<?php if ($hide_post_tag): ?>1<?php else: ?>0<?php endif; ?>" name="hide_post_tag" /> <strong><?php _e('Hide posts tags', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br />

                        <hr class="admin-divider" />
						
						
						
                        <input type="checkbox" class="option_checkbox" <?php if ($show_full_content): ?>checked=""<?php endif; ?> /><input type="hidden" value="<?php if ($show_full_content): ?>1<?php else: ?>0<?php endif; ?>" name="show_full_content" /> <strong><?php _e('Show full content', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br />

                        <hr class="admin-divider" />

                        <h4><?php _e('Excerpt: symbols count', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                        <?php
                        $excerpt_symbols_count = get_option(THEMEMAKERS_THEME_PREFIX . "excerpt_symbols_count");
                        if (!$excerpt_symbols_count) {
                            $excerpt_symbols_count = 140;
                        }
                        ?>

                        <input type="text" class="ui_slider_item" name="excerpt_symbols_count" value="<?php echo $excerpt_symbols_count ?>" min-value="20" max-value="500" class="ui_slider_item"><br />

                        <hr class="admin-divider" />

                        <h4><?php _e('Excerpt: symbols count alternate', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                        <?php
                        $excerpt_symbols_count_alternate = get_option(THEMEMAKERS_THEME_PREFIX . "excerpt_symbols_count_alternate");
                        if (!$excerpt_symbols_count_alternate) {
                            $excerpt_symbols_count_alternate = 140;
                        }
                        ?>

                        <input type="text" class="ui_slider_item" name="excerpt_symbols_count_alternate" value="<?php echo $excerpt_symbols_count_alternate ?>" min-value="20" max-value="500" class="ui_slider_item"><br />



                    </div>

                </div>

                <div class="tab-content" id="tab6">

                    <h1><?php _e('Portfolio', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>                   


                    <h4><?php _e('Portfolio slider width', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <?php
                    $portfolio_slider_width = get_option(THEMEMAKERS_THEME_PREFIX . "portfolio_slider_width");
                    if (!$portfolio_slider_width) {
                        $portfolio_slider_width = 433;
                    }
                    ?>

                    <select name="portfolio_slider_width">
                        <?php
                        $portfolio_slider_width = array(
                            338 => __("Small", THEMEMAKERS_THEME_FOLDER_NAME),
                            433 => __("Middle", THEMEMAKERS_THEME_FOLDER_NAME),
                            528 => __("Large", THEMEMAKERS_THEME_FOLDER_NAME),
                            719 => __("Extra Large", THEMEMAKERS_THEME_FOLDER_NAME)
                        );
                        $portfolio_layout_selected = get_option(THEMEMAKERS_THEME_PREFIX . "portfolio_slider_width");
                        ?>
                        <?php foreach ($portfolio_slider_width as $key => $value) : ?>
                            <option <?php echo($key == $portfolio_layout_selected ? "selected" : "") ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <hr class="admin-divider" />


                    <br />




                    <?php $disable_portfolio_comments = get_option(THEMEMAKERS_THEME_PREFIX . "disable_portfolio_comments"); ?>
                    <input type="checkbox" class="option_checkbox" <?php if ($disable_portfolio_comments): ?>checked=""<?php endif; ?>  /><input type="hidden" value="<?php if ($disable_portfolio_comments): ?>1<?php else: ?>0<?php endif; ?>" name="disable_portfolio_comments" /> <strong><?php _e('Disable portfolio comments', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br />
                    <br />


                    <?php $open_folio_featured_img_in_fancy = get_option(THEMEMAKERS_THEME_PREFIX . "open_folio_featured_img_in_fancy"); ?>
                    <input type="checkbox" class="option_checkbox" <?php if ($open_folio_featured_img_in_fancy): ?>checked=""<?php endif; ?>  /><input type="hidden" value="<?php if ($open_folio_featured_img_in_fancy): ?>1<?php else: ?>0<?php endif; ?>" name="open_folio_featured_img_in_fancy" /> <strong><?php _e('Open image in lightbox (check) / Open single page', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br />
                    <br />


                    <?php $portfolio_hide_exerpt = get_option(THEMEMAKERS_THEME_PREFIX . "portfolio_hide_exerpt"); ?>
                    <input type="checkbox" class="option_checkbox" <?php if ($portfolio_hide_exerpt): ?>checked=""<?php endif; ?>  /><input type="hidden" value="<?php if ($portfolio_hide_exerpt): ?>1<?php else: ?>0<?php endif; ?>" name="portfolio_hide_exerpt" /> <strong><?php _e('Hide exerpt', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br />
                    <br />

                    <?php $portfolio_hide_readmore = get_option(THEMEMAKERS_THEME_PREFIX . "portfolio_hide_readmore"); ?>
                    <input type="checkbox" class="option_checkbox" <?php if ($portfolio_hide_readmore): ?>checked=""<?php endif; ?>  /><input type="hidden" value="<?php if ($portfolio_hide_readmore): ?>1<?php else: ?>0<?php endif; ?>" name="portfolio_hide_readmore" /> <strong><?php _e('Hide read more button', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br />
                    <br />


                    <?php $portfolio_hide_filter = get_option(THEMEMAKERS_THEME_PREFIX . "portfolio_hide_filter"); ?>
                    <input type="checkbox" <?php echo($portfolio_hide_filter ? 'checked=""' : '') ?> class="option_checkbox">
                    <input type="hidden" value="<?php if ($portfolio_hide_filter): ?>1<?php else: ?>0<?php endif; ?>" name="portfolio_hide_filter" />
                    &nbsp;<strong><?php _e('Disable Portfolio Filter', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>

                    <br /><br /><br />

                    <h4><?php _e('Archive page layout', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <select name="portfolio_archive_page_layout" class="portfolio_archive_page_layout">
                        <?php
                        $portfolio_archive_page_layouts = array(
                            '3' => __("3 Columns", THEMEMAKERS_THEME_FOLDER_NAME),
                            '4' => __("4 Columns", THEMEMAKERS_THEME_FOLDER_NAME),
                            '6' => __("6 Columns", THEMEMAKERS_THEME_FOLDER_NAME),
                        );
                        $portfolio_archive_page_layout = get_option(THEMEMAKERS_THEME_PREFIX . "portfolio_archive_page_layout");
                        ?>
                        <?php foreach ($portfolio_archive_page_layouts as $key => $value) : ?>
                            <option <?php echo($key == $portfolio_archive_page_layout ? "selected" : "") ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select><br />

                    <hr class="admin-divider" />


                    <h2><?php _e('3 Column Template', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>
                    <?php
                    $porfolio_3col_excerpt_symbols_count = get_option(THEMEMAKERS_THEME_PREFIX . "porfolio_3col_excerpt_symbols_count");
                    if (!$porfolio_3col_excerpt_symbols_count) {
                        $porfolio_3col_excerpt_symbols_count = 80;
                    }
                    ?>

                    <h4><?php _e('Exerpt symbols count', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" class="ui_slider_item" name="porfolio_3col_excerpt_symbols_count" value="<?php echo $porfolio_3col_excerpt_symbols_count ?>" min-value="0" max-value="900" class="ui_slider_item"><br />

                    <br />

                    <?php
                    $porfolio_3col_posts_per_page = get_option(THEMEMAKERS_THEME_PREFIX . "porfolio_3col_posts_per_page");
                    if (!$porfolio_3col_posts_per_page) {
                        $porfolio_3col_posts_per_page = 9;
                    }
                    ?>
                    <h4><?php _e('Items to show per page', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" class="ui_slider_item" name="porfolio_3col_posts_per_page" value="<?php echo $porfolio_3col_posts_per_page ?>" min-value="1" max-value="12" class="ui_slider_item"><br />

                    <hr class="admin-divider" />


                    <h2><?php _e('4 Column Template', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>
                    <?php
                    $porfolio_4col_excerpt_symbols_count = get_option(THEMEMAKERS_THEME_PREFIX . "porfolio_4col_excerpt_symbols_count");
                    if (!$porfolio_4col_excerpt_symbols_count) {
                        $porfolio_4col_excerpt_symbols_count = 60;
                    }
                    ?>

                    <h4><?php _e('Exerpt symbols count', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" class="ui_slider_item" name="porfolio_4col_excerpt_symbols_count" value="<?php echo $porfolio_4col_excerpt_symbols_count ?>" min-value="0" max-value="900" class="ui_slider_item"><br />

                    <br />

                    <?php
                    $porfolio_4col_posts_per_page = get_option(THEMEMAKERS_THEME_PREFIX . "porfolio_4col_posts_per_page");
                    if (!$porfolio_4col_posts_per_page) {
                        $porfolio_4col_posts_per_page = 8;
                    }
                    ?>
                    <h4><?php _e('Items to show per page', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" class="ui_slider_item" name="porfolio_4col_posts_per_page" value="<?php echo $porfolio_4col_posts_per_page ?>" min-value="1" max-value="12" class="ui_slider_item"><br />

                    <hr class="admin-divider" />



                    <h2><?php _e('6 Column Template', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>
                    <?php
                    $porfolio_6col_excerpt_symbols_count = get_option(THEMEMAKERS_THEME_PREFIX . "porfolio_6col_excerpt_symbols_count");
                    if (!$porfolio_6col_excerpt_symbols_count) {
                        $porfolio_6col_excerpt_symbols_count = 40;
                    }
                    ?>

                    <h4><?php _e('Exerpt symbols count', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" class="ui_slider_item" name="porfolio_6col_excerpt_symbols_count" value="<?php echo $porfolio_6col_excerpt_symbols_count ?>" min-value="0" max-value="900" class="ui_slider_item"><br />

                    <br />

                    <?php
                    $porfolio_6col_posts_per_page = get_option(THEMEMAKERS_THEME_PREFIX . "porfolio_6col_posts_per_page");
                    if (!$porfolio_6col_posts_per_page) {
                        $porfolio_6col_posts_per_page = 8;
                    }
                    ?>
                    <h4><?php _e('Items to show per page', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" class="ui_slider_item" name="porfolio_6col_posts_per_page" value="<?php echo $porfolio_6col_posts_per_page ?>" min-value="1" max-value="12" class="ui_slider_item"><br />

                    <hr class="admin-divider" />


                </div>

                <div class="tab-content" id="tab7">

                    <h1><?php _e('Gallery', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>

                    <ul>
                        <li>

                            <h4><?php _e('Slider gallery width', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</h4>
                            <?php
                            $gallery_slider_width = get_option(THEMEMAKERS_THEME_PREFIX . "gallery_slider_width");
                            if (!$gallery_slider_width) {
                                $gallery_slider_width = 320;
                            }
                            ?>

                            <select name="gallery_slider_width">
                                <?php
                                $gallery_slider_width = array(
                                    250 => __("Small", THEMEMAKERS_THEME_FOLDER_NAME),
                                    320 => __("Middle", THEMEMAKERS_THEME_FOLDER_NAME),
                                    390 => __("Large", THEMEMAKERS_THEME_FOLDER_NAME),
                                    534 => __("Extra Large", THEMEMAKERS_THEME_FOLDER_NAME)
                                );
                                $gallery_layout_selected = get_option(THEMEMAKERS_THEME_PREFIX . "gallery_slider_width");
                                ?>
                                <?php foreach ($gallery_slider_width as $key => $value) : ?>
                                    <option <?php echo($key == $gallery_layout_selected ? "selected" : "") ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>

                            <hr class="admin-divider" />
                        </li>

                        <li>
                            <?php $gallery_hide_filter = get_option(THEMEMAKERS_THEME_PREFIX . "gallery_hide_filter"); ?>
                            <input type="checkbox" <?php echo($gallery_hide_filter ? 'checked=""' : '') ?> class="option_checkbox"><input type="hidden" value="<?php if ($gallery_hide_filter): ?>1<?php else: ?>0<?php endif; ?>" name="gallery_hide_filter" />
                            &nbsp;<strong><?php _e('Disable gallery filter', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>
                        </li>

                    </ul>

                </div><!--/ .tab-content-->


                <div class="tab-content" id="tab8"></div>


                <div class="tab-content" id="tab8-0">

                    <h1><?php _e('Contact Forms', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>

                    <h4><?php _e('Add new Form', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" value="" id="new_contact_form_name" />&nbsp;<div class="add-button add_form"></div><br />

                    <hr class="admin-divider" />

                    <ul class="groups contact_forms_groups_list">
                        <?php if (!empty($contact_forms) AND is_array($contact_forms)): ?>
                            <?php $counter = 0; ?>
                            <?php foreach ($contact_forms as $contact_form_id => $contact_form) : ?>
                                <li>
                                    <a id-data="contact_form_<?php echo $counter ?>" class="delegate_click" href="#"><?php echo @$contact_form['title']; ?></a>
                                    <a href="#" title="<?php _e("Delete", THEMEMAKERS_THEME_FOLDER_NAME) ?>" class="remove delete_contact_form" form-list-index="<?php echo $counter ?>"></a>
                                    <a id-data="contact_form_<?php echo $counter ?>" href="#" title="<?php _e("Edit", THEMEMAKERS_THEME_FOLDER_NAME) ?>" class="edit delegate_click"></a>
                                </li>
                                <?php $counter++; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="js_no_one_item_else"><span><?php _e('You have not created any group yet. Please create one using the form above.', THEMEMAKERS_THEME_FOLDER_NAME); ?></span></li>
                        <?php endif; ?>
                    </ul>
                </div>



                <?php
//print contacts forms
                $form_constructor = new Thememakers_Entity_Contact_Form('contacts_form');
                $form_constructor->draw_forms();
                ?>


                <div class="tab-content" id="tab9-0">

                    <h1><?php _e('Custom Sidebars', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>

                    <h4><?php _e('Add Sidebar', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>

                    <input type="text" value="" id="sidebar_name" placeholder="<?php _e("type title here", THEMEMAKERS_THEME_FOLDER_NAME) ?>">

                    <div class="add-button add_sidebar"></div>

                    <hr class="admin-divider" />
                    <h4><?php _e("Custom Sidebars", THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <ul class="groups custom_sidebars_list">
                        <input type="hidden" name="sidebars[]" value="" />
                        <?php if (!empty($sidebars) AND is_array($sidebars)): ?>
                            <?php foreach ($sidebars as $sidebar_id => $sidebar) : ?>
                                <li>
                                    <a id-data="<?php echo $sidebar_id; ?>" class="delegate_click" href="#"><?php echo $sidebar['name']; ?></a>
                                    <input type="hidden" name="sidebars[<?php echo $sidebar_id; ?>][name]" value="<?php echo $sidebar['name']; ?>" />
                                    <a href="#" title="<?php _e('Delete', THEMEMAKERS_THEME_FOLDER_NAME); ?>" class="remove remove_sidebar" sidebar-id="<?php echo $sidebar_id ?>"></a>
                                    <a id-data="<?php echo $sidebar_id; ?>" href="#" title="<?php _e('Edit', THEMEMAKERS_THEME_FOLDER_NAME); ?>" class="edit delegate_click"></a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="js_no_one_item_else"><span><?php _e('You have not created any sidebar group yet. Please create one using the form above.', THEMEMAKERS_THEME_FOLDER_NAME); ?></span></li>
                        <?php endif; ?>

                    </ul>
                </div>
                <?php
                $data['sidebars'] = $sidebars;
                $data['entity_sidebars'] = new Thememakers_Entity_Custom_Sidebars();
                echo Thememakers_Entity_Custom_Sidebars::draw_sidebars_panel();
                ?>


                <div class="tab-content" id="tab10">

                    <h1><?php _e('Seo Tools', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>

                    <?php
                    $meta_title_home = get_option(THEMEMAKERS_THEME_PREFIX . "meta_title_home");
                    $meta_keywords_home = get_option(THEMEMAKERS_THEME_PREFIX . "meta_keywords_home");
                    $meta_description_home = get_option(THEMEMAKERS_THEME_PREFIX . "meta_description_home");
                    ?>

                    <div class="clearfix ">
                        <div class="admin-one-half">

                            <h4><?php _e('Meta title', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                            <input type="text" name="meta_title_home" value="<?php echo $meta_title_home; ?>">

                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">

                            <p class="admin-info">
                                <?php _e('SEO title of page. Title – 50-80 characters (usually – 75)', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>

                        </div><!--/ .admin-one-half-->

                    </div>

                    <div class="clearfix ">
                        <div class="admin-one-half">

                            <h4><?php _e('Meta keywords', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                            <textarea name="meta_keywords_home"><?php echo $meta_keywords_home; ?></textarea>

                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">

                            <p class="admin-info">
                                <?php _e('Keywords - up to 250 characters', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>

                        </div><!--/ .admin-one-half-->

                    </div>


                    <div class="clearfix ">
                        <div class="admin-one-half">

                            <h4><?php _e('Meta description', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                            <textarea name="meta_description_home"><?php echo $meta_description_home; ?></textarea>

                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">

                            <p class="admin-info">
                                <?php _e('Description – about 150-200 characters', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>

                        </div><!--/ .admin-one-half-->

                    </div>



                    <hr class="admin-divider" />


                    <h2><?php _e('Posts listing/Blog page', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>

                    <?php
                    $meta_title_post_listing = get_option(THEMEMAKERS_THEME_PREFIX . "meta_title_post_listing");
                    $meta_keywords_post_listing = get_option(THEMEMAKERS_THEME_PREFIX . "meta_keywords_post_listing");
                    $meta_description_post_listing = get_option(THEMEMAKERS_THEME_PREFIX . "meta_description_post_listing");
                    ?>

                    <div class="clearfix ">
                        <div class="admin-one-half">

                            <h4><?php _e('Meta title', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                            <input type="text" name="meta_title_post_listing" value="<?php echo $meta_title_post_listing; ?>">

                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">

                            <p class="admin-info">
                                <?php _e('SEO title of page. Title – 50-80 characters (usually – 75)', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>

                        </div><!--/ .admin-one-half-->

                    </div>

                    <div class="clearfix ">
                        <div class="admin-one-half">

                            <h4><?php _e('Meta keywords', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                            <textarea name="meta_keywords_post_listing"><?php echo $meta_keywords_post_listing; ?></textarea>

                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">

                            <p class="admin-info">
                                <?php _e('Keywords - up to 250 characters', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>

                        </div><!--/ .admin-one-half-->

                    </div>


                    <div class="clearfix ">
                        <div class="admin-one-half">

                            <h4><?php _e('Meta description', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                            <textarea name="meta_description_post_listing"><?php echo $meta_description_post_listing; ?></textarea>

                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">

                            <p class="admin-info">
                                <?php _e('Description – about 150-200 characters', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>

                        </div><!--/ .admin-one-half-->

                    </div>



                    <hr class="admin-divider" />



                    <h2><?php _e('Portfolio listing', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>

                    <?php
                    $meta_title_portfolio_listing = get_option(THEMEMAKERS_THEME_PREFIX . "meta_title_portfolio_listing");
                    $meta_keywords_portfolio_listing = get_option(THEMEMAKERS_THEME_PREFIX . "meta_keywords_portfolio_listing");
                    $meta_description_portfolio_listing = get_option(THEMEMAKERS_THEME_PREFIX . "meta_description_portfolio_listing");
                    ?>

                    <div class="clearfix ">
                        <div class="admin-one-half">

                            <h4><?php _e('Meta title', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                            <input type="text" name="meta_title_portfolio_listing" value="<?php echo $meta_title_portfolio_listing; ?>">

                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">

                            <p class="admin-info">
                                <?php _e('SEO title of page. Title – 50-80 characters (usually – 75)', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>

                        </div><!--/ .admin-one-half-->

                    </div>

                    <div class="clearfix ">
                        <div class="admin-one-half">

                            <h4><?php _e('Meta keywords', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                            <textarea name="meta_keywords_portfolio_listing"><?php echo $meta_keywords_portfolio_listing; ?></textarea>

                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">

                            <p class="admin-info">
                                <?php _e('Keywords - up to 250 characters', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>

                        </div><!--/ .admin-one-half-->

                    </div>


                    <div class="clearfix ">
                        <div class="admin-one-half">

                            <h4><?php _e('Meta description', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                            <textarea name="meta_description_portfolio_listing"><?php echo $meta_description_portfolio_listing; ?></textarea>

                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">

                            <p class="admin-info">
                                <?php _e('Description – about 150-200 characters', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>

                        </div><!--/ .admin-one-half-->

                    </div>



                    <hr class="admin-divider" />




                    <h2><?php _e('Gallery listing', THEMEMAKERS_THEME_FOLDER_NAME); ?></h2>

                    <?php
                    $meta_title_gallery_listing = get_option(THEMEMAKERS_THEME_PREFIX . "meta_title_gallery_listing");
                    $meta_keywords_gallery_listing = get_option(THEMEMAKERS_THEME_PREFIX . "meta_keywords_gallery_listing");
                    $meta_description_gallery_listing = get_option(THEMEMAKERS_THEME_PREFIX . "meta_description_gallery_listing");
                    ?>

                    <div class="clearfix ">
                        <div class="admin-one-half">

                            <h4><?php _e('Meta title', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                            <input type="text" name="meta_title_gallery_listing" value="<?php echo $meta_title_gallery_listing; ?>">

                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">

                            <p class="admin-info">
                                <?php _e('SEO title of page. Title – 50-80 characters (usually – 75)', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>

                        </div><!--/ .admin-one-half-->

                    </div>

                    <div class="clearfix ">
                        <div class="admin-one-half">

                            <h4><?php _e('Meta keywords', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                            <textarea name="meta_keywords_gallery_listing"><?php echo $meta_keywords_gallery_listing; ?></textarea>

                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">

                            <p class="admin-info">
                                <?php _e('Keywords - up to 250 characters', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>

                        </div><!--/ .admin-one-half-->

                    </div>


                    <div class="clearfix ">
                        <div class="admin-one-half">

                            <h4><?php _e('Meta description', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                            <textarea name="meta_description_gallery_listing"><?php echo $meta_description_gallery_listing; ?></textarea>

                        </div><!--/ .admin-one-half-->

                        <div class="admin-one-half last">

                            <p class="admin-info">
                                <?php _e('Description – about 150-200 characters', THEMEMAKERS_THEME_FOLDER_NAME); ?>
                            </p>

                        </div><!--/ .admin-one-half-->

                    </div>



                </div>


                <div class="tab-content" id="tab10-0">
                    <h4><?php _e('Add SEO Group', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="text" value="" id="seo_group_name" placeholder="<?php _e("type title here", THEMEMAKERS_THEME_FOLDER_NAME) ?>">
                    <div class="add-button add_seo_group"></div>
                    <hr class="admin-divider" />
                    <h4><?php _e('SEO Groups', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>
                    <input type="hidden" name="seo_group[]" value="" />
                    <ul class="groups seo_groups_list">
                        <?php unset($seo_groups[0]); ?>
                        <?php if (!empty($seo_groups) AND is_array($seo_groups)): ?>
                            <?php foreach ($seo_groups as $group_id => $seo_group) : ?>
                                <?php if ($group_id): ?>
                                    <li>
                                        <a id-data="<?php echo $group_id; ?>" class="delegate_click" href="#"><?php echo $seo_group['name']; ?></a>
                                        <a href="#" title="<?php _e('Delete', THEMEMAKERS_THEME_FOLDER_NAME); ?>" class="remove remove_seo_group" seo-group-id="<?php echo $group_id ?>"></a>
                                        <a id-data="<?php echo $group_id; ?>" href="#" title="<?php _e('Edit', THEMEMAKERS_THEME_FOLDER_NAME); ?>" class="edit delegate_click"></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="js_no_one_item_else"><span><?php _e('You have not created any group yet. Please create one using the form above.', THEMEMAKERS_THEME_FOLDER_NAME); ?></span></li>
                        <?php endif; ?>

                    </ul>


                </div>





                <?php echo Thememakers_Entity_SEO_Group::draw_seo_groups_panel(); ?>


                <div class="tab-content" id="tab11">

                    <h1><?php _e('Footer', THEMEMAKERS_THEME_FOLDER_NAME); ?></h1>

                    <h4><?php _e('Footer text', THEMEMAKERS_THEME_FOLDER_NAME); ?></h4>

                    <div class="options_footer">
                        <?php
                        $copyright_text = get_option(THEMEMAKERS_THEME_PREFIX . "copyright_text");
                        ?>
                        <textarea name="copyright_text" class="fullwidth"><?php echo $copyright_text ?></textarea>
                    </div>


                </div>

                <div class="admin-group-button clearfix">
                    <a class="admin-button button-yellow button-medium align-btn-left button_reset_options" href="#"><?php _e('Reset All Options', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                    <a class="admin-button button-yellow button-medium align-btn-right button_save_options" href="#"><?php _e('Save All Changes', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                </div>

            </section><!--/ #admin-content-->

        </section><!--/ .admin-container-->



    </div><!--/ #tm-->


</form>


<!------------------------ html templates for js ------------------------------------------->

<div style="display: none;">
    <a href="#google_font_set" id="google_font_set_link">fancy</a>
    <div id="google_font_set" style="width: 800px; height: 600px;">
        <a class="admin-button button-small button-yellow button_save_google_fonts" href="#"><?php _e('save', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
        <ul id="google_font_set_list"></ul><br />
        <a class="admin-button button-small button-yellow button_save_google_fonts" href="#"><?php _e('save', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
    </div>


    <a href="#fancy_loader" id="fancy_loader_link">fancy loader</a>
    <div id="fancy_loader">
        <img src="<?php echo THEMEMAKERS_THEME_URI . "/images/preloader.gif" ?>" alt="loader" />
    </div>


    <div id="ui_slider_item">

        <div class="clearfix" id="__UI_SLIDER_NAME__">
            <div class="slider-range __UI_SLIDER_NAME__"></div>
            <input type="text" class="range-amount-value" value="__UI_SLIDER_VALUE__" />
            <input type="hidden" value="__UI_SLIDER_VALUE__" name="__UI_SLIDER_NAME__" class="range-amount-value-hidden" />
        </div>

    </div>

</div>




<?php Thememakers_Entity_Contact_Form::draw_forms_templates(); ?>

<div class="clear"></div>

