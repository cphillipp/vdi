<?php
class tmk_tinymce
{	
	function __construct()
	{
		add_action('admin_init', array( &$this, 'tmk_head' ));
		add_action('init', array( &$this, 'tmk_tinymce_rich_buttons' ));
		add_action('admin_print_scripts', array( &$this, 'tmk_quicktags' ));
	}
	
	// --------------------------------------------------------------------------
	
	function tmk_head()
	{
		
		//Styles
		wp_enqueue_style( 'tmk-popup', TINYMCE_URI . '/css/popup.css');
		
		//Scripts
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script( 'jquery-livequery-shortcodes', TINYMCE_URI . '/js/jquery.livequery.js');
		wp_enqueue_script( 'jquery-appendo-shortcodes', TINYMCE_URI . '/js/jquery.appendo.js');
		wp_enqueue_script( 'base64-shortcodes', TINYMCE_URI . '/js/base64.js');
		wp_enqueue_script( 'tmk-popup-shortcodes', TINYMCE_URI . '/js/popup.js');
		
	}
	
	//Register buttons
	function tmk_tinymce_rich_buttons()
	{
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
	
		if ( get_user_option('rich_editing') == 'true' )
		{
			add_filter( 'mce_external_plugins', array( &$this, 'tmk_add_rich_plugins' ) );
			add_filter( 'mce_buttons', array( &$this, 'tmk_register_rich_buttons' ) );
		}
	}
	
	//Define Plugin
	function tmk_add_rich_plugins( $plugin_array )
	{
		if	(is_plugin_active('woocommerce/woocommerce.php')){
				$plugin_array['tmkShortcodes'] = TINYMCE_URI . '/plugin_wo.js';
				return $plugin_array;
		}
		else{
				$plugin_array['tmkShortcodes'] = TINYMCE_URI . '/plugin.js';
				return $plugin_array;
		}
				
	}
	
	//Buttons
	function tmk_register_rich_buttons( $buttons )
	{
		array_push( $buttons, "|", 'tmk_button' );
		return $buttons;
	}
	
	function tmk_quicktags() {}
}
?>