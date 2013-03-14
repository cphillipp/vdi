<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$slides = Thememakers_Entity_Slider::get_slides();
$slider_types = Thememakers_Entity_Slider::get_sliders_types();
?>

<?php _e("Page slider type", THEMEMAKERS_THEME_FOLDER_NAME) ?>:<br />
<select name="page_slider_type">
    <?php foreach ($slider_types as $key => $type) : ?>
        <option <?php echo ($page_slider_type == $key ? "selected" : "") ?> value="<?php echo $key ?>"><?php echo $type ?></option>
    <?php endforeach; ?>
</select><br />

<br />



<div id="no_revolution_slidegroups" <?php if ($page_slider_type == 'revolution'): ?>style="display: none;"<?php endif; ?>>
    <?php _e("Slider group", THEMEMAKERS_THEME_FOLDER_NAME) ?>:<br />
    <?php if (!empty($slides)): ?>
        <select name="page_slider">
            <option value=""><?php _e("Choose sliders group", THEMEMAKERS_THEME_FOLDER_NAME) ?></option>
            <?php foreach ($slides as $key => $slide) : ?>
                <?php if (isset($slide['name'])): ?>
                    <?php if ($slide['name']): ?>

                        <option <?php echo ($page_slider == $slide['name'] ? "selected" : "") ?> value="<?php echo $slide['name'] ?>"><?php echo $slide['name'] ?></option>

                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    <?php else: ?>
        <?php _e("No one slider exists", THEMEMAKERS_THEME_FOLDER_NAME) ?>
    <?php endif; ?>
</div>



<div id="revolution_slidegroups" <?php if ($page_slider_type == 'revolution'): ?>style="display: block;"<?php else: ?>style="display: none;"<?php endif; ?>>

    <?php
    $arrSliders=array();
    if (class_exists("RevSlider")) {
        $revslider = new RevSlider();
        $arrSliders = $revslider->getArrSliders();
    }
    ?>
    <?php _e("Revolution sliders groups", THEMEMAKERS_THEME_FOLDER_NAME) ?>:<br />
    <select name="revolution_slide_group">
        <option value=""><?php _e("Choose sliders group", THEMEMAKERS_THEME_FOLDER_NAME) ?></option>
        <?php foreach ($arrSliders as $oneslider): ?>                
            <?php $alias = $oneslider->getAlias(); ?>
            <option <?php echo ($alias == $revolution_slide_group ? "selected" : "") ?> value="<?php echo $alias ?>"><?php echo $oneslider->getTitle() ?></option>
        <?php endforeach; ?>
    </select>

</div>




<script type="text/javascript">
    jQuery(function() {
        jQuery("[name='page_slider_type']").change(function() {
            var value = jQuery(this).val();
            if (value == 'revolution') {
                jQuery("#no_revolution_slidegroups").hide();
                jQuery("#revolution_slidegroups").show();
            } else {
                jQuery("#no_revolution_slidegroups").show();
                jQuery("#revolution_slidegroups").hide();
            }
        });
    });
</script>

