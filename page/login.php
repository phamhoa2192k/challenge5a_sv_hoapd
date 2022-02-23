<?php
			if(isset($_POST["username"]) && isset($_POST["password"])){
				$username = $_POST["username"];
				$password = $_POST["password"];
				if($username == "hoa" && $password == "1"){
					setcookie("challenge", "success", time() + 60 * 60, "/");
				}
				else 
				header("Location: /classroom.php");
			}
			?>
<!DOCTYPE>
<html>
	<head>
		<title>Đăng nhập</title>
	</head>
	<body>
		<div>
			<div>
				<h4>Đăng nhập</h4>
				<form action="/login.php" method="post">
					<label for="username">Tên đăng nhập</label>
					<input type="text" id="username" name="username" required>
					<label for="password">Mật khẩu</label>
					<input type="password" id="password" name="password" required>
					<button type="submit">Đăng nhập</button>
				</form>
			</div>
		</div>
	</body>
</html>