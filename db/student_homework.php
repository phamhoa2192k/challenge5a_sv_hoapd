<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/connection.php";
	class Student_Homework{
		private $id_homework;
		private $username;
		private $filepath;

		public function __construct($id_homework, $username, $filepath){
			$this->id_homework = $id_homework;
			$this->username = $username;
			$this->filepath = $filepath;
		}

		public static function upload_homework($id_homework, $username, $filepath){
			$check = Student_Homework::find_by_username_and_id($username, $id_homework);
			if($check == NULL)
				$sql = "INSERT INTO student_homework (id_homework, username, filepath) VALUES ('".$id_homework."','".$username."','".$filepath."');";
			else $sql = "UPDATE student_homework set filepath='".$filepath."' where id_homework = '".$id_homework."' and username = '".$username."';"; 
			return (new Conn)->execute($sql);
		}

		public static function find_by_username_and_id($username, $id){
			$sql = "SELECT * from student_homework where username='".$username."' and id_homework='".$id."';";
			$result = (new Conn)->execute($sql);
			if($result->num_rows == 0) return null;
			$row = $result->fetch_assoc();
			return new Student_Homework($row["id_homework"], $row["username"], $row["filepath"]);
		}
		
		public function get_id_homework(){
			return $this->id_homework;
		}

		public function get_username(){
			return $this->username;
		}

		public function get_filepath(){
			return $this->filepath;
		}
	}