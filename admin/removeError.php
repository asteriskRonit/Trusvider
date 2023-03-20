<?php
$display_error = ini_get('display_errors');
ini_set('display_errors', $display_error);
error_reporting(0);
error_reporting(E_ALL ^ E_WARNING);
error_reporting(E_ERROR | E_PARSE);
?>