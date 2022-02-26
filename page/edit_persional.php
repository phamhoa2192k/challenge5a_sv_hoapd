<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/session.php"
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Thông tin cá nhân</title>
		<link rel="stylesheet" href="/public/css/all.css">
	</head>
	<body>
		<?php
			include_once $_SERVER["DOCUMENT_ROOT"]."/page/component/header.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/db/user.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/db/file.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/util/upload_file.php";
			$username = $_SESSION["username"];
			$user = User::find_by_username($username);
		?>
		<h1>
			Thay đổi thông tin cá nhân
		</h1>
		<div>
		<div>
			<form action="/page/edit_persional.php" method="post" enctype="multipart/form-data">
				<label for="username">Tên đăng nhập</label>
				<input type="text" id="username" name="username" value="<?php echo $user->get_username()?>" readonly>
				<label for="password">Mật khẩu</label>
				<input type="password" id="password" name="password" value="" required>
				<label for="fullname">Họ và tên</label>
				<input type="text" id="fullname" name="fullname" value="<?php echo $user->get_fullname()?>" readonly>
				<label for="email">Email</label>
				<input type="text" id="email" name="email" value="<?php echo $user->get_email()?>" required>
				<label for="phonenumber">Số điện thoại</label>
				<input type="text" id="phonenumber" name="phonenumber" value="<?php echo $user->get_phonenumber()?>" required>
				<label for="avatar">Avatar</label>
				<input type="file" name="avatar" id="avatar" required>
				<button type="submit">Chỉnh sửa</button>
			</form>
			<?php
				if(!empty($_POST)) {
					$avatar_file = upload_file("avatar");
					if($avatar_file == false){
						echo "<h3>Upload avatar thất bại</h3>";
					}
					$result = User::update_persional($_POST["username"], $_POST["password"], $_POST["email"], $_POST["phonenumber"], $avatar_file);
					if($result == true){
						header("Location: /page/persional.php");
					}
					else echo "<h3>Cập nhập thất bại</h3>";
				}
			?>
		</div>
		</div>
	</body>
</html>