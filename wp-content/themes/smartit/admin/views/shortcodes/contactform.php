<?php
//contact form on front by shortcode
$contact_form = Thememakers_Entity_Contact_Form::get_form($form_name);

//output fields
if (!empty($contact_form['inputs'])) {
    ?>
    <form method="post" name="contactform" class="contact-form" id="contactform">
		
        <input type="hidden" name="contact_form_name" value="<?php echo $form_name ?>" />
		
        <?php foreach ($contact_form['inputs'] as $key => $input) : ?>
		
            <p class="input-block">
				<label>
					<span class="required"><?php echo($input['is_required'] ? "*" : "") ?></span>
						<?php echo $input['label'] ?>:
				</label>
            
			<?php
            $name = strtolower(trim($input['label']));
            $name = str_replace(" ", "_", $name);
            switch ($input['type']) {
                case "textinput":case "email":case "subject":
                    ?>
                    <input type="text" name="<?php echo $name ?>" value="" />
                    <?php
                    break;

                case "messagebody":
                    ?>
                    <textarea name="<?php echo $name ?>"></textarea>
                    <?php
                    break;

                case "select":
                    $select_options = explode(",", $input['options']);
                    ?>
                    <select name="<?php echo $name ?>">
                        <?php if (!empty($select_options)): ?>
                            <?php foreach ($select_options as $value) : ?>
                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <?php
                    break;

                default:
                    break;
            }
            ?>
					
			</p>
			
        <?php endforeach; ?>
					
        <?php if ($contact_form['has_capture']){ ?>
			
			<p>
                <iframe src="<?php echo home_url() ?>/?update_capcha=1" height="38" width="80" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" style="vertical-align: top;" class="capcha_image_frame" name="capcha_image_frame"></iframe>
                <input type="text" name="verify" class="verify" />	
				<input type="submit" class="button <?php echo $contact_form['submit_button'] ?>" value="<?php _e('Submit', THEMEMAKERS_THEME_FOLDER_NAME); ?>" />	
			</p>
        
		<?php } else { ?>
			
		<input type="submit" class="button <?php echo $contact_form['submit_button'] ?>" value="<?php _e('Submit', THEMEMAKERS_THEME_FOLDER_NAME); ?>" />	
		
		<?php } ?>	

    </form>

    <div id="contact_form_responce" style="display: none;"><ul></ul></div>

    <?php
}
?>
<div class="clear"></div>

<?php wp_enqueue_script('contactform_js', THEMEMAKERS_THEME_URI . '/js/contactform.js') ?>

