<?php require('../config/config.php'); ?>
<!DOCTYPE html>
<html lang="ko-kr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/2choi/css/normalize.css" type="text/css">
	<link rel="stylesheet" href="/2choi/css/volcation.css" type="text/css">
	<style>

	.content-top{
		width: 100%;
	}
	.content-top > div {
		display: inline-block;
		width: 33%;
	}
	.content-wrap {
		width: 100%;
	}
	.content {
		width: 100%;
	}
	.reply-top {
		display: inline-block;
	}
	
	</style>
	<?php
	require("../layout/head.php");
?>
</head>
	
<body>
	<?php
			require("../layout/header.php");

			preg_match("/board\/(?<boardnum>[0-9]+)\/post\/(?<postnum>[0-9]+)$/", $_SERVER[REQUEST_URI], $match);

			
	$sql="SELECT * FROM posts WHERE post_id=".$match[postnum].";";

	$result = $conn->query($sql);
	$row = $result->fetch();
	?>
	<div class="container">
		<section class="first">
		<div class="content-top">
			<div class="title">
				<?php echo $row["title"]; ?>
			</div>
			<div class="author">

				<?php echo $row["user_id"]; ?>
			</div>
			<div class="date">

				<?php echo $row["date"]; ?>
			</div>
		</div>
		<div class="content-wrap">
			<div class="content">
				<pre style="overflow:auto;"><? echo $row["content"]; ?></pre>
			</div>
		</div>
		<?php

		$sql="SELECT * FROM comments WHERE post_id=".$match[postnum].";";

		$result = $conn->query($sql);

		while($row = $result->fetch()) {
			?>
			<div>
				<div class="reply-top">
					<? echo $row["user_id"];?>
				</div>
				<div class="reply-top">
					<? echo $row["content"];?>
				</div>
			</div>
			<?
		}
		?>


		<div class="content">
			<?php
			echo '<form action="'.$_SERVER[REQUEST_URI].'" method="post">'
			?>
				<textarea name="reply" class="content"></textarea>
				<input type="submit" name="submit" value="작성"></input>
				<?
				if(!empty($_POST["submit"])) {

					$_POST = array_map( 'stripslashes', $_POST );

				//collect form data
					extract($_POST);

					$sql = "INSERT INTO comments (user_id, post_id, content, date)
					VALUES ('".'1'."','".$match[postnum]."','".$reply."',".date.");";
					$result = $conn->query($sql);

					echo "
					<script>
					alert(\"작성이 완료되었습니다\");
					location.replace(\"".$_SERVER[REQUEST_URI]."\");
					</script>
					";
				}
				?>
			</form>
		</div>
	</section>
	</div>
	<footer></footer>

</body>
</html>