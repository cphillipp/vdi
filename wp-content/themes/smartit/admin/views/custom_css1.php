<?php
$links_color = get_option(THEMEMAKERS_THEME_PREFIX . 'links_color');
$heading_font = get_option(THEMEMAKERS_THEME_PREFIX . 'heading_font');
$content_fonts = get_option(THEMEMAKERS_THEME_PREFIX . 'content_fonts');
//colors
//main navigation
$main_nav_bg_color = get_option(THEMEMAKERS_THEME_PREFIX . 'main_nav_bg_color');
$main_nav_def_text_color = get_option(THEMEMAKERS_THEME_PREFIX . 'main_nav_def_text_color');
$main_nav_curr_text_color = get_option(THEMEMAKERS_THEME_PREFIX . 'main_nav_curr_text_color');
$main_nav_hover_text_color = get_option(THEMEMAKERS_THEME_PREFIX . 'main_nav_hover_text_color');

$main_nav_curr_item_bg_color = get_option(THEMEMAKERS_THEME_PREFIX . 'main_nav_curr_item_bg_color');

$main_nav_font = get_option(THEMEMAKERS_THEME_PREFIX . 'main_nav_font');
$main_nav_font_size = get_option(THEMEMAKERS_THEME_PREFIX . 'main_nav_font_size');

//content
$content_text_color = get_option(THEMEMAKERS_THEME_PREFIX . 'content_text_color');
$content_link_hover_color = get_option(THEMEMAKERS_THEME_PREFIX . 'content_link_hover_color');

$content_font_family = get_option(THEMEMAKERS_THEME_PREFIX . 'content_font_family');
$content_font_size = get_option(THEMEMAKERS_THEME_PREFIX . 'content_font_size');

//buttons
$buttons_text_color = get_option(THEMEMAKERS_THEME_PREFIX . 'buttons_text_color');
$buttons_font_family = get_option(THEMEMAKERS_THEME_PREFIX . 'buttons_font_family');
$buttons_font_size = get_option(THEMEMAKERS_THEME_PREFIX . 'buttons_font_size');

//widgets
$widgets_heading_font_family = get_option(THEMEMAKERS_THEME_PREFIX . 'widgets_heading_font_family');
$widgets_heading_font_size = get_option(THEMEMAKERS_THEME_PREFIX . 'widgets_heading_font_size');

$widget_def_title_color = get_option(THEMEMAKERS_THEME_PREFIX . 'widget_def_title_color');
$widget_def_text_color = get_option(THEMEMAKERS_THEME_PREFIX . 'widget_def_text_color');
$widget_def_link_color = get_option(THEMEMAKERS_THEME_PREFIX . 'widget_def_link_color');
$widget_def_link_hover_color = get_option(THEMEMAKERS_THEME_PREFIX . 'widget_def_link_hover_color');

$widget_colored_testimonials_text_color = get_option(THEMEMAKERS_THEME_PREFIX . 'widget_colored_testimonials_text_color');
$widget_colored_testimonials_author_text_color = get_option(THEMEMAKERS_THEME_PREFIX . 'widget_colored_testimonials_author_text_color');

//heding
$h1_font_family = get_option(THEMEMAKERS_THEME_PREFIX . 'h1_font_family');
$h1_font_size = get_option(THEMEMAKERS_THEME_PREFIX . 'h1_font_size');

$h2_font_family = get_option(THEMEMAKERS_THEME_PREFIX . 'h2_font_family');
$h2_font_size = get_option(THEMEMAKERS_THEME_PREFIX . 'h2_font_size');

$h3_font_family = get_option(THEMEMAKERS_THEME_PREFIX . 'h3_font_family');
$h3_font_size = get_option(THEMEMAKERS_THEME_PREFIX . 'h3_font_size');

$h4_font_family = get_option(THEMEMAKERS_THEME_PREFIX . 'h4_font_family');
$h4_font_size = get_option(THEMEMAKERS_THEME_PREFIX . 'h4_font_size');

$h5_font_family = get_option(THEMEMAKERS_THEME_PREFIX . 'h5_font_family');
$h5_font_size = get_option(THEMEMAKERS_THEME_PREFIX . 'h5_font_size');

$h6_font_family = get_option(THEMEMAKERS_THEME_PREFIX . 'h6_font_family');
$h6_font_size = get_option(THEMEMAKERS_THEME_PREFIX . 'h6_font_size');

/* * ************************************************************************************************* */

$header_color = get_option(THEMEMAKERS_THEME_PREFIX . 'header_color');

$logo_text_color = "";
$logo_text_color = get_option(THEMEMAKERS_THEME_PREFIX . 'logo_text_color');

