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
     * mysql.driver.php - This is the mysql driver for assetr. It will be the basis for the other drivers.
     **/

    class sqldriver {
        protected $connection;
        
        public function connect($sqlserver, $sqlusername, $sqlpassword, $sqldatabase) {
            $this->connectioninfo = mysql_connect($sqlserver, $sqlusername, $sqlpassword);
            mysql_select_db($sqldatabase, $this->connection);
        }
        
        public function query($query) {
            $queryresult = mysql_query($query, $this->connection);
            return $queryresult;
        }
        
        public function grab_array($arr_info) {
            $arrayresult = mysql_fetch_array($arr_info);
            return $arrayresult;
        }
        
        public function error() {
            return mysql_error($this->connection);
        }
        
        public function disconnect() {
            // This will kill off the individual session in this class.
            mysql_close($this->connection);
        }
        
        function __construct($sqlserver, $sqlusername, $sqlpassword, $sqldatabase) {
            $this->connect($sqlserver, $sqlusername, $sqlpassword, $sqldatabase);
        }
        
        function __destruct() {
            $this->disconnect();
        }
    }
?>