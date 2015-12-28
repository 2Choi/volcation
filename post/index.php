<?php require('../config/config.php'); ?>
<!DOCTYPE html>
<html lang="ko-kr">
<head>
	<meta charset="utf-8">
	<style>
	#bd-1 {
		width: 100%
	}
	td
	{
		margin:50px;
	}
	</style>
</head>
<body>

	<div id="bd-1">
		<table id="bd-title">
			<tr>
				<td>번호</td>
				<td>작성자</td>
				<td>제목</td>
				<td>날짜</td>
			</tr>
			<?php

			$sql = "SELECT * FROM mainboard;";
			$result = $conn->query($sql);

			while($row = $result->fetch_assoc()) {

				echo "<tr>";
				echo "<td>".$row["PostNum"]."</td>";
				echo "<td>".$row["Author"]."</td>";
				echo "<td>";
				echo "<a href=\"./show.php?id=".$row["PostNum"]."\">".$row["Title"]."</a>";
				echo "</td>";
				echo "<td>".$row["Date"]."</td>";
				echo "<td>";
				echo "<form action=\"./index.php?id=".$row["PostNum"]."\" method=\"post\">
					<input type=\"submit\" name=\"submit\" value=\"삭제\"></input>";

				echo "</td>";
				echo "</tr>";
			}

			if(!empty($_POST["submit"])) {

				$_POST = array_map( 'stripslashes', $_POST );

				//collect form data
				extract($_POST);


				$sql = "DELETE FROM mainboard WHERE PostNum=".$_GET["id"];
				$result = $conn->query($sql);

				echo "
				<script>
				alert(\"삭제되었습니다\");
				location.replace(\"./index.php\");
				</script>
				";
			}

			$conn->close();
			?>
		</table>
	</div>
	<form>
</body>
</html>