<?php

/* ----------------------------------------------------------------------------------- */
/* 	Paths Defenitions
  /*----------------------------------------------------------------------------------- */

define('TINYMCE_PATH', THEMEMAKERS_THEME_PATH . '/admin/extensions/tinymce');
define('TINYMCE_URI', THEMEMAKERS_THEME_URI . '/admin/extensions/tinymce');


/* ----------------------------------------------------------------------------------- */
/* 	Load TinyMCE dialog
  /*----------------------------------------------------------------------------------- */

require_once(TINYMCE_PATH.'/tinymce.class.php' );  // TinyMCE wrapper class
new tmk_tinymce();
