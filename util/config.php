<?php
	$file_config_path = $_SERVER["DOCUMENT_ROOT"]."/config.xml";
	$xml=simplexml_load_file($file_config_path) or die("Error: Cannot create object");
	define("SERVERNAME", $xml->database->servername);
	define("DBUSERNAME", $xml->database->username);
	define("DBPASSWORD", $xml->database->password);
	define("DBNAME", $xml->database->dbname);
?>
