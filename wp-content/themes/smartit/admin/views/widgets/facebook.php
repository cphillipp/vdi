<div class="widget widget_likebox" data-place="2">
    <?php if ($instance['title'] != '') { ?>
        <h3 class="widget-title"><?php echo $instance['title']; ?></h3>
    <?php } ?>
    <div class="widget-container">
        <iframe src="http://www.facebook.com/plugins/likebox.php?id=<?php echo $instance['pageID']; ?>&connections=<?php echo $instance['connection']; ?>&width=240&height=<?php echo $instance['height']; ?>&header=<?php echo $instance['header'] == "Yes" ? 1 : 0 ?>"   style="width:240px; height:<?php echo $instance['height']; ?>px" ></iframe>
    </div>
</div>
