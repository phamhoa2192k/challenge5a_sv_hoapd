<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/session.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/user.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/homework.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/upload_file.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/student_homework.php";
	$homework = Homework::find_by_id($_GET["id"]);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Lớp học</title>
		<link rel="stylesheet" href="/public/css/all.css">
	</head>
	<body>
		<?php
			require_once $_SERVER["DOCUMENT_ROOT"]."/page/component/header.php";
		?>
		<h1 class="header">
			Nộp bài
		</h1>
		<div>
			<div>
				<?php
					echo "<div class=\"homework\">";
					echo "<h2><strong>Tiêu đề: </strong>".$homework->get_title()."</h2>";
					echo "<span><strong>Nội dung: </strong>".$homework->get_content()."</span><br>";
					if($homework->get_filepath() != null)
						echo "<span><strong>File đính kèm: </strong><a href='".$homework->get_filepath()."'>Xem</a></span><br>";
					echo "</div>";
				?>
			</div>
			<div>
				<?php
					$h = Student_Homework::find_by_username_and_id($_SESSION["username"], $_GET["id"]);
					if(!empty($h)){
						echo "<h3>Bạn đã nộp <a href='".$h->get_filepath()."'>bài</a></h3>";
					}
				?>
			</div>
			<div>
				<form action="/page/upload_homework.php?id=<?php echo $homework->get_id()?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="test" name="test" value="test">
					<label for="homework">Nộp bài:</label>
					<input type="file" name="homework" id="homework" required>
					<button type="submit">Nộp</button>
				</form>
				<?php
					if(!empty($_POST)){
						$filepath = upload_file("homework");
						$result = Student_Homework::upload_homework($_GET["id"], $_SESSION["username"], $filepath);
						if($result == true)
							header("Refresh:0");
						else echo "<h3>Nộp bài thất bại</h3>";
					}
				?>
			</div>
		</div>
	</body>
</html>