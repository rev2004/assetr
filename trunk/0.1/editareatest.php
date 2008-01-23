<?php
	/**
	 * assetr v0.1
	 * Written By: Duane Jeffers
	 *
	 * Please Read License.txt for licensing info.
	 *
	 * What is this file?:
	 * editareatest.php - This is the main opening page for assetr.
	 **/

// Importing Request Variables (mainly get for the index.
import_request_variables("g", "get_");

// Start assetr initialization code - REQUIRED for assetr to run.
require_once("functions/display.functions.php"); // The Display Function
require_once("classes/assetr.class.php"); // The assetr class
require_once("config.php"); // The Configuration file

$assetr = new assetr($config);
// End assetr initialization code
$file = fopen("index.php", "r");
$data = fread($file, filesize("index.php"));

start_page("EditArea Test");
dis_header_editarea("1", "php");
dis_header();
dis_code_edit($data);
dis_footer();
unset($assetr);
?>