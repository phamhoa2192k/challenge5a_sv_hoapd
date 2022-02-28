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
		<title>Chỉnh sửa thông tin</title>
		<link rel="stylesheet" href="/public/css/all.css">
	</head>
	<body>
		<?php
			include_once $_SERVER["DOCUMENT_ROOT"]."/page/component/header.php";
		?>
		<h1 class="header">
			Chỉnh sửa thông tin học sinh
		</h1>
		<div>
			<a href="/page/teacher/add_student.php">Thêm học sinh</a>
		</div>
		<div>
			<form action="/page/teacher/edit_student.php?username=<?php echo $_GET['username']?>" method="post">
				<label for="username">Tên đăng nhập</label>
				<input type="text" id="username" name="username" value="<?php echo $user->get_username()?>" readonly>
				<label for="password">Mật khẩu</label>
				<input type="password" id="password" name="password" value="<?php echo $user->get_password()?>">
				<label for="fullname">Họ và tên</label>
				<input type="text" id="fullname" name="fullname" value="<?php echo $user->get_fullname()?>">
				<label for="email">Email</label>
				<input type="text" id="email" name="email" value="<?php echo $user->get_email()?>">
				<label for="phonenumber">Số điện thoại</label>
				<input type="text" id="phonenumber" name="phonenumber" value="<?php echo $user->get_phonenumber()?>">
				<input type="radio" id="teacher" name="role" value="teacher" <?php if($user->is_teacher()) echo "checked"?> >
				<label for="teacher">Giáo viên</label><br>
				<input type="radio" id="student" name="role" value="student" <?php if(!$user->is_teacher()) echo "checked"?> >
				<label for="student">Học sinh</label><br>
				<button type="submit">Chỉnh sửa</button>
			</form>
			<?php
				if(!empty($_POST)){
					$result = User::update($_POST["username"], $_POST["password"], $_POST["fullname"], $_POST["email"], $_POST["phonenumber"], $_POST["role"]);
					if($result == true)
						header("Refresh:0");
				  else echo "<h3>Chỉnh sửa thất bại</h3>";
				}
			?>
		</div>
	</body>
</html>