$footer_bg_color = get_option(THEMEMAKERS_THEME_PREFIX . 'footer_bg_color');
$footer_color = get_option(THEMEMAKERS_THEME_PREFIX . 'footer_color');
$footer_widget_title_color = get_option(THEMEMAKERS_THEME_PREFIX . 'footer_widget_title_color');
$footer_widget_link_color = get_option(THEMEMAKERS_THEME_PREFIX . 'footer_widget_link_color');
$footer_widget_link_hover_color = get_option(THEMEMAKERS_THEME_PREFIX . 'footer_widget_link_hover_color');


//*****
?>

/********************************************/

<?php if ($header_color) echo '#header .widget_search {color:' . $header_color . ';}' ?>
<?php if ($logo_text_color) echo '#logo a {color:' . $logo_text_color . ';}' ?>

<?php if ($footer_color) echo '#footer {color:' . $footer_color . ';}' ?>
<?php if ($footer_color) echo '#footer p {color:' . $footer_color . ';}' ?>
<?php if ($footer_bg_color) echo '#footer {background-color:' . $footer_bg_color . ';}' ?>
<?php if ($footer_widget_title_color) echo '#footer .widget-title{color:' . $footer_widget_title_color . ';}' ?>
<?php if ($footer_widget_link_color) echo '#footer a:not(.button) {color:' . $footer_widget_link_color . ';}' ?>
<?php if ($footer_widget_link_hover_color) echo '#footer a:hover{color:' . $footer_widget_link_hover_color . ';}' ?>


<?php if ($links_color) echo 'a {color:' . $links_color . ' ;}'; ?>
<?php if ($heading_font) echo "h1, h2, h3, h4, h5, h6 { font-family: " . $heading_font . ";}"; ?>
<?php if ($content_fonts) echo 'body,p { font-family:' . $content_fonts . ', sans-serif ;}'; ?>	

<?php if (!empty($main_nav_bg_color)): ?>
    #navigation {background: <?php echo $main_nav_bg_color; ?>}
<?php endif; ?>

<?php if (!empty($main_nav_def_text_color)): ?>
    .navigation > div > ul > li > a {color:<?php echo $main_nav_def_text_color ?>;}
<?php endif; ?>

<?php if (!empty($main_nav_curr_text_color)): ?>
    .navigation li.current-menu-item > a,
    .navigation li.current-menu-parent > a,
    .navigation li.current-menu-ancestor > a,
    .navigation li.current_page_item > a, 
    .navigation li.current_page_parent > a, 
    .navigation li.current_page_ancestor > a, 
    .navigation ul ul li.current-menu-item > a,
    .navigation ul ul li.current-menu-parent > a,
    .navigation ul ul li.current-menu-ancestor > a,
    .navigation ul ul li.current_page_item > a, 
    .navigation ul ul li.current_page_parent > a, 
    .navigation ul ul li.current_page_ancestor > a
    {
    color:<?php echo $main_nav_curr_text_color ?>;
    }
<?php endif; ?>

<?php if (!empty($main_nav_hover_text_color)): ?>
    .navigation ul ul li:hover > a {color:<?php echo $main_nav_hover_text_color ?>;}
<?php endif; ?>



