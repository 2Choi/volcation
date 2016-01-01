<?php
//include config
require_once('../config/config.php');
//check if already logged in
if( $user->is_logged_in() ){
	echo "
				<script>
				location.replace(\"../post/index.php\");
				</script>";
} 
?>
<!DOCTYPE html>
<html lang="ko-kr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

	<script>
	$(document).ready(function(){
		$("#black").animate({
			opacity:0
		},7000);
	});
	</script>

</head>
<body>
	<?php
	//process login form if submitted
	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($user->login($username,$password)){ 

			//logged in return to index page
			echo "
				<script>
				location.replace(\"../post/index.php\");
				</script>";
			exit;
		
		} else {
			$message = '<p class="error">Wrong username or password</p>';
		}

	}//end if submit

	if(isset($message)){
	 echo $message; 
	}
	?>
	<div id="login">
		<div id="black"></div>
		<div id="main">
			<form action="" method="post">
				<div id="id">ID</div>
				<div id="idvar"><input type="text" name="username" placeholder="아이디를 입력하시오"></div>
				<div id="pw">PW</div>
				<div id="pwvar"><input type="password" name="password" placeholder="비밀번호를 입력하시오"></div>

				<input type="submit" value="로그인" name="submit">
			</form>
			<a href="./signup.php"><button value="signup" name="signup">회원가입</button></a>
		</div>
	</div>
	<a href="./signup.php">회원가입</a>

			
			
</body>
</html>