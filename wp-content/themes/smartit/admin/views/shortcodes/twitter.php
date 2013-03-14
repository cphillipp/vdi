 <?php wp_enqueue_script('thememakers_theme_jtweetsanywhere', THEMEMAKERS_THEME_URI . '/js/jquery.jtweetsanywhere-1.3.1.min.js'); ?>


<div class="widget_latest_tweets">
   
    <?php $unique_id = uniqid(); ?>

    <div id="twitter_container_<?php echo $unique_id; ?>"></div>

    <script type="text/javascript">
    jQuery(document).ready(function() {

        jQuery("#twitter_container_<?php echo $unique_id; ?>").jTweetsAnywhere({
            count: <?php echo $count ?>,
            username: "<?php echo $twitter ?>",
            showTweetFeed: {
                paging: { mode: 'prev-next' }
            }
        });
    });




    </script>

</div>