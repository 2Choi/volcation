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
					<td>게시판이름</td>
				</tr>
				<?php


			//내림차순//
				$sql = "SELECT * FROM boards ORDER BY board_id DESC;";
			//내림차순//


				$result = $conn->query($sql);

				while($row = $result->fetch()) {

					echo "<tr>";
					echo "<td>".$row["board_id"]."</td>";
					echo "<td>";
					echo "<a href=\"../post/index.php?board_id=".$row["board_id"]."\">".$row["boardname"]."</a>";
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
				?>
			</table>
		</div>
	</section>

	<footer></footer>
</body>
</html>