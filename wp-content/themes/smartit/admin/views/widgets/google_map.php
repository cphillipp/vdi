<div class="widget widget_gmap">

    <h3 class="widget-title"><?php echo $instance['title'] ?></h3>

    <?php echo do_shortcode('[gmap width="' . $instance['width'] . '" height="' . $instance['height'] . '" latitude="' . $instance['latitude'] . '" longitude="' . $instance['longitude'] . '" zoom="' . $instance['zoom'] . '" controls="" scrollwheel="' . ($instance['scrollwheel'] == "true" ? 1 : 0) . '" maptype="' . $instance['maptype'] . '" marker="' . ($instance['marker'] == "true" ? 1 : 0) . '" popup="' . ($instance['popup'] == "true" ? 1 : 0) . '"]' . $instance['html'] . '[/gmap]'); ?>


</div><!--/ .widget-container-->
