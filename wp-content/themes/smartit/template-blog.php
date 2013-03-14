<?php

/*
  Template Name: Blog
 */

get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts(array(
    'post_type' => 'post',
    'paged' => $paged
));
?>

		<?php  if (!is_front_page()) : ?>

			<h3 class="section-title"><?php the_title() ?></h3>

		<?php endif; ?>

<?php get_template_part('content', 'usual'); ?>
<?php get_template_part('content', 'pagenavi'); ?>
<?php get_footer(); ?>

