<?php get_header();?>


<h3 class="section-title">
    <span>
        <?php printf( __( 'Search Results for: %s', THEMEMAKERS_THEME_FOLDER_NAME), '<span>' . get_search_query() . '</span>' ); ?>    
    </span>
</h3>

<?php get_template_part('content', null); ?>
<?php get_template_part('content', 'pagenavi'); ?>
<?php get_footer(); ?>

