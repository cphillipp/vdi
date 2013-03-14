<?php
global $post;

$query = new WP_Query(array(
            'post_type' => 'gall',
            'post__in' => array($post_id)
        ));


?>


<?php

$sp = $_REQUEST['sidebar_position'];


	$gallery_layout_selected = get_option(THEMEMAKERS_THEME_PREFIX . "gallery_slider_width"); 
	
	if ($sp!='no_sidebar'){
	
	if(!$gallery_layout_selected) {
		$gallery_layout_selected = 320;
	}
	
		switch ($gallery_layout_selected) {
			case 250:
				$gallery_layout_class = "fourcol";
				$gallery_layout_height = 156;
				break;
			case 320:
				$gallery_layout_class = "fivecol";
				$gallery_layout_height = 200;
				break;
			case 390:
				$gallery_layout_class = "sixcol";
				$gallery_layout_height = 244;
				break;
			case 534:
				$gallery_layout_class = "eightcol";
				$gallery_layout_height = 333;
				break;
			default:
				$gallery_layout_class = "fivecol";
				$gallery_layout_height = 200;
				break;
		}		
	}
	else{
			if(!$gallery_layout_selected) {
		$gallery_layout_selected = 320;
	}
	
		switch ($gallery_layout_selected) {
			case 250:
				$gallery_layout_class = "fourcol";
				$gallery_layout_height = 156;
				$gallery_layout_selected = 338;
				break;
			case 320:
				$gallery_layout_class = "fivecol";
				$gallery_layout_height = 200;
				$gallery_layout_selected = 434;
				break;
			case 390:
				$gallery_layout_class = "sixcol";
				$gallery_layout_height = 244;
				$gallery_layout_selected = 528;
				break;
			case 534:
				$gallery_layout_class = "eightcol";
				$gallery_layout_height = 333;
				$gallery_layout_selected = 719;
				break;
			default:
				$gallery_layout_class = "fivecol";
				$gallery_layout_height = 200;
				break;
		}		
	}
	
?>

<?php
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
        ?>


        <div class="pics-wrapper <?php echo $gallery_layout_class; ?>">

            <div class="image-gallery-slider">

                <div class="sudo-slider">

                    <ul>                              

        <?php
        //get images quantity

        $images = get_post_meta($post->ID, 'thememakers_gallery', true);
        if (!empty($images) AND !empty($images[0])) {

            $video_width = $gallery_layout_selected;
            $video_height = $gallery_layout_height;

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

                            //nothing

                            break;

                        default:
                            ?>
                                            <li><img width="<?php echo $gallery_layout_sele_layout_height ?>" src="<?php echo ThemeMakersHelper::resize_image($source_url, $gallery_layout_selected, true, $gallery_layout_height) ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></li>
                                            <?php
                                            break;
                                    }
                                }
                            }
                        } else {
                            ?>

                            <li class="no-image">
                            <?php if (has_post_thumbnail()) : ?>
                                    <img width="<?php echo $gallery_layout_selected; ?>" height="<?php echo $gallery_layout_height ?>" class="pic" src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, $gallery_layout_selected, true, $gallery_layout_height); ?>" alt="<?php the_title(); ?>"/>
                            <?php else: ?>
                                    <img width="<?php echo $gallery_layout_selected ?>" height="<?php echo $gallery_layout_height ?>" src="<?php echo ThemeMakersHelper::resize_image(THEMEMAKERS_THEME_URI . '/images/no-image.jpg', $gallery_layout_selected, true, $gallery_layout_height) ?>" alt="<?php the_title(); ?>" />
                                <?php endif; ?>
                            </li>

                                <?php
                            }
                            ?>	

                    </ul>

                </div><!--/ #sudo-slider-->   

            </div><!--/ .image-gallery-slider-->

        </div><!--/ .pics-wrapper-->

        <div class="descr-wrapper">

            <h4><?php the_title(); ?></h4>

            <p><?php the_content() ?></p>
			
		   <p>
				<?php if (get_the_terms($post->ID, 'clients')) : ?>
					<b><?php _e('Client(s)', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b>  <?php echo get_the_term_list($post->ID, 'clients', '', ', ', ''); ?><br>
				<?php endif; ?>
					
					
				<?php if (get_post_meta($post->ID, 'portfolio_url_title', true)!=''): ?>
					<?php if (get_the_terms($post->ID, 'portfolio_url')) : ?>
						<b><?php _e('URL', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b><a target="_blank" href="<?php echo get_post_meta($post->ID, 'portfolio_url', true); ?>"><?php echo get_post_meta($post->ID, 'portfolio_url_title', true); ?></a><br>
					<?php endif; ?>
				<?php endif; ?>
					
												
				<?php if (get_post_meta($post->ID, 'portfolio_date', true) != '') : ?>
					<b><?php _e('Date', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b> <?php echo get_post_meta($post->ID, 'portfolio_date', true); ?><br>
				<?php endif; ?>
				<?php if (get_post_meta($post->ID, 'portfolio_tools', true) != '') : ?>
					<b><?php _e('Tools', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b> <?php echo get_post_meta($post->ID, 'portfolio_tools', true); ?><br />
				<?php endif; ?>
				<?php if (get_the_terms($post->ID, 'skills')) : ?>
					<b><?php _e('Skill(s)', THEMEMAKERS_THEME_FOLDER_NAME); ?>:</b> <?php echo get_the_term_list($post->ID, 'skills', '', ', ', ''); ?><br>
				<?php endif; ?>               
			</p>

        </div><!--/ .descr-wrapper-->
		

        <?php
    endwhile;
endif;