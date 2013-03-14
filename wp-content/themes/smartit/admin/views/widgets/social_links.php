<div class="widget widget_social clearfix">
    <?php if ($instance['title'] != '') { ?>
        <h3 class="widget-title"><?php echo $instance['title']; ?></h3>
    <?php } ?>

    <ul class="social-icons clearfix">

        <?php if ($instance['facebook_links'] != '') { ?>
            <li data-tooltip="<?php echo $instance['facebook_tooltip']; ?>" class="facebook">
                <a target="_blank" href="<?php echo $instance['facebook_links']; ?>"><span></span></a>
            </li>
        <?php } ?>
        <?php if ($instance['twitter_links'] != '') { ?>
            <li data-tooltip="<?php echo $instance['twitter_tooltip']; ?>" class="twitter">
                <a target="_blank" href="<?php echo $instance['twitter_links']; ?>"><span></span></a>
            </li>
        <?php } ?>

        <?php if ($instance['youtube_links'] != '') { ?>
            <li data-tooltip="<?php echo $instance['youtube_tooltip']; ?>" class="youtube">
                <a target="_blank" href="<?php echo $instance['youtube_links']; ?>"><span></span></a>
            </li>
        <?php } ?>

        <?php if ($instance['show_rss_tooltip'] == 'true') { ?>
            <li data-tooltip="<?php echo $instance['rss_tooltip']; ?>" class="rss">
                <a href="<?php
        if (get_option(THEMEMAKERS_THEME_PREFIX . 'feedburner')) {
            echo get_option(THEMEMAKERS_THEME_PREFIX . 'feedburner');
        } else {
            bloginfo('rss2_url');
        }
            ?>">
                       <span></span>
                </a>
            </li>
        <?php } ?>

    </ul><!--/ .social-list-->		

</div><!--/ .widget_social-->

