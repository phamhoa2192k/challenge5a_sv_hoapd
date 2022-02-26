<?php
 function upload_file($name){
	$target_dir = "/upload"."/";
	$target_file = $target_dir.time().basename($_FILES[$name]["name"]);
	$file_tpye = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if (file_exists($target_file)) {
		return false;
	}
	if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"].$target_file)) {
		File::insert_file($_FILES["avatar"]["name"], $target_file);
		return $target_file;
	} else return false;
 }
?>