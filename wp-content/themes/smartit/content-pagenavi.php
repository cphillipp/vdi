<!-- - - - - - - - - - - - Pagination - - - - - - - - - - - - - - -->

<div class="wp-pagenavi">

    <?php
    if(true){
        ThemeMakersHelper::pagenavi();
    }else{
        wp_link_pages();
    }
    
    
    wp_reset_query();
    ?>

</div><!--/ .pagenavi -->

<!-- - - - - - - - - - - end Pagination - - - - - - - - - - - - - -->

