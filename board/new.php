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
	<form action="./new.php" method="post">
		<div class="top">
			게시판이름
			<input type="text" name="boardname">
		</div>
		<input type="submit" name="submit" value="작성완료"></input>
	</form>
	<?php

	if(!empty($_POST["submit"])) {

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		$sql = "INSERT INTO boards (boardname) VALUES ('".$boardname."');";

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