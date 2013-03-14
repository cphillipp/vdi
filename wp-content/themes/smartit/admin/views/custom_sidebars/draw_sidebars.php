<div id="custom_sidebars">
    <?php
    if (is_string($sidebars) AND !empty($sidebars)) {
        $sidebars = unserialize($sidebars);
    }
    ?>
    <?php if (!empty($sidebars) AND is_array($sidebars)): ?>
        <?php foreach ($sidebars as $sidebar_id => $sidebar) : ?>
            <div id="<?php echo $sidebar_id; ?>" class="tab-content" style="display: none">
                <div class="clearfix ">

                    <div class="admin-one-half">

                        <div class="add-button add_page" sidebar-id="<?php echo $sidebar_id ?>"></div>&nbsp;<strong><?php _e('Add Page', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>

                        <?php
                        if (!empty($sidebar['page'])) {
                            foreach ($sidebar['page'] as $page_key => $page_value) {
                                ?>
                                <div class="tmk_row">
                                    <br />
                                    <?php echo $entity_sidebars->get_pages_select($page_value, 'sidebars[' . $sidebar_id . '][page][' . $page_key . ']'); ?>
                                    <?php if ($page_key > 0): ?>
                                        <a class="remove-button remove_page" href="#"></a>
                                    <?php endif; ?>
                                </div>

                                <?php
                            }
                        } else {
                            echo $entity_sidebars->get_pages_select('', 'sidebars[' . $sidebar_id . '][page][0]');
                        }
                        ?>


                    </div><!--/ .admin-one-half-->

                    <div class="admin-one-half last">

                        <div class="add-button add_category" sidebar-id="<?php echo $sidebar_id ?>"></div>&nbsp;<strong><?php _e('Add Category', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>
                        <?php
                        if (!empty($sidebar['cat'])) {
						
                            foreach ($sidebar['cat'] as $cat_key => $cat_value) {
                                ?>
                                <div class="tmk_row">
                                    <br />
                                    <?php echo $entity_sidebars->get_categories_select($cat_value, 'sidebars[' . $sidebar_id . '][cat][' . $cat_key . ']'); ?>
                                    <?php if ($cat_key > 0): ?>
                                        <a class="remove-button remove_page" href="#"></a>
                                    <?php endif; ?>
                                </div>

                                <?php
                            }
                        } else {
                            echo $entity_sidebars->get_categories_select('', 'sidebars[' . $sidebar_id . '][cat][0]');
                        }
                        ?>


                    </div><!--/ .admin-one-half-->
					<div class="clear"></div>
					<br />
					<hr class="admin-divider">
					
					<div class="clear"></div><br>
					
					<?php if (is_plugin_active('woocommerce/woocommerce.php')){ ?>
					
					<div class="admin-one-half">

                        <div class="add-button add_product" sidebar-id="<?php echo $sidebar_id ?>"></div>&nbsp;<strong><?php _e('Add Product', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>
                        <?php
                        if (!empty($sidebar['product'])) {
								
                            foreach ($sidebar['product'] as $product_key => $product_value) {
                                ?>
                                <div class="tmk_row">
                                    <br />
                                    <?php echo $entity_sidebars->get_products_select($product_value, 'sidebars[' . $sidebar_id . '][product][' . $product_key . ']'); ?>
                                    <?php if ($product_key > 0): ?>
                                        <a class="remove-button remove_page" href="#"></a>
                                    <?php endif; ?>
                                </div>

                                <?php
                            }
                        } else {
                            echo $entity_sidebars->get_products_select('', 'sidebars[' . $sidebar_id . '][product][0]');
                        }
                        ?>


                    </div><!--/ .admin-one-half-->
					<?php } ?>

                </div>

                <br />
                <div class="tmk_row">
                    <a class="remove-button remove_sidebar" sidebar-id="<?php echo $sidebar_id; ?>" href="#"></a>&nbsp;<strong><?php _e('Remove Sidebar', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>
                </div>

            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</div>


<div style="display: none;">
    <ul id="custom_sidebars_ids"></ul>
</div>