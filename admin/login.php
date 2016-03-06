<?php
//include config
require_once('../config/config.php');
require("../layout/head.php");
?>
</head>
<body>
<?php
	//process login form if submitted
	
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

			//collect form data
		extract($_POST);


		if($password==null)
		{
			$message= "비밀번호를 적어주세요.";
		}

		if(!isset($message)){
		
			if(getenv('ADMINPW') == $password)
			{
				$_SESSION['admin']=true;
				echo "
					<script>
					location.replace(\"/2choi/admin/manage.php\");
					</script>";
			}
			else
			{
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
					<p>PW</p>
					<input type="password" name="password" placeholder="비밀번호를 입력하시오">
				</div>
				<input type="submit" value="로그인" name="submit">
			</form>
		</div>
	</div>