<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/connection.php";
	class File{
		public static function insert_file($filename, $filepath){
			$sql = "INSERT INTO file (filename, filepath) values ('".$filename."','".$filepath."');";
			return (new Conn)->execute($sql);
		}

		public static function find_by_filename($filename){
			
		}
	}