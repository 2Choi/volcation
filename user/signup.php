<?php require_once('../config/config.php');

//check if already logged in
if( $user->is_logged_in() ){
	echo "
		<script>
		location.replace(\"../post/index.php\");
		</script>";
}
	require("../layout/head.php");
?>
	<style>
	.join-os {
		text-align: center;
		border: 1px solid gray;
		margin: 30px;
		color: gray;
		font-weight: bold;
	}
	</style>
</head>

<body>
	<?php
	require("../layout/header.php");

	if(isset($_POST['submit'])){
		$_POST = array_map( 'stripslashes', $_POST );

			//collect form data
		extract($_POST);

		if($ID==null)
		{
			$message= "아이디를 적어주세요.";
		}
		if($PW==null)
		{
			$message= "비밀번호를 적어주세요.";
		}
		if($membername==null)
		{
			$message= "이름을 적어주세요.";
		}
		if($birthday==null)
		{
			$message= "생일을 적어주세요.";
		}

		if($PW != $PWC)
		{
			$message= "비밀번호가 동일하지 않습니다";
		}

		try{

			$sql = "SELECT username FROM users WHERE username='".$ID."'";
			$result = $conn->query($sql);
			if( $result -> rowCount() )
			{
				$message= "아이디가 중복되었습니다.";
			}

			if(!isset($message)){

				$sql = "INSERT INTO users (name, username, birthday, password)
				VALUES ('".$_POST["membername"]."','".$_POST["ID"]."','".$_POST["birthday"]."','".$_POST["PW"]."');";

				$result = $conn->query($sql);

				//redirect to index page
	    		//header('Location:login.php');
	    		//exit;
				echo "
				<script>
				location.replace(\"./login.php\");
					</script>";
			}

		}catch(PDOException $e){

		}

	}
	?>

	<div style="margin-top:60px;">
		<h3><?php
		echo $message;
		?></h3>
	</div>

	<div class="container">
		<form action="#" method="post">
				<div class="row">
					<div class="six columns">
						<label>아이디</label>
						<input class="u-full-width" type="text" name="ID">
					</div>
					<div class="six columns">
						<label>성명</label>
						<input class="u-full-width" type="text" name="membername">
					</div>
				</div>
				<div class="row">
					<div class="six columns">
						<label>생년월일</label>
						<input class="u-full-width" type="text" name="birthday">
					</div>
					<div class="six columns">
						<label>비밀번호</label>
						<input class="u-full-width" type="password" name="PW">
					</div>
				</div>
				<div class="row">
					<div class="six columns">
						<label>비밀번호 확인</label>
						<input class="u-full-width" type="password" name="PWC">
					</div>
				</div>
				<div class="row">
					<div class="six columns offset-by-three">
						<input class="button button-primary u-full-width" type="submit" name="submit" value="가입신청"></input>
					</div>
				</div>
		</form>
	</div>


</body>
</html>
