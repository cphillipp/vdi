<?php get_header(); ?>

<!-- - - - - - - - - - - - 404  - - - - - - - - - - - - - - -->	

<div class="error404t tencol clearfix">

    <img src="<?php echo THEMEMAKERS_THEME_URI ?>/images/mac.png" alt="" />

    <div class="e404">

        <h1 class="tcolor">404</h1>

        <div class="title-error"><?php _e('Page Not Found', THEMEMAKERS_THEME_FOLDER_NAME); ?></div>

        <p><?php _e('Sorry, the page you requested may have been moved or deleted', THEMEMAKERS_THEME_FOLDER_NAME); ?></p>
        <a href="index.html" class="button orange bcolor"><?php _e('Get me back to homepage!', THEMEMAKERS_THEME_FOLDER_NAME); ?></a>

    </div><!--/ .e404-->

</div><!--/ .error404-->		

<!-- - - - - - - - - - - end 404  - - - - - - - - - - - - - -->	

<?php get_footer(); ?>

