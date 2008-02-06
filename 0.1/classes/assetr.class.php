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
	 * assetr.class.php - This is the assetr class, it is the superclass and any other classes are inherited from this.
	 **/

class assetr {

	/* Protected Functions and Variables */	// These are protected to stop the messing with the settings of assetr. But to allow for inherited classes to use them.
	// config.php variables.
	protected $config = array();
	
	// The SQL Connection, it is only used from elements in this class.
	protected $sql_conn;
	
	protected $sql_driv;

	// This will load the config into the memory. This is also for connecting to the database.
	protected function loadconfig($config) {
		$this->config = $config;
	}
	
	protected function loadDriver() {
		if(include_once("drivers/".$this->config['sql']['driver'].".driver.php")) {
			$classname = $this->['sql']['driver'];
			return new $classname;
		} else {
			$this->err_msg = "Driver does not exist";
			return 0;
		}
	}
	
	// This will connect to the database.
	protected function dbconnect($dbserver, $dbusername, $dbpassword, $dbdatabase) {
		$this->sqlconnection = mysql_connect($dbserver, $dbusername, $dbpassword);
		mysql_select_db($dbdatabase);
	}
	
	/* Public Functions and Variables */
	// If there is an error message ...
	public $err_msg;

	// This creates the repository
	public function createrepository($rep_name, $version="1", $subver="0", $build="0000") {
		$cr_date = time();
		$cr_query = "INSERT INTO " . $this->config['sql']['pre'] . "repositories ( id , name , currver , subver , buildnum , datecreate ) VALUES ( '' , '$rep_name' , '$version' , '$subver' , '$build' , $cr_date);";
		$cr_execute = mysql_query($cr_query);
		
		if(mysql_error()) {
			$this->err_msg = mysql_error($this->sqlconnection);
			return 0;
		}
		// Create repository folder ...
		$cr_path = $this->config['folder']['absolute'].$this->config['folder']['rep']."/".$rep_name; // Should be /var/www/assetr/repositories/assetr
		$cr_folder = mkdir($cr_path, $this->config['folder']['permission']);
		if(!$cr_folder) {
			$this->err_msg = "Could not create repository folder ... quitting.";
			return 0;
		} else {
			return 1;
		}
	}

	// Updates the current version of the project
	public function updateversion($rep_id, $new_ver) {
		$uv_query = "UPDATE " . $this->config['sql']['pre'] . "repositories SET currver=\"$new_ver\" WHERE id=\"$rep_id\";";
		$uv_execute = mysql_query($uv_query);

		if(mysql_error()) {
			$this->err_msg = mysql_error($this->sqlconnection);
			return 0;
		} else {
			return 1;
		}
	}
	
	// Updates the subversion of the project
	public function updatesubversion($rep_id, $new_sver) {
		$usv_query = "UPDATE " . $this->config['sql']['pre'] . "repositories SET subver=\"$new_sver\" WHERE id=\"$rep_id\";";
		$usv_execute = mysql_query($usv_query);

		if(mysql_error()) {
			$this->err_msg = mysql_error($this->sqlconnection);
			return 0;
		} else {
			return 1;
		}
	}

	// This function creates the folder
	public function createfolder($fol_name, $rep_id, $abs_path) {
		$cf_rep_q = "SELECT `name` FROM ".$this-config['sql']['pre']."repositories WHERE `id` = '".$rep_id."';";
		$cf_rep_exe = mysql_query($cf_rep_q, $this->sqlconnection);
		if(!$cf_rep_exe) {
			$this->err_msg = "Repository Does Not Exist";
			return 0;
		}
		$cf_rep_name = mysql_result($cf_rep_exe, 0); // The first row is the rep name.
		//Building the absolute path now
		$cf_query = "INSERT INTO ".$this->config['sql']['pre']."folders ( `id` , `name` , `repositoryid` , `parentfolder` ) VALUES ( '' , '".$fol_name."' , '".$rep_id."' , '".$abs_path."' );";
		$cf_execute = mysql_query($cf_query, $this->sqlconnection);
		if(mysql_error()) {
			$this->err_msg = mysql_error($this->sqlconnection);
			return 0;
		}
		$cf_path = $this->config['folder']['absolute'].$this->config['folder']['rep']."/".$cf_rep_name."/".$abs_path."/".$fol_name;
		$cf_folder = mkdir($cf_path, $this->config['folder']['permission']);
		if(!$cf_folder) {
			$this->err_msg = "Could not create folder ... quitting.";
			return 0;
		} else {
			return 1;
		}
	}

	// Creates user account
	public function createuser($u_name, $p_w, $real_name, $accesstype="0") {
		// Creating salt.
		$cu_salt_gen = str_split(md5(rand(100, 999)), 10);
		$cu_salt = $cu_salt_gen[0];
		
		// Generate Password:
		$cu_pass = md5(md5($p_w).$cu_salt);
		$cu_query = "INSERT INTO " . $this->config['sql']['pre'] . "users ( id , username , password , realname , salt , type ) VALUES ( '' , '".$u_name."' , '".$cu_pass."' , '".$real_name."' , '".$cu_salt."' , '".$accesstype."' );";
		
	}

	// Generates query information.
	public function browsefolder($folder_id) {

	}
	
	// Adds file to database.
	public function addfile($filename, $filedata, $repository, $folder) {

	}
	
	// Updates file on the server.
	public function fileupdate($assetid, $filedata) {

	}

	// Generates file for download.
	public function downloadfile($assetid) {

	}
	
	// Compresses generated files for repository download.
	public function downloadrepository($rep_id) {
	
	}
	
	// Verifies login
	public function checklogin($username, $password, $cookie="0") {
		$cl_user_query = "SELECT * FROM " . $this->config['sql']['pre'] . "users WHERE user=\"" . $username . "\";";
		$cl_user_execute = mysql_query($cl_user_query);
		//checking the number of rows.
		$cl_user_rows = mysql_num_rows($cl_user_execute);
		$cl_user_arr = mysql_fetch_array($cl_user_execute);
		if($cl_user_rows < "1") {
			$this->err_msg = "User Does Not Exist";
			return 0;
		} else {
			// This person has one or more accounts.
			if($username === $cl_user_arr["user"]) {
					// Verify account.
					$pw = md5(md5($password).$cl_user_arr["salt"]);
					if($pw !== $cl_user_arr["password"]) {
						$this->err_msg = "Password is incorrect";
						return 0;
					} else {
						if($cookie !== "0") {
							$this->set_cookie($username, $pw, "1");
						} else {
							$this->set_cookie($username, $pw);
						}
						return 1;
					}
			} else {
				$this->err_msg = "Username is not legitimate";
				return 0;
			}
		}		
	}

	// Creates cookie for login.
	public function set_cookie($username, $password, $keeplogin="0") {
		if($keeplogin !== "0") {		
			$time = $this->config['cookie']['keeptime'];
		} else {
			$time = "";
		}
		setcookie("assetr_username", $username, $time, '', $config['cookie']['domain']);
		setcookie("assetr_auth", $password, $time, '', $config['cookie']['domain']);
	}
	/* Class Functions */
	function __construct($config) {
		$this->loadconfig($config);
		$this->sql_driv = $this->loadDriver();
		$this->dbconnect($this->config['sql']['server'], $this->config['sql']['user'], $this->config['sql']['password'], $this->config['sql']['database']);
	}	

	function __destruct() {
		mysql_close($this->sqlconnection);
	}
}
?>
