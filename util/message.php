<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/message.php";
	if(!empty($_POST)){
		$message = $_POST["message"];
		$sender = $_SESSION["username"];
		$recipient = $_POST["recipient"];
		$result = Message::send_message($sender, $recipient, $message);
		if($result == true){
			header("Content-Type: application/json");
			$res = array('success' => true, 'sender' => $_SESSION['username']);
			echo json_encode($res);
		}
		else {
			header("Content-Type: application/json");
			$res = array('success' => false);
			echo json_encode($res);
		}
	}
?>