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
					<td>방문수</td>
					<td>마일리지</td>
				</tr>
<?php
	if(!isset($_SESSION['admin']) || $_SESSION['admin'] == false) {
		echo "
			<script>
			location.replace(\"login.php\");
			</script>";
		exit;
	}

	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );
			//collect form data
		extract($_POST);

		$sql = "UPDATE users SET mileage={$mileage} WHERE user_id={$user_id}";
		$conn->query($sql);

	}

	$sql = "SELECT username, user_id, visit,mileage FROM users";
	$result = $conn->query($sql);

	while($row = $result->fetch()) {
		echo "<tr>";
		echo "<td>".$row["user_id"]."</td>";
		echo "<td>".$row["username"]."</td>";
		echo "<td>".$row["visit"]."</td>";

		echo "<td>";
			include("number.php");
		echo "</td>";
		echo "</tr>";
	}

?>
			</table>
		</div>
	</div>
</body>
