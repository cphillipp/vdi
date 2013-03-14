<?php
$portfolio_archive_page_layout = get_option(THEMEMAKERS_THEME_PREFIX . "portfolio_archive_page_layout");

switch ($portfolio_archive_page_layout) {


    case 4:
        $_REQUEST['porfolio_4col_excerpt_symbols_count'] = get_option(THEMEMAKERS_THEME_PREFIX . "porfolio_4col_excerpt_symbols_count");
        if (!$_REQUEST['porfolio_4col_excerpt_symbols_count']) {
            $_REQUEST['porfolio_4col_excerpt_symbols_count'] = 60;
        }
        get_template_part('content', 'portfolio_4');
        break;


    case 6:
        $_REQUEST['porfolio_6col_excerpt_symbols_count'] = get_option(THEMEMAKERS_THEME_PREFIX . "porfolio_6col_excerpt_symbols_count");
        if (!$_REQUEST['porfolio_6col_excerpt_symbols_count']) {
            $_REQUEST['porfolio_6col_excerpt_symbols_count'] = 40;
        }
        get_template_part('content', 'portfolio_6');
        break;

    default:
        $_REQUEST['porfolio_3col_excerpt_symbols_count'] = get_option(THEMEMAKERS_THEME_PREFIX . "porfolio_3col_excerpt_symbols_count");
        if (!$_REQUEST['porfolio_3col_excerpt_symbols_count']) {
            $_REQUEST['porfolio_3col_excerpt_symbols_count'] = 80;
        }       
        get_template_part('content', 'portfolio_3');
        break;
}
?>

