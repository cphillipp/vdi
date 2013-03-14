<?php

class ThemeMakers_Testimonials_Widget extends WP_Widget {

    //Widget Setup
    function __construct() {
        //Basic settings
        $settings = array('classname' => __CLASS__, 'description' => __('Rotates testimonials in random order.', THEMEMAKERS_THEME_FOLDER_NAME));

        //Creation
        $this->WP_Widget(__CLASS__, __('ThemeMakers Testimonials', THEMEMAKERS_THEME_FOLDER_NAME), $settings);
    }

    //Widget view
    function widget($args, $instance) {
        $args['instance'] = $instance;
        echo ThemeMakersThemeView::draw_html('widgets/testimonials', $args);
    }

    //Update widget
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['pause'] = (int) $new_instance['pause'];
        return $instance;
    }

    //Widget form
    function form($instance) {
        //Defaults
        $defaults = array(
            'title' => 'Testimonials',
            'pause' => '7000',
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        $args = array();
        $args['instance'] = $instance;
        $args['widget'] = $this;
        echo ThemeMakersThemeView::draw_html('widgets/testimonials_form', $args);
    }

}

class ThemeMakers_Latest_Tweets_Widget extends WP_Widget {

    //Widget Setup
    function __construct() {
        //Basic settings
        $settings = array('classname' => __CLASS__, 'description' => __('A widget that displays your latest tweets.', THEMEMAKERS_THEME_FOLDER_NAME));

        //Creation
        $this->WP_Widget(__CLASS__, __('ThemeMakers Latest Tweets', THEMEMAKERS_THEME_FOLDER_NAME), $settings);
    }

    //Widget view
    function widget($args, $instance) {
        $args['instance'] = $instance;
        echo ThemeMakersThemeView::draw_html('widgets/latest_tweets', $args);
    }

    //Update widget
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['username'] = $new_instance['username'];
        $instance['postcount'] = (int) $new_instance['postcount'];
        return $instance;
    }

    //Widget form
    function form($instance) {
        //Defaults
        $defaults = array(
            'title' => 'Twitter Feed',
            'username' => 'thememakers',
            'postcount' => '3',
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        $args = array();
        $args['instance'] = $instance;
        $args['widget'] = $this;
        echo ThemeMakersThemeView::draw_html('widgets/latest_tweets_form', $args);
    }

}

class ThemeMakers_Social_Links_Widget extends WP_Widget {

    //Widget Setup
    function __construct() {
        //Basic settings
        $settings = array('classname' => __CLASS__, 'description' => __('Links to your account at most popular web services.', THEMEMAKERS_THEME_FOLDER_NAME));

        //Creation
        $this->WP_Widget(__CLASS__, __('ThemeMakers Social Links', THEMEMAKERS_THEME_FOLDER_NAME), $settings);
    }

    //Widget view
    function widget($args, $instance) {
        $args['instance'] = $instance;
        echo ThemeMakersThemeView::draw_html('widgets/social_links', $args);
    }

    //Update widget
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['facebook_links'] = $new_instance['facebook_links'];
        $instance['facebook_tooltip'] = $new_instance['facebook_tooltip'];
        $instance['twitter_links'] = $new_instance['twitter_links'];
        $instance['twitter_tooltip'] = $new_instance['twitter_tooltip'];
        $instance['flickr_links'] = $new_instance['flickr_links'];
        $instance['flickr_tooltip'] = $new_instance['flickr_tooltip'];
        $instance['skype_links'] = $new_instance['skype_links'];
        $instance['skype_tooltip'] = $new_instance['skype_tooltip'];
        $instance['youtube_links'] = $new_instance['youtube_links'];
        $instance['youtube_tooltip'] = $new_instance['youtube_tooltip'];
        $instance['rss_tooltip'] = $new_instance['rss_tooltip'];
        $instance['show_rss_tooltip'] = $new_instance['show_rss_tooltip'];
        return $instance;
    }

    //Widget form
    function form($instance) {
        //Defaults
        $defaults = array(
            'title' => 'Social Links',
            'facebook_links' => '',
            'facebook_tooltip' => '',
            'twitter_links' => '',
            'twitter_tooltip' => '',
            'flickr_links' => '',
            'flickr_tooltip' => '',
            'skype_links' => '',
            'skype_tooltip' => '',
            'youtube_links' => '',
            'youtube_tooltip' => '',
            'rss_tooltip' => '',
            'show_rss_tooltip' => 1,
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        $args = array();
        $args['instance'] = $instance;
        $args['widget'] = $this;
        echo ThemeMakersThemeView::draw_html('widgets/social_links_form', $args);
    }

}

