<?php
require_once('../config/config.php');

//check if already logged in
if( !$user->is_logged_in() ){
	echo "
	<script>
	location.replace(\"../user/login.php\");
	</script>";
}?>
<?php
	require("../layout/head.php");
?>
</head>
<body>
	<?php
		require("../layout/header.php");
	?>
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

				while($row = $result->fetch()) {

					echo "<tr>";
					echo "<td>".$row["PostNum"]."</td>";
					echo "<td>".$row["Author"]."</td>";
					echo "<td>";
					echo "<a href=\"./show.php?id=".$row["PostNum"]."\">".$row["Title"]."</a>";
					echo "</td>";
					echo "<td>".$row["Date"]."</td>";
					echo "<td>";
					echo "<form action=\"./index.php?id=".$row["PostNum"]."\" method=\"post\">";
					echo "<input type=\"submit\" name=\"submit\" value=\"삭제\"></input></form>";

					echo "</td>";
					echo "</tr>";
				}

				if(!empty($_GET["logout"])) {
					$user->logout();
					echo "
					<script>
					location.replace(\"./index.php\");
					</script>";
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
				?>
			</table>
		</div>
	</section>

	<footer></footer>
</body>
</html>