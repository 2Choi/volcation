<?php
require_once('../config/config.php');
	require("../layout/head.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="mileage.js"></script>
</head>

<body>
	<div class="container">
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
			

			echo "<td>";
			/// 
			echo '<div class="number-container">';
    		echo '<input class="mileage" type="number" value="'.$row['mileage'].'"/>';
			include("number.php");
			echo "</td>";
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
	</div>
</body>