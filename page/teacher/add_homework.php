<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/session.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/page/teacher/check_teacher.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/upload_file.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/file.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/homework.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Thêm bài tập</title>
		<link rel="stylesheet" href="/public/css/all.css">
	</head>
	<body>
		<?php
			include_once $_SERVER["DOCUMENT_ROOT"]."/page/component/header.php";
		?>
		<h1 class="header">
			Thêm bài tập
		</h1>
		<div>
			<form action="/page/teacher/add_homework.php" method="post" enctype="multipart/form-data">
				<label for="title">Tiêu đề:</label>
				<input type="text" id="title" name="title" required>
				<label for="content">Nội dung:</label><br>
				<textarea name="content" id="content" cols="50" rows="5" required></textarea><br>
				<label for="attachment">File đính kèm:</label>
				<input type="file" id="attachment" name="attachment">
				<button type="submit">Thêm</button>	
			</form>
			<?php
				if(!empty($_POST)){
					$attachment_file = null;
					if( !empty($_FILES["attachment"])){
						$attachment_file = upload_file("attachment");
						if($attachment_file == false){
							echo "<h3>Upload file thất bại</h3>";
						}
					}
					$result = Homework::insert($_POST["title"], $_POST["content"], $attachment_file);
					if($result == true)
						echo "<h3>Thêm bài tập thành công</h3>";
				  else echo "<h3>Thêm bài tập thất bại</h3>";
				}
			?>
		</div>
	</body>
</html>

