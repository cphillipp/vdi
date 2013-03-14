<?php get_header(); ?>
<?php  if (!is_front_page()) : ?>

	<h3 class="section-title"><?php the_title() ?></h3>

<?php endif; ?>
<?php get_template_part('content', null); ?>
<?php get_template_part('content', 'pagenavi'); ?>
<?php get_footer(); ?>
