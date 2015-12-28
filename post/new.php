<?php require('../config/config.php'); ?>
<!DOCTYPE html>
<html lang="ko-kr">
<head>
	<meta charset="utf-8">
	<style>
	.top {
		display : inline;
	}
	</style>
</head>
<body>
	<form action="./new.php" method="post">
		<div class="top">
			작성자
			<input type="text" name="author">
		</div>
		<div class="top">
			제목
			<input type="text" name="title">
		</div>
		<div>
			<p>내용</p>
			<textarea rows="20" cols="150" name="content"></textarea>
		</div>
		<input type="submit" name="submit" value="작성완료"></input>
	</form>
	<?php

	if(!empty($_POST["submit"])) {

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		$sql = "INSERT INTO mainboard (author, title, date, content)
		VALUES ('".$author."','".$title."','".date('Y-m-d H:i:s')."','".$content."');";

		$result = $conn->query($sql);

		echo "
		<script>
		alert(\"작성이 완료되었습니다\");
		location.replace(\"./index.php\");
		</script>
		";
	}
	?>

</body>
</html>