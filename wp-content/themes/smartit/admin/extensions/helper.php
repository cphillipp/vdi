<?php

class ThemeMakersHelper {

    public static function get_post_featured_image($post_id, $w = 0, $crop = false, $h = 0) {
        $src = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'single-post-thumbnail');

        $url = THEMEMAKERS_THEME_URI . '/admin/extensions/timthumb.php?src=' . urlencode($src[0]);

        $w = intval($w);
        if ($w) {
            if ($crop AND $h = intval($h)) {
                $url.='&w=' . $w . '&h=' . $h . '';
            } else {
                $url.='&w=' . $w;
            }
        }

        return $url;
    }

    public static function resize_image($src, $w = 0, $crop = false, $h = 0) {

        $url = THEMEMAKERS_THEME_URI . '/admin/extensions/timthumb.php?src=' . urlencode($src);

        $w = intval($w);
        if ($w) {
            if ($crop AND $h = intval($h)) {
                $url.='&w=' . $w . '&h=' . $h . '&a=t';
            } else {
                $url.='&w=' . $w;
            }
        }

        return $url;
    }

    public static function get_contact_information() {
        $contact_info = get_option(THEMEMAKERS_THEME_PREFIX . 'contact_info');
        return $contact_info;
    }

//Custom page navigation
    public static function pagenavi($query = null) {
        global $wp_query, $wp_rewrite;
        if (!$query)
            $query = $wp_query;
        $pages = '';
        $max = $query->max_num_pages;
        if (!$current = get_query_var('paged'))
            $current = 1;
        $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
        $a['total'] = $max;
        $a['current'] = $current;

        $total = 1; //1 - display the text "Page N of N", 0 - not display
        $a['mid_size'] = 5; //how many links to show on the left and right of the current
        $a['end_size'] = 1; //how many links to show in the beginning and end
        $a['prev_text'] = ''; //text of the "Previous page" link
        $a['next_text'] = ''; //text of the "Next page" link
        //if ($total == 1 && $max > 1)
        //$pages = '<span class="pages">Page (' . $current . ' ' . __('of', THEMEMAKERS_THEME_FOLDER_NAME) . ' ' . $max . ')</span>';

        echo $pages . paginate_links($a);
    }

    public function add_comment() {
        if (!empty($_REQUEST['comment_content'])) {
            $time = current_time('mysql');
            $user = get_userdata(get_current_user_id());
            $data = array(
                'comment_post_ID' => $_REQUEST['comment_post_ID'],
                'comment_author' => $user->data->user_nicename,
                'comment_author_email' => $user->data->user_email,
                'comment_author_url' => $user->data->user_url,
                'comment_content' => $_REQUEST['comment_content'],
                'comment_parent' => $_REQUEST['comment_parent'],
                'user_id' => $user->data->ID,
                'comment_date' => $time,
            );

            echo wp_insert_comment($data);
        }

        exit;
    }

    public static function getDirectoryList($directory) {

        // create an array to hold directory list
        $results = array();

        // create a handler for the directory
        $handler = opendir($directory);

        // open directory and walk through the filenames
        while ($file = readdir($handler)) {

            // if file isn't this directory or its parent, add it to the results
            if ($file != "." && $file != "..") {
                $results[] = $file;
            }
        }

        // tidy up: close the handler
        closedir($handler);

        // done!
        return $results;
    }

    public static function get_url_data($url) {
        $ch = curl_init();
        $timeout = 5;
        $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public static function cut_text($text, $charlength) {
        $charlength++;

        if (mb_strlen($text) > $charlength) {
            $subex = mb_substr($text, 0, $charlength);
            $exwords = explode(' ', $subex);
            $excut = - ( mb_strlen($exwords[count($exwords) - 1]) );
            if ($excut < 0) {
                return mb_substr($subex, 0, $excut);
            } else {
                return $subex;
            }
        } else {
            return $text;
        }
    }

    //for THEMEMAKERS_MEDIAGALLERY
    public function get_mediagallery() {
        $query_images_args = array(
            'post_type' => 'attachment', 'post_mime_type' => 'image', 'post_status' => 'inherit', 'posts_per_page' => -1,
        );

        $query_images = new WP_Query($query_images_args);
        $images = array();
        foreach ($query_images->posts as $key => $image) {
            $images[$key]['image_url'] = $image->guid;
            $images[$key]['thumb'] = ThemeMakersHelper::resize_image($image->guid, 150, true, 150);
        }

        echo json_encode($images);
        exit;
    }

    public function get_audio_mediagallery() {
        $query_audio_args = array(
            'post_type' => 'attachment', 'post_mime_type' => 'audio', 'post_status' => 'inherit', 'posts_per_page' => -1,
        );

        $query_audio = new WP_Query($query_audio_args);
        $files = array();
        foreach ($query_audio->posts as $key => $file) {
            $files[$key]['file_url'] = $file->guid;
            $files[$key]['file_name'] = $file->post_title;
        }

        echo json_encode($files);
        exit;
    }

    public function get_video_mediagallery() {
        $query_video_args = array(
            'post_type' => 'attachment', 'post_mime_type' => 'video', 'post_status' => 'inherit', 'posts_per_page' => -1,
        );

        $query_video = new WP_Query($query_video_args);
        $files = array();
        foreach ($query_video->posts as $key => $file) {
            $files[$key]['file_url'] = $file->guid;
            $files[$key]['file_name'] = $file->post_title;
        }

        echo json_encode($files);
        exit;
    }

    public static function sanitize_quotes($str) {
        $str = str_replace("'", '\'', $str);
        $str = str_replace('"', "\"", $str);
        return $str;
    }

    //for skeleton css framework
    public static function convert_css_class_name($num, $framework = 'skeleton') {
        $class_names = array(
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen'
        );

        return $class_names[$num];
    }

    public static function get_theme_buttons() {
        return array(
            'orange' => __('Default', THEMEMAKERS_THEME_FOLDER_NAME),
        );
    }

    public static function get_theme_buttons_sizes() {
        return array(
            'more' => __('Small', THEMEMAKERS_THEME_FOLDER_NAME),
            'medium' => __('Medium', THEMEMAKERS_THEME_FOLDER_NAME),
            'large' => __('Large', THEMEMAKERS_THEME_FOLDER_NAME)
        );
    }

    public static function quotes_shield($text) {
        $text = str_replace("\'", "&#039;", $text);
        $text = str_replace("'", "&#039;", $text);
        $text = str_replace('"', "&quot;", $text);

        return $text;
    }

    public static function db_quotes_shield($data) {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $data[$key] = self::db_quotes_shield($value);
                } else {
                    $value = stripslashes($value);
                    $value = str_replace('\"', '"', $value);
                    $value = str_replace("\'", "'", $value);
                    $data[$key] = $value;
                }
            }
        }

        return $data;
    }

    public static function get_unique_ids() {
        $result = array();
        for ($i = 0; $i < 5; $i++) {
            $result[] = uniqid();
        }

        echo json_encode($result);
        exit;
    }

    public static function format_post_date() {
        $date_string = get_the_date();
        $date_string_exploded = explode('/', $date_string);
        if (count($date_string_exploded) > 1) {
            $date_string_exploded[0] = '<span>' . $date_string_exploded[0] . '</span>';
            $date_string = implode('/', $date_string_exploded);
        } else {
            $date_string_exploded = explode(' ', $date_string);
            $date_string_exploded[0] = '<span>' . $date_string_exploded[0] . '</span>';
            $date_string = implode(' ', $date_string_exploded);
        }

        return $date_string;
    }

    public static function format_content_data($content) {
        global $shortcode_tags;
        global $orig_shortcode_tags;
        $shortcode_tags = $orig_shortcode_tags;
        $content = do_shortcode(get_the_content());
        remove_all_shortcodes();
        return $content;
    }

    public static function get_page_backround($page_id) {
        if ($page_id) {
            $page_bg = Thememakers_Entity_Page_Constructor::get_page_settings($page_id);

            if ($page_bg['pagebg_type'] == "image") {
                if (!empty($page_bg['pagebg_image'])) {

                    if (!$page_bg['pagebg_type_image_option']) {
                        $page_bg['pagebg_type_image_option'] = "repeat";
                    }

                    switch ($page_bg['pagebg_type_image_option']) {
                        case "repeat-x":
                            if (!empty($page_bg['pagebg_image'])) {
                                return "background: url(" . $page_bg['pagebg_image'] . ") repeat-x 0 0";
                            } else {
                                return "";
                            }
                            break;

                        case "fixed":
                            if (!empty($page_bg['pagebg_image'])) {
                                return "background: url(" . $page_bg['pagebg_image'] . ") no-repeat center top fixed;";
                            } else {
                                return "";
                            }
                            break;

                        default:
                            if (!empty($page_bg['pagebg_image'])) {
                                return "background: url(" . $page_bg['pagebg_image'] . ") repeat 0 0";
                            } else {
                                return "";
                            }
                            break;
                    }
                }
            }

            if ($page_bg['pagebg_type'] == "color") {
                if (!empty($page_bg['pagebg_color'])) {
                    return "background: " . $page_bg['pagebg_color'];
                }
            }

            return self::draw_body_bg();
        } else {
            return self::draw_body_bg();
        }
    }

    private static function draw_body_bg() {
        $disable_body_bg = get_option(THEMEMAKERS_THEME_PREFIX . "disable_body_bg");
        if (!$disable_body_bg) {
            $body_pattern = get_option(THEMEMAKERS_THEME_PREFIX . "body_pattern");
            $body_pattern_custom_color = get_option(THEMEMAKERS_THEME_PREFIX . "body_pattern_custom_color");
            $body_pattern_selected = (int) get_option(THEMEMAKERS_THEME_PREFIX . "body_pattern_selected");
            $body_bg_color_selected = get_option(THEMEMAKERS_THEME_PREFIX . "body_bg_color");

            if ($body_pattern_selected == 0 OR $body_pattern_selected == 1) {
                if (!empty($body_pattern)) {
                    return "background: url(" . $body_pattern . ") repeat 0 0 " . $body_bg_color_selected . ";";
                } else {
                    return "";
                }
            } else {
                return "background: " . $body_pattern_custom_color;
            }
        }
    }

}

