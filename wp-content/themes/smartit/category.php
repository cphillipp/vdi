<?php get_header();?>

<h3 class="section-title">
    <span>
        <?php printf( __( 'Category Archives: %s', THEMEMAKERS_THEME_FOLDER_NAME), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>    
    </span>
</h3>

<?php get_template_part('content', null); ?>
<?php get_template_part('content', 'pagenavi'); ?>
<?php get_footer(); ?>

