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
			Câu đố !!!
		</h1>
		<div>
			<div>
			<?php
				require_once $_SERVER["DOCUMENT_ROOT"]."/db/user.php";
				require_once $_SERVER["DOCUMENT_ROOT"]."/db/quizz.php";
				$username = $_SESSION["username"];
				$current_user = User::find_by_username($username);
				if($current_user->is_teacher())
					echo "<div><a href=\"/page/teacher/add_quizz.php\">Thêm câu đố</a></div>"
			?>
			</div>
			<div>
				<?php
					$quizz_array = Quizz::find_all();
					echo "<ul>";
					foreach($quizz_array as $quizz){
						echo "<h2><strong>Câu đố số: </strong>".$quizz->get_id()."</h2>";
						echo "<span><strong>Gợi ý: </strong>".$quizz->get_suggest()."</span><br>";
						if($current_user->is_teacher())
							echo "<span><strong>File đính kèm: </strong><a href='".$quizz->get_filepath()."'>Xem</a></span><br>";
						if(!$current_user->is_teacher()){
							echo "<input type=\"hidden\" name=\"id\" id=\"id\" value='".$quizz->get_id()."'>";
							echo "<input type=\"text\" name=\"answer\" id=\"answer\"placeholder='Đáp án viết không dấu, ví dụ: xin chao'>";
							echo "<button id='check' onclick='check_answer_quizz()'>Kiểm tra</button>";
						}
						echo "<div id='file_answer'></div>";
						//	echo "<div><a href=\"/page/teacher/student_homework.php?id=".$quizz->get_id()."\">Các học sinh đã làm</a></div>";
						//else
						//	echo "<div><a href=\"/page/upload_homework.php?id=".$hoquizzmework->get_id()."\">Nộp bài</a></div>";
					}
					echo "</ul>";
				?>
			</div>
		</div>
		<script src="/public/js/check_answer_quizz.js"></script>
	</body>
</html>