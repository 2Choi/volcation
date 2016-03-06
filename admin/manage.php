<?php
require_once('../config/config.php');
?>
<!DOCTYPE html>

<html lang="ko-kr">
<head>
	<meta charset="utf-8">

</head>
<body>
<div id="bd-1">
			<table id="bd-title">
				<tr>
					<td>번호</td>
					<td>아이디</td>
					<td>마일리지</td>
					<td>방문수</td>
				</tr>
<?php

	if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
		$sql = "SELECT username, user_id, visit,mileage FROM users";

		$result = $conn->query($sql);

		while($row = $result->fetch()) {

			echo "<tr>";
			echo "<td>".$row["user_id"]."</td>";
			echo "<td>".$row["username"]."</td>";
			echo "<td>";
			echo '<a href="">'.$row["mileage"].'</a>';
			echo "</td>";
			echo "<td>".$row["visit"]."</td>";
			echo "</tr>";
		}
	}
	else
	{
		echo "jashfjah";
		echo "
			<script>
			location.replace(\"login.php\");
			</script>";
	}
	

?>
</table>
		</div>
</body>