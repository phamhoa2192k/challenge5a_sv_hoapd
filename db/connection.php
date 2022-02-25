<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/config.php";
	class Conn{
		private $connect;

		public function execute($sql){
			$this->connect = new mysqli(SERVERNAME, DBUSERNAME, DBPASSWORD, DBNAME);
			if ($this->connect->connect_error) {
				die("Connection failed: " . $this->connect->connect_error);
			}
			$result = $this->connect->query($sql);
			$this->connect->close();
			return $result;
		}
	}
	
?>