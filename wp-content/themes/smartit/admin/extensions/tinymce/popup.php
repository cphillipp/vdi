<?php

// loads the shortcodes class, wordpress is loaded with it
require_once('shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new tmk_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="tmk-popup">

	<div id="tmk-shortcode-wrap">
		
		<div id="tmk-sc-form-wrap">
		
			<div id="tmk-sc-form-head">
			
				<?php echo $shortcode->popup_title; ?>
			
			</div>
			<!-- /#tmk-sc-form-head -->
			
			<form method="post" id="tmk-sc-form">
			
				<table id="tmk-sc-form-table">
				
					<?php echo $shortcode->output; ?>
					
					<tbody>
						<tr class="form-row clearfix">
							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
							<td class="field"><a href="#" class="button-primary tmk-insert"><?php _e('Insert Shortcode', THEMEMAKERS_THEME_FOLDER_NAME); ?></a></td>							
						</tr>
					</tbody>
				
				</table>
				<!-- /#tmk-sc-form-table -->
				
			</form>
			<!-- /#tmk-sc-form -->
		
		</div>
		<!-- /#tmk-sc-form-wrap -->
		
		<div id="tmk-sc-preview-wrap">
		
			<div id="tmk-sc-preview-head">
		
				<?php _e('Shortcode Preview', THEMEMAKERS_THEME_FOLDER_NAME); ?>
					
			</div>
			<!-- /#tmk-sc-preview-head -->
			
			<?php if( $shortcode->no_preview ) : ?>
			<div id="tmk-sc-nopreview">Shortcode has no preview</div>		
			<?php else : ?>			
			<iframe src="<?php echo TINYMCE_URI; ?>/preview.php?sc=" width="249" frameborder="0" id="tmk-sc-preview"></iframe>
			<?php endif; ?>
			
		</div>
		<!-- /#tmk-sc-preview-wrap -->
		
		<div class="clear"></div>
		
	</div>
	<!-- /#tmk-shortcode-wrap -->

</div>
<!-- /#tmk-popup -->

</body>
</html>