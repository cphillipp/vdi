<?php
//capcha refreshing
if (isset($_GET['update_capcha'])) {
    ?>
    <img class="capture_image" border="0" alt="" style="vertical-align: middle" src="<?php echo get_stylesheet_directory_uri() ?>/admin/extensions/contact_form_capcha/image.php">
    <?php
    exit;
}
?>

<!DOCTYPE html>
<!--[if IE 7]>					<html class="ie7 no-js" <?php language_attributes(); ?>>     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" <?php language_attributes(); ?>>     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" <?php language_attributes(); ?>>     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" <?php language_attributes(); ?>>  <!--<![endif]-->

    <head>

        <?php echo ThemeMakersHelperFonts::get_google_fonts_link() ?>
        <?php include_once THEMEMAKERS_THEME_PATH . '/header_seocode.php'; ?>
        <?php global $post; ?>
        <?php if (!isset($content_width)) $content_width = 1220; ?>

        <script type="text/javascript" src="http://www.google.com/jsapi"></script>

        <?php wp_print_scripts('jquery'); ?>


        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php
        $feedburner = get_option(THEMEMAKERS_THEME_PREFIX . 'feedburner');
        if ($feedburner) {
            echo $feedburner;
        } else {
            bloginfo('rss2_url');
        }
        ?>" />

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel='stylesheet' href='<?php echo bloginfo('stylesheet_url') ?>' type='text/css' media='all' />        
        <link rel="stylesheet" href="<?php echo THEMEMAKERS_THEME_URI; ?>/css/custom1.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo THEMEMAKERS_THEME_URI; ?>/css/custom2.css" type="text/css" media="all" />

        <!-- The 1140px Grid - http://cssgrid.net/ -->
        <link rel="stylesheet" href="<?php echo THEMEMAKERS_THEME_URI; ?>/css/1140.css" type="text/css" media="all" />

        <!-- 1140px Grid styles for IE -->
        <!--[if lte IE 9]><link rel="stylesheet" href="<?php echo THEMEMAKERS_THEME_URI; ?>/css/ie.css" type="text/css" media="screen" /><![endif]-->
        <!--[if lt IE 9]>
         <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
         <script src="<?php echo THEMEMAKERS_THEME_URI; ?>/js/selectivizr-and-extra-selectors.min.js"></script>
        <![endif]-->



        <style type="text/css" media="print">#wpadminbar { display:none; }</style>

        <script type="text/javascript">
            var template_directory = "<?php echo THEMEMAKERS_THEME_URI; ?>/";
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
            //translations
            var lang_enter_correctly = "<?php _e('Please enter correctly', THEMEMAKERS_THEME_FOLDER_NAME); ?>";
            var lang_sended_succsessfully = "<?php _e('Your message has been sent successfully!', THEMEMAKERS_THEME_FOLDER_NAME); ?>";
            var lang_server_failed = "<?php _e('Server failed. Send later', THEMEMAKERS_THEME_FOLDER_NAME); ?>";
        </script>

        <!-- HTML5 Shiv + detect touch events (PLACE IN HEADER ONLY) -->
        <script type="text/javascript" src="<?php echo THEMEMAKERS_THEME_URI; ?>/js/modernizr.custom.js"></script>


        <?php wp_head(); ?>
    </head>

    <?php echo get_option(THEMEMAKERS_THEME_PREFIX . 'tracking_code'); ?>
    <?php
    $page_id = 0;
    if (is_single() OR is_page() OR is_front_page()) {
        global $post;
        $page_id = $post->ID;
    }
    ?>
    <body <?php body_class('color-1 h-style-1 text-1'); ?> style="<?php echo ThemeMakersHelper::get_page_backround($page_id) ?>">

        <!-- - - - - - - - - - - - - - Top Panel - - - - - - - - - - - - - - - - -->

        <div class="top-line clearfix">

            <div class="wrap">

                <span><?php echo ThemeMakersHelper::get_contact_information() ?></span>

            </div><!--/ .wrap-->

        </div><!--/ .top-line-->

        <!-- - - - - - - - - - - - - end Top Panel - - - - - - - - - - - - - - - -->

        <div class="wrap">

            <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->

            <header id="header" class="clearfix">

                <div id="logo">

                    <?php
                    $logo_font = get_option(THEMEMAKERS_THEME_PREFIX . "logo_font");
                    $logo_type = get_option(THEMEMAKERS_THEME_PREFIX . 'logo_type');
                    $logo_text = get_option(THEMEMAKERS_THEME_PREFIX . 'logo_text');
                    $logo_img = get_option(THEMEMAKERS_THEME_PREFIX . 'logo_img');

                    if (!$logo_type AND $logo_text) {
                        ?>
                        <h1><a title="<?php bloginfo('description'); ?>" style="font-family: '<?php echo $logo_font ?>'" href="<?php echo home_url(); ?>"><?php echo $logo_text; ?></a></h1>
                    <?php } else if ($logo_type AND $logo_img) { ?>
                        <a title="<?php bloginfo('description'); ?>" href="<?php echo home_url(); ?>"><img src="<?php echo $logo_img; ?>" alt="<?php bloginfo('description'); ?>" /></a>
                    <?php } else { ?>
                        <a title="<?php bloginfo('description'); ?>" href="<?php echo home_url(); ?>"><img src="<?php echo THEMEMAKERS_THEME_URI; ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
                    <?php } ?>

                </div><!--/ logo-->

                <?php $header_content = get_option(THEMEMAKERS_THEME_PREFIX . "header_content"); ?>

                <?php if ($header_content == 'search'): ?>
                    <?php get_search_form(); ?>
                <?php endif; ?>

                <?php if ($header_content == 'code'): ?>
                    <div class="widget_search clearfix"><?php echo do_shortcode(get_option(THEMEMAKERS_THEME_PREFIX . "header_content_textarea")) ?></div>
                <?php endif; ?>

                <div class="clear"></div>

                <!-- - - - - - - - - - - - - Navigation - - - - - - - - - - - - - - -->

                <nav id="navigation" class="navigation clearfix">

                    <?php wp_nav_menu(array('theme_location' => 'primary', 'container_class' => false)); ?>

                    <div class="widget_on_primary_menu clearfix">
                        <?php if (function_exists('dynamic_sidebar') AND dynamic_sidebar('Primary Menu Place')):else: ?>
                        <?php endif; ?>

                    </div><!--/ .widget_social-->

                </nav><!--/ #navigation-->

                <!-- - - - - - - - - - - - end Navigation - - - - - - - - - - - - - -->

            </header><!--/ #header-->

            <!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->



            <!-- - - - - - - - - - - - - Slider - - - - - - - - - - - - - - - -->


            <?php get_template_part('slider'); ?>


            <!-- - - - - - - - - - - - end Slider - - - - - - - - - - - - - - -->

            <!-- - - - - - - - - - - - Page top - - - - - - - - - - - - - - -->

            <?php
            if (is_object($post) AND (is_single() OR is_page())):
                $page_top = get_post_meta($post->ID, 'page_top', true);

                if (!empty($page_top)) {
                    echo '<div class="top-content clearfix">' . do_shortcode($page_top) . '</div>';
                } else {
                    ?>
                    <style type="text/css">
                        #slider{
                            margin-bottom:0 !important;
                        }
                    </style>
                    <?php
                }
            endif;
            ?>

            <!-- - - - - - - - - - - Page bottom - - - - - - - - - - - - - -->

            <?php
            $sidebar_position = "sbr";
			
			

            $_REQUEST['sidebar_position'] = $sidebar_position;
							
            if (is_single() AND $post->post_type == 'folio') {
                $_REQUEST['sidebar_position'] = 'no_sidebar';
                $sidebar_position = 'no_sidebar';
				
            } else {
				
                $page_sidebar_position = "default";

                if (!is_404() ) {
                    if (is_single() OR is_page()) {
							
                        $page_sidebar_position = get_post_meta(get_the_ID(), 'page_sidebar_position', TRUE);
						
						
                    }
					

                    if (!empty($page_sidebar_position) AND $page_sidebar_position != 'default') {
                        $sidebar_position = $page_sidebar_position;
						
                    } else {
														
                        $sidebar_position = get_option(THEMEMAKERS_THEME_PREFIX . "sidebar_position");
						if ($post->post_type == 'product'){
								$sidebar_position='no_sidebar';
						}
												
                    }

                    if (!$sidebar_position) {
                        $sidebar_position = "sbr";
						
						
                    }
                } else {
                    $sidebar_position = 'no_sidebar';
										
                }
                $_REQUEST['sidebar_position'] = $sidebar_position;
            }
            ?>

            <!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->

            <section class="main <?php echo $sidebar_position ?> clearfix">

                <div class="row">

                    <!-- - - - - - - - - - - - Breadcrumbs  - - - - - - - - - - - - - - -->

                    <?php
                    $hide_breadcrumb = get_option(THEMEMAKERS_THEME_PREFIX . "hide_breadcrumb");
                    $page_have_slider = FALSE;
                    if (is_object($post) AND (is_single() OR is_page())) {
                        $page_settings = Thememakers_Entity_Page_Constructor::get_page_settings($post->ID);


                        if ($page_settings['page_slider_type'] == 'revolution') {
                            if ($page_settings['revolution_slide_group']) {
                                $page_have_slider = TRUE;
                            }
                        }

                        if ($page_settings['page_slider_type'] != 'revolution') {
                            if ($page_settings['page_slider']) {
                                $page_have_slider = TRUE;
                            }
                        }
                    }
                    ?>

                    <?php if (!$hide_breadcrumb AND !is_front_page() AND !$page_have_slider): ?>

                        <div class="breadcrumbs">

                            <a title="<?php _e('Home', THEMEMAKERS_THEME_FOLDER_NAME); ?>" href="<?php echo home_url() ?>"><?php _e('Home', THEMEMAKERS_THEME_FOLDER_NAME); ?></a><?php wp_title(''); ?>

                        </div><!--/ .breadcrumbs-->

                    <?php endif; ?>
                    <!-- - - - - - - - - - - end Breadcrumbs - - - - - - - - - - - - - -->




                    <section id="content" class="ninecol">


                        <?php
                        $_REQUEST['disable_blog_comments'] = get_option(THEMEMAKERS_THEME_PREFIX . "disable_blog_comments");
