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
			$username = $_SESSION["username"];
			$user = User::find_by_username($username);
		?>
		<h1>
			Thông tin cá nhân
		</h1>
		<div>
			<div>
				<h3>Tên đăng nhập:</h3>
				<p><?php echo $user->get_username()?></p>
				<h3>Họ và tên:</h3>
				<p><?php echo $user->get_fullname()?></p>
				<h3>Email:</h3>
				<p><?php echo $user->get_email()?></p>
				<h3>Số điện thoại:</h3>
				<p><?php echo $user->get_phonenumber()?></p>
				<h3>Avatar</h3>
				<img src="<?php echo $user->get_avatar()?>" alt="<?php echo $user->get_fullname()?>" width="200">
			</div>
		</div>
		<div>
			<a href="/page/edit_persional.php">Thay đổi thông tin cá nhân</a>
		</div>
	</body>
</html>