<?php
wp_enqueue_style("thememakers_theme_mediaelementplayer_css", THEMEMAKERS_THEME_URI . '/js/mediaelement/mediaelementplayer.css');
$unique_id = uniqid();
switch ($type) {
    case 'youtube':
        ?>
        <iframe width="<?php echo $width ?>" height="<?php echo $height ?>" src="http://www.youtube.com/embed/<?php echo $content ?>" frameborder="0" allowfullscreen></iframe>
        <?php
        return "";
        break;
    case 'vimeo':
        ?>
        <iframe src="http://player.vimeo.com/video/<?php echo $content ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=f6e200" width="<?php echo $width ?>" height="<?php echo $height ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        <?php
        break;

    default:
        $no_responsive = false;
        if (isset($no_responsive)) {
            $no_responsive = true;
        }
        ?>       

        <video id="video_<?php echo $unique_id ?>" <?php if (!$no_responsive): ?>style="width: 100%; height: 100%;"<?php endif; ?> width="<?php echo $width ?>" height="<?php echo $height ?>" class="videoplayer" controls="controls" preload="none" style="width: <?php echo $width ?>px; height:<?php echo $height ?>px;" poster="<?php echo $html5_poster ?>">
            <?php if (!empty($src_mp4)): ?>
                <source src="<?php echo $src_mp4 ?>" type="video/mp4" />
            <?php endif; ?>
            <?php if (!empty($src_webm)): ?>
                <source src="<?php echo $src_webm ?>" type="video/webm" />
            <?php endif; ?>
            <?php if (!empty($src_ogg)): ?>
                <source src="<?php echo $src_ogg ?>" type="video/ogg" />
            <?php endif; ?>

            <!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off -->
            <object width="<?php echo $width ?>" height="<?php echo $height ?>" type="application/x-shockwave-flash" data="<?php echo THEMEMAKERS_THEME_URI ?>/js/mediaelement/flashmediaelement.swf">
                <param name="movie" value="<?php echo THEMEMAKERS_THEME_URI ?>/js/mediaelement/flashmediaelement.swf" />
                <param name="flashvars" value="controls=true&file=<?php echo $src_mp4 ?>" />
                <param name="wmode" value="opaque" />
                <img src="<?php echo $html5_poster ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" alt="No video playback capabilities" />
            </object>

        </video>

        <script type="text/javascript">
            jQuery(function() {
                init_video('#video_<?php echo $unique_id ?>', <?php echo $width ?>, <?php echo $height ?>);
            });
        </script>

        <?php
        break;
}
?>

