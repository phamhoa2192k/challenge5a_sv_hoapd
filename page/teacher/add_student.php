<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/session.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/page/teacher/check_teacher.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Thêm sinh viên</title>
		<link rel="stylesheet" href="/public/css/all.css">
	</head>
	<body>
		<?php
			include_once $_SERVER["DOCUMENT_ROOT"]."/page/component/header.php";
		?>
		<h1>
			Thêm sinh viên
		</h1>
		<div>
			<a href="/page/teacher/add_student.php">Thêm sinh viên</a>
		</div>
	</body>
</html>

