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
				$sql = "SELECT post_id, title, user_id, date FROM posts ORDER BY post_id DESC;";
			//내림차순//


				$result = $conn->query($sql);

				while($row = $result->fetch()) {

					echo "<tr>";
					echo "<td>".$row["post_id"]."</td>";
					echo "<td>".$row["user_id"]."</td>";
					echo "<td>";
					echo "<a href=\"./show.php?id=".$row["post_id"]."\">".$row["title"]."</a>";
					echo "</td>";
					echo "<td>".$row["date"]."</td>";
					echo "<td>";
					echo "<form action=\"./index.php?id=".$row["post_id"]."\" method=\"post\">";
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


					$sql = "DELETE FROM posts WHERE post_id=".$_GET["id"];
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