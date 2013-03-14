<input type="hidden" name="thememakers_meta_saving" value="1" />
<ul>
    <?php foreach ($post_pod_types as $post_pod_type => $post_type_name): ?>

        <li class="post_type_<?php echo $post_pod_type ?>"><input type="radio" name="post_pod_type" value="<?php echo $post_pod_type ?>" <?php if ($current_post_pod_type == $post_pod_type) echo 'checked=""' ?> post-type="<?php echo $post_pod_type ?>" />&nbsp;&nbsp;<?php echo $post_type_name ?></li>

    <?php endforeach; ?>
</ul>


<script type="text/javascript">
    
    jQuery(function(){
        jQuery('[name=post_pod_type]').click(function(){
            var post_pod_type=jQuery(this).attr('post-type'); 
            jQuery('.post_type_conrainer').hide(111);
            jQuery('.post_type_'+post_pod_type+'_conrainer').show(222);
            
        });
     
    })
   
</script>

