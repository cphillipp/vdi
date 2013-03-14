</section><!--/ #content-->
<!-- - - - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - -->
<?php get_template_part('sidebar'); ?>
<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - - -->


</div><!--/ .row-->
</section><!--/ .main -->

<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->


<?php
global $post;
wp_reset_query();
if (is_object($post) AND (is_single() OR is_page())):
    $page_bottom = get_post_meta($post->ID, 'page_bottom', true);
    ?>
    <?php if (!empty($page_bottom)): ?>
        <div class="twitter-widget"><?php echo do_shortcode($page_bottom) ?></div>
        <?php
    endif;
endif;
?>


<!-- - - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->
<?php $hide_footer = get_option(THEMEMAKERS_THEME_PREFIX . "hide_footer"); ?>
<footer id="footer" class="clearfix">

    <div class="row">
        <?php if (!$hide_footer): ?>


            <div class="threecol">
                <?php if (function_exists('dynamic_sidebar') AND dynamic_sidebar('Footer Sidebar 1')):else: ?>
                    <div class="widget widget_contact">
                        <h3 class="widget-title">For Immediate Onsite or Remote Support</h3>
                        <span class="tcolor">Call: +2 (589) 1285-965</span>
                    </div><!--/ .widget-->
                <?php endif; ?>
            </div><!--/ .threecol-->




            <div class="threecol">
                <?php if (function_exists('dynamic_sidebar') AND dynamic_sidebar('Footer Sidebar 2')):else: ?>
                    <div class="widget widget_text">
                        <h3 class="widget-title">Address Info</h3>
                        <div class="textwidget">
                            <p>
                                Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore do eiusmod tempor magna aliqua.
                            </p>
                        </div><!--/ .textwidget-->
                    </div><!--/ .widget-->
                <?php endif; ?>
            </div><!--/ .threecol-->




            <div class="threecol">
                <?php if (function_exists('dynamic_sidebar') AND dynamic_sidebar('Footer Sidebar 3')):else: ?>
                    <div class="widget widget_email">
                        <h3 class="widget-title">Email</h3>
                        <a href="#">Testmail@sitename.com </a>
                    </div><!--/ .widget-->
                <?php endif; ?>
            </div><!--/ .threecol-->




            <div class="threecol last">
                <?php if (function_exists('dynamic_sidebar') AND dynamic_sidebar('Footer Sidebar 4')):else: ?>
                    <div class="widget widget_social">
                        <h3 class="widget-title">Follow Us</h3>
                        <ul class="social-icons clearfix">
                            <li class="facebook" data-tooltip="Facebook"><a href="#"><span></span></a></li>
                            <li class="twitter" data-tooltip="Twitter"><a href="#"><span></span></a></li>
                            <li class="rss" data-tooltip="Rss"><a href="#"><span></span></a></li>
                            <li class="youtube" data-tooltip="Youtube"><a href="#"><span></span></a></li>
                        </ul><!--/ .social-icons-->
                    </div><!--/ .widget-->
                <?php endif; ?>
            </div><!--/ .threecol-->

            <div class="clear"></div>

            <div class="adjective clearfix">
                <div class="copyright"><?php echo get_option(THEMEMAKERS_THEME_PREFIX . 'copyright_text') ?></div>
                <div class="developed"><?php _e('Developed by', THEMEMAKERS_THEME_FOLDER_NAME); ?> <a target="_blank" href="http://webtemplatemasters.com">ThemeMakers</a></div>
            </div><!--/ .adjective-->
        <?php endif; ?>
    </div><!--/ .row-->

</footer><!--/ #footer-->

<!-- - - - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - - -->

</div><!--/ .main-->


<?php wp_footer(); ?>
</body>
</html>

