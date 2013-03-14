<?php
$query = new WP_Query(array(
            'post_type' => 'folio',
            'showposts' => $instance['post_number'],
        ));

global $post;

$excerpt_symbols_count = get_option(THEMEMAKERS_THEME_PREFIX . "excerpt_symbols_count");

if (!$excerpt_symbols_count) {
    $excerpt_symbols_count = 140;
}
?>

<div class="widget widget_recent_projects">

    <?php if ($instance['title'] != '') { ?>
	
        <h3 class="widget-title"><?php echo $instance['title']; ?></h3>
		
    <?php } ?>
		
	<div class="recent-projects-box">
		
		<ul class="recent-projects clearfix">

			<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
					<li>
						<?php if (has_post_thumbnail() AND $instance['show_thumbnail']) { ?>
							<a href="<?php the_permalink(); ?>"><img src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, 230, true, 120); ?>" alt="<?php the_title(); ?>" /></a>
						<?php } ?>
						<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>

						<?php if ($instance['show_date']): ?>
							<span class="date"><?php _e('Posted on', THEMEMAKERS_THEME_FOLDER_NAME); ?> <?php the_time('M d, Y'); ?></span>
						<?php endif; ?>

						<div class="clear"></div>

						<?php if ($instance['show_exerpt']) : ?>
							<p>
								<?php
								if ($excerpt_symbols_count) {
									echo substr(get_the_excerpt(), 0, $excerpt_symbols_count) . " ...";
								} else {
									the_excerpt();
								}
								?>
							</p>
						<?php endif; ?>
					</li>
					<?php
				endwhile;
			endif;
			?>

		</ul><!--/ .recent-projects-->	
		
	</div><!--/ .recent-projects-box-->

    <a class="button orange" href="<?php echo home_url() ?>/folio"><?php _e('See all projects', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>

</div><!--/ .widget-->

