<?php

class ThemeMakersThemeView {

    public static function draw_page($view, $data = array()) {
        @extract($data);
        ob_start();
        include(THEMEMAKERS_THEME_PATH . '/admin/views/header.php' );
        include(THEMEMAKERS_THEME_PATH . '/admin/views/' . $view . '.php' );
        include(THEMEMAKERS_THEME_PATH . '/admin/views/footer.php' );
        return ob_get_clean();
    }

    public static function draw_free_page($pagepath, $data = array()) {
        @extract($data);
        ob_start();
        include($pagepath);
        return ob_get_clean();
    }

    public static function draw_html($view, $data = array()) {
        @extract($data);
        ob_start();
        include(THEMEMAKERS_THEME_PATH . '/admin/views/' . $view . '.php' );
        return ob_get_clean();
    }

}

