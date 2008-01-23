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
	 * config.php - This is the configuration file for assetr. - Need help? Check out: http://code.google.com/p/assetr/wiki/Configuration
	 **/

// SQL info
$config['sql']['server'] = "localhost";
$config['sql']['user'] = "root";
$config['sql']['password'] = "djroot";
$config['sql']['database'] = "assetr";
$config['sql']['pre'] = "";

// Cookie Variables
// Login Time. This allows for manual override of the cookie's timeout.
$config['cookie']['keeptime'] = time()+(60 * 60 * 24 * 90); // This will make the cookie timeout after 90 days. 
//Adversely, you can use mktime to set a time in the future, but this makes it timeout at a specific day, not based on when the login occurred.
//$config['cookie']['keeptime'] = mktime(0, 0, 0, 13, 2, 2010); // This will make the cookie timeout on February 13, 2010 at 00:00 (Midnight).
$config['cookie']['domain'] = "domainname.tld"; // You need to set this so you can specify what domain the cookie can only be accessed on.

// Folder Settings. - These are required for normal use.
$config['folder']['absolute'] = "/var/www/assetr"; // This is the absolute path where assetr is located on the server. (And please leave off the trailing slash).
$config['folder']['rep'] = "/repositories"; // This is the folder that holds the repositories. It should be located in the assetr directory.
$config['folder']['permission'] = "0777"; // Change the new folder permission settings. This is required for use.

// File Settings - These are required for normal use.
$config['file']['permission'] = "0777"; // This will set all the new files to 777.

// SMTP Settings - this is not required for normal use.
$config['smtp']['server'] = "localhost";
$config['smtp']['user'] = "username";
$config['smtp']['password'] = "password";
$config['smtp']['fromemail'] = "Name <email@localhost>";

// IMAP Settings - this is not required for normal use.
$config['imap']['server'] = "localhost";
$config['imap']['user'] = "username";
$config['imap']['password'] = "password";
$config['imap']['emailaddress'] = "email@localhost";

?>
