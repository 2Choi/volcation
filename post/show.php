<?php require('../config/config.php'); ?>
<!DOCTYPE html>
<html lang="ko-kr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../normalize.css" type="text/css">
	<link rel="stylesheet" href="../css/page-1.css" type="text/css">
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
	<?php

	$sql="SELECT * FROM mainboard WHERE PostNum=".$_GET["id"].";";

	$result = $conn->query($sql);
	$row = $result->fetch();
	?>
	<div class="container">
		<section class="first">
		<div class="content-top">
			<div class="title">
				<? echo $row["Title"]; ?>
			</div>
			<div class="author">

				<? echo $row["Author"]; ?>
			</div>
			<div class="date">

				<? echo $row["Date"]; ?>
			</div>
		</div>
		<div class="content-wrap">
			<div class="content">
				<pre style="overflow:auto;"><? echo $row["Content"]; ?></pre>
			</div>
		</div>
		<?php

		$sql="SELECT * FROM mainboard WHERE ReplyPost=".$_GET["id"].";";

		$result = $conn->query($sql);

		while($row = $result->fetch()) {
			?>
			<div>
				<div class="reply-top">
					<? echo $row["Author"];?>
				</div>
				<div class="reply-top">
					<? echo $row["Content"];?>
				</div>
			</div>
			<?
		}
		?>


		<div class="content">
			<form action="./show.php?id=<?echo $_GET["id"];?>" method="post">
				<textarea name="reply" class="content"></textarea>
				<input type="submit" name="submit" value="작성"></input>
				<?
				if(!empty($_POST["submit"])) {

					$_POST = array_map( 'stripslashes', $_POST );

				//collect form data
					extract($_POST);

					$sql = "INSERT INTO mainboard (Author, Content, ReplyPost )
					VALUES ('kkk','".$reply."','".$_GET["id"]."');";
					$result = $conn->query($sql);

					echo "
					<script>
					alert(\"작성이 완료되었습니다\");
					location.replace(\"./show.php?id=".$_GET["id"]."\");
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