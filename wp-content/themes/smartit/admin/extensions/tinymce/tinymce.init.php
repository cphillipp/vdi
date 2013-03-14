<?php

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

//Get WordPress access
require_once( $path_to_wp . '/wp-load.php' );

?>