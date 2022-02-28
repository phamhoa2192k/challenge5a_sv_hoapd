<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/session.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/user.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/message.php";
	$username = $_GET["username"];
	$user = User::find_by_username($username);
	$currentuser = User::find_by_username($_SESSION["username"]);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Thông tin người dùng</title>
		<link rel="stylesheet" href="/public/css/all.css">
	</head>
	<body>
		<?php
			include_once $_SERVER["DOCUMENT_ROOT"]."/page/component/header.php";
		?>
		<h1 class="header">
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
			<h1>Tin nhắn</h1>
			<div>
				<label for="message">Tin nhắn:</label>
				<input type="text" id="message" name="message">
				<input type="hidden" id="recipient" value="<?php echo $_GET["username"]?>">
				<button onclick="sendMessage()">Gửi</button>
			</div>
			<div id="conversation">
				<?php
					$conversation = Message::get_conversation($_SESSION["username"], $_GET["username"]);
					if ($conversation == NULL) echo "<h3 id=\"tb\">Chưa có tin nhắn nào với người này</h3>";
					else foreach($conversation as $message){
						echo "<span><strong>".$message->get_sender_username().":</strong> ".$message->get_content()."</span><br>";
					}
				?>
			</div>
		</div>
		<script src="/public/js/send_message.js"></script>
	</body>
</html>