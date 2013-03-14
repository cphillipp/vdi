<?php

class Thememakers_Entity_Slider {

    public $slider_types = array();
    public $slider_types_options = array();
    public $current_slider_type;
    public $slider_height_option = 505;

    public function __construct() {
        $this->slider_types = array(
            'nivo' => "Nivo Slider",
            //'circle' => "Circle Effect slider",
            //'accordion' => "Elegant Accordion",
            //'rama' => "Rama Slider",
            //'mosaic' => "Mosaic",
            'flexslider' => 'Flex Slider',
            'revolution' => 'Revolution'
        );

        if (!$this->current_slider_type) {
            $this->current_slider_type = 'nivo'; //default
        }
        $this->slider_height_option = get_option(THEMEMAKERS_THEME_PREFIX . "slider_height_option") > 0 ? get_option(THEMEMAKERS_THEME_PREFIX . "slider_height_option") : $this->slider_height_option;
        $this->slider_types_options = array(
            'nivo' => array(
                'autoslide' => array(
                    'title' => __('Autoslide', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => __("Enter in the amount of milliseconds before the next transition or leave blank to disable auto slide.", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 3000,
                    'max' => 30000
                ),
                'transition_speed' => array(
                    'title' => __('Transition Speed', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => __("Enter in the speed of slides transition in milliseconds.", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 600,
                    'max' => 30000
                ),
                'transition_effect' => array(
                    'title' => __('Transition Effect', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'select',
                    'values_list' => array(
                        'random' => __('Random', THEMEMAKERS_THEME_FOLDER_NAME),
                        'sliceDown' => __('Slice Down', THEMEMAKERS_THEME_FOLDER_NAME),
                        'sliceDownLeft' => __('Slice Down Left', THEMEMAKERS_THEME_FOLDER_NAME),
                        'sliceUpDown' => __('Slice Up Down', THEMEMAKERS_THEME_FOLDER_NAME),
                        'sliceUpDownLeft' => __('Slice Up Down Left', THEMEMAKERS_THEME_FOLDER_NAME),
                        'sliceUp' => __('Slice Up', THEMEMAKERS_THEME_FOLDER_NAME),
                        'sliceUpLeft' => __('Slice Up Left', THEMEMAKERS_THEME_FOLDER_NAME),
                        'fold' => __('Fold', THEMEMAKERS_THEME_FOLDER_NAME),
                        'fade' => __('Fade', THEMEMAKERS_THEME_FOLDER_NAME),
                        'slideInLeft' => __('Slide In Left', THEMEMAKERS_THEME_FOLDER_NAME),
                        'slideInRight' => __('Slide In Right', THEMEMAKERS_THEME_FOLDER_NAME),
                        'boxRandom' => __('Box Random', THEMEMAKERS_THEME_FOLDER_NAME),
                        'boxRain' => __('Box Rain', THEMEMAKERS_THEME_FOLDER_NAME),
                        'boxRainReverse' => __('Box Rain Reverse', THEMEMAKERS_THEME_FOLDER_NAME),
                        'boxRainGrow' => __('Box Rain Grow', THEMEMAKERS_THEME_FOLDER_NAME),
                        'boxRainGrowReverse' => __('Box Rain Grow Reverse', THEMEMAKERS_THEME_FOLDER_NAME),
                    ),
                    'description' => "",
                    'default' => 'sliceDown',
                ),
                'control_nav' => array(
                    'title' => __('Show control navigation', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => __("1,2,3... navigation", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 1,
                ),
                /*
                  'control_nav_thumbs' => array(
                  'title' => __('Use thumbnails for Control Nav', THEMEMAKERS_THEME_FOLDER_NAME),
                  'type' => 'checkbox',
                  'description' => __("Use thumbnails for Control Nav", THEMEMAKERS_THEME_FOLDER_NAME),
                  'default' => 0,
                  ),
                 */
                'random_start' => array(
                    'title' => __('Random start', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => __("Start on a random slide", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 0,
                ),
                'pause_on_hover' => array(
                    'title' => __('Pause on hover', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => __("Pause on hover", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 1,
                ),
                'direction_nav' => array(
                    'title' => __('Show navigation', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => __("Next &amp; Prev navigation", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 1,
                ),
                'direction_nav_hide' => array(
                    'title' => __('Show navigation on hover only', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => __("Next &amp; Prev navigation only show on hover", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 0,
                ),
                'manual_advance' => array(
                    'title' => __('Manual advance', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => __("Force manual transitions", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 1,
                ),
                'enable_caption' => array(
                    'title' => __('Enable caption', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => __("Show/hide slider caption", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 1,
                ),
                'slide_width' => array(
                    'title' => __('Slide width', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 1180,
                    'max' => 1220
                ),
                'thumb_slide_width' => array(
                    'title' => __('Thumbnail slide width', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 200,
                    'max' => 900
                ),
                'box_rows' => array(
                    'title' => __('Box rows', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => __("For box animations", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 4,
                    'max' => 40
                ),
                'box_cols' => array(
                    'title' => __('Box cols', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => __("For box animations", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 8,
                    'max' => 40
                ),
                'slices' => array(
                    'title' => __('Slices', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => __("For box animations", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 15,
                    'max' => 100
                ),
                'start_slide' => array(
                    'title' => 'Starting Slide',
                    'type' => 'checkbox',
                    'description' => __("Set starting Slide (0 index)", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 0,
                ),
            /*
              'caption_color' => array(
              'title' => __('Caption color', THEMEMAKERS_THEME_FOLDER_NAME),
              'type' => 'color',
              'description' => "",
              'default' => "#ff0000",
              )
             * *
             */
            ),
            'circle' => array(
                'slide_width' => array(
                    'title' => __('Slide width', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 1220,
                    'max' => 1220
                )
            ),
            'accordion' => array(
                'delay' => array(
                    'title' => __('Delay', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => __("How long between slide transitions in AutoPlay mode", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 3000,
                    'max' => 30000
                ),
                'transition_speed' => array(
                    'title' => __('Transition Speed', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => __("How long the slide transition takes", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 600,
                    'max' => 900
                ),
                'auto_play' => array(
                    'title' => __('Auto play', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => __("This turns off the entire FUNCTIONALY, not just if it starts running or not", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 1,
                ),
                'pause_on_hover' => array(
                    'title' => __('Pause on hover', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => __("If true, and autoPlay is enabled, the show will pause on hover", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 0,
                ),
                'expanded_width' => array(
                    'title' => __('Expanded Width', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => __("Width of the expanded slide", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 60,
                    'max' => 1220
                ),
                'bg_height' => array(
                    'title' => __('Background height', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => __("The height of the gradient image (bgDescription.png). Useful if you're modifying the image", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 340,
                    'max' => 1220
                ),
                'enable_caption' => array(
                    'title' => __('Enable caption', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => __("Show/hide slider caption", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 1,
                ),
                'caption_color' => array(
                    'title' => __('Caption title color', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'color',
                    'description' => "",
                    'default' => "",
                ),
                'easing' => array(
                    'title' => __('Easing', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'select',
                    'values_list' => array(
                        'swing' => 'swing',
                        'linear' => 'linear',
                    ),
                    'description' => __("Anything other than 'linear' or 'swing' requires the easing plugin", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 'swing',
                ),
                'stop_at_end' => array(
                    'title' => __('Stop at end', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => __("If autoplay is on, it will stop when it reaches the last slide", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 1,
                ),
            ),
            'rama' => array(
                'autoslide' => array(
                    'title' => __('Autoslide', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => __("Enter in the amount of milliseconds before the next transition or leave blank to disable auto slide.", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 6000,
                    'max' => 30000
                ),
                'width' => array(
                    'title' => __('Width', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => __("Enter sliders width", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 1220,
                    'max' => 1220
                ),
                'transition_effect' => array(
                    'title' => __('Image Transition Effect', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'select',
                    'values_list' => array(
                        'random' => __('Random', THEMEMAKERS_THEME_FOLDER_NAME),
                        'gradientfade' => __('Gradient Fade', THEMEMAKERS_THEME_FOLDER_NAME),
                        'gradientfade2' => __('Gradient Fade 2', THEMEMAKERS_THEME_FOLDER_NAME),
                        'box-randomfade' => __('Box Random Fade', THEMEMAKERS_THEME_FOLDER_NAME),
                        'box-randomzoom' => __('Box Random Zoom', THEMEMAKERS_THEME_FOLDER_NAME),
                        'box-diagonalzoom' => __('Box Big Digital Zoom', THEMEMAKERS_THEME_FOLDER_NAME),
                        'box-diagonalfade' => __('Box Big Digital Zoom Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'box-leftfade' => __('Box Big Left Fade Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'box-leftzoom' => __('Box Big Left Zoom Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'ghost' => __('Ghost Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'camfocus' => __('CamFocus Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'rollo' => __('Rollo Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'curtain' => __('Curtain Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'rollo2' => __('Rollo2 Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'curtain2' => __('Curtain2 Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'rain' => __('Rain Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'fountain' => __('Fountain Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'wave' => __('Wave Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'zipper' => __('Zipper Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'zoomme' => __('Zoom Me', THEMEMAKERS_THEME_FOLDER_NAME),
                        'slide-updown' => __('Up-Down Transition', THEMEMAKERS_THEME_FOLDER_NAME),
                        'Transition' => __('Left-Right', THEMEMAKERS_THEME_FOLDER_NAME)
                    ),
                    'description' => "",
                    'default' => 'random',
                ),
                'content_effect' => array(
                    'title' => __('Caption transitions', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'select',
                    'values_list' => array(
                        'slideup' => 'slideup',
                        'slideright' => 'slideright',
                        'slidedown' => 'slidedown',
                        'slideleft' => 'slideleft',
                        'fadeup' => 'fadeup',
                        'faderight' => 'faderight',
                        'fadedown' => 'fadedown',
                        'fadeleft' => 'fadeleft',
                        'fade' => 'fade'
                    ),
                    'description' => "",
                    'default' => 'fade',
                ),
                'enable_caption' => array(
                    'title' => __('Enable caption', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => __("Show/hide slider caption", THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 1,
                ),
            /*
              'caption_area_position' => array(
              'title' => __('Caption area position', THEMEMAKERS_THEME_FOLDER_NAME),
              'type' => 'select',
              'values_list' => array(
              'top right' => 'top right',
              'bottom right' => 'bottom right',
              'top left' => 'top left',
              'bottom left' => 'bottom left',
              ),
              'description' => "",
              'default' => 'top right',
              )
             * */
            ),
            'mosaic' => array(
                'color' => array(
                    'title' => __('Mosaic Effect Color', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'color',
                    'description' => "",
                    'default' => "#C6E346",
                ),
                'frame_width' => array(
                    'title' => __('Frame width', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 1220,
                    'max' => 1220
                )
                ,
                'tiles_x' => array(
                    'title' => __('Number Of Tiles X', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 6,
                    'max' => 40
                ),
                'tiles_y' => array(
                    'title' => __('Number Of Tiles Y', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 11,
                    'max' => 40
                ),
                'tile_border' => array(
                    'title' => __('Tile border width', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "px",
                    'default' => 1,
                    'max' => 20
                ),
                'tile_border_color' => array(
                    'title' => __('Tile border color', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'color',
                    'description' => "",
                    'default' => "#FFFFFF",
                ),
                'effect_intensity' => array(
                    'title' => __('Effect intensity', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "0 ... 1 ex.:0.5",
                    'default' => "0.5",
                    'max' => 1
                )
            ),
            'flexslider' => array(
                'slide_width' => array(
                    'title' => __('Slide width', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 1180,
                    'max' => 1220
                ),
                'enable_caption' => array(
                    'title' => __('Enable caption', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => "",
                    'default' => 1,
                ),
                'control_nav' => array(
                    'title' => __('Show control Navigation', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => "",
                    'default' => 1,
                ),
                'animation_loop' => array(
                    'title' => __('Show animation Loop', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => "",
                    'default' => 0,
                ),
                'slideshow' => array(
                    'title' => __('Show slideshow', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'checkbox',
                    'description' => "",
                    'default' => 1,
                ),
                'animation_speed' => array(
                    'title' => __('Animation Speed', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 300,
                    'max' => 1500
                ),
                'item_width' => array(
                    'title' => __('Item width', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 245,
                    'max' => 1220
                ),
            ),
            'revolution' => array(
                'data_transition' => array(
                    'title' => __('Image data transition', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'select',
                    'values_list' => array(
                        'Demo' => __('Various Transitions', THEMEMAKERS_THEME_FOLDER_NAME),
                        'boxslide' => __('Box Mask', THEMEMAKERS_THEME_FOLDER_NAME),
                        'boxfade' => __('Box Mask Mosaic', THEMEMAKERS_THEME_FOLDER_NAME),
                        'slotzoom-horizontal' => __('Slot Zoom Horizontal', THEMEMAKERS_THEME_FOLDER_NAME),
                        'slotslide-horizontal' => __('Slot Slide Horizontal', THEMEMAKERS_THEME_FOLDER_NAME),
                        'slotfade-horizontal' => __('Slot Fade Horizontal', THEMEMAKERS_THEME_FOLDER_NAME),
                        'slotzoom-vertical' => __('Slot Zoom Vertical', THEMEMAKERS_THEME_FOLDER_NAME),
                        'slotslide-vertical' => __('Slot Slide Vertical', THEMEMAKERS_THEME_FOLDER_NAME),
                        'slotfade-vertical' => __('Slot Fade Vertical', THEMEMAKERS_THEME_FOLDER_NAME),
                        'curtain-1' => __('Curtain One', THEMEMAKERS_THEME_FOLDER_NAME),
                        'curtain-2' => __('curtain-2', THEMEMAKERS_THEME_FOLDER_NAME),
                        'curtain-3' => __('Curtain Three', THEMEMAKERS_THEME_FOLDER_NAME),
                        'slideleft' => __('Slide Left', THEMEMAKERS_THEME_FOLDER_NAME),
                        'slideright' => __('Slide Right', THEMEMAKERS_THEME_FOLDER_NAME),
                        'slideup' => __('Slide Up', THEMEMAKERS_THEME_FOLDER_NAME),
                        'slidedown' => __('Slide Down', THEMEMAKERS_THEME_FOLDER_NAME),
                        'fade' => __('Fade', THEMEMAKERS_THEME_FOLDER_NAME),
                    ),
                    'description' => "",
                    'default' => 'Demo',
                ),
                'data_slot_amount' => array(
                    'title' => __('Image data slot amount', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'select',
                    'values_list' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25),
                    'description' => "",
                    'default' => 5,
                ),
                'data_delay' => array(
                    'title' => __('Data delay', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "sec",
                    'default' => 10,
                    'max' => 100
                ),
                'startheight' => array(
                    'title' => __('Start height', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 488,
                    'max' => 2000
                ),
                'startwidth' => array(
                    'title' => __('Start width', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 1180,
                    'max' => 3000
                ),
                'thumb_width' => array(
                    'title' => __('Thumb width', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => __('Thumb With and Height and Amount (only if navigation Type set to thumb !)', THEMEMAKERS_THEME_FOLDER_NAME),
                    'default' => 100,
                    'max' => 300
                ),
                'thumb_height' => array(
                    'title' => __('Thumb height', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 50,
                    'max' => 300
                ),
                'thumb_amount' => array(
                    'title' => __('Thumb amount', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 5,
                    'max' => 20
                ),
                'on_hover_stop' => array(
                    'title' => __('On hover stop', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'select',
                    'values_list' => array('on'=>'on', 'off'=>'off'),
                    'description' => "",
                    'default' => 'on',
                ),
                'hide_thumbs' => array(
                    'title' => __('hide thumbs', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 200,
                    'max' => 2000
                ),
                'navigation_type' => array(
                    'title' => __('Navigation type', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'select',
                    'values_list' => array('bullet'=>'bullet', 'thumb'=>'thumb', 'none'=>'none'),
                    'description' => "",
                    'default' => 'bullet',
                ),
                'navigation_style' => array(
                    'title' => __('Navigation style', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'select',
                    'values_list' => array('round'=>'round', 'square'=>'square', 'navbar'=>'navbar'),
                    'description' => "",
                    'default' => 'round',
                ),
                'navigation_arrows' => array(
                    'title' => __('Navigation arrows', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'select',
                    'values_list' => array('nexttobullets'=>'nexttobullets', 'verticalcentered'=>'verticalcentered', 'none'=>'none'),
                    'description' => "",
                    'default' => 'nexttobullets',
                ),
                'touchenabled' => array(
                    'title' => __('Touchenabled', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'select',
                     'values_list' => array('on'=>'on', 'off'=>'off'),
                    'description' => "",
                    'default' => 'on',
                ),
                'nav_offset_horizontal' => array(
                    'title' => __('nav Offset Horizontal', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => 0,
                    'max' => 200
                ),
                'nav_offset_vertical' => array(
                    'title' => __('nav Offset Vertical', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'text',
                    'description' => "",
                    'default' => -16,
                    'max' => 200
                ),  
                'full_width' => array(
                    'title' => __('Full Width', THEMEMAKERS_THEME_FOLDER_NAME),
                    'type' => 'select',
                     'values_list' => array('off'=>'off', 'on'=>'on'),
                    'description' => "",
                    'default' => 'off',
                ),
            ),
        );
    }

    public function draw_sliders_options() {
        $data = array();
        $data['slider_object'] = $this;
        return ThemeMakersThemeView::draw_html('slider/sliders_options', $data);
    }

    public function get_slider_options($slider_type) {
        $options_list = $this->slider_types_options[$slider_type];

        $options = array();
        if (!empty($options_list)) {
            foreach ($options_list as $option_key => $values) {
                $option = get_option(THEMEMAKERS_THEME_PREFIX . "slider_" . $slider_type . "_" . $option_key);
                if (empty($option) AND !is_numeric($option)) {
                    $option = $values['default'];
                }

                $options[$option_key] = $option;
            }
        }

        return $options;
    }

    public static function get_slides() {
        $slides = get_option(THEMEMAKERS_THEME_PREFIX . 'sliders');
        return $slides;
    }

    public static function get_slide_group($slide_name) {
        $slides = self::get_slides();
        $slide = array();
        if (!empty($slides)) {
            foreach ($slides as $key => $value) {
                if (@$value['name'] == $slide_name) {
                    $slide = $value['options'];
                    break;
                }
            }
        }


        return $slide;
    }

    public static function get_sliders_types() {
        $obj = new Thememakers_Entity_Slider();
        return $obj->slider_types;
    }

}

