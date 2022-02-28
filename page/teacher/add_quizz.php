<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/session.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/page/teacher/check_teacher.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/util/upload_file.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/file.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/quizz.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Thêm câu đố</title>
		<link rel="stylesheet" href="/public/css/all.css">
	</head>
	<body>
		<?php
			include_once $_SERVER["DOCUMENT_ROOT"]."/page/component/header.php";
		?>
		<h1 class="header">
			Thêm cấu đố !!!
		</h1>
		<div>
			<form action="/page/teacher/add_quizz.php" method="post" enctype="multipart/form-data">
				<label for="suggest">Gợi ý:</label><br>
				<textarea name="suggest" id="suggest" cols="50" rows="5" required></textarea><br>
				<label for="quizz">File đính kèm (.txt):</label>
				<input type="file" id="quizz" name="quizz" required>
				<button type="submit">Thêm</button>	
			</form>
			<?php
				if(!empty($_POST)){
					$quizz_file = null;
					if( !empty($_FILES["quizz"])){
						$quizz_file = upload_file("quizz");
						$file_tpye = strtolower(pathinfo($quizz_file,PATHINFO_EXTENSION));
						if($file_tpye == "txt"){		
							$result = Quizz::insert($_POST["suggest"], $quizz_file);
							if($result == true)
								echo "<h3>Thêm quizz thành công</h3>";
				  		else echo "<h3>Thêm quizz thất bại</h3>";
						}
						else echo "<h3>File không đúng định dạng</h3>";
					} 
				}
			?>
		</div>
	</body>
</html>

