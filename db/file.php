<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/connection.php";
	class File{
		public static function insert_file($filename, $filepath){
			$sql = "INSERT INTO file (filename, filepath) values ('".$filename."','".$filepath."');";
			return (new Conn)->execute($sql);
		}

		public static function find_filename_by_filepath($filepath){
			$sql = "SELECT filename from file where filepath = '".$filepath."';";
			$result = (new Conn)->execute($sql);
			return $result->fetch_assoc()["filename"];
		}
	}