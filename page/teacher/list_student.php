<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/session.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/page/teacher/check_teacher.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Danh sách học sinh</title>
		<link rel="stylesheet" href="/public/css/all.css">
	</head>
	<body>
		<?php
			include_once $_SERVER["DOCUMENT_ROOT"]."/page/component/header.php";
		?>
		<h1>
			Thông tin chi tiết học sinh
		</h1>
		<div>
			<a href="/page/teacher/add_student.php">Thêm học sinh</a>
		</div>
		<div>
			<h3>Danh sách sinh viên</h3>
			<table>
				<tr>
					<th>Tên đăng nhập</th>
					<th>Họ và tên</th>
					<th>Email</th>
					<th>Số điện thoại</th>
					<th></th>
					<th></th>
				</tr>
				<?php
					$user_array = User::find_all_student();
					foreach($user_array as $user){
						echo "<tr>";
						echo "<td>".$user->get_username()."</td>";
						echo "<td>".$user->get_fullname()."</td>";
						echo "<td>".$user->get_email()."</td>";
						echo "<td>".$user->get_phonenumber()."</td>";
						echo "<td><a href=\"/page/teacher/edit_student.php?username=".$user->get_username()."\">Chỉnh sửa</a></td>";
						echo "<td><a href=\"/page/teacher/delete_student.php?username=".$user->get_username()."\">Xoá</a></td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</body>
</html>

