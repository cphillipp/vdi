
<?php if ($show_featured_image) : ?>

	<a class="single-image" href="<?php echo $post_link ?>" title="<?php echo $post_title ?>" style="text-align: <?php echo $image_align ?>;">
		<img src="<?php echo $image_url ?>"  alt="<?php echo $post_title ?>" align="<?php echo $image_align ?>" />
	</a>

<?php endif; ?>

<h6><a <?php echo $title_styles ?> href="<?php echo $post_link ?>"><?php echo $post_title ?></a></h6>

<p <?php echo $text_styles ?>><?php echo $text ?> ...</p>

<?php if ($show_readmore) : ?>    
    <p <?php echo $text_styles ?>>
        <?php echo do_shortcode('[button url="' . $post_link . '" color="' . $read_more_button_color . '" size="' . $read_more_button_size . '"]' . __('Read more', THEMEMAKERS_THEME_FOLDER_NAME) . '[/button]') ?>
    </p>
<?php endif; ?>


