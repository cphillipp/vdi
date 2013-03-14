<?php
//contact form
$contact_form = Thememakers_Entity_Contact_Form::get_form($instance['form']);
//output fields
if (!empty($contact_form['inputs'])) {
	?>

	<div class="widget widget_contact">
		
		<h3 class="widget-title"><?php echo $instance['title'] ?></h3>
		
		<div id="message"></div>
		
		<form method="post" onsubmit="return submit_widget_contact_form(this)">
			
			<?php foreach ($contact_form['inputs'] as $key => $input) : ?>
			
				<div class="clear"></div>
				
				<p class="input-block"><label><?php echo $input['label'] ?> <?php echo($input['is_required'] ? "*" : "") ?></label>
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
				
			<?php if ($contact_form['has_capture']): ?>
				
				<p>
					<iframe src="<?php echo home_url() ?>/?update_capcha=1" height="38" width="72" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" style="vertical-align: middle;" class="capcha_image_frame" name="capcha_image_frame_widget"></iframe>
					<input class="widget_verify verify" type="text" style="width: 50px; vertical-align: middle;" value="" size="6" name="verify" class="verify" />
				</p>
				
			<?php endif; ?>
			<input type="hidden" name="contact_form_name" value="<?php echo $instance['form'] ?>" />
			<input type="submit" class="button orange" value="<?php _e('Submit', THEMEMAKERS_THEME_FOLDER_NAME); ?>" />
		</form>
		<div class="contact_form_responce" style="display: none"><ul></ul></div>
	</div>
	<?php
}
?>
<div class="clear"></div>