class ThemeMakers_Recent_Posts_Widget extends WP_Widget {

    //Widget Setup
    function __construct() {
        //Basic settings
        $settings = array('classname' => __CLASS__, 'description' => __('The most recent posts from selected category.', THEMEMAKERS_THEME_FOLDER_NAME));

        //Creation
        $this->WP_Widget(__CLASS__, __('ThemeMakers Recent Posts', THEMEMAKERS_THEME_FOLDER_NAME), $settings);
    }

    //Widget view
    function widget($args, $instance) {
        $args['instance'] = $instance;
        echo ThemeMakersThemeView::draw_html('widgets/recent_posts', $args);
    }

    //Update widget
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['category'] = $new_instance['category'];
        $instance['post_number'] = $new_instance['post_number'];
        $instance['show_thumbnail'] = $new_instance['show_thumbnail'];
        $instance['show_exerpt'] = $new_instance['show_exerpt'];
        $instance['show_see_all_button'] = $new_instance['show_see_all_button'];
        return $instance;
    }

    //Widget form
    function form($instance) {
        //Defaults
        $defaults = array(
            'title' => 'Recent Posts',
            'category' => '',
            'post_number' => 5,
            'show_thumbnail' => 1,
            'show_exerpt' => 0,
            'show_see_all_button' => 1
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        $args = array();
        $args['instance'] = $instance;
        $args['widget'] = $this;
        echo ThemeMakersThemeView::draw_html('widgets/recent_posts_form', $args);
    }

}

class ThemeMakers_Contact_Form_Widget extends WP_Widget {

    //Widget Setup
    function __construct() {
        //Basic settings
        $settings = array('classname' => __CLASS__, 'description' => __('A widget that shows custom contact form.', THEMEMAKERS_THEME_FOLDER_NAME));

        //Creation
        $this->WP_Widget(__CLASS__, __('ThemeMakers Contact Form', THEMEMAKERS_THEME_FOLDER_NAME), $settings);
    }

    //Widget view
    function widget($args, $instance) {
        $args['instance'] = $instance;
        echo ThemeMakersThemeView::draw_html('widgets/contact_form', $args);
    }

    //Update widget
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['form'] = $new_instance['form'];
        return $instance;
    }

    //Widget form
    function form($instance) {
        //Defaults
        $defaults = array(
            'title' => 'Contact Form',
            'form' => '',
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        $args = array();
        $args['instance'] = $instance;
        $args['widget'] = $this;
        echo ThemeMakersThemeView::draw_html('widgets/contact_form_form', $args);
    }

}

class ThemeMakers_Flickr_Widget extends WP_Widget {

    //Widget Setup
    function __construct() {
        //Basic settings
        $settings = array('classname' => __CLASS__, 'description' => __('A widget that displays flickr images', THEMEMAKERS_THEME_FOLDER_NAME));

        //Creation
        $this->WP_Widget(__CLASS__, __('ThemeMakers Flickr', THEMEMAKERS_THEME_FOLDER_NAME), $settings);
    }

    //Widget view
    function widget($args, $instance) {
        $args['instance'] = $instance;
        echo ThemeMakersThemeView::draw_html('widgets/flickr', $args);
    }

