<?php 

	/**
	 * 
	 */
	class DB_CONNECT {
		function_construct() {
			$this->connect();
		}

		function_destruct() {
			$this->close();
		}

		function connect() {
			$filepath = realpath(dirname(__FILE__));
			require_once($filepath."/dbconfig.php");
			$con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());
			$db = mysql_select_db(DB_DATABASE) or die(mysql_error()) or die(mysql_error()); 
		}

		function close() {
			mysql_close();
		}

	}
?>