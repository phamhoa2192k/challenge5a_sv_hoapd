<?php
	setcookie("PHPSESSION", "", time() - 1);
	setcookie("USER", "", time() - 1 );
	header("Location: /page/login.php");
?>