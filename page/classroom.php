<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/session.php"
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
			Chào mừng các bạn đến với lớp học Challenge 5!
		</h1>
		<div>
			<div>
			<?php
				require_once $_SERVER["DOCUMENT_ROOT"]."/db/user.php";
				require_once $_SERVER["DOCUMENT_ROOT"]."/db/homework.php";
				$username = $_SESSION["username"];
				$current_user = User::find_by_username($username);
				if($current_user->is_teacher())
					echo "<div><a href=\"/page/teacher/add_homework.php\">Thêm bài tập</a></div>"
			?>
			</div>
			<div>
				<?php
					$homework_array = Homework::find_all();
					foreach($homework_array as $homework){
						echo "<div class=\"homework\">";
						echo "<h2><strong>Tiêu đề: </strong>".$homework->get_title()."</h2>";
						echo "<span><strong>Nội dung: </strong>".$homework->get_content()."</span><br>";
						if($homework->get_filepath() != null)
							echo "<span><strong>File đính kèm: </strong><a href='".$homework->get_filepath()."'>Xem</a></span><br>";
						if($current_user->is_teacher())
							echo "<div><a href=\"/page/teacher/student_homework.php?id=".$homework->get_id()."\">Các học sinh đã làm</a></div>";
						else
							echo "<div><a href=\"/page/upload_homework.php?id=".$homework->get_id()."\">Nộp bài</a></div>";
						echo "</div>";
					}
				?>
			</div>
		</div>
	</body>
</html>