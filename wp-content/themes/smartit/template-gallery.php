<?php
/*
  Template Name: Gallery
 */
get_header();

?>
<script type="text/javascript">
	var template_gallery_sidebar_position = "<?php echo $_REQUEST['sidebar_position'] ?>";
</script>
<?php 

//get slider height
//$slider_height = get_option(THEMEMAKERS_THEME_PREFIX . 'gallery_height');
//if (!$slider_height) {
//    $slider_height = 550;
//}

$sp = $_REQUEST['sidebar_position'];

if ($sp == 'no_sidebar') {
    $gallery_thumbnail_width = 251;
    $gallery_thumbnail_height = 200;
} else {
    $gallery_thumbnail_width = 187;
    $gallery_thumbnail_height = 116;
}

$gallery_hide_filter = get_option(THEMEMAKERS_THEME_PREFIX . "gallery_hide_filter");

//*****

$page_top = get_post_meta($post->ID, 'page_top', true);

if (!empty($page_top)) {
    echo '<div class="gray-holder">' . do_shortcode(html_entity_decode($page_top)) . '<div class="clear"></div></div>';
}

$gallery_data_width = get_option(THEMEMAKERS_THEME_PREFIX . "gallery_slider_width"); 

	 switch ($gallery_data_width) {
		case 250:
			$data_height = 156;
			break;
		case 320:
			$data_height = 200;
			break;
		case 390:
			$data_height = 244;
			break;
		case 534:
			$data_height = 333;
			break;
		default:
			$data_height = 200;
			break;
	}
	
?>  


<div id="workPanel" class="workPanelContent" data-height="<?php echo $data_height ?>" style="display: none;">

    <div id="ajax_panel">

        <a href="#" class="closeWorkPanel close"><?php _e('Close', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>

        <div class="responsed_content"><?php _e('Loading', THEMEMAKERS_THEME_FOLDER_NAME); ?> ...</div>

        <div class="clear"></div>

    </div><!--/ workPanelContent-->

    <input type="hidden" id="gallery_height"/>

</div><!--/ workPanel-->

<h3 class="section-title">
    <span>
        <?php the_title() ?>    
    </span>
</h3>

<!-- - - - - - - - - - - - Sorting  - - - - - - - - - - - - - - -->

<?php if (!$gallery_hide_filter): ?>

    <ul id="gallery-filter" class="gallery-filter">

        <li class="active">
            <a data-categories="*"><?php _e('All', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
        </li>

        <?php $skill_types = get_terms('gallery_categories', 'orderby=name'); ?>

        <?php foreach ($skill_types as $key => $item) : ?>
            <li>
                <a data-categories="<?php echo $item->slug; ?>"><?php echo $item->name; ?></a>
            </li>
        <?php endforeach; ?>

    </ul><!--/ .gallery-filter-->

<?php endif; ?>

<!-- - - - - - - - - - - end Sorting  - - - - - - - - - - - - - -->



<!-- - - - - - - - - - - Gallery  - - - - - - - - - - - - - -->

<section id="gallery-items">

    <?php
    query_posts(array(
        'post_type' => 'gall',
        'showposts' => -1
    ));

    if (have_posts()) : while (have_posts()) : the_post();

            $skill_types = wp_get_post_terms($post->ID, 'gallery_categories');

            if (has_post_thumbnail()) {
                ?>

                <article class="threecol" data-categories="<?php
            foreach ($skill_types as $item)
                echo $item->slug . ' ';
                ?>">
					
					<div class="attachment">
						<a href="#" class="picture-icon js_gallery_album_cover" album_id="<?php echo $post->ID; ?>">
							<img width="<?php echo $gallery_thumbnail_width ?>" src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, $gallery_thumbnail_width, true, $gallery_thumbnail_height); ?>" alt="<?php the_title(); ?>" />
						</a>					
					</div><!--/ .attachment-->

                    <div class="project-meta">

                        <a href="#" class="js_gallery_album_cover" album_id="<?php echo $post->ID; ?>">
                            <h6 class="title-item"><?php the_title(); ?></h6>
                        </a>

						<?php if(get_the_term_list($post->ID, 'skills', '', ', ', '')): ?>
                        <span class="tags">
                            <?php _e('Tags', THEMEMAKERS_THEME_FOLDER_NAME); ?>:
                            <?php echo get_the_term_list($post->ID, 'skills', '', ', ', ''); ?>
                        </span><!--/ .tags-->
						<?php endif; ?>

                    </div><!--/ .project-meta-->

                </article>

                <?php
            } else {
                ?>

                <article class="threecol" data-categories="<?php
            foreach ($skill_types as $item)
                echo $item->slug . ' ';
                ?>">

					<div class="attachment">
						<a href="#" class="picture-icon js_gallery_album_cover" album_id="<?php echo $post->ID; ?>">
							<?php if (has_post_thumbnail()) : ?>
								<img width="<?php echo $gallery_thumbnail_width; ?>" src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, $gallery_thumbnail_width, true, $gallery_thumbnail_height); ?>" alt="<?php the_title(); ?>"/>
							<?php else: ?>
								<img src="<?php echo ThemeMakersHelper::resize_image(THEMEMAKERS_THEME_URI . '/images/no-image.jpg', $gallery_thumbnail_width, true, $gallery_thumbnail_height) ?>" alt="<?php the_title(); ?>" />
							<?php endif; ?>
						</a>				
					</div><!--/ .attachement-->

                    <div class="project-meta">

                        <a href="#" class="js_gallery_album_cover" album_id="<?php echo $post->ID; ?>">
                            <h6 class="title-item"><?php the_title(); ?></h6>
                        </a>

                        <span class="tags">
                            <?php _e('Tags', THEMEMAKERS_THEME_FOLDER_NAME); ?>:
                            <?php echo get_the_term_list($post->ID, 'skills', '', ', ', ''); ?>
                        </span><!--/ .tags-->

                    </div><!--/ .project-meta-->

                </article>    


                <?php
            }

        endwhile;
    endif;
    wp_reset_query();
    ?>

</section><!--/ #gallery-->

<!-- - - - - - - - - - end Gallery  - - - - - - - - - - - - -->

<?php get_footer(); ?>

