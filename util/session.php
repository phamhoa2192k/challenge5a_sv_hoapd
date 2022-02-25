<?php
	if(isset($_COOKIE["PHPSESSION"]) && isset($_COOKIE["USER"])){
		$session = $_COOKIE["PHPSESSION"];
		$user = $_COOKIE["USER"];
		if($session != $_SESSION["cookie"] || $user != $_SESSION["username"])
			header("Location: /page/login.php");		
	}
	else header("Location: /page/login.php");
?>