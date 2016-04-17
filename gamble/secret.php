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
		// SELECT sum(mileage) FROM `gambles` WHERE odd=1
		// AND time BETWEEN '2016-04-14 23:30:00' AND '2016-04-14 23:35:00';
	}
	else
	{
		echo $row["number"];
	}
?>