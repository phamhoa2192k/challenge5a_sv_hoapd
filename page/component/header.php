<div>
	<div><a href="/page/classroom.php">Lớp học</a></div>
	<div><a href="/page/persional.php">Thông tin cá nhân</a></div>
	<div><a href="/page/user_list.php">Danh sách người dùng</a></div>
	<?php
		require_once $_SERVER["DOCUMENT_ROOT"]."/db/user.php";
		$current_user = unserialize($_SESSION["userdata"]);
		if($current_user->is_teacher())
			echo "<div><a href=\"/page/teacher/list_student.php\">Danh sách học sinh</a></div>"
	?>
</div>