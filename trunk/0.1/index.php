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
	 * index.php - This is the main loadout page. It is where the site design and functions meet.
	 **/

// Importing Request Variables
import_request_variables("gp", "var_");

//Parse out request variables.
if(isset($var_q) && !empty($var_q)) {
	// The variable is in place.
	$count = strlen($var_q); //This counts the length of the string.
	if(substr_count($var_q, "/", 0, $count) >= 1) {
		// There are more variables that exist. Time to strip them out.
		$req_var = explode("/", $var_q); // This will create an array that will house all the other variables.
		$assetr_page = $req_var[0];
	} else {
		// If there are no backslashes in the request variable, then the page is the request variable.
		$assetr_page = $var_q;
	}
}


?>
