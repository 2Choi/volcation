<?php
require_once('../config/config.php');

	if(!empty($_GET["timer"])) 
	{
		$min = (int)date("i");
		$sec = (int)date("s");
		$min=$min%5;
		$sum_sec=$min*60+$sec;
		$time=300-$sum_sec;
		$min=(int)($time/60);
		$sec=$time%60;

		echo $min.":".$sec;
	}
	else if(!empty($_POST["submit"]))
	{
		$min = (int)date("i");
		$min=$min%5;
		if($min!=4)
		{

			$_POST = array_map( 'stripslashes', $_POST );

			//collect form data
			extract($_POST);

			$sql = "SELECT mileage FROM users WHERE user_id=".$_SESSION['user_id'].";";
			$result = $conn->query($sql);
			$row = $result->fetch();

			$user_mileage=$row["mileage"];

			$min = (int)date("i");
            $sec = (int)date("s");
            $min=$min%5;
            $substract = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." -".$min." minutes -".$sec." seconds"));

            $sql = "SELECT odd FROM gambles WHERE user_id=".$_SESSION['user_id'];
			$sql = $sql." AND time BETWEEN '{$substract}' AND '".date("Y-m-d H:i:s")."'";
			$result = $conn->query($sql);

			$row = $result->fetch();
			if(empty($row) || $row['odd']==$odd)
			{
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
			else
			{
				echo "
				<script>
				alert(\"동일하게 배팅해야 됩니다\");
				</script>
				";
			}
		}
		echo "
				<script>
				location.replace(\"index.php\");
				</script>
				";
	}
?>