<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/connection.php";
 class Quizz {
	 private $id;
	 private $suggest;
	 private $filepath;

	 public function __construct($id, $suggest, $filepath){
		$this->id = $id;
		$this->suggest = $suggest;
		$this->filepath = $filepath;
	 }

	 public static function find_all(){
			$sql = "SELECT * from quizz ORDER BY id DESC;";
			$array = array();
			$result = (new Conn)->execute($sql);
			while($row = $result->fetch_assoc()){
				array_push($array, new Quizz($row['id'], $row['suggest'], $row['filepath']));
			}
			return $array;
	 }

	 public static function insert($suggest, $filepath){
		$sql = "INSERT INTO quizz (suggest , filepath) values ('".$suggest."','".$filepath."');";
		return (new Conn)->execute($sql);
	 }

	 public static function find_by_id($id){
		 $sql = "SELECT * FROM quizz WHERE id='".$id."';";
		 $quizz = (new Conn)->execute($sql)->fetch_assoc();
		 return new Quizz($quizz["id"], $quizz["suggest"], $quizz["filepath"]);
	 }


	 public function get_id(){
		 return $this->id;
	 }

	 public function get_suggest(){
		 return $this->suggest;
	 }

	 public function get_filepath(){
		 return $this->filepath;
	 }
 }