<?php

echo $before_widget;

//Widget Title
if ($instance['title']) {
	echo $before_title . $instance['title'] . $after_title;
}

$uniq_id = uniqid();

?>

<?php wp_enqueue_script("jflickrfeed.min.js", THEMEMAKERS_THEME_URI . "/js/jflickrfeed.min.js") ?>

<ul id="flickr-badge-<?php echo $uniq_id; ?>" class="clearfix flickr-badge"></ul>

	<a class="button orange" target="_blank" href="http://www.flickr.com/photos/<?php echo $instance['username']; ?>">
		<?php _e('View more photos', THEMEMAKERS_THEME_FOLDER_NAME); ?> 
	</a>
	
<script type="text/javascript">
    jQuery(document).ready(function() {
        /* Flickr Photos --> Begin */	
        jQuery('ul#flickr-badge-<?php echo $uniq_id; ?>').jflickrfeed({
            limit: <?php echo $instance['imagescount']; ?>,
            qstrings: {
                id: '<?php echo $instance['username']; ?>'
            },
            itemTemplate: '<li><a href="http://www.flickr.com/photos/<?php echo $instance['username']; ?>"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
        });
        /* Flickr Photos --> End */
    });

</script>

</div>
