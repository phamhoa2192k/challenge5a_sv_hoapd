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
			Thêm học sinh
		</h1>
		<div>
			<a href="/page/teacher/add_student.php">Thêm học sinh</a>
		</div>
		<div>
			<form action="/page/teacher/add_student.php" method="post">
				<label for="username">Tên đăng nhập</label>
				<input type="text" id="username" name="username">
				<label for="password">Mật khẩu</label>
				<input type="password" id="password" name="password">
				<label for="fullname">Họ và tên</label>
				<input type="text" id="fullname" name="fullname">
				<label for="email">Email</label>
				<input type="text" id="email" name="email">
				<label for="phonenumber">Số điện thoại</label>
				<input type="text" id="phonenumber" name="phonenumber">
				<button type="submit">Thêm</button>
			</form>
			<?php
				if(!empty($_POST)){
					$result = User::insert($_POST["username"], $_POST["password"], $_POST["fullname"], $_POST["email"], $_POST["phonenumber"],"student");
					if($result == true)
						echo "<h3>Thêm học sinh thành công</h3>";
				  else echo "<h3>Thêm học sinh thất bại</h3>";
				}
			?>
		</div>
	</body>
</html>

