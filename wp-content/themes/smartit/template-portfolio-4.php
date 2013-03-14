<?php
/*
  Template Name: Portfolio 4 Columns
 */

get_header();

$posts_per_page = get_option(THEMEMAKERS_THEME_PREFIX . 'porfolio_4col_posts_per_page');
if (!$posts_per_page) {
    $posts_per_page = 8;
}
//query portfolio items
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts(array(
    'post_type' => 'folio',
    'paged' => $paged,
    'posts_per_page' => $posts_per_page
));
$portfolio_categories = get_terms('portfolio_categories', 'orderby=name');

/***********************************************************************/

$_REQUEST['porfolio_4col_excerpt_symbols_count'] = get_option(THEMEMAKERS_THEME_PREFIX . "porfolio_4col_excerpt_symbols_count");
if (!$_REQUEST['porfolio_4col_excerpt_symbols_count']) {
    $_REQUEST['porfolio_4col_excerpt_symbols_count'] = 60;
}

$portfolio_hide_filter = get_option(THEMEMAKERS_THEME_PREFIX . "portfolio_hide_filter");

?>

<h3 class="section-title">
    <span>
        <?php the_title() ?>    
    </span>
</h3>

<!-- - - - - - - - - - - - Sorting  - - - - - - - - - - - - - - -->

<?php if (!$portfolio_hide_filter): ?>

<ul id="portfolio-filter" class="portfolio-filter">

	<li><a class="active" data-categories="all">All</a></li>

	<?php foreach ($portfolio_categories as $key => $item) : ?>
	<li><a title="<?php echo $item->name; ?>" href="#" data-categories="<?php echo $item->slug; ?>"><?php echo $item->name; ?></a></li>

	<?php endforeach; ?>

</ul><!--/ #portfolio-filter -->

<?php endif; ?>

<!-- - - - - - - - - - - end Sorting  - - - - - - - - - - - - - -->

<?php get_template_part('content', 'portfolio_4'); ?>
<?php get_template_part('content', 'pagenavi'); ?>

<?php get_footer(); ?>
