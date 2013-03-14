<div class="tab-content" id="<?php echo $sidebar_id; ?>">
    <input type="hidden" name="sidebars[<?php echo $sidebar_id; ?>][name]" value="<?php echo $sidebar_name; ?>" />


    <div class="clearfix ">

        <div class="admin-one-half">

            <div class="add-button add_page" sidebar-id="<?php echo $sidebar_id; ?>"></div>&nbsp;<strong><?php _e('Add Page', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br /><br />
            <div class="tmk_row">
                <?php echo $categories_select ?>
            </div>

        </div><!--/ .admin-one-half-->

        <div class="admin-one-half last">

            <div class="add-button add_category" sidebar-id="<?php echo $sidebar_id; ?>"></div>&nbsp;<strong><?php _e('Add Category', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br /><br />
            <div class="tmk_row">
                <?php echo $pages_select ?>
            </div>

        </div><!--/ .admin-one-half-->
		<div class="clear"></div>
		<hr class="admin-divider" />
		<div class="clear"></div>
		<hr class="admin-divider" />
		
		<?php if (is_plugin_active('woocommerce/woocommerce.php')){ ?>
		
		<div class="admin-one-half">

            <div class="add-button add_product" sidebar-id="<?php echo $sidebar_id; ?>"></div>&nbsp;<strong><?php _e('Add Product', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong><br /><br />
            <div class="tmk_row">
                <?php echo $products_select ?>
            </div>

        </div><!--/ .admin-one-half-->
		
		<?php } ?>
		<div class="clear"></div>
		

    </div>
    <br />
    <div class="tmk_row">
        <a class="remove-button remove_sidebar" sidebar-id="<?php echo $sidebar_id; ?>" href="#"></a>&nbsp;<strong><?php _e('Remove Sidebar', THEMEMAKERS_THEME_FOLDER_NAME); ?></strong>
    </div>
    <hr class="admin-divider" />
</div>



