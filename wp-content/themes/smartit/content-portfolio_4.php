<!-- - - - - - - - - - Portfolio 4 Columns - - - - - - - - - - - -->

<section id="portfolio-items" class="col-4 clearfix">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			<?php $post_portfolio_categories = wp_get_post_terms($post->ID, 'portfolio_categories'); ?>

            <article class="threecol" data-categories="all <?php foreach ($post_portfolio_categories as $item) echo $item->slug . ' '; ?>">

                <?php if (has_post_thumbnail()) { ?>


                    <div class="gl-image attachment">

                        <?php if ($_REQUEST['open_folio_featured_img_in_fancy']): ?>
                            <a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" class="single-image picture-icon" rel="group">
                                <img width="262" height="160" src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, 252, true, 160); ?>" alt="<?php the_title(); ?>"/>
                            </a><!--/ .single-image-->
                        <?php else: ?>                                
                            <a href="<?php the_permalink() ?>" class="picture-icon">
                                <img width="262" height="160" src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, 252, true, 160); ?>" alt="<?php the_title(); ?>"/>
                            </a><!--/ .single-image-->                                
                        <?php endif; ?>

                    </div><!--/ .gl-image-->


                <?php } ?>

                <div class="gl-text">

                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                    <?php if (!$_REQUEST['portfolio_hide_exerpt']): ?>
                        <p>
                            <?php
                            if ($_REQUEST['porfolio_4col_excerpt_symbols_count']) {
                                echo substr(get_the_excerpt(), 0, $_REQUEST['porfolio_4col_excerpt_symbols_count']) . " ...";
                            } else {
                                the_excerpt();
                            }
                            ?>
                        </p>
                    <?php endif; ?>
                    <?php if (!$_REQUEST['portfolio_hide_readmore']): ?>
                        <a href="<?php the_permalink(); ?>" class="button orange"><?php _e('Read more', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>
                    <?php endif; ?>
                </div><!--/ .gl-text-->

            </article>

            <?php
        endwhile;
    endif;
    ?>
</section><!--/ gallery-list-->

<!-- - - - - - - - - - end Portfolio 4 Columns - - - - - - - - - - - -->
