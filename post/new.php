<?php require('../config/config.php');
//check if already logged in
if( !$user->is_logged_in() ){
	echo "
	<script>
	location.replace(\"../user/login.php\");
	</script>";
}
	require("../layout/head.php");
?>
	<style>
	.top {
		display : inline;
	}
	</style>
</head>
<body>
	<form action="./new" method="post">
		<div class="top">
			제목
			<input type="text" name="title">
		</div>
		<div class="top">
			게시판이름
			<select name="board_id">
				<?php

				$sql = "SELECT board_id, boardname FROM boards";

				$result = $conn->query($sql);

				while($row = $result->fetch())
				{
					echo '<option value="'.$row["board_id"].'">'.$row["boardname"].'</option>';
				}
				?>
  
			</select>
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

		$sql = "INSERT INTO posts (user_id, title, date, content , board_id) VALUES ('".'1'."','".$title."','".date('Y-m-d H:i:s')."','".$content."','".$board_id."');";

		$result = $conn->query($sql);

		echo "
		<script>
		alert(\"작성이 완료되었습니다\");
		location.replace(\"/2choi/board/{$board_id}\");
		</script>
		";
	}
	?>

</body>
</html>