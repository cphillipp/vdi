<div class="widget_latest_tweets">
    <script type="text/javascript" src="<?php echo THEMEMAKERS_THEME_URI; ?>/js/jquery.jtweetsanywhere-1.3.1.min.js"></script>
    <?php
    echo $before_widget;
//Widget Title
    if ($instance['title']) {
        echo $before_title . $instance['title'] . $after_title;
    }

    $hash = md5(rand(1, 999));
    ?>

    <div id="twitter_container_<?php echo $hash; ?>"></div>
    

    <script type="text/javascript">
<?php
if ($instance['postcount'] > 20) {
    $instance['postcount'] = 20;
}
?>
        jQuery(document).ready(function() {

            jQuery("#twitter_container_<?php echo $hash; ?>").jTweetsAnywhere({
                count: <?php echo $instance['postcount']; ?>,
                username: "<?php echo $instance['username']; ?>",
                showTweetFeed: {
                    paging: { mode: 'prev-next' }
                }
            });
        });




    </script>

</div>
</div>