    //Update widget
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['username'] = $new_instance['username'];
        $instance['imagescount'] = (int) $new_instance['imagescount'];
        return $instance;
    }

    //Widget form
    function form($instance) {
        //Defaults
        $defaults = array(
            'title' => 'Flickr Photos',
            'username' => '54958895@N06',
            'imagescount' => '6',
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        $args = array();
        $args['instance'] = $instance;
        $args['widget'] = $this;
        echo ThemeMakersThemeView::draw_html('widgets/flickr_form', $args);
    }

}

class ThemeMakers_Recent_Projects_Widget extends WP_Widget {

    //Widget Setup
    function __construct() {
        //Basic settings
        $settings = array('classname' => __CLASS__, 'description' => __('The most recent projects from portfolio.', THEMEMAKERS_THEME_FOLDER_NAME));

        //Creation
        $this->WP_Widget(__CLASS__, __('ThemeMakers Recent Projects', THEMEMAKERS_THEME_FOLDER_NAME), $settings);
    }

    //Widget view
    function widget($args, $instance) {
        $args['instance'] = $instance;
        echo ThemeMakersThemeView::draw_html('widgets/recent_projects', $args);
    }

    //Update widget
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['post_number'] = $new_instance['post_number'];
        $instance['show_thumbnail'] = $new_instance['show_thumbnail'];
        $instance['show_exerpt'] = $new_instance['show_exerpt'];
        $instance['show_date'] = $new_instance['show_date'];
        return $instance;
    }

    //Widget form
    function form($instance) {
        //Defaults
        $defaults = array(
            'title' => 'Recent Projects',
            'post_number' => 5,
            'show_thumbnail' => 1,
            'show_exerpt' => 0,
            'show_date' => 1,
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        $args = array();
        $args['instance'] = $instance;
        $args['widget'] = $this;
        echo ThemeMakersThemeView::draw_html('widgets/recent_projects_form', $args);
    }

}

class ThemeMakers_Google_Map_Widget extends WP_Widget {

    //Widget Setup
    function __construct() {
        //Basic settings
        $settings = array('classname' => __CLASS__, 'description' => __('Google map', THEMEMAKERS_THEME_FOLDER_NAME));

        //Creation
        $this->WP_Widget(__CLASS__, __('ThemeMakers Google map', THEMEMAKERS_THEME_FOLDER_NAME), $settings);
    }

    //Widget view
    function widget($args, $instance) {
        $args['instance'] = $instance;
        echo ThemeMakersThemeView::draw_html('widgets/google_map', $args);
    }

    //Update widget
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['width'] = $new_instance['width'];
        $instance['height'] = $new_instance['height'];
        $instance['latitude'] = $new_instance['latitude'];
        $instance['longitude'] = $new_instance['longitude'];
        $instance['zoom'] = $new_instance['zoom'];
        $instance['scrollwheel'] = $new_instance['scrollwheel'];
        $instance['maptype'] = $new_instance['maptype'];
        $instance['marker'] = $new_instance['marker'];
        $instance['popup'] = $new_instance['popup'];
        $instance['html'] = $new_instance['html'];
        return $instance;
    }

    //Widget form
    function form($instance) {
        //Defaults
        $defaults = array(
            'title' => 'Google Map',
            'width' => 200,
            'height' => 200,
            'latitude' => "40.714623",
            'longitude' => "-74.006605",
            'zoom' => 12,
            'scrollwheel' => 0,
            'maptype' => 'ROADMAP',
            'marker' => 1,
            'popup' => 1,
            'html' => ""
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        $args = array();
        $args['instance'] = $instance;
        $args['widget'] = $this;
        echo ThemeMakersThemeView::draw_html('widgets/google_map_form', $args);
    }

}

class ThemeMakers_Chat_Widget extends WP_Widget {

    //Widget Setup
    function __construct() {
        //Basic settings
        $settings = array('classname' => __CLASS__, 'description' => __('Chat Banner', THEMEMAKERS_THEME_FOLDER_NAME));

        //Creation
        $this->WP_Widget(__CLASS__, __('ThemeMakers Chat Banner', THEMEMAKERS_THEME_FOLDER_NAME), $settings);
    }