<?php if (!empty($main_nav_curr_item_bg_color)): ?>
    .menu-1 .navigation .menu > li.current-menu-item > a, .menu-1 .navigation .menu > ul > li.current-menu-item > a, .menu-1 .navigation .menu > li.current-menu-ancestor > a,
    .menu-1 .navigation .menu > ul > li.current-menu-ancestor > a, .menu-1 .navigation .menu > ul > li.current_page_item > a {
    background: -moz-linear-gradient(top,  <?php echo $main_nav_curr_item_bg_color ?> 0%, #272727 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $main_nav_curr_item_bg_color ?>), color-stop(100%,#272727)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  <?php echo $main_nav_curr_item_bg_color ?> 0%,#272727 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  <?php echo $main_nav_curr_item_bg_color ?> 0%,#272727 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  <?php echo $main_nav_curr_item_bg_color ?> 0%,#272727 100%); /* IE10+ */
    background: linear-gradient(to bottom,  <?php echo $main_nav_curr_item_bg_color ?> 0%,#272727 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $main_nav_curr_item_bg_color ?>', endColorstr='#272727',GradientType=0 ); /* IE6-9 */
    }
<?php endif; ?>


<?php if (!empty($main_nav_font)): ?>
    .navigation > ul > li > a {font-family: <?php echo $main_nav_font ?>;}
<?php endif; ?>
<?php if (!empty($main_nav_font_size)): ?>
    .navigation > ul > li > a {font-size: <?php echo $main_nav_font_size ?>px;}
<?php endif; ?>



<?php if (!empty($content_text_color)): ?>
    #content, #content p {color:<?php echo $content_text_color ?>;}
<?php endif; ?>
<?php if (!empty($content_link_hover_color)): ?>
    #content a:hover, #content a > *:hover {color:<?php echo $content_link_hover_color ?>;}
<?php endif; ?>
<?php if (!empty($content_font_family)): ?>
    #content {font-family:<?php echo $content_font_family ?>;}
<?php endif; ?>
<?php if (!empty($content_font_size)): ?>
    #content {font-size:<?php echo $content_font_size ?>px;}
<?php endif; ?>



<?php if (!empty($buttons_font_family)): ?>
    a.button{font-family:<?php echo $buttons_font_family ?>;}
<?php endif; ?>
<?php if (!empty($buttons_font_size)): ?>
    a.button{font-size:<?php echo $buttons_font_size ?>px;}
<?php endif; ?>


/********************************************************/

<?php if (!empty($widgets_heading_font_family)): ?>
    h3.widget-title{font-family:<?php echo $widgets_heading_font_family ?>;}
<?php endif; ?>
<?php if (!empty($widgets_heading_font_size)): ?>
    h3.widget-title{font-size:<?php echo $widgets_heading_font_size ?>px;}
<?php endif; ?>




<?php if (!empty($widget_def_title_color)): ?>
    #sidebar h3.widget-title {color:<?php echo $widget_def_title_color ?>;}
<?php endif; ?>
<?php if (!empty($widget_def_link_color)): ?>
    #sidebar .widget_recent_comments li a,
    #sidebar .widget_recent_entries li a,
    #sidebar .widget_categories li a,
    #sidebar .widget_archive li a,
    #sidebar .widget_nav_menu li a,
    #sidebar .widget_links li a,
    #sidebar .widget_meta li a,
    #sidebar .widget_pages li a,
    #sidebar .textwidget a,
    #sidebar .tagcloud a,
    #sidebar .jta-tweet-text {
    color:<?php echo $widget_def_link_color ?>;
    }
<?php endif; ?>
<?php if (!empty($widget_def_link_hover_color)): ?>
    #sidebar .widget_recent_comments li a:hover,
    #sidebar .widget_recent_entries li a:hover,
    #sidebar .widget_categories li a:hover,
    #sidebar .widget_archive li a:hover,
    #sidebar .widget_nav_menu li a:hover,
    #sidebar .widget_links li a:hover,
    #sidebar .widget_meta li a:hover,
    #sidebar .widget_pages li a:hover,
    #sidebar .textwidget a:hover,
    #sidebar .tagcloud a:hover {
    color:<?php echo $widget_def_link_hover_color ?>;
    }
<?php endif; ?>

<?php if (!empty($widget_def_text_color)): ?>
    #sidebar .textwidget,
    #sidebar .jta-tweet-text,
    #sidebar .widget_custom_recent_entries,
    #sidebar .widget_custom_recent_entries p,
    #sidebar .widget_recent_projects,
    #sidebar .widget_recent_projects p {color:<?php echo $widget_def_text_color ?>;}
<?php endif; ?>	

/**************************/

<?php if (!empty($widget_colored_testimonials_text_color)): ?>
    #sidebar .quote-text,
    #sidebar .quote-text p,
    #footer .quote-text,
    #footer .quote-text p {color:<?php echo $widget_colored_testimonials_text_color ?>;}
<?php endif; ?>

<?php if (!empty($widget_colored_testimonials_author_text_color)): ?>
    #sidebar .quote-author,
    #footer .quote-author {color:<?php echo $widget_colored_testimonials_author_text_color ?>;}
<?php endif; ?>

/********************************************************/

<?php if (!empty($h1_font_family)): ?>
    h1 {font-family:<?php echo $h1_font_family ?>;}
<?php endif; ?>
<?php if (!empty($h1_font_size)): ?>
    h1 {font-size:<?php echo $h1_font_size ?>px;}
<?php endif; ?>

<?php if (!empty($h2_font_family)): ?>
    h2 {font-family:<?php echo $h2_font_family ?>;}
<?php endif; ?>
<?php if (!empty($h2_font_size)): ?>
    h2 {font-size:<?php echo $h2_font_size ?>px;}
<?php endif; ?>

<?php if (!empty($h3_font_family)): ?>
    h3 {font-family:<?php echo $h3_font_family ?>;}
<?php endif; ?>
<?php if (!empty($h3_font_size)): ?>
    h3 {font-size:<?php echo $h3_font_size ?>px;}
<?php endif; ?>

<?php if (!empty($h4_font_family)): ?>
    h4 {font-family:<?php echo $h4_font_family ?>;}
<?php endif; ?>
<?php if (!empty($h4_font_size)): ?>
    h4 {font-size:<?php echo $h4_font_size ?>px;}
<?php endif; ?>

<?php if (!empty($h5_font_family)): ?>
    h5{font-family:<?php echo $h5_font_family ?>;}
<?php endif; ?>
<?php if (!empty($h5_font_size)): ?>
    h5 {font-size:<?php echo $h5_font_size ?>px;}
<?php endif; ?>

<?php if (!empty($h6_font_family)): ?>
    h6 {font-family:<?php echo $h6_font_family ?>;}
<?php endif; ?>
<?php if (!empty($h6_font_size)): ?>
    h6 {font-size:<?php echo $h6_font_size ?>px;}
<?php endif; ?>

    
    
    