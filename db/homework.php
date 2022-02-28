<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/connection.php";
 class Homework {
	 private $id;
	 private $title;
	 private $content;
	 private $filepath;

	 public function __construct($id, $title, $content, $filepath){
		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
		$this->filepath = $filepath;
	 }

	 public static function find_all(){
			$sql = "SELECT * from homework ORDER BY id DESC;";
			$array = array();
			$result = (new Conn)->execute($sql);
			while($row = $result->fetch_assoc()){
				array_push($array, new Homework($row['id'], $row['title'], $row['content'], $row['filepath']));
			}
			return $array;
	 }

	 public static function insert($title, $content, $filepath){
		 if($filepath == null){
			$sql = "INSERT INTO homework (title, content) values ('".$title."','".$content."');";
		 }
		else $sql = "INSERT INTO homework (title, content , filepath) values ('".$title."','".$content."','".$filepath."');";
		return (new Conn)->execute($sql);
	 }

	 public static function find_by_id($id){
		 $sql = "SELECT * FROM homework WHERE id='".$id."';";
		 $homework = (new Conn)->execute($sql)->fetch_assoc();
		 return new Homework($homework["id"], $homework["title"], $homework["content"], $homework["filepath"]);
	 }


	 public function get_id(){
		 return $this->id;
	 }

	 public function get_title(){
		 return $this->title;
	 }

	 public function get_content(){
		 return $this->content;
	 }

	 public function get_filepath(){
		 return $this->filepath;
	 }
 }