<?php

	class db {
		// properties
		private $dbhost="localhost";
		private $dbname="akademikdb";
		private $dbuser="root";
		private $dbpassword = "";

		// connect
		public function connect() {
			$mysql_connect_str = "mysql:host=".$this->dbhost.";dbname=".$this->dbname;
			$dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpassword);
			$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $dbConnection;
		}
	}