<?php
require_once('../config/config.php');

	if(!empty($_POST["submit"])) {

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		$sql = "SELECT mileage FROM users WHERE user_id=".$_SESSION['user_id'].";";
		$result = $conn->query($sql);
		$row = $result->fetch();

		$user_mileage=$row["mileage"];

		if($user_mileage>=$mileage)
		{
			$sql = "INSERT INTO gambles (mileage, user_id, odd) VALUES ('".$mileage."','".$user_id."','".$odd."');";
			$result = $conn->query($sql);

			$sql = "UPDATE users SET mileage=".($user_mileage-$mileage)." WHERE user_id=".$user_id.";";
			$result = $conn->query($sql);
		}

		unset($_POST);
		$_POST = array();
	}
	echo "
		<script>
		location.replace(\"index.php\");
		</script>
		";
?>