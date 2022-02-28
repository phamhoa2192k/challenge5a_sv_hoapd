<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/session.php"
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Danh sách người dùng</title>
		<link rel="stylesheet" href="/public/css/all.css">
	</head>
	<body>
		<?php
			include_once $_SERVER["DOCUMENT_ROOT"]."/page/component/header.php";
		?>
		<h1 class="header">
			Danh sách người dùng
		</h1>
		<div>
		<table>
				<tr>
					<th>Tên đăng nhập</th>
					<th>Họ và tên</th>
					<th>Email</th>
					<th>Số điện thoại</th>
					<th></th>
				</tr>
				<?php
					$user_array = User::find_all();
					foreach($user_array as $user){
						echo "<tr>";
						echo "<td>".$user->get_username()."</td>";
						echo "<td>".$user->get_fullname()."</td>";
						echo "<td>".$user->get_email()."</td>";
						echo "<td>".$user->get_phonenumber()."</td>";
						echo "<td><a href=\"/page/detail.php?username=".$user->get_username()."\">Chi tiết</a></td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</body>
</html>