<?php
global $post;

if (!is_object($post) OR is_home()) {
    return;
}

$page_settings = Thememakers_Entity_Page_Constructor::get_page_settings($post->ID);

if ($page_settings['page_slider_type'] == 'revolution') {
    if (!$page_settings['revolution_slide_group']) {
        return;
    }
} else {
    if (!$page_settings['page_slider']) {
        return;
    }
}

$slider = new Thememakers_Entity_Slider();
$slides = Thememakers_Entity_Slider::get_slide_group($page_settings['page_slider']);
$options = $slider->get_slider_options($page_settings['page_slider_type']);
switch ($page_settings['page_slider_type']) {
    case 'nivo':
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo THEMEMAKERS_THEME_URI; ?>/js/sliders/nivo/nivo-slider.css" />
        <?php if (!$options['enable_caption']) : ?>
            <style type="text/css">
                .nivoSlider .nivo-caption {
                    display: none;
                }
            </style>
        <?php endif; ?>


        <?php wp_enqueue_script('thememakers_theme_slider_nivo', THEMEMAKERS_THEME_URI . '/js/sliders/nivo/jquery.nivo.slider.pack.js'); ?>

        <script type="text/javascript">
            jQuery(window).load(function() {
                jQuery('.nivoSlider').nivoSlider({
                    effect: "<?php echo $options['transition_effect'] ?>", // Specify sets like: 'fold,fade,sliceDown'
                    animSpeed:<?php echo $options['transition_speed'] ?>, // Slide transition speed
                    pauseTime:<?php echo $options['autoslide'] ?>, // How long each slide will show


                    startSlide: <?php echo $options['start_slide'] ?>, // Set starting Slide (0 index)
                    captionOpacity: 1,
                    directionNav: <?php echo $options['direction_nav'] ?>, // Next & Prev navigation
                    directionNavHide:<?php echo $options['direction_nav_hide'] ?>, // Only show on hover
                    manualAdvance:<?php echo $options['manual_advance'] ?>, // Force manual transitions
                    keyboardNav: true, // Use left & right arrows


                    slices: <?php echo $options['slices'] ?>, // For slice animations
                    boxCols: <?php echo $options['box_cols'] ?>, // For box animations
                    boxRows: <?php echo $options['box_rows'] ?>, // For box animations
                    controlNav: <?php echo $options['control_nav'] ?>, // 1,2,3... navigation
                    controlNavThumbs: 0, // Use thumbnails for Control Nav
                    pauseOnHover: <?php echo $options['pause_on_hover'] ?>, // Stop animation while hovering
                    prevText: 'Prev', // Prev directionNav text
                    nextText: 'Next', // Next directionNav text
                    randomStart: <?php echo $options['random_start'] ?>, // Start on a random slide
                    beforeChange: function() {
                    }, // Triggers before a slide transition
                    afterChange: function() {
                    }, // Triggers after a slide transition
                    slideshowEnd: function() {
                    }, // Triggers after all slides have been shown
                    lastSlide: function() {
                    }, // Triggers when last slide is shown
                    afterLoad: function() {
                    } // Triggers when slider has loaded
                });
            });</script>



        <div id="slider" class="slider-wrapper">

            <div class="nivoSlider">
                <?php
                if (!empty($slides)) {
                    foreach ($slides as $slide_num => $slide) {
                        $slide_url = ThemeMakersHelper::resize_image($slide['image'], $options['slide_width'], true, $slider->slider_height_option);
                        $slide_thumb_url = ThemeMakersHelper::resize_image($slide['image'], $options['thumb_slide_width'], true, $options['thumb_slide_width']);
                        $slide_link_url = $slide['link'];
                        $slide_title = ThemeMakersHelper::quotes_shield($slide['title']);

                        if (strlen($slide_link_url) > 0) {
                            ?>
                            <a href="<?php echo $slide_link_url; ?>">
                                <img src="<?php echo $slide_url; ?>" data-thumb="<?php echo $slide_thumb_url; ?>" alt="<?php echo $slide_title ?>" title='#htmlcaption<?php echo $slide_num ?>' />
                            </a>
                            <?php
                        } else {
                            ?>
                            <img src="<?php echo $slide_url; ?>" data-thumb="<?php echo $slide_thumb_url; ?>" alt="<?php echo $slide_title ?>" title='#htmlcaption<?php echo $slide_num ?>' />

                            <?php
                        }
                    }
                }
                ?>

            </div><!--/ .nivoSlider-->


            <?php
            if (!empty($slides)) {
                $counter = 1;
                foreach ($slides as $slide_num => $slide) {
                    $slide_link_url = $slide['link'];
                    $slide_title = ThemeMakersHelper::quotes_shield($slide['title']);
                    $slide_desciption = ThemeMakersHelper::quotes_shield($slide['description']);


                    $slide_title_color = $slide['additional']['slide_title_color'];
                    $slide_description_color = $slide['additional']['slide_description_color'];
                    ?>
                    <div id="htmlcaption<?php echo $slide_num ?>" class="nivo-html-caption">
                        <div class="<?php echo($counter % 2 ? 'right_align' : 'left_align') ?>">
                            <h3 style="color:<?php echo $slide_title_color ?> !important;"><?php echo $slide_title ?></h3><p style="color:<?php echo $slide_description_color ?> !important;"><?php echo $slide_desciption ?></p>
                        </div>
                    </div><!--/ .nivo-html-caption-->

                    <?php
                    $counter++;
                }
            }
            ?>


        </div>

        <?php
        break;

    case 'flexslider':
        ?>
        <?php wp_enqueue_style("thememakers_theme_slider_flexslider_css", THEMEMAKERS_THEME_URI . '/js/sliders/flexslider/flexslider.css'); ?>
        <?php wp_enqueue_script('thememakers_theme_slider_flexslider_js', THEMEMAKERS_THEME_URI . '/js/sliders/flexslider/jquery.flexslider-min.js'); ?>

        <div class="slider">

            <section id="slider">

                <div class="flexslider">

                    <ul class="slides clearfix">

                        <?php
                        if (!empty($slides)) {
                            foreach ($slides as $key => $slide) {
                                $slide_url = ThemeMakersHelper::resize_image($slide['image'], $options['slide_width'], true, $slider->slider_height_option);
                                $slide_link_url = $slide['link'];
                                $slide_title = ThemeMakersHelper::quotes_shield($slide['title']);
                                $slide_desciption = ThemeMakersHelper::quotes_shield($slide['description']);

                                $slide_title_color = $slide['additional']['slide_title_color'];
                                $slide_description_color = $slide['additional']['slide_description_color'];
                                ?>

                                <li>

                                    <img src="<?php echo $slide_url ?>" alt="<?php echo $slide_title; ?>" />

                                    <section class="caption-<?php echo($key % 4 + 1) ?>">

                                        <?php if ($options['enable_caption']) : ?>

                                            <a <?php if (!empty($slide_title_color)): ?>style="color:<?php echo $slide_title_color ?> !important;"<?php endif; ?> href="<?php echo $slide_link_url ?>" title="<?php echo $slide_title; ?>"><h2 <?php if (!empty($slide_title_color)): ?>style="color:<?php echo $slide_title_color ?> !important;"<?php endif; ?>><?php echo $slide_title; ?></h2></a>

                                        <?php endif; ?>

                                        <p class="desc tcolor" <?php if (!empty($slide_description_color)): ?>style="color:<?php echo $slide_description_color ?> !important;"<?php endif; ?>><?php echo $slide_desciption; ?></p>

                                    </section>

                                </li>


                                <?php
                            }
                        }
                        ?>

                    </ul><!--/ .slides-->

                </div><!--/ .flexslider-->

            </section><!--/ #slider-->


            <section id="carousel">

                <ul class="slides clearfix">

                    <?php
                    if (!empty($slides)) {
                        foreach ($slides as $slide) {
                            $slide_link_url = $slide['link'];
                            $slide_title = ThemeMakersHelper::quotes_shield($slide['title']);
                            $slide_desciption = ThemeMakersHelper::quotes_shield($slide['description']);

                            $slide_title_color = $slide['additional']['slide_title_color'];
                            $slide_description_color = $slide['additional']['slide_description_color'];
                            ?>

                            <li>
                                <a>
                                    <?php if ($options['enable_caption']) : ?>
                                        <a <?php if (!empty($slide_title_color)): ?>style="color:<?php echo $slide_title_color ?> !important;"<?php endif; ?> href="<?php echo $slide_link_url ?>" title="<?php echo $slide_title; ?>"><h6 <?php if (!empty($slide_title_color)): ?>style="color:<?php echo $slide_title_color ?> !important;"<?php endif; ?>><?php echo $slide_title; ?></h6></a>
                                    <?php endif; ?>
                                    <p class="desc tcolor" <?php if (!empty($slide_description_color)): ?>style="color:<?php echo $slide_description_color ?> !important;"<?php endif; ?>><?php echo $slide_desciption; ?></p>
                                </a>
                            </li>

                            <?php
                        }
                    }
                    ?>

                </ul><!--/ .slides-->

            </section><!--/ #carousel-->

        </div><!--/ .slider-->

        <script type="text/javascript">

            jQuery(window).load(function() {

                jQuery('#carousel').flexslider({
                    animation: "slide",
                    controlNav: <?php echo ($options['control_nav'] ? 'true' : 'false') ?>,
                    animationLoop: false,
                    slideshow: <?php echo ($options['slideshow'] ? 'true' : 'false') ?>,
                    animationSpeed: <?php echo $options['animation_speed'] ?>,
                    itemWidth: <?php echo $options['item_width'] ?>,
                    asNavFor: '#slider'
                });
                jQuery('#slider').flexslider({
                    animation: "slide",
                    controlNav: <?php echo ($options['control_nav'] ? 'true' : 'false') ?>,
                    directionNav: false,
                    animationLoop: <?php echo ($options['animation_loop'] ? 'true' : 'false') ?>,
                    slideshow: <?php echo ($options['slideshow'] ? 'true' : 'false') ?>,
                    sync: "#carousel"
                });

            });

        </script>		

        <?php
        break;


    case 'revolution':


        if (function_exists("putRevSlider")) {
            if (!empty($page_settings['revolution_slide_group'])) {
                putRevSlider($page_settings['revolution_slide_group']);
            }
        }


        break;

    default:
        break;
}
?>

