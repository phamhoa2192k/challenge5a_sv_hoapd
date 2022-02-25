<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/user.php";
	if(!unserialize($_SESSION["userdata"])->is_teacher())
		header("Location: /page/error/403.php");
?>