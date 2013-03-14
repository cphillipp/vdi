<?php
get_header();

$slider_width = get_option(THEMEMAKERS_THEME_PREFIX . 'portfolio_slider_width');
if (!$slider_width) {
    $slider_width = 434;
}
//get images quantity
$images = array();
$images = get_post_meta($post->ID, 'thememakers_portfolio', true);

	$portfolio_layout_selected = get_option(THEMEMAKERS_THEME_PREFIX . "portfolio_slider_width"); 
	
	if(!$portfolio_layout_selected) {
		$portfolio_layout_selected = 433;
	}

	switch ($portfolio_layout_selected) {
		case 338:
			$portfolio_layout_class = "fourcol";
			$portfolio_layout_height = 211;
			break;
		case 433:
			$portfolio_layout_class = "fivecol";
			$portfolio_layout_height = 270;
			break;
		case 528:
			$portfolio_layout_class = "sixcol";
			$portfolio_layout_height = 330;
			break;
		case 719:
			$portfolio_layout_class = "eightcol";
			$portfolio_layout_height = 450;
			break;
		default:
		    $portfolio_layout_class = "fivecol";
			$portfolio_layout_height = 200;
			break;
	}

?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php if ((!empty($images) AND !empty($images[0])) OR has_post_thumbnail($post->ID)): ?>

            <div class="pics-wrapper <?php echo $portfolio_layout_class ?>">

                <div class="image-gallery-slider">

                    <div class="sudo-slider">

                        <ul>

                            <?php
                            if (!empty($images) AND !empty($images[0])) {
                                $video_width = $portfolio_layout_selected;
                                $video_height = $portfolio_layout_height;

                                foreach ($images as $source_url) {
                                    if (!empty($source_url)) {

                                        $video_type = 'youtube.com';
                                        $allows_array = array('youtube.com', 'player.vimeo.com', '.mp4', '.jpg', '.png', '.gif', '.bmp');

                                        foreach ($allows_array as $key => $needle) {
                                            $count = strpos($source_url, $needle);
                                            if ($count !== FALSE) {
                                                $video_type = $allows_array[$key];
                                            }
                                        }

                                        switch ($video_type) {
                                            case $allows_array[0]:
                                                $source_url = explode("?v=", $source_url);
                                                $source_url = explode("&", $source_url[1]);
                                                if (is_array($source_url)) {
                                                    $source_url = $source_url[0];
                                                }
                                                echo "<li>" . do_shortcode('[video type="youtube" html5_poster="" src_mp4="" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/video]') . "</li>";
                                                break;
                                            case $allows_array[1]:
                                                $source_url = explode("/", $source_url);
                                                if (is_array($source_url)) {
                                                    $source_url = $source_url[count($source_url) - 1];
                                                }
                                                echo "<li>" . do_shortcode('[video type="vimeo" html5_poster="" src_mp4="" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/video]') . "</li>";
                                                break;
                                            case $allows_array[2]:
                                                $html5_poster = THEMEMAKERS_THEME_URI . "/images/video_poster.jpg";
                                                if (has_post_thumbnail($post->ID)) {
                                                    $html5_poster = ThemeMakersHelper::get_post_featured_image($post->ID, $video_width, true, $video_height);
                                                }
                                                echo "<li>" . do_shortcode('[video type="html5" html5_poster="' . $html5_poster . '" src_mp4="' . $source_url . '" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"][/video]') . "</li>";
                                                break;

                                            default:
                                                ?>
                                                <li><img width="<?php echo $portfolio_layout_selected ?>" height="<?php echo $portfolio_layout_height ?>" src="<?php echo ThemeMakersHelper::resize_image($source_url, $portfolio_layout_selected, true, $portfolio_layout_height) ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></li>
                                                <?php
                                                break;
                                        }
                                    }
                                }
                            } else {
                                if (has_post_thumbnail($post->ID)) {
                                    ?>
                                    <li><img width="<?php echo $portfolio_layout_selected ?>" height="<?php echo $portfolio_layout_height ?>" src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, $portfolio_layout_selected, true, $portfolio_layout_height) ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></li>
                                    <?php
                                }
                            }
                            ?>

                        </ul>

                    </div><!--/ #sudo-slider-->

                </div><!--/ .image-gallery-slider-->

            </div><!--/ .pics-wrapper-->

        <?php endif; ?>

        <div class="descr-wrapper">

            <h4><?php the_title(); ?></h4>

            <p><?php the_content(); ?></p>
			
            <p>
                <?php if (get_the_terms($post->ID, 'clients')) : ?>
                    <b><?php _e('Client(s)', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b><?php echo get_the_term_list($post->ID, 'clients', '', ', ', ''); ?><br>
                <?php endif; ?>
					
				<?php if (get_post_meta($post->ID, 'portfolio_url_title', true)!=''): ?>
					<?php if (get_the_terms($post->ID, 'portfolio_url')) : ?>
						<b><?php _e('URL', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b><a target="_blank" href="<?php echo get_post_meta($post->ID, 'portfolio_url', true); ?>"><?php echo get_post_meta($post->ID, 'portfolio_url_title', true); ?></a><br>
					<?php endif; ?>
				<?php endif; ?>
					
                <?php if (get_post_meta($post->ID, 'portfolio_date', true) != '') : ?>
                    <b><?php _e('Date', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b><?php echo get_post_meta($post->ID, 'portfolio_date', true); ?><br>
                <?php endif; ?>
                <?php if (get_post_meta($post->ID, 'portfolio_tools', true) != '') : ?>
                    <b><?php _e('Tools', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b><?php echo get_post_meta($post->ID, 'portfolio_tools', true); ?><br />
                <?php endif; ?>
                <?php if (get_the_terms($post->ID, 'skills')) : ?>
                    <b><?php _e('Skill(s)', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b><?php echo get_the_term_list($post->ID, 'skills', '', ', ', ''); ?><br>
                <?php endif; ?>
            </p>

        </div><!--/ .descr-wrapper-->

		<div class="clear"></div>
		
        <?php
		
    endwhile;
endif;
?>

<?php wp_reset_query(); ?>
<?php if (!get_option(THEMEMAKERS_THEME_PREFIX . 'disable_portfolio_comments')): ?>
    <?php comments_template(); ?>
<?php endif; ?>


<?php get_footer(); ?>