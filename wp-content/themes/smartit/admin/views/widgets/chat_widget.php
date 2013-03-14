<div class="widget widget_chat">
    <?php $unique_id = uniqid(); ?>
    <style type="text/css">

        .chat_<?php echo $unique_id ?> {
            background: -moz-radial-gradient(center, ellipse cover,  <?php echo $instance['banner_bg_color1'] ?> 0%, <?php echo $instance['banner_bg_color2'] ?> 100%); /* FF3.6+ */
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,<?php echo $instance['banner_bg_color1'] ?>), color-stop(100%,<?php echo $instance['banner_bg_color2'] ?>)); /* Chrome,Safari4+ */
            background: -webkit-radial-gradient(center, ellipse cover,  <?php echo $instance['banner_bg_color1'] ?> 0%,<?php echo $instance['banner_bg_color2'] ?> 100%); /* Chrome10+,Safari5.1+ */
            background: -o-radial-gradient(center, ellipse cover,  <?php echo $instance['banner_bg_color1'] ?> 0%,<?php echo $instance['banner_bg_color2'] ?> 100%); /* Opera 12+ */
            background: -ms-radial-gradient(center, ellipse cover,  <?php echo $instance['banner_bg_color1'] ?> 0%,<?php echo $instance['banner_bg_color2'] ?> 100%); /* IE10+ */
            background: radial-gradient(ellipse at center,  <?php echo $instance['banner_bg_color1'] ?> 0%,<?php echo $instance['banner_bg_color2'] ?> 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $instance['banner_bg_color1'] ?>', endColorstr='<?php echo $instance['banner_bg_color2'] ?>',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        }


    </style>

    <div class="widget-container chat chat_<?php echo $unique_id ?>">

        <div class="chat-operator" <?php if (!empty($instance['banner_image'])): ?>style="background-image: url('<?php echo $instance['banner_image'] ?>')"<?php endif; ?>></div>

        <div class="chat-entry">

            <span class="caption-1" style="color: <?php echo $instance['phrase1_color'] ?>"><?php echo $instance['phrase1'] ?></span>
            <span class="caption-2" style="color: <?php echo $instance['phrase2_color'] ?>"><?php echo $instance['phrase2'] ?></span>
            <span class="caption-3" style="color: <?php echo $instance['phrase3_color'] ?>"><?php echo $instance['phrase3'] ?></span>
            <span class="caption-4" style="color: <?php echo $instance['phrase4_color'] ?>"><?php echo $instance['phrase4'] ?></span>

            <a href="<?php echo $instance['button_link'] ?>" class="button" style="color: <?php echo $instance['button_text_color'] ?>; "><?php echo $instance['button_text'] ?></a>

        </div><!--/ .chat-entry-->

    </div><!--/ .widget-container-->

</div><!--/ .widget-container-->