    //Widget view
    function widget($args, $instance) {
        $args['instance'] = $instance;
        echo ThemeMakersThemeView::draw_html('widgets/chat_widget', $args);
    }

    //Update widget
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['banner_image'] = $new_instance['banner_image'];
        $instance['banner_bg_color1'] = $new_instance['banner_bg_color1'];
        $instance['banner_bg_color2'] = $new_instance['banner_bg_color2'];
        $instance['phrase1'] = $new_instance['phrase1'];
        $instance['phrase1_color'] = $new_instance['phrase1_color'];
        $instance['phrase2'] = $new_instance['phrase2'];
        $instance['phrase2_color'] = $new_instance['phrase2_color'];
        $instance['phrase3'] = $new_instance['phrase3'];
        $instance['phrase3_color'] = $new_instance['phrase3_color'];
        $instance['phrase4'] = $new_instance['phrase4'];
        $instance['phrase4_color'] = $new_instance['phrase4_color'];
        $instance['button_text'] = $new_instance['button_text'];
        $instance['button_text_color'] = $new_instance['button_text_color'];
        $instance['button_link'] = $new_instance['button_link'];


        return $instance;
    }

    //Widget form
    function form($instance) {
        //Defaults
        $defaults = array(
            'banner_image' => '',
            'banner_bg_color1' => '#d5d5d5',
            'banner_bg_color2' => '#afafaf',
            'phrase1' => 'Questions?',
            'phrase1_color' => '#FFFFFF',
            'phrase2' => 'Chat',
            'phrase2_color' => '#FFFFFF',
            'phrase3' => 'With us live!',
            'phrase3_color' => '#FFFFFF',
            'phrase4' => 'Mon-Fri 8am-9pm',
            'phrase4_color' => '#7B7B7B',
            'button_text' => 'Click Here!',
            'button_text_color' => '#ffffff',
            'button_link' => '#',
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        $args = array();
        $args['instance'] = $instance;
        $args['widget'] = $this;
        echo ThemeMakersThemeView::draw_html('widgets/chat_widget_form', $args);
    }

}


class ThemeMakers_Facebook_LikeBox_Widget extends WP_Widget {

    //Widget Setup
    function __construct() {
        //Basic settings
        $settings = array('classname' => __CLASS__, 'description' => __('Facebook likeBox', THEMEMAKERS_THEME_FOLDER_NAME));

        //Creation
        $this->WP_Widget(__CLASS__, __('ThemeMakers Facebook likeBox', THEMEMAKERS_THEME_FOLDER_NAME), $settings);
    }

    //Widget view

    function widget($args, $instance) {
        $args['instance'] = $instance;
        echo ThemeMakersThemeView::draw_html('widgets/facebook', $args);
    }

    //Update widget
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['pageID'] = $new_instance['pageID'];
        $instance['connection'] = $new_instance['connection'];
        $instance['width'] = $new_instance['width'];
        $instance['height'] = $new_instance['height'];
        $instance['header'] = $new_instance['header'];


        return $instance;
    }

    //Widget form
    function form($instance) {
        //Defaults
        $defaults = array(
            'title' => 'Facebook',
            'pageID' => '273813622709585',
            'connection' => 8,
            'width' => '',
            'height' => '350',
            'header' => 'yes'
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        $args = array();
        $args['instance'] = $instance;
        $args['widget'] = $this;
        echo ThemeMakersThemeView::draw_html('widgets/facebook_form', $args);
    }

}

//*****************************************************

register_widget('ThemeMakers_Testimonials_Widget');
register_widget('ThemeMakers_Latest_Tweets_Widget');
register_widget('ThemeMakers_Social_Links_Widget');
register_widget('ThemeMakers_Recent_Posts_Widget');
register_widget('ThemeMakers_Contact_Form_Widget');
register_widget('ThemeMakers_Flickr_Widget');
register_widget('ThemeMakers_Recent_Projects_Widget');
register_widget('ThemeMakers_Google_Map_Widget');
register_widget('ThemeMakers_Chat_Widget');
register_widget('ThemeMakers_Facebook_LikeBox_Widget');

