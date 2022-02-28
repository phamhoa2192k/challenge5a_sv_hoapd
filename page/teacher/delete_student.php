<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/session.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/page/teacher/check_teacher.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/user.php";
	$username = $_GET["username"];
	$user = User::find_by_username($username);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Xoá học sinh</title>
		<link rel="stylesheet" href="/public/css/all.css">
	</head>
	<body>
		<?php
			include_once $_SERVER["DOCUMENT_ROOT"]."/page/component/header.php";
		?>
		<h1 class="header">
			Xoá học sinh
		</h1>
		<div>
			<a href="/page/teacher/add_student.php">Thêm học sinh</a>
		</div>
		<div>
			<form action="/page/teacher/delete_student.php?username=<?php echo $username?>" method="post">
				<label for="username">Tên đăng nhập</label>
				<input type="text" id="username" name="username" value="<?php echo $user->get_username()?>" readonly>
				<label for="password">Mật khẩu</label>
				<input type="password" id="password" name="password" value="<?php echo $user->get_password()?>" disabled>
				<label for="fullname">Họ và tên</label>
				<input type="text" id="fullname" name="fullname" value="<?php echo $user->get_fullname()?>" disabled>
				<label for="email">Email</label>
				<input type="text" id="email" name="email" value="<?php echo $user->get_email()?>" disabled>
				<label for="phonenumber">Số điện thoại</label>
				<input type="text" id="phonenumber" name="phonenumber" value="<?php echo $user->get_phonenumber()?>" disabled>
				<button type="submit">Xoá</button>
			</form>
			<?php
				if(!empty($_POST)){
					var_dump($_POST);
					$result = User::delete($username);
					if($result == true)
						header("Location: /page/teacher/list_student.php");
				  else echo "<h3>Xoá học sinh không thành công</h3>";
				}
			?>
		</div>
	</body>
</html>

