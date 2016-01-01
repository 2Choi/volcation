<?php require_once('../config/config.php'); ?>
<!DOCTYPE html>
<html lang="ko-kr">
<head>
	<meta charset="utf-8">
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

			$sql = "SELECT ID FROM membership WHERE ID='".$ID."'";
			$result = $conn->query($sql);
			if( $result -> rowCount() )
			{
				$message= "아이디가 중복되었습니다.";
			}

			if(!isset($message)){

				$sql = "INSERT INTO membership (membername, ID, birthday, PW)
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
	<div>
		<h3><?php
		echo $message;
		?></h3>
		<form action="#" method="post">
			<div id="jointop">
				<div class="join-os">
					아이디
					<input type="text" name="ID">
				</div>
				<div class="join-os">
					성명
					<input type="text" name="membername">
				</div>
				<div class="join-os">
					생년월일
					<input type="text" name="birthday">
				</div>
				<div class="join-os">
					비밀번호
					<input type="text" name="PW">
				</div>
				<div class="join-os">
					비밀번호 확인
					<input type="text" name="PWC">
				</div>
			</div>
			<input type="submit" name="submit" value="가입신청"></input>
		</form>
	</div>


</body>
</html>