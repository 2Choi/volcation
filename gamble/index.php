<?php
require_once('../config/config.php');

//check if already logged in
if( !$user->is_logged_in() ){
	echo "
	<script>
	location.replace(\"../user/login.php\");
	</script>";
}
if(!empty($_GET["logout"])) {
	$user->logout();
	echo "
	<script>
	location.replace(\"./index.php\");
	</script>";
}
require("../layout/head.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="../javascript/mileage.js"></script>
</head>
<body>
	<div class="time-black" style="display:none;">
		<div class="six columns offset-by-three">
			<h3>당첨 번호</h3>
			<button id="win-number" type="button" class="button">당첨번호 확인</button>
		</div>
	</div>
	<?php
	require("../layout/header.php");

	$sql = "SELECT mileage FROM users WHERE user_id=".$_SESSION['user_id'].";";
	$result = $conn->query($sql);
	$row = $result->fetch();

	$user_mileage=$row["mileage"];

	?>

	<section class="container first">
		<div class="six columns">
			<h3>남은 시간</h3>
			<h2 id="clock"></h2>
			<script>

			var updateClock=function(){
				$.ajax({
					url:'./batting.php?timer=true',
					success:function(data){
						$('#clock').text(data);
						if(data[0]=='0')
						{
							$("#batting").hide();
						}
						else
						{
							$("#batting").show();
						}

						if(data[0]=='0' && data[2]<='1')
						{
							$(".time-black").show();
						}
						else
						{
							$(".time-black").hide();
						}
					}
				});
				
				setTimeout(updateClock, 1000);
			}

			updateClock();
			</script>
			
		</div>
		<div class="six columns">
			<h3>당첨 번호</h3>
			
		</div>
	</section>
	<section class="container">
		<?php 
		echo "<h3>현재 마일리지 {$user_mileage}</h3>";
		?>
	</section>
	<section class="container">

		
		<div class="six columns">
			<h3>배팅</h3>
			<div class="number-container">
				<form action="batting.php" method="post">
					<div class="odd" >
						<input type="radio" name="odd" value="1" checked>
						<p>홀</p>
					</div>
					<div class="odd" >
						<input type="radio" name="odd" value="0">
						<p>짝</p>
					</div>
					<br>
					<input class="mileage" name="mileage" type="number" value="0"/>
					<input name="user_id" type="hidden" value="1"/>

					<div class="number-control" value="1000000">
						<button type="button" class="plus">+</button>
						<p>1000000</p>
						<button type="button" class="minus">-</button>
					</div> <!-- 1000000 -->
					<div class="number-control" value="100000">
						<button type="button" class="plus">+</button>
						<p>100000</p>
						<button type="button" class="minus">-</button>
					</div> <!-- 100000 -->
					<div class="number-control" value="10000">
						<button type="button" class="plus">+</button>
						<p>10000</p>
						<button type="button" class="minus">-</button>
					</div> <!-- 10000 -->
					<div class="number-control" value="1000">
						<button type="button" class="plus">+</button>
						<p>1000</p>
						<button type="button" class="minus">-</button>
					</div> <!-- 1000 -->

					<input id="batting" class="button button-small button-primary" type="submit" name="submit" value="저장"/>
				</form>
			</div>

		</div>
		<div class="six columns">
			<h3>배팅 금액</h3>
			<h2>
				<?php 
				$min = (int)date("i");
				$sec = (int)date("s");
				$min=$min%5;
				$substract = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." -".$min." minutes -".$sec." seconds"));

				$sql = "SELECT sum( mileage ),odd FROM gambles WHERE user_id=".$_SESSION['user_id'];
				$sql = $sql." AND time BETWEEN '{$substract}' AND '".date("Y-m-d H:i:s")."'";
				$result = $conn->query($sql);

				$row = $result->fetch();

				echo $row['sum( mileage )'] ? $row['sum( mileage )'] : 0;
				echo '</h2><h2>';
				if(!empty($row['odd']))
				{
					echo $row['odd'] ? '홀' : '짝';
				}
				?>
			</h2>
		</div>
		

		
	</section>
</body>