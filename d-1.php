<!DOCTYPE html>
<html lang="ko-kr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/d-1.css">
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<link rel="stylesheet" href="./css/grid.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function(){
		$("#somenu").mouseenter(function(){
			$(this).children("li").children("ul").stop();
			$(this).children("li").children("ul").slideDown(500);
		});
		$("#somenu").mouseleave(function(){
			$(this).children("li").children("ul").stop();
			$(this).children("li").children("ul").slideUp(500);
		});
	});
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2" id="logo">
				<img src="./img/layout/logo.png">
			</div>
			<div class="col-md-10">
				<div class="col-md-12" id="menu">
					<ul id="somenu">
						<li>TOP1
							<ul>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
							</ul>
						</li>
						<li>TOP2
							<ul>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
							</ul>
						</li>
						<li>TOP3
							<ul>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="slup">
		<div class="row sliderwrap">
			<ul id="slider">
				<li><img src="./img/slinder/sl1.jpg"></li>
				<li><img src="./img/slinder/sl2.jpg"></li>
				<li><img src="./img/slinder/sl3.jpg"></li>
				<li><img src="./img/slinder/sl4.jpg"></li>
			</ul>
		</div>
		<div id="pn">
			<img id="prev" src="./img/btn/prev.png">
			<img id="next" src="./img/btn/next.png">
		</div>
		<div id="slide-nav">
			<span class="dots" id="dot1"></span>
			<span class="dots" id="dot2"></span>
			<span class="dots" id="dot3"></span>
			<span class="dots" id="dot4"></span>
		</div>
	</div>
	<script>
	$(document).ready(function(){
		var pos = 1;
		$("#dot1").click(function(){
			$("#slider").animate({"left":"0"});
			$(".dots").css({"background-color":"gray"});
			$(this).css({"background-color":"white"});
			pos = 1;
		});
		$("#dot2").click(function(){
			$("#slider").animate({"left":"-100vw"});
			$(".dots").css({"background-color":"gray"});
			$(this).css({"background-color":"white"});
			pos = 2;
		});
		$("#dot3").click(function(){
			$("#slider").animate({"left":"-200vw"});
			$(".dots").css({"background-color":"gray"});
			$(this).css({"background-color":"white"});
			pos = 3;
		});
		$("#dot4").click(function(){
			$("#slider").animate({"left":"-300vw"});
			$(".dots").css({"background-color":"gray"});
			$(this).css({"background-color":"white"});
			pos = 4;
		});
		$("#prev").click(function(){
			$now_id = "#dot";
			if(pos==1)
			{
				$("#slider").animate({"left":"-300vw"});
				pos = 4;
			}
			else
			{
				$("#slider").animate({"left":"+=100vw"});
				pos--;
			}
			$now_id += pos;
			$(".dots").css({"background-color":"gray"});
			$($now_id).css({"background-color":"white"});
		});
		$("#next").click(function(){
			$now_id = "#dot";
			if(pos==4)
			{
				$("#slider").animate({"left":"0"});
				pos = 1;
			}
			else
			{
				$("#slider").animate({"left":"-=100vw"});
				pos++;
			}
			$now_id += pos;
			$(".dots").css({"background-color":"gray"});
			$($now_id).css({"background-color":"white"});
		});
	});
</script>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="product">
				<img class="product-img" src="./img/layout/logo.png">
				<div class="product-name">휴대폰</div>
				<div class="product-price">\1,000,000</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="product">
				<img class="product-img" src="./img/layout/logo.png">
				<div class="product-name">휴대폰</div>
				<div class="product-price">\1,000,000</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="product">
				<img class="product-img" src="./img/layout/logo.png">
				<div class="product-name">휴대폰</div>
				<div class="product-price">\1,000,000</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="product">
				<img class="product-img" src="./img/layout/logo.png">
				<div class="product-name">휴대폰</div>
				<div class="product-price">\1,000,000</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="product">
				<img class="product-img" src="./img/layout/logo.png">
				<div class="product-name">휴대폰</div>
				<div class="product-price">\1,000,000</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="product">
				<img class="product-img" src="./img/layout/logo.png">
				<div class="product-name">휴대폰</div>
				<div class="product-price">\1,000,000</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="product">
				<img class="product-img" src="./img/layout/logo.png">
				<div class="product-name">휴대폰</div>
				<div class="product-price">\1,000,000</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="product">
				<img class="product-img" src="./img/layout/logo.png">
				<div class="product-name">휴대폰</div>
				<div class="product-price">\1,000,000</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-3">
			<img id="footer-img" src="./img/layout/logo.png">
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<div id="ftup">
						<ul>
							<li><a href="#">이용약관</a></li>
							<li><a href="#">개인정보취급방침</a></li>
							<li><a href="#">활용동의서</a></li>
							<li><a href="#">마케팅보안</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-12">
					<div id="pre-ft">
						<pre>(주)핸드폰 소재지: 서울 강남구 역삼동 666-66 모노타워 2층 핸드폰 | 대표번호: 02-3333-3333
사업자등록번호: 444-44-44444 | 통신판매업신고번호: 평양-1111호 | 대표자: 최태근 | FAX: 02-2222-2222
Copyright © On-Search All Rights reserved.</pre>
					</div>
				</div>
				<div class="col-md-12">
					<img src="./img/footer/ft1.jpg">
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<img src="./img/footer/ft2.jpg">
		</div>

	</div>
</div>
</body>
</html>