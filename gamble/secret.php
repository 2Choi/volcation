<?php
	require_once('../config/config.php');

	$min = (int)date("i");
    $sec = (int)date("s");
    $min=$min%5;
    $substract = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." -".$min." minutes -".$sec." seconds"));

    $sql = "SELECT number FROM winnumber WHERE";
	$sql = $sql." time BETWEEN '{$substract}' AND '".date("Y-m-d H:i:s")."'";
	$result = $conn->query($sql);

	$row = $result->fetch();

	if(empty($row))
	{
		$sql ="SELECT sum(mileage) FROM `gambles` WHERE odd=1 AND";
		$sql =$sql." time BETWEEN '{$substract}' AND '".date("Y-m-d H:i:s")."'";
		$result = $conn->query($sql);

		$row = $result->fetch();

		$odd=$row['sum(mileage)'];

		$sql ="SELECT sum(mileage) FROM `gambles` WHERE odd=0 AND";
		$sql =$sql." time BETWEEN '{$substract}' AND '".date("Y-m-d H:i:s")."'";
		$result = $conn->query($sql);

		$row = $result->fetch();

		$even=$row['sum(mileage)'];

		$oe=$odd+$even;

		$R=rand(1,1000);
		if($odd<$even)
		{
			while($R%2==0)
			{
				$R=rand(1,1000);
			}
			$sql ="INSERT INTO winnumber (number, batting, odd) VALUES ({$R},{$oe},1)";
		}
		else
		{
			while($R%2==1)
			{
				$R=rand(1,1000);
			}
			$sql ="INSERT INTO winnumber (number, batting, odd) VALUES ({$R},{$oe},0)";	
		}

		$result = $conn->query($sql);
		
		echo $R;

		$sql ="SELECT user_id FROM `gambles` WHERE";
		$sql =$sql." time BETWEEN '{$substract}' AND '".date("Y-m-d H:i:s")."'";
		$result = $conn->query($sql);

		$row = $result->fetch();

		foreach ($row as $i)
		{

						
			$sql = "SELECT sum( mileage ),odd FROM gambles WHERE user_id=".$i["user_id"];
			$sql = $sql." AND time BETWEEN '{$substract}' AND '".date("Y-m-d H:i:s")."'";
			$result = $conn->query($sql);

			$row = $result->fetch();
			$mileage=$row["sum( mileage )"];

			if($R%2==$row['odd'])
			{
				$sql = "SELECT mileage FROM users WHERE user_id=".$i['user_id'].";";
				$result = $conn->query($sql);
				$row = $result->fetch();

				$user_mileage=$row["mileage"];

				$sql = "UPDATE users SET mileage=".($user_mileage+$mileage)." WHERE user_id=".$user_id.";";
				$result = $conn->query($sql);
			}

		}

		/*
		SELECT user_id FROM `gambles` WHERE time BETWEEN
		'2016-03-01' AND '2016-04-17' GROUP BY user_id;
		*/



		

		/*
		INSERT INTO `volcation`.`winnumber` (
		 `winnumber_id` ,
		`number` ,
		`time` ,
		`batting` ,
		`odd` 
		)
		VALUES (
		 NULL , '16615', 
		CURRENT_TIMESTAMP , '300000', '1'
		);
		*/
	}
	else
	{
		echo $row["number"];
	}
?>