//blog layout
                        $_REQUEST['blog_layout'] = get_option(THEMEMAKERS_THEME_PREFIX . 'blog_layout');



                        $_REQUEST['excerpt_symbols_count'] = get_option(THEMEMAKERS_THEME_PREFIX . "excerpt_symbols_count");
                        $_REQUEST['excerpt_symbols_count_alternate'] = get_option(THEMEMAKERS_THEME_PREFIX . "excerpt_symbols_count_alternate");
                        if (!$_REQUEST['excerpt_symbols_count']) {
                            $_REQUEST['excerpt_symbols_count'] = 140;
                        }

                        $_REQUEST['show_full_content'] = get_option(THEMEMAKERS_THEME_PREFIX . 'show_full_content');
//*****
                        $_REQUEST['hide_post_metadata'] = get_option(THEMEMAKERS_THEME_PREFIX . 'hide_post_metadata');
						$_REQUEST['hide_post_date'] = get_option(THEMEMAKERS_THEME_PREFIX . 'hide_post_date');
						$_REQUEST['hide_post_author'] = get_option(THEMEMAKERS_THEME_PREFIX . 'hide_post_author');
						$_REQUEST['hide_post_categories'] = get_option(THEMEMAKERS_THEME_PREFIX . 'hide_post_categories');
						$_REQUEST['hide_post_tag'] = get_option(THEMEMAKERS_THEME_PREFIX . 'hide_post_tag');
						
                        /*                         * *** */
                        $_REQUEST['portfolio_hide_exerpt'] = get_option(THEMEMAKERS_THEME_PREFIX . "portfolio_hide_exerpt");
                        $_REQUEST['portfolio_hide_readmore'] = get_option(THEMEMAKERS_THEME_PREFIX . "portfolio_hide_readmore");
                        $_REQUEST['open_folio_featured_img_in_fancy'] = get_option(THEMEMAKERS_THEME_PREFIX . "open_folio_featured_img_in_fancy");
                        ?>