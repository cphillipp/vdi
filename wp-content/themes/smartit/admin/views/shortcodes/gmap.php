<div class="google_map" id="google_map_<?php echo $google_map_id ?>" style="width: <?php echo $width ?>px; height: <?php echo $height ?>px;"></div>

<script type="text/javascript">
    jQuery(function(){
        gmt_init_map(<?php echo $latitude ?>,<?php echo $longitude ?>, "google_map_<?php echo $google_map_id ?>", <?php echo $zoom ?>, "<?php echo $maptype ?>","<?php echo $content ?>","<?php echo $marker ?>","<?php echo $popup ?>","<?php echo $scrollwheel ?>",<?php echo $js_controls ?>);
    });
</script>
