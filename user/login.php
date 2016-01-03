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

		$_POST = array_map( 'stripslashes', $_POST );

			//collect form data
		extract($_POST);

		if($username==null)
		{
			$message= "아이디를 적어주세요.";
		}
		if($password==null)
		{
			$message= "비밀번호를 적어주세요.";
		}

		if(!isset($message)){
		
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
		}

	}//end if submit

	?>
	<div id="login">
		<div class="error">
			<h3>
				<?php
					if(isset($message))
					{
						echo $message;
					}
				?>
			</h3>
		</div>
		<div id="black"></div>
		<div id="main">
			<form action="" method="post">
				<div>
					<p>ID</p>
					<input type="text" name="username" placeholder="아이디를 입력하시오">
					<p>PW</p>
					<input type="password" name="password" placeholder="비밀번호를 입력하시오">
				</div>
				<input type="submit" value="로그인" name="submit">
			</form>
			<a href="./signup.php"><button value="signup" name="signup">회원가입</button></a>
		</div>
	</div>



</body>
</html>
