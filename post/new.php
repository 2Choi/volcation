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
	<?php
	require("../layout/header.php");
	?>
	<section class="container first">

		<form action="./new" method="post" class="u-full-width">
			<div class="row">
				<div class="top nine columns">
					<div class="two columns">
					<label>제목</label>
				</div>
				<div class="ten columns">
					<input type="text" name="title" class="u-full-width">
				</div>
				</div>
				<div class="top three columns">
					게시판이름
					<select name="board_id" class="u-full-width">
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
			</div>
			<div>
				<p>내용</p>
				<textarea rows="20" cols="150" name="content"></textarea>
			</div>
			<input type="submit" name="submit" value="작성완료"></input>
		</form>
	</section>
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