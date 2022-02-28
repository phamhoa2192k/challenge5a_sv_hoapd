<div >
	<div class="nav-bar">
		<div><a href="/page/classroom.php">Lớp học</a></div>
		<div><a href="/page/persional.php">Thông tin cá nhân</a></div>
		<div><a href="/page/user_list.php">Danh sách người dùng</a></div>
		<div><a href="/page/quizz.php">Câu đố</a></div>
		<?php
			require_once $_SERVER["DOCUMENT_ROOT"]."/db/user.php";
			$username = $_SESSION["username"];
			$current_user = User::find_by_username($username);
			if($current_user->is_teacher())
				echo "<div><a href=\"/page/teacher/list_student.php\">Danh sách học sinh</a></div>"
		?>
	</div>
	<div class="persional">
		<strong>Xin chào <a href="/page/persional.php"><?php echo $current_user->get_fullname()?></a></strong>
		<img src="<?php echo $current_user->get_avatar()?>" alt="<?php echo $current_user->get_fullname()?>" width="40"><br>
		<a href="/page/logout.php">Đăng xuất</a>
	</div>
</div>

