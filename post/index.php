<?php require('../config/config.php'); ?>
<!DOCTYPE html>
<html lang="ko-kr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../normalize.css" type="text/css">
	<link rel="stylesheet" href="../css/page-1.css" type="text/css">
	<style>
	#bd-1 {
		display: inline-block;
		margin: 0 auto;
	}
	td
	{
		margin:50px;
	}
	.container
	{
		width:80%;
		margin:0 auto;

	}
	</style>
</head>
<body>

	<header>

		<div class="container">
			<ul class="top-menu">
				<!-- <li></li> -->
				<li>볼케이션</li>
			</ul>
			<ul class="top-menu right">
				<li>로그인</li>
				<li>로그아웃</li>
				<li>마일리지</li>
			</ul>
		</div>
	</header>
	<section class="container first">
		<div id="bd-1">
			<table id="bd-title">
				<tr>
					<td>번호</td>
					<td>작성자</td>
					<td>제목</td>
					<td>날짜</td>
				</tr>
				<?php


			//내림차순//
				$sql = "SELECT PostNum, Title, Author, Date FROM mainboard ORDER BY PostNum DESC;";
			//내림차순//


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
	</section>

	<footer></footer>
</body>
</html>