<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/file.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/quizz.php";

	if(!empty($_POST)){
		$answer = $_POST['answer'];
		$id = $_POST['id'];
		$filepath = Quizz::find_by_id($id)->get_filepath();
		$correct_answer = File::find_filename_by_filepath($filepath);
		$correct_answer = str_replace(".txt", "", $correct_answer);
		$correct_answer = str_replace("_", " ", $correct_answer);
		header("Content-Type: application/json");
		if($answer == $correct_answer){
			$res = array("correct" => true, "filepath" => $filepath);
			echo json_encode($res);
		}
		else {
			$res = array("correct" => false);
			echo json_encode($res);
		}
	}
?>