<!DOCTYPE html>
<html>
	<head>
		<title>Đăng nhập</title>
		<link rel="stylesheet" href="/public/css/all.css">
	</head>
	<body>
		<div>
			<div>
				<h4>Đăng nhập</h4>
				<form action="/page/login.php" method="post" class="login-form">
					<label for="username">Tên đăng nhập:</label>
					<input type="text" id="username" name="username" required>
					<label for="password">Mật khẩu:</label>
					<input type="password" id="password" name="password" required>
					<button type="submit">Đăng nhập</button>
				</form>
				<?php
					require_once $_SERVER["DOCUMENT_ROOT"]."/util/gen.php";
					require_once $_SERVER["DOCUMENT_ROOT"]."/db/user.php";
					if(isset($_POST["username"]) && isset($_POST["password"])){
						$username = $_POST["username"];
						$password = $_POST["password"];
						$user = User::find_by_username($username);
						if($user != NULL && $user->check_password($password)){
							$cookie = generate_random_string();
							$_SESSION["username"] = $username;
							$_SESSION["cookie"] = $cookie;
							$_SESSION["userdata"] = serialize($user);
							setcookie("PHPSESSION", $cookie, time() + 30 * 30);
							setcookie("USER", $username, time() + 30 * 30 );
							header("Location: /page/classroom.php");
						}
						else {
							echo "<p>Tên đăng nhập hoặc mật khẩu không đúng</p>";
						}
					}
				?>
			</div>
		</div>
	</body>
</html>