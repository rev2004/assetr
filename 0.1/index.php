<?php
	/**
	 * assetr v0.1 <http://code.google.com/p/assetr/>
	 *
	 * Copyright 2008 Duane Jeffers
	 * This file is part of assetr.
	 *
	 * assetr is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation, either version 3 of the License, or
	 * (at your option) any later version.
	 *
	 * assetr is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with assetr.  If not, see <http://www.gnu.org/licenses/>.
	 *
	 * What is this file?:
	 * index.php - This is the main opening page for assetr.
	 **/

// Importing Request Variables (mainly get for the index).
import_request_variables("g", "get_");

// Start assetr initialization code - REQUIRED for assetr to run.
require_once("functions/display.functions.php"); // The Display Functions
require_once("classes/assetr.class.php"); // The assetr class
require_once("config.php"); // The Configuration file

$assetr = new assetr($config);
// End assetr initialization code


start_page("Login");
dis_header("0");

if(isset($get_err)) {
	dis_error($get_err);
}
dis_login("main.php");
dis_footer();

// Start assetr destruction code - REQUIRED for safe operation.
unset($assetr);
// End assetr destruction code
?>
