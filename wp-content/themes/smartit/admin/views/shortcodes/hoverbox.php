<?php
$rand_index = uniqid();
?>
<?php if ($type == 'image'): ?>
    <div class="item-with-image" id="hoverbox_<?php echo $rand_index ?>">
        <a href="<?php echo $box_link; ?>" target="<?php echo $box_link_target; ?>" style="background-color: <?php echo $box_bg_color; ?>;">
            <img alt="" src="<?php echo ThemeMakersHelper::resize_image($image_src, $image_width, true, $image_height); ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>">
            <div class="content-item" style="text-align: <?php echo!empty($text_align) ? $text_align : "left" ?>">
                <<?php echo $title_type ?> <?php echo!empty($title_color) ? 'style="color:' . $title_color . '"' : "" ?>><?php echo $title_text ?></<?php echo $title_type ?>>
                <span <?php echo!empty($text_color) ? 'style="color:' . $text_color . '"' : "" ?>><?php echo $text ?></span>
            </div><!--/ .content-item-->
        </a>
    </div>
<?php else: ?>
    <div class="item-with-icon" id="hoverbox_<?php echo $rand_index ?>">
        <a href="<?php echo $box_link; ?>" target="<?php echo $box_link_target; ?>" style="background-color: <?php echo $box_bg_color; ?>;">
            <div class="content-item" style="text-align: <?php echo!empty($text_align) ? $text_align : "left" ?>">
                <div class="temp-icon icon<?php echo $icon_sprite ?>"></div>
                <<?php echo $title_type ?> <?php echo!empty($title_color) ? 'style="color:' . $title_color . '"' : "" ?>><?php echo $title_text ?></<?php echo $title_type ?>>
                <span <?php echo!empty($text_color) ? 'style="color:' . $text_color . '"' : "" ?>><?php echo $text ?></span>
            </div><!--/ .content-item-->
        </a>
    </div>
<?php endif; ?>

<?php if ($box_hover_bg_color): ?>
    <style type="text/css">
        #hoverbox_<?php echo $rand_index ?> > a:hover, #hoverbox_<?php echo $rand_index ?> > a:hover {
            background-color: <?php echo $box_hover_bg_color ?> !important;
        }

        #hoverbox_<?php echo $rand_index ?> > a:hover span{
            color: <?php echo $text_hover_color ?> !important;
        }

        #hoverbox_<?php echo $rand_index ?> > a:hover <?php echo $title_type ?> {
            color: <?php echo $title_hover_color ?> !important;
        }
    </style>
<?php endif; ?>

