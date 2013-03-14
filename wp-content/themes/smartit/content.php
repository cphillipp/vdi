<?php if ($_REQUEST['blog_layout'] == 'alternate') : ?>
    <?php get_template_part('content', 'alternate'); ?>
<?php else: ?>
    <?php get_template_part('content', 'usual'); ?>
<?php endif; ?>
