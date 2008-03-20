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
	 * checklogin.php - this checks the user's information. - She's a beaut with only 13 actual lines of code!
	 **/

// Importing Request Variables
import_request_variables("p", "post_");

// Start assetr initialization code - REQUIRED for assetr to run.
require_once("classes/assetr.class.php"); // The assetr class
require_once("config.php"); // The Configuration file
$assetr = new assetr($config);
// End assetr initialization code

// The beauty of OOP code ... one bit of code does a whole lot!
$cl = $assetr->checklogin($post_username, $post_password, $post_cookie);

if($cl !== 1 && isset($assetr->err_msg)) {
	$url_err = urlencode("$assetr->err_msg");
	header("Location: main.php?err=$url_err");
	break;
} else {
	header("Location: $post_return");
}

unset($assetr);
?>
