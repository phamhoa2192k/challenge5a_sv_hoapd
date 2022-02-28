<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/session.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/page/teacher/check_teacher.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/student_homework.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/homework.php";
	$homework = Homework::find_by_id($_GET["id"]);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Đã làm bài</title>
		<link rel="stylesheet" href="/public/css/all.css">
	</head>
	<body>
		<?php
			include_once $_SERVER["DOCUMENT_ROOT"]."/page/component/header.php";
		?>
		<h1 class="header">
			Danh sách các học sinh đã làm bài tập
		</h1>
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
			<table>
				<tr>
					<th>Họ và tên</th>
					<th>Bài tập</th>
				</tr>
				<?php
					$user_array = User::find_all_student();
					foreach($user_array as $user){
						$h = Student_Homework::find_by_username_and_id($user->get_username(), $_GET["id"]);
						echo "<tr>";
						echo "<td>".$user->get_fullname()."</td>";
						if($h == NULL)
							echo "<td>Chưa làm</td>";
						else 
							echo "<td><a href='".$h->get_filepath()."'>Đã thực hiên</a></td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</body>
</html>

