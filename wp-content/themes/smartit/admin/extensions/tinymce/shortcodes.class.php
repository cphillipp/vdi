<?php

// load wordpress
require_once('tinymce.init.php');

class tmk_shortcodes {

    var $conf;
    var $popup;
    var $params;
    var $shortcode;
    var $cparams;
    var $cshortcode;
    var $popup_title;
    var $no_preview;
    var $has_child;
    var $output;
    var $errors;

    function __construct($popup) {
        if (file_exists(dirname(__FILE__) . '/config.php')) {
            $this->conf = dirname(__FILE__) . '/config.php';
            $this->popup = $popup;

            $this->formate_shortcode();
        } else {
            $this->append_error('Config file does not exist');
        }
    }

    function formate_shortcode() {
        // get config file
        require_once( $this->conf );

        if (isset($tmk_shortcodes[$this->popup]['child_shortcode']))
            $this->has_child = true;

        if (isset($tmk_shortcodes) && is_array($tmk_shortcodes)) {
            //Shortcode config
            $this->params = $tmk_shortcodes[$this->popup]['params'];
            $this->shortcode = $tmk_shortcodes[$this->popup]['shortcode'];
            $this->popup_title = $tmk_shortcodes[$this->popup]['popup_title'];

            //JS
            $this->append_output("\n" . '<div id="_tmk_shortcode" class="hidden">' . $this->shortcode . '</div>');
            $this->append_output("\n" . '<div id="_tmk_popup" class="hidden">' . $this->popup . '</div>');

            //Preview
            if (isset($tmk_shortcodes[$this->popup]['no_preview']) && $tmk_shortcodes[$this->popup]['no_preview']) {
                $this->append_output("\n" . '<div id="_tmk_preview" class="hidden">false</div>');
                $this->no_preview = true;
            }

            //Filters
            foreach ($this->params as $pkey => $param) {
                // prefix the fields names and ids with tmk_
                $pkey = 'tmk_' . $pkey;

                // popup form row start
                $row_start = '<tbody>' . "\n";
                $row_start .= '<tr class="form-row clearfix">' . "\n";
                $row_start .= '<td class="label">' . @$param['label'] . '</td>' . "\n";
                $row_start .= '<td class="field">' . "\n";

                // popup form row end
                $row_end = '<span class="tmk-form-desc">' . @$param['desc'] . '</span>' . "\n";
                $row_end .= '</td>' . "\n";
                $row_end .= '</tr>' . "\n";
                $row_end .= '</tbody>' . "\n";

                switch ($param['type']) {
                    case 'text' :

                        // prepare
                        $output = $row_start;
                        $output .= '<input type="text" class="tmk-form-text tmk-input" name="' . $pkey . '" id="' . $pkey . '" value="' . @$param['std'] . '" />' . "\n";
                        $output .= $row_end;

                        // append
                        $this->append_output($output);

                        break;


                    case 'color' :

                        // prepare
                        //wp_enqueue_script('admin_general_js', THEMEMAKERS_THEME_URI.'admin/js/general.js');
                        $output = $row_start;
                        $output .= '<input type="text" class="tmk-form-text tmk-input colorpicker_input_field text" name="' . $pkey . '" id="' . $pkey . '" value="' . @$param['std'] . '" />' . "\n";
                        $output .= $row_end;

                        // append
                        $this->append_output($output);
                        ?>
                        <script type="text/javascript">

                            jQuery(function() {
                                init_color_input(jQuery(".colorpicker_input_field"));
                            });

                        </script>
                        <?php

                        break;

                    case 'textarea' :

                        // prepare
                        $output = $row_start;
                        $output .= '<textarea rows="10" cols="30" name="' . $pkey . '" id="' . $pkey . '" class="tmk-form-textarea tmk-input">' . $param['std'] . '</textarea>' . "\n";
                        $output .= $row_end;

                        // append
                        $this->append_output($output);

                        break;

                    case 'select' :

                        // prepare
                        $output = $row_start;
                        $output .= '<select name="' . $pkey . '" id="' . $pkey . '" class="tmk-form-select tmk-input">' . "\n";

                        foreach ($param['options'] as $value => $option) {
                            $output .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
                        }

                        $output .= '</select>' . "\n";
                        $output .= $row_end;

                        // append
                        $this->append_output($output);

                        break;

                    case 'checkbox' :

                        // prepare
                        $output = $row_start;
                        $output .= '<label for="' . $pkey . '" class="tmk-form-checkbox">' . "\n";
                        $output .= '<input type="checkbox" class="tmk-input" name="' . $pkey . '" id="' . $pkey . '" ' . ( $param['std'] ? 'checked' : '' ) . ' />' . "\n";
                        $output .= ' ' . $param['checkbox_text'] . '</label>' . "\n";
                        $output .= $row_end;

                        // append
                        $this->append_output($output);

                        break;

                    case 'title_icons' :
                        $dir_list = ThemeMakersHelper::getDirectoryList(THEMEMAKERS_THEME_PATH . '/images/icons/title_icons/');
                        // prepare
                        $output = $row_start;
                        $output .= '<div class="">' . "\n";
                        foreach ($dir_list as $key => $img_path) {
                            $output.='<a onclick="return set_icon_url(this);" href="' . THEMEMAKERS_THEME_URI . '/images/icons/title_icons/' . $img_path . '"><img src="' . THEMEMAKERS_THEME_URI . '/images/icons/title_icons/' . $img_path . '" alt="" /></a>';
                        }
                        ?>
                        <script type="text/javascript">
                            function set_icon_url(obj) {
                                jQuery("[name=tmk_title_icon]").val(jQuery(obj).attr("href"));
                                jQuery("[name=tmk_title_icon]").trigger('change');
                                jQuery(obj).parent().find("img").css("border", "none");
                                jQuery(obj).find("img").eq(0).css("border", "solid 1px #000");
                                return false;
                            }
                        </script>
                        <?php

                        $output .= '</div>' . "\n";
                        $output .= $row_end;

                        // append
                        $this->append_output($output);

                        break;

                    case 'inlinebox_icons' :
                        $dir_list = ThemeMakersHelper::getDirectoryList(THEMEMAKERS_THEME_PATH . '/images/icons/inlinebox_icons/');
                        // prepare
                        $output = $row_start;
                        $output .= '<div class="">' . "\n";
                        foreach ($dir_list as $key => $img_path) {
                            $output.='<a onclick="return set_icon_url(this);" href="' . THEMEMAKERS_THEME_URI . '/images/icons/inlinebox_icons/' . $img_path . '"><img src="' . THEMEMAKERS_THEME_URI . '/images/icons/inlinebox_icons/' . $img_path . '" alt="" /></a>';
                        }
                        ?>
                        <script type="text/javascript">
                            function set_icon_url(obj) {
                                jQuery("[name=tmk_title_icon]").val(jQuery(obj).attr("href"));
                                jQuery("[name=tmk_title_icon]").trigger('change');
                                jQuery(obj).parent().find("img").css("border", "none");
                                jQuery(obj).find("img").eq(0).css("border", "solid 1px #000");
                                return false;
                            }
                        </script>
                        <?php

                        $output .= '</div>' . "\n";
                        $output .= $row_end;

                        // append
                        $this->append_output($output);

                        break;


                    case 'upload' :

                        // prepare
                        $output = $row_start;
                        $output .= '<input style="width:262px;float:left; margin-right:5px;" type="text" class="tmk-form-text tmk-input" name="' . $pkey . '" id="' . $pkey . '" value="' . @$param['std'] . '" /> <a style="float:left;" href="#" class="media_gallery_button thememakers_options_button" title="">' . __('Browse', THEMEMAKERS_THEME_FOLDER_NAME) . '</a>' . "\n";
                        $output .= $row_end;

                        // append
                        $this->append_output($output);
                        break;


                    case 'upload_audio' :

                        // prepare
                        $output = $row_start;
                        $output .= '<input style="width:262px;float:left; margin-right:5px;" type="text" class="tmk-form-text tmk-input" name="' . $pkey . '" id="' . $pkey . '" value="' . @$param['std'] . '" /> <a style="float:left;" href="#" class="audio_gallery_button thememakers_options_button" title="">' . __('Upload', THEMEMAKERS_THEME_FOLDER_NAME) . '</a>' . "\n";
                        $output .= $row_end;

                        // append
                        $this->append_output($output);
                        break;

                    case 'upload_video' :

                        // prepare
                        $output = $row_start;
                        $output .= '<input style="width:262px;float:left; margin-right:5px;" type="text" class="tmk-form-text tmk-input" name="' . $pkey . '" id="' . $pkey . '" value="' . @$param['std'] . '" /> <a style="float:left;" href="#" class="video_gallery_button thememakers_options_button" title="">' . __('Upload', THEMEMAKERS_THEME_FOLDER_NAME) . '</a>' . "\n";
                        $output .= $row_end;

                        // append
                        $this->append_output($output);
                        break;
                }
            }

            // checks if has a child shortcode
            if (isset($tmk_shortcodes[$this->popup]['child_shortcode'])) {
                // set child shortcode
                $this->cparams = $tmk_shortcodes[$this->popup]['child_shortcode']['params'];
                $this->cshortcode = $tmk_shortcodes[$this->popup]['child_shortcode']['shortcode'];

                // popup parent form row start
                $prow_start = '<tbody>' . "\n";
                $prow_start .= '<tr class="form-row has-child">' . "\n";
                $prow_start .= '<td><a href="#" id="form-child-add" class="button-secondary">' . $tmk_shortcodes[$this->popup]['child_shortcode']['clone_button'] . '</a>' . "\n";
                $prow_start .= '<div class="child-clone-rows">' . "\n";

                // for js use
                $prow_start .= '<div id="_tmk_cshortcode" class="hidden">' . $this->cshortcode . '</div>' . "\n";

                // start the default row
                $prow_start .= '<div class="child-clone-row">' . "\n";
                $prow_start .= '<ul class="child-clone-row-form">' . "\n";

                // add $prow_start to output
                $this->append_output($prow_start);

                foreach ($this->cparams as $cpkey => $cparam) {

                    // prefix the fields names and ids with tmk_
                    $cpkey = 'tmk_' . $cpkey;

                    // popup form row start
                    $crow_start = '<li class="child-clone-row-form-row">' . "\n";
                    $crow_start .= '<div class="child-clone-row-label">' . "\n";
                    $crow_start .= '<label>' . $cparam['label'] . '</label>' . "\n";
                    $crow_start .= '</div>' . "\n";
                    $crow_start .= '<div class="child-clone-row-field">' . "\n";

                    // popup form row end
                    $crow_end = '<span class="child-clone-row-desc">' . $cparam['desc'] . '</span>' . "\n";
                    $crow_end .= '</div>' . "\n";
                    $crow_end .= '</li>' . "\n";

                    switch ($cparam['type']) {
                        case 'text' :

                            // prepare
                            $coutput = $crow_start;
                            $coutput .= '<input type="text" class="tmk-form-text tmk-cinput" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" />' . "\n";
                            $coutput .= $crow_end;

                            // append
                            $this->append_output($coutput);

                            break;


                        case 'color' :

                            // prepare
                            //wp_enqueue_script('admin_general_js', THEMEMAKERS_THEME_URI.'admin/js/general.js');
                            $coutput = $crow_start;
                            $coutput .= '<input type="text" class="tmk-form-text tmk-cinput colorpicker_input text" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" />' . "\n";
                            $coutput .= $crow_end;

                            // append
                            $this->append_output($coutput);

                            break;

                        case 'textarea' :

                            // prepare
                            $coutput = $crow_start;
                            $coutput .= '<textarea rows="10" cols="30" name="' . $cpkey . '" id="' . $cpkey . '" class="tmk-form-textarea tmk-cinput">' . $cparam['std'] . '</textarea>' . "\n";
                            $coutput .= $crow_end;

                            // append
                            $this->append_output($coutput);

                            break;

                        case 'select' :

                            // prepare
                            $coutput = $crow_start;
                            $coutput .= '<select name="' . $cpkey . '" id="' . $cpkey . '" class="tmk-form-select tmk-cinput">' . "\n";

                            foreach ($cparam['options'] as $value => $option) {
                                $coutput .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
                            }

                            $coutput .= '</select>' . "\n";
                            $coutput .= $crow_end;

                            // append
                            $this->append_output($coutput);

                            break;

                        case 'checkbox' :

                            // prepare
                            $coutput = $crow_start;
                            $coutput .= '<label for="' . $cpkey . '" class="tmk-form-checkbox">' . "\n";
                            $coutput .= '<input type="checkbox" class="tmk-cinput" name="' . $cpkey . '" id="' . $cpkey . '" ' . ( $cparam['std'] ? 'checked' : '' ) . ' />' . "\n";
                            $coutput .= ' ' . $cparam['checkbox_text'] . '</label>' . "\n";
                            $coutput .= $crow_end;

                            // append
                            $this->append_output($coutput);
                            break;

                        case 'title_icons' :
                            $dir_list = ThemeMakersHelper::getDirectoryList(THEMEMAKERS_THEME_PATH . '/images/icons/title_icons/');
                            // prepare
                            $coutput = $crow_start;
                            $coutput .= '<div class="">' . "\n";
                            $coutput .= '<input type="text" class="tmk-form-text tmk-cinput" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" /><br /><br />' . "\n";

                            foreach ($dir_list as $key => $img_path) {
                                $coutput.='<a onclick="return set_icon_url(this);" href="' . THEMEMAKERS_THEME_URI . '/images/icons/title_icons/' . $img_path . '"><img src="' . THEMEMAKERS_THEME_URI . '/images/icons/title_icons/' . $img_path . '" alt="" /></a>';
                            }
                            $coutput.='
                            <script type="text/javascript">
                                function set_icon_url(obj){
                                    jQuery("[name=' . $pkey . ']").val(jQuery(obj).attr("href"));
                                    jQuery(obj).parent().find("img").css("border","none");
                                    jQuery(obj).find("img").eq(0).css("border","solid 1px #000");
                                    return false;
                                }
                            </script>
                            ';
                            $coutput .= '</div>' . "\n";
                            $coutput .= $crow_end;

                            // append
                            $this->append_output($coutput);

                            break;


                        case 'inlinebox_icons' :
                            $dir_list = ThemeMakersHelper::getDirectoryList(THEMEMAKERS_THEME_PATH . '/images/icons/inlinebox_icons/');
                            // prepare
                            $coutput = $crow_start;
                            $coutput .= '<div class="">' . "\n";
                            $coutput .= '<input type="text" class="tmk-form-text tmk-cinput" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" /><br /><br />' . "\n";

                            foreach ($dir_list as $key => $img_path) {
                                $coutput.='<a onclick="return set_icon_url(this);" href="' . THEMEMAKERS_THEME_URI . '/images/icons/inlinebox_icons/' . $img_path . '"><img src="' . THEMEMAKERS_THEME_URI . '/images/icons/inlinebox_icons/' . $img_path . '" alt="" /></a>';
                            }
                            $coutput.='
                            <script type="text/javascript">
                                function set_icon_url(obj){
                                    jQuery("[name=' . $pkey . ']").val(jQuery(obj).attr("href"));
                                    jQuery(obj).parent().find("img").css("border","none");
                                    jQuery(obj).find("img").eq(0).css("border","solid 1px #000");
                                    return false;
                                }
                            </script>
                            ';
                            $coutput .= '</div>' . "\n";
                            $coutput .= $crow_end;

                            // append
                            $this->append_output($coutput);

                            break;

                        case 'upload' :

                            // prepare
                            $output = $crow_start;
                            $output .= '<input type="text" class="tmk-form-text tmk-input" name="' . $ckey . '" id="' . $ckey . '" value="' . @$cparam['std'] . '" /> <a href="#" class="button_upload thememakers_options_button" title="">' . __('Choose', THEMEMAKERS_THEME_FOLDER_NAME) . '</a>' . "\n";
                            $output .= $crow_end;

                            // append
                            $this->append_output($coutput);
                            break;

                        case 'upload_audio' :

                            // prepare
                            $output = $crow_start;
                            $output .= '<input type="text" class="tmk-form-text tmk-input" name="' . $ckey . '" id="' . $ckey . '" value="' . @$cparam['std'] . '" /> <a href="#" class="audio_gallery_button thememakers_options_button" title="">' . __('Upload', THEMEMAKERS_THEME_FOLDER_NAME) . '</a>' . "\n";
                            $output .= $crow_end;

                            // append
                            $this->append_output($coutput);
                            break;

                        case 'upload_video' :

                            // prepare
                            $output = $crow_start;
                            $output .= '<input type="text" class="tmk-form-text tmk-input" name="' . $ckey . '" id="' . $ckey . '" value="' . @$cparam['std'] . '" /> <a href="#" class="video_gallery_button thememakers_options_button" title="">' . __('Upload', THEMEMAKERS_THEME_FOLDER_NAME) . '</a>' . "\n";
                            $output .= $crow_end;

                            // append
                            $this->append_output($coutput);
                            break;
                    }
                }

                // popup parent form row end
                $prow_end = '</ul>' . "\n";  // end .child-clone-row-form
                $prow_end .= '<a href="#" class="child-clone-row-remove">Remove</a>' . "\n";
                $prow_end .= '</div>' . "\n";  // end .child-clone-row


                $prow_end .= '</div>' . "\n";  // end .child-clone-rows
                $prow_end .= '</td>' . "\n";
                $prow_end .= '</tr>' . "\n";
                $prow_end .= '</tbody>' . "\n";

                // add $prow_end to output
                $this->append_output($prow_end);
            }
        }
    }

    function append_output($output) {
        $this->output = $this->output . "\n" . $output;
    }

    function reset_output($output) {
        $this->output = '';
    }

    function append_error($error) {
        $this->errors = $this->errors . "\n" . $error;
    }

}

