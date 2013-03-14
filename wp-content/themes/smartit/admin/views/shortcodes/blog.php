<?php
//blog layout
wp_reset_query();

$args = array(
    'orderby' => $orderby,
    'order' => $order,
    'post_status' => array('publish')
);

$offset = 0;
if (isset($_GET['offset'])) {
    $offset = (int) $_GET['offset'];
    $args['offset'] = $offset;
}

if (!empty($posts_per_page)) {
    $args['posts_per_page'] = $posts_per_page;
}

if ((int) $cat > 0) {
    $args['cat'] = $cat;
}


if (!empty($posts)) {
    $posts = explode(',', $posts);
    $args['post__in'] = $posts;
}


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args['paged'] = $paged;



global $wp_query;
$original_query = $wp_query;
$wp_query = null;
$wp_query = new WP_Query($args);
global $post;
?>

<?php get_template_part('content', null); ?>

<!-- - - - - - - - - - - - Pagination - - - - - - - - - - - - - - -->

<?php if ((int) $paging) : ?>
    <?php get_template_part('content', 'pagenavi'); ?>
<?php endif; ?>

<!-- - - - - - - - - - - end Pagination - - - - - - - - - - - - - -->

<?php
$wp_query = null;
$wp_query = $original_query;
wp_reset_postdata();
?>